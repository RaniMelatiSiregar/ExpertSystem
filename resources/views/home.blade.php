@extends('layouts.app')

@section('content')
<div class="card">

    <style>
        .card-body p {
            text-align: justify;
        }
    </style>

    <div class="card-header" style="background-color: #D4EBF8; color: black;">
        <h5 class="mb-0">Sistem Pakar Mendiagnosa Kecanduan Game Online</h5>
    </div>
    <div class="card-body">
        
        <p>
            Sistem pakar adalah sistem berbasis komputer yang menggunakan pengetahuan, fakta, dan teknik penalaran 
            dalam menyelesaikan masalah yang biasanya hanya dapat ditangani oleh seorang pakar. Salah satu aplikasi sistem pakar 
            adalah dalam bidang kesehatan mental, seperti mendeteksi gejala kecanduan game online yang semakin marak di era digital ini.
        </p>
        <p>
            Mekanisme inferensi dalam sistem pakar menggunakan metode Forward Chaining. Forward chaining bekerja 
            berdasarkan aturan kondisi-aksi yang dimulai dari fakta-fakta awal pengguna hingga menemukan kesimpulan atau 
            diagnosa akhir. Dalam konteks ini, sistem akan memeriksa data pengguna seperti pola bermain, perubahan perilaku, dan 
            gangguan aktivitas harian yang disebabkan oleh game online.
        </p>
        <p>
            Kecanduan game online telah menjadi salah satu masalah serius yang mempengaruhi kesehatan mental dan kehidupan sosial 
            banyak individu, terutama anak-anak dan remaja. Gejala seperti penurunan prestasi, gangguan pola tidur, dan kurangnya 
            interaksi sosial sering kali diabaikan. Sistem pakar ini hadir untuk membantu memberikan diagnosa dini, serta memberikan 
            rekomendasi tindakan untuk mengurangi dampak negatif dari kecanduan game online.
        </p>
        
        <div class="text-center">
            <a href="{{ route('konsultasi.index') }}" class="btn btn-primary btn-lg">Mulai Konsultasi</a>
        </div>
    </div>
</div>
@endsection
