@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #D4EBF8; color: black;">
            <h4>Hasil Diagnosis Penyakit</h4>
        </div>
        <div class="card-body">
            <h5>DATA PASIEN</h5>
            <table class="table">
                <tr>
                    <td class="text-start" style="width: 150px;"><strong>Nama</strong></td>
                    <td class="text-start">: {{ $pasien['nama'] }}</td>
                </tr>
                <tr>
                    <td class="text-start"><strong>Jenis Kelamin</strong></td>
                    <td class="text-start">: {{ $pasien['jenis_kelamin'] }}</td>
                </tr>
                <tr>
                    <td class="text-start"><strong>Alamat</strong></td>
                    <td class="text-start">: {{ $pasien['alamat'] }}</td>
                </tr>
                <tr>
                    <td class="text-start"><strong>Pekerjaan</strong></td>
                    <td class="text-start">: {{ $pasien['pekerjaan'] }}</td>
                </tr>
            </table>
        </div>

        <div class="card-body">
            <h5>HASIL DIAGNOSIS</h5>
            <table class="table">
                @forelse($diagnosis as $result)
                    <!-- Nama Penyakit -->
                    <tr>
                        <td class="text-start" style="width: 150px;"><strong>Penyakit</strong></td>
                        <td class="text-start">{{ $result['penyakit'] ?? 'Tidak ada penyakit yang terdeteksi' }}</td>
                    </tr>
        
                    <!-- Gejala -->
                    <tr>
                        <td class="text-start"><strong>Gejala</strong></td>
                        <td class="text-start">
                            <ol class="m-0 ps-3">
                                @foreach($gejalaDipilih as $g)
                                    <li>{{ $g->nama_gejala }}</li>
                                @endforeach
                            </ol>
                        </td>
                    </tr>
        
                    <!-- Definisi -->
                    <tr>
                        <td class="text-start"><strong>Definisi</strong></td>
                        <td class="text-start">{{ $result['definisi'] ?? 'Tidak ada definisi penyakit' }}</td>
                    </tr>
        
                    <!-- Solusi -->
                    <tr>
                        <td class="text-start"><strong>Solusi</strong></td>
                        <td class="text-start">{{ $result['solusi'] ?? 'Tidak ada solusi yang ditemukan' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada penyakit yang terdeteksi</td>
                    </tr>
                @endforelse
            </table>
        </div>        
        
        <!-- Tombol Back to Home -->
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
    </div>
</div>
</div>
@endsection
