@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Setting Penyakit & Solusi</h2>
        <a href="{{ route('settingpenyakit.create') }}" class="btn btn-primary">+ Tambah Penyakit</a>
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
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Definisi Penyakit</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penyakits as $index => $penyakit)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $penyakit->kode_penyakit }}</td>
                        <td>{{ $penyakit->nama_penyakit }}</td>
                        <td>{{ $penyakit->definisi }}</td>
                        <td>{{ $penyakit->solusi }}</td>
                        <td style="display: flex; align-items: center; justify-content: flex-start;">
                            <a href="{{ route('settingpenyakit.edit', $penyakit->id) }}" class="btn btn-primary btn-sm mr-2">&#9998;</a>
                            <form action="{{ route('settingpenyakit.destroy', $penyakit->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mr-2"><i class="fas fa-trash"></i></button>
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

@section('styles')
    <style>

        .table td:nth-child(6) {
            width: 180px !important;
        }

    </style>
@endsection
