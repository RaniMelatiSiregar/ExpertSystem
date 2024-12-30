@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #D4EBF8; color: black;">
            Konsultasi
          </div>        
        <div class="card-body">
            <form action="{{ route('konsultasi.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="Pria" required>
                        <label>Pria</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="Wanita">
                        <label>Wanita</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Proses</button>
            </form>
        </div>
    </div>
</div>
@endsection
