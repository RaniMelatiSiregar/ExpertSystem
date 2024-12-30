<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aturan;

class AturanSeeder extends Seeder
{
    public function run()
    {
        // Aturan untuk Kecanduan Ringan
        $aturan = new Aturan();
        $aturan->kode_penyakit = 'K01'; 
        $aturan->kode_gejala = json_encode(['G001', 'G002', 'G003', 'G004', 'G005']);
        $aturan->save();

        // Aturan untuk Kecanduan Sedang
        $aturan = new Aturan();
        $aturan->kode_penyakit = 'K02'; 
        $aturan->kode_gejala = json_encode(['G001', 'G006', 'G007', 'G008']);
        $aturan->save();

        // Aturan untuk Kecanduan Berat
        $aturan = new Aturan();
        $aturan->kode_penyakit = 'K03';
        $aturan->kode_gejala = json_encode(['G001', 'G009', 'G010', 'G011', 'G012', 'G013']);
        $aturan->save();
    }
}
