@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Welcome Box -->
        <div class="col-12 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <h2>Selamat Datang Pada Halaman Administrator</h2>
                    <p>
                        Aplikasi ini dirancang sebagai alat bantu untuk mendeteksi tingkat 
                        kecanduan game online pada individu berdasarkan gejala yang diamati. 
                        Sistem ini menggunakan metode Forward Chaining, di mana proses penalaran 
                        dilakukan dengan memulai dari data gejala yang diberikan oleh pengguna untuk 
                        kemudian menarik kesimpulan mengenai tingkat kecanduan. 
                    </p>
                    <p>Tujuan Aplikasi ini adalah untuk membantu individu atau ahli dalam mendeteksi 
                        gejala kecanduan game online secara dini. Aplikasi ini juga bertujuan memberikan 
                        informasi tentang tingkat kecanduan berdasarkan analisis gejala yang diamati, sehingga 
                        pengguna dapat mengetahui sejauh mana kondisi kecanduan yang dialami. Selain itu, aplikasi 
                        ini diharapkan dapat meningkatkan kesadaran akan dampak negatif dari kecanduan game online, 
                        serta mendorong langkah-langkah preventif dan solutif untuk mengatasi permasalahan tersebut.
                    </p>
                </div>
            </div>
        </div>

        <!-- Petunjuk Penggunaan Aplikasi -->
        <div class="col-12 mb-4">
            <div class="card bg-warning shadow">
                <div class="card-body">
                    <h3>Petunjuk Penggunaan Aplikasi</h3>
                    <ol>
                        <li>Masukkan data gejala sesuai dengan kondisi pengguna</li>
                        <li>Jawab pertanyaan yang muncul secara jujur dan akurat</li>
                        <li>Tekan tombol "Proses Diagnosa" untuk mendapatkan hasil analisis</li>
                        <li>Logout sebelum menutup browser</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Kebijakan Pengguna Aplikasi -->
        <div class="col-12">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h3>Kebijakan Pengguna Aplikasi</h3>
                    <ol>
                        <li>Data yang dimasukkan harus akurat dan sesuai dengan kondisi sebenarnya</li>
                        <li>Hasil analisis bersifat pendukung dan bukan pengganti diagnosa profesional</li>
                        <li>Jaga kerahasiaan data pribadi saat menggunakan aplikasi ini</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
