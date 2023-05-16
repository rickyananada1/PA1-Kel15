@extends('admin.layout.layout')
@section('title')
    Form Pengumuman
@endsection
@section('content')
    <form action="/admin/pengumuman" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Pengumuman</label>
            <input type="text" class="form-control" name="nama">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Isi Pengumuman</label>
            <textarea name="isi" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        @error('isi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-info">Tambahkan</button>
        <a href="/admin/pengumuman" class="btn btn-danger">Kembali</a>
    </form>
@endsection
