<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    public function run()
    {
        // Penyakit dengan kode K01
        $penyakit = new Penyakit();
        $penyakit->kode = 'K01';  // Kode Penyakit K01
        $penyakit->nama = 'Kecanduan Ringan';
        $penyakit->definisi = 'Definisi Kecanduan Ringan';
        $penyakit->solusi = 'Solusi Kecanduan Ringan';
        $penyakit->save();

        // Penyakit dengan kode K02
        $penyakit = new Penyakit();
        $penyakit->kode = 'K02';  // Kode Penyakit K02
        $penyakit->nama = 'Kecanduan Sedang';
        $penyakit->definisi = 'Definisi Kecanduan Sedang';
        $penyakit->solusi = 'Solusi Kecanduan Sedang';
        $penyakit->save();

        // Penyakit dengan kode K03
        $penyakit = new Penyakit();
        $penyakit->kode = 'K03';  // Kode Penyakit K03
        $penyakit->nama = 'Kecanduan Berat';
        $penyakit->definisi = 'Definisi Kecanduan Berat';
        $penyakit->solusi = 'Solusi Kecanduan Berat';
        $penyakit->save();
    }
}
