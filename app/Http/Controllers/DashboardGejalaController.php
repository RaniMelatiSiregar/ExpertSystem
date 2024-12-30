<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class DashboardGejalaController extends Controller
{
    public function index()
    {
    $gejalas = Gejala::all();
    return view('gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|unique:gejalas,kode_gejala',
            'nama_gejala' => 'required',
        ]);

        Gejala::create($request->all());
        return redirect()->route('settinggejala.index')->with('success', 'Data Gejala berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('gejala.edit', compact('gejala'));
    }    

    public function update(Request $request, $id)
{
    // dd($request->all());

    $request->validate([
        'kode_gejala' => 'required|max:50',
        'nama_gejala' => 'required|max:255',
    ]);

    $gejala = Gejala::findOrFail($id);
    $gejala->update($request->all());

    return redirect()->route('settinggejala.index')->with('success', 'Gejala berhasil diperbarui');
}

    public function show($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('settinggejala.show', compact('gejala'));
    }

    public function destroy($id)
{
    $gejala = Gejala::findOrFail($id);
    $gejala->delete();
    return redirect()->route('settinggejala.index')->with('success', 'Gejala berhasil dihapus.');
}
}
