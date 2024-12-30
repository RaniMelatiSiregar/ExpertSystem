@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Terima Kasih Telah Menyelesaikan Konsultasi</h3>
    
    @if(session('pasien'))
        <h4>Data Pasien:</h4>
        <ul>
            <li>Nama: {{ session('pasien')['nama'] }}</li>
            <li>Jenis Kelamin: {{ session('pasien')['jenis_kelamin'] }}</li>
            <li>Alamat: {{ session('pasien')['alamat'] }}</li>
            <li>Pekerjaan: {{ session('pasien')['pekerjaan'] }}</li>
        </ul>
    @endif

    <p>Konsultasi selesai. Terima kasih telah menggunakan sistem ini.</p>
</div>
@endsection
