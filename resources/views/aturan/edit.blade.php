@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Aturan</h2>
        <a href="{{ route('aturan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('aturan.update', $aturan->id) }}">
                @csrf
                @method('PUT')
            
                <label>Pilih Penyakit:</label>
                <select name="penyakit_id" class="form-control">
                    @foreach ($penyakits as $penyakit)
                        <option value="{{ $penyakit->id }}" 
                            {{ $penyakit->id == $aturan->penyakit_id ? 'selected' : '' }}>
                            {{ $penyakit->nama_penyakit }}
                        </option>
                    @endforeach
                </select>
            
                <label>Pilih Gejala:</label>
                @foreach ($gejalas as $gejala)
    <div>
        <input type="checkbox" name="gejala_id[]" value="{{ $gejala->id }}" 
            {{ $aturan->gejala_id == $gejala->id ? 'checked' : '' }}>
        {{ $gejala->nama_gejala }}
    </div>
@endforeach
            
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
                      
        </div>
    </div>
</div>
@endsection