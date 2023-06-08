@extends('petani.layout.layout')

@section('title')
    Detail Hasil Tani
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('image/' . $hasiltani->image) }}" alt="image" class="img-fluid"
                                style="max-height: 400px;">
                        </div>
                        <h1 class="display-4 text-center mt-4">{{ $hasiltani->nama }}</h1>
                        <hr>
                        <h2 class="text-center">Rp {{ number_format($hasiltani->harga, 3) }}</h2>
                        <p class="text-center">{{ $hasiltani->deskripsi }}</p>
                        <div class="text-center">
                            <a href="/petani/hasiltani" class="btn btn-info btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
