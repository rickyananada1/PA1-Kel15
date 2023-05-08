@extends('admin.layout.layout')
@section('title')
    Edit Hasil Tani
@endsection
@section('content')
    <div class="container d-block">
        <form action="/admin/hasiltani/{{ $hasiltani->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Hasil Tani</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $hasiltani->nama }}">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <a class="btn btn-info bg-primary btn-sm mb-2" target="_blank" href="{{ asset('image/' . $hasiltani->image) }}">Lihat
                Gambar</a>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Hasil Tani</label>
                <input type="number" class="form-control" name="harga" value="{{$hasiltani->harga}}">
            </div>
            @error('harga')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="harga" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{ $hasiltani->deskripsi }}</textarea>
            </div>
            @error('deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori_id</label>
                <select name="kategori_id" id="kategori" class="form-control">
                    @forelse ($kategori as $items)
                        <option value="{{ $items->id }}">{{ $items->nama }}</option>
                    @empty
                        <option value="">Not Found Kategori</option>
                    @endforelse
                </select>
            </div>
            @error('kategori_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/admin/hasiltani" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
