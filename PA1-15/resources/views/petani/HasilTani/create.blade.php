@extends('petani.layout.layout')
@section('title')
    Tambah Hasil Tani
@endsection
@section('content')
    <div class="container d-block">
        <form action="/petani/hasiltani" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Hasil Tani</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            @error('nama')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Hasil Tani</label>
                <input type="number" class="form-control" name="harga">
            </div>
            @error('harga')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="harga" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            @error('deskripsi')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori_id</label>
                <select name="kategori_id" id="" class="form-control">
                    <option value="">--Pilih Kategori--</option>
                    @forelse ($kategori as $items)
                        <option value="{{ $items->id }}">{{ $items->nama }}</option>
                    @empty
                        <option value="">Not Found Kategori</option>
                    @endforelse
                </select>
            </div>
            @error('kategori_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
