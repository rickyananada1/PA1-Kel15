@extends('admin.layout.layout')
@section('title')
    Data Diri
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="profile-wrapper">
                <img src="{{url('admin/images/photo/'.Auth::guard('admin')->user()->image)}}" alt="Foto Profil"
                    class="profile-img">
                <div>
                    <h4>Nama : {{Auth::guard('admin')->user()->nama}}</h4>
                    <h4>Email : {{Auth::guard('admin')->user()->email}}</h4>
                    <h4>Umur : {{Auth::guard('admin')->user()->umur}}</h4>
                    <h4>Jenis Kelamin : {{Auth::guard('admin')->user()->JenisKelamin}}</h4>
                    <h4>Tempat / Tgl Lahir : {{Auth::guard('admin')->user()->TempatLahir}} / {{Auth::guard('admin')->user()->TanggalLahir}}</h4>
                    <h4>Alamat : {{Auth::guard('admin')->user()->alamat}}</h4>
                    <h4>No. Telephone : {{Auth::guard('admin')->user()->NoTelephone}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
