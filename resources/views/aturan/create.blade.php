@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tambah Aturan</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('aturan.store') }}" method="POST">
                    @csrf
                    <!-- Nama Penyakit -->
                    <div class="form-group">
                        <label for="penyakit_id">Nama Penyakit</label>
                        <select class="form-control @error('penyakit_id') is-invalid @enderror" id="penyakit_id" name="penyakit_id" required>
                            <option value="">Pilih Penyakit</option>
                            @foreach ($penyakits as $penyakit)
                                <option value="{{ $penyakit->id }}" 
                                    {{ old('penyakit_id') == $penyakit->id ? 'selected' : '' }}>
                                    {{ $penyakit->nama_penyakit }}
                                </option>
                            @endforeach
                        </select>
                        @error('penyakit_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kode Gejala -->
                    <div class="form-group">
                        <label for="gejala_id">Nama Gejala</label>
                        @foreach ($gejalas as $gejala)
                            <div class="form-check">
                                <input class="form-check-input @error('gejala_id') is-invalid @enderror" type="checkbox"
                                       value="{{ $gejala->id }}" id="gejala_{{ $gejala->id }}" name="gejala_id[]"
                                       {{ is_array(old('gejala_id')) && in_array($gejala->id, old('gejala_id', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="gejala_{{ $gejala->id }}">
                                    {{ $gejala->gejala_id }} {{ $gejala->nama_gejala }}
                                </label>
                            </div>
                        @endforeach
                        @error('gejala_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('aturan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
