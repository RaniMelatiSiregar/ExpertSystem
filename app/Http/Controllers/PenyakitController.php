<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
{
    $penyakits = Penyakit::all();
    return view('penyakit.index', compact('penyakits'));
}

}
