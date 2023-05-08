@extends('admin.layout.layout')
@section('title')
    Edit Pupuk
@endsection
@section('content')
    <form action="/admin/pupuk/{{$pupuk->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Pupuk</label>
            <input type="text" class="form-control" value="{{ $pupuk->nama }}" name="nama">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Jenis Pupuk</label>
            <input type="text" class="form-control" name="jenis" value="{{ $pupuk->jenis }}">
        </div>
        @error('jenis')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{ $pupuk->stok }}">
        </div>
        @error('stok')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="/pupuk" class="btn btn-danger">Cancel</a>
    </form>
@endsection
