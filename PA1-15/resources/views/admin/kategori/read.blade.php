@extends('admin.layout.layout');
@section('content')
<div class="container">
<nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
    <a class="navbar-brand" href="#">{{$kategori->nama}}</a>
  </nav>
  <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
    <h4 id="scrollspyHeading1">{{$kategori->deskripsi}}</h4>
    <a href="/kategori" class="btn btn-info btn-sm">Back</a>
  </div>
</div>
@endsection
