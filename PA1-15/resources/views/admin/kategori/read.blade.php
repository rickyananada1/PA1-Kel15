@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
            data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
            <h1 class="display-3" style="font-family: Lucida">{{ $kategori->nama }}</h1>
            <hr>
            <h4 id="scrollspyHeading1" style="font-family: 'sans ms comic'">{{ $kategori->deskripsi }}</h4>
            <a href="/admin/kategori" class="btn btn-info btn-sm">Kembali</a>
        </div>
    </div>
@endsection
