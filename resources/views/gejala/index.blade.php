@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Setting Gejala</h2>
        <a href="{{ route('settinggejala.create') }}" class="btn btn-primary">+ Tambah Gejala</a>
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
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gejalas as $index => $gejala)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $gejala->kode_gejala }}</td>
                        <td>{{ $gejala->nama_gejala }}</td>
                        <td style="display: flex; align-items: center; justify-content: flex-start;">
                            <a href="{{ route('settinggejala.edit', $gejala->id) }}" class="btn btn-primary btn-sm mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <form action="{{ route('settinggejala.destroy', $gejala->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
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
