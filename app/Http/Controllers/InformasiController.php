<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        // Data informasi
        $informasi = [
            [
                'judul' => 'Dampak Negatif Kecanduan Game Online',
                'isi' => 'Kecanduan game online dapat menyebabkan gangguan tidur, menurunnya produktivitas, hingga masalah kesehatan mental. Penting untuk memahami tanda-tanda kecanduan sejak dini.',
                'gambar' => 'dampak_negatif.png',
            ],
            [
                'judul' => 'Tips Mengatasi Kecanduan Game Online',
                'isi' => 'Kurangi durasi bermain secara bertahap, tetapkan jadwal yang disiplin, dan cari aktivitas alternatif seperti olahraga atau hobi baru untuk mengalihkan perhatian.',
                'gambar' => 'tips_mengatasi.png',
            ],
            [
                'judul' => 'Fakta Menarik Tentang Kecanduan Game Online',
                'isi' => 'Studi menunjukkan bahwa kecanduan game online sering kali memengaruhi remaja. Faktor-faktor seperti kurangnya pengawasan dan stres dapat menjadi pemicu utama.',
                'gambar' => 'fakta_menarik.png',
            ],
        ];

        return view('informasi.index', compact('informasi'));
    }
}
