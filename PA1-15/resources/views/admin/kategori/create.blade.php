@extends('admin.layout.layout');
@section('content')
<style>
    h1 {
            overflow: hidden;
            animation: typing 0.5s steps(10, end) 0.5s 0.5 normal both;
        }

        h1 {
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: 0.15em;
            animation: typing-loop 2s steps(30, end) 1s 1 normal;
        }

        @keyframes typing-loop {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }
</style>
<div class="container d-block">
<form action="/kategori" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 style="color: greenyellow" class="text-center">Create Kategori</h1>
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
    <a href="/kategori" class="btn btn-danger bnt-sm">Cancel</a>
  </form>
</div>
@endsection
