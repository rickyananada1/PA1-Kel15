@extends('admin.layout.layout')
@section('title')
    Edit Pengumuman
@endsection
@section('content')
    <form action="/admin/pengumuman/{{$pengumuman->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Pengumuman</label>
            <input type="text" class="form-control" name="nama" value="{{$pengumuman->nama}}">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Isi Pengumuman</label>
            <textarea name="isi" id="" cols="30" rows="10" class="form-control">{{ $pengumuman->isi }}</textarea>
        </div>
        @error('isi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-info">Tambahkan</button>
        <a href="/admin/pengumuman" class="btn btn-danger">Kembali</a>
    </form>
@endsection
