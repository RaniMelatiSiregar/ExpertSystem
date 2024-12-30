<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class DashboardPenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('settingpenyakit', compact('penyakits'));
    }

    public function create()
    {
        return view('penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakits|max:10',
            'nama_penyakit' => 'required|max:255',
            'definisi' => 'required',
            'solusi' => 'required',
        ]);

        Penyakit::create($request->all());
        return redirect()->route('settingpenyakit.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
{
    $penyakits = Penyakit::findOrFail($id);
    return view('penyakit.edit', compact('penyakit'));
}

    public function update(Request $request, $id)
{
    $penyakits = Penyakit::findOrFail($id);

    $request->validate([
        'kode_penyakit' => 'required|max:10|unique:penyakits,kode,' . $penyakits->id,
        'nama_penyakit' => 'required|max:255',
        'definisi' => 'required',
        'solusi' => 'required',
    ]);

    $penyakits->update($request->all());
    return redirect()->route('settingpenyakit.index')->with('success', 'Data berhasil diperbarui.');
}

public function destroy($id)
{
    $penyakits = Penyakit::findOrFail($id);
    $penyakits->delete();

    return redirect()->route('settingpenyakit.index')->with('success', 'Data berhasil dihapus.');
}
}