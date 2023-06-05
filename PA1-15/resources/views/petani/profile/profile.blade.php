@extends('petani.layout.layout')

@section('title')
    Data Diri
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ url('petani/images/photo/' . Auth::guard('petani')->user()->image) }}"
                                alt="Foto Profil" class="rounded-circle profile-img" width="150" height="150">
                        </div>
                        <div class="profile-details mt-4">
                            <div class="mb-3">
                                <label class="fw-bold">Nama:</label>
                                <p>{{ Auth::guard('petani')->user()->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Email:</label>
                                <p>{{ Auth::guard('petani')->user()->email }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Umur:</label>
                                <p>{{ Auth::guard('petani')->user()->umur }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Jenis Kelamin:</label>
                                <p>{{ Auth::guard('petani')->user()->JenisKelamin }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Tempat / Tanggal Lahir:</label>
                                <p>{{ Auth::guard('petani')->user()->TempatLahir }} /
                                    {{ Auth::guard('petani')->user()->TanggalLahir }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Alamat:</label>
                                <p>{{ Auth::guard('petani')->user()->alamat }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">No. Telephone:</label>
                                <p>{{ Auth::guard('petani')->user()->NoTelephone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
