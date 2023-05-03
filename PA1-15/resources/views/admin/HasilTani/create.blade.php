@extends('admin.layout.layout')
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
@section('content')
    <div class="container d-block">
        <form action="/hasiltani" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 style="color: red" class="text-center my-3">Create Hasil Tani</h1>
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
                <input type="text" class="form-control" name="harga">
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
                        <option value="{{ $items->nama }}">{{$items->nama}}</option>
                    @empty
                        <option value="">Not Found Kategori</option>
                    @endforelse
                </select>
            </div>
            @error('kategori_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/hasiltani" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
