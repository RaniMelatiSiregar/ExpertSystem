@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Data Gejala</h2>

    <form action="{{ route('settinggejala.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_gejala">Kode Gejala</label>
            <input type="text" class="form-control" name="kode_gejala" placeholder="Masukkan Kode Gejala" required>
        </div>
        <div class="form-group">
            <label for="nama_gejala">Nama Gejala</label>
            <input type="text" class="form-control" name="nama_gejala" placeholder="Masukkan Nama Gejala" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('settinggejala.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
