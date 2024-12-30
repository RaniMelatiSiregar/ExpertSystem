@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Aturan</h2>
        <a href="{{ route('aturan.create') }}" class="btn btn-primary">+ Tambah Aturan</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Search" id="search" />
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penyakit</th>
                        <th>Nama Gejala</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aturans as $aturan)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{ $aturan->penyakit->nama_penyakit }}</td>
                            <td>{{ $aturan->gejala->nama_gejala }}</td>
                            <td>
                                <a href="{{ route('aturan.edit', $aturan->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('aturan.destroy', $aturan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
