@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tambah Penyakit</h2>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('settingpenyakit.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_penyakit" class="form-label">Kode Penyakit</label>
                    <input type="text" name="kode_penyakit" id="kode_penyakit" class="form-control" value="{{ old('kode_penyakit') }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" value="{{ old('nama_penyakit') }}" required>
                </div>
                <div class="mb-3">
                    <label for="definisi" class="form-label">Definisi Penyakit</label>
                    <textarea name="definisi" id="definisi" class="form-control" rows="4" required>{{ old('definisi') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <textarea name="solusi" id="solusi" class="form-control" rows="4" required>{{ old('solusi') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('settingpenyakit.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
