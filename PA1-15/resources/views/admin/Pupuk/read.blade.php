@extends('admin.layout.layout')
@section('title')
    Detail Pupuk
@endsection
@section('content')
    <div class="container">
        <h1>{{$pupuk->nama}}</h1>
        <h2>{{$pupuk->jenis}}</h2>
        <h3>{{$pupuk->stok}}</h3>
        <a href="/pupuk" class="btn btn-info btn-sm">Kembali</a>
    </div>
@endsection
