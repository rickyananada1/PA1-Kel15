@extends('petani.layout.layout')
@section('title')
    Detail Hasil Tani
@endsection
@section('content')
    <div class="container">
        <img src="{{ asset('image/' . $hasiltani->image) }}" alt="image" width="400px">
        <h1>{{ $hasiltani->nama }}</h1>
        <h2>{{ $hasiltani->harga }}</h2>
        <h3>{{ $hasiltani->deskripsi }}</h3>
        <a href="/petani/hasiltani" class="btn btn-info btn-sm">Kembali</a>
    </div>
@endsection
