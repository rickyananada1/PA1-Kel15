@extends('petani.layout.layout')
@section('title')
    Ubah Kategori
@endsection
@section('content')
<div class="container d-block">
<form action="/petani/kategori/{{$kategori->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 pt-3">
      <label for="nama" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi Kategori</label>
      <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{$kategori->deskripsi}}</textarea>
    </div>
    @error('deskripsi')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Ubah</button>
    <a href="/petani/kategori" class="btn btn-danger bnt-sm">Batalkan</a>
  </form>
</div>
@endsection
