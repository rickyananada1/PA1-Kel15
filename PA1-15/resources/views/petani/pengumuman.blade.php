@extends('petani.layout.layout')
@section('title')
    Pengumuman
@endsection
@section('content')
    @foreach ($pengumuman as $item)
        <div class="card">
            <div class="card-header">
                {{ $item->nama }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0 bg-gray">
                    <p>{{ $item->isi }}</p>
                </blockquote>
            </div>
        </div>
    @endforeach
@endsection
