<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakits';
    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'definisi',
        'solusi',
    ];

    public function gejala()
    {
        return $this->hasMany(Gejala::class);
    }
    public function aturan()
    {
        return $this->hasMany(Aturan::class, 'penyakit_id');
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'penyakit_id');
    }
}