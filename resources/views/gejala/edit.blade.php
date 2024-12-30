@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Data Gejala</h2>

    <form action="{{ route('settinggejala.update', $gejala->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_gejala">Kode Gejala</label>
            <input type="text" class="form-control" name="kode_gejala" value="{{ $gejala->kode_gejala }}" required>
        </div>
        <div class="form-group">
            <label for="nama_gejala">Nama Gejala</label>
            <input type="text" class="form-control" name="nama_gejala" value="{{ $gejala->nama_gejala }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('settinggejala.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
