@extends('admin.layout.layout')

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
                            <img src="{{ url('admin/images/photo/' . Auth::guard('admin')->user()->image) }}"
                                alt="Foto Profil" class="rounded-circle profile-img" width="150" height="150">
                        </div>
                        <div class="profile-details mt-4">
                            <div class="mb-3">
                                <label class="fw-bold">Nama:</label>
                                <p>{{ Auth::guard('admin')->user()->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Email:</label>
                                <p>{{ Auth::guard('admin')->user()->email }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Umur:</label>
                                <p>{{ Auth::guard('admin')->user()->umur }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Jenis Kelamin:</label>
                                <p>{{ Auth::guard('admin')->user()->JenisKelamin }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Tempat / Tanggal Lahir:</label>
                                <p>{{ Auth::guard('admin')->user()->TempatLahir }} /
                                    {{ Auth::guard('admin')->user()->TanggalLahir }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Alamat:</label>
                                <p>{{ Auth::guard('admin')->user()->alamat }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">No. Telephone:</label>
                                <p>{{ Auth::guard('admin')->user()->NoTelephone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
