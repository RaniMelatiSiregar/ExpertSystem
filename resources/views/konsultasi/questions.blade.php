@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #D4EBF8; color: black;">
            <h4>Pertanyaan Diagnosa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('konsultasi.answer') }}" method="POST">
                @csrf
                <div class="question text-center">
                    <h5>{{ $currentQuestion->nama_gejala }}</h5>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="jawaban" value="Ya" id="ya" required>
                        <label for="ya">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="jawaban" value="Tidak" id="tidak">
                        <label for="tidak">Tidak</label>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        @if($hasNext)
                            Selanjutnya
                        @else
                            Selesai
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- @if (!$hasNext)
        <a href="{{ route('konsultasi.finish') }}" class="btn btn-primary mt-3">Selesai</a>
    @endif --}}
    
</div>
@endsection

@push('styles')
<style>
    .question {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-check-inline {
        margin: 0 10px;
    }

    .btn {
        margin-top: 20px;
    }
</style>
@endpush
