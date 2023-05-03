@extends('admin.layout.layout')
@section('content')
    <table class="table">
        <div class="container d-block">
            <div class="row">
                @forelse ($hasiltani as $items)
                    <div class="col-3">
                        <div class="card">
                            <img src="{{ asset('image/' . $items->image) }}" class="card-img-top" alt="Gambar">
                            <div class="card-body">
                                <h5 class="card-title">{{ $hasiltani->nama }}</h5>
                                <h6 class="card-title">{{ $hasiltani->harga }}</h6>
                                <p class="card-text">{{ $hasiltani->deskripsi }}</p>
                            </div>
                        </div>
                    @empty
                        <b>Not Found Data</b>
                @endforelse
            </div>
        </div>
        </div>
    @endsection
