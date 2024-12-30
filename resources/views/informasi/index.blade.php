@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #D4EBF8; color: black;">
            <h4>Informasi</h4>
        </div>
        <div class="card-body">
            @foreach ($informasi as $info)
                <div class="media mb-4">
                    <img src="{{ asset('img/' . $info['gambar']) }}" class="mr-3" alt="{{ $info['judul'] }}" width="100">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $info['judul'] }}</h5>
                        <p>{{ $info['isi'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
