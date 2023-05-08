@extends('admin.layout.layout')
@section('title')
    Tambah Kategori
@endsection
@section('content')
<div class="container d-block">
<form action="/admin/kategori" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 pt-3">
      <label for="nama" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" name="nama">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi Kategori</label>
      <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    @error('deskripsi')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="/admin/kategori" class="btn btn-danger bnt-sm">Cancel</a>
  </form>
</div>
@endsection
