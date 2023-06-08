@extends('petani.layout.layout')
@section('title')
    Ubah Data Diri
@endsection
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description">
                                Update Profile
                            </p>
                            @if (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error: </strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success: </strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ url('petani/update-petani-details') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input class="form-control" id="Email" name="Email"
                                        value="{{ Auth::guard('petani')->user()->email }}" placeholder="Enter Email"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input class="form-control" id="alamat" name="alamat"
                                        value="{{ Auth::guard('petani')->user()->alamat }}" placeholder="Enter alamat">
                                </div>
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input type="text" class="form-control" id="umur"
                                        value="{{ Auth::guard('petani')->user()->umur }}" placeholder="Enter umur"
                                        name="umur">
                                </div>
                                @error('umur')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="TempatLahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="TempatLahir"
                                        value="{{ Auth::guard('petani')->user()->TempatLahir }}" placeholder="Ex:Balige"
                                        name="TempatLahir">
                                </div>
                                @error('TempatLahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="TanggalLahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="TanggalLahir"
                                        value="{{ Auth::guard('petani')->user()->TanggalLahir }}" name="TanggalLahir">
                                </div>
                                @error('TanggalLahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="JenisKelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="JenisKelamin" name="JenisKelamin">
                                        <option value="Laki-laki"
                                            {{ Auth::guard('petani')->user()->JenisKelamin == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ Auth::guard('petani')->user()->JenisKelamin == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                                @error('JenisKelamin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" id="Nama"
                                        value="{{ Auth::guard('petani')->user()->nama }}" placeholder="Enter Nama"
                                        name="Nama">
                                </div>
                                @error('Nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="NoTelephone">No Telephone</label>
                                    <input type="text" class="form-control" id="NoTelephone"
                                        value="{{ Auth::guard('petani')->user()->NoTelephone }}"
                                        placeholder="Enter No Telephone" name="NoTelephone" maxlength="12" minlength="11">
                                </div>
                                @error('NoTelephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="images">Photo</label>
                                    <input type="file" class="form-control" id="images" name="images"> <br>
                                    @if (!empty(Auth::guard('petani')->user()->image))
                                        <a class="btn btn-info bg-primary btn-sm" target="_blank"
                                            href="{{ url('petani/images/photo/' . Auth::guard('petani')->user()->image) }}">View
                                            Gambar</a>
                                        <input type="hidden" name="current_admin_image"
                                            value="{{ Auth::guard('petani')->user()->image }}">
                                    @endif
                                </div>
                                @error('images')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
