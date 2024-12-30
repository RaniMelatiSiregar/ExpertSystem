<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Aturan;
use Illuminate\Http\Request;

class DashboardAturanController extends Controller
{
    public function index()
    {
        // Ambil semua aturan dengan relasi penyakit dan gejala
        $aturans = Aturan::with(['penyakit', 'gejala'])->get();
        return view('aturan.index', compact('aturans'));
    }

    public function create()
    {
        $penyakits = Penyakit::select('id', 'nama_penyakit')->orderBy('nama_penyakit')->get();
        $gejalas = Gejala::select('id', 'nama_gejala')->orderBy('nama_gejala')->get();
        return view('aturan.create', compact('penyakits', 'gejalas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|array|min:1',
            'gejala_id.*' => 'exists:gejalas,id',
        ]);

        $penyakitId = $request->input('penyakit_id');
        $gejalaIds = $request->input('gejala_id');

        // Batch Insert Data
        $data = [];
        foreach ($gejalaIds as $gejalaId) {
            $data[] = [
                'penyakit_id' => $penyakitId,
                'gejala_id' => $gejalaId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Aturan::insert($data);

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil ditambahkan.');
    }

    public function edit($id)
{
    $aturan = Aturan::with(['penyakit', 'gejala'])->findOrFail($id); // Sesuai dengan relasi one-to-many
    $penyakits = Penyakit::select('id', 'nama_penyakit')->orderByDesc('updated_at')->get();
    $gejalas = Gejala::select('id', 'nama_gejala')->orderByDesc('updated_at')->get();

    return view('aturan.edit', compact('aturan', 'penyakits', 'gejalas'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|array|min:1',
            'gejala_id.*' => 'exists:gejalas,id',
        ]);

        $penyakitId = $request->input('penyakit_id');
        $gejalaIds = $request->input('gejala_id');

        // Hapus aturan lama untuk penyakit ini
        Aturan::where('gejala_id', $gejalaIds)->delete();

        // Simpan aturan baru
        $data = [];
        foreach ($gejalaIds as $gejalaId) {
            $data[] = [
                'penyakit_id' => $penyakitId,
                'gejala_id' => $gejalaId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Aturan::insert($data);

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aturan = Aturan::findOrFail($id);
        $aturan->delete();

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil dihapus.');
    }
}
