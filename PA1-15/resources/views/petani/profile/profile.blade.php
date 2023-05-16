@extends('petani.layout.layout')
@section('title')
    Profile Akun
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            Swal.fire({
                title: 'Hapus ' + name + '?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/petani/login/" + id,
                        type: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Terhapus!',
                                'Akun telah terhapus.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan! Item tidak bisa terhapus karena ada data didalam Item tersebut'
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
@section('content')
    <style>
        .profile-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="profile-wrapper">
                    <img src="{{ url('petani/images/photo/' . Auth::guard('petani')->user()->image) }}" alt="Foto Profil"
                        class="profile-img">
                    <div>
                        <h4>Nama : {{ Auth::guard('petani')->user()->nama }}</h4>
                        <h4>Email : {{ Auth::guard('petani')->user()->email }}</h4>
                        <h4>Umur : {{ Auth::guard('petani')->user()->umur }}</h4>
                        <h4>Jenis Kelamin : {{ Auth::guard('petani')->user()->JenisKelamin }}</h4>
                        <h4>Tempat / Tgl Lahir : {{ Auth::guard('petani')->user()->TempatLahir }} /
                            {{ Auth::guard('petani')->user()->TanggalLahir }}</h4>
                        <h4>Alamat : {{ Auth::guard('petani')->user()->alamat }}</h4>
                        <h4>No. Telephone : {{ Auth::guard('petani')->user()->NoTelephone }}</h4>
                        <form action="{{ route('deleteakun') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm .delete"
                                name="{{ Auth::guard('petani')->user()->nama }}"
                                id="{{ Auth::guard('petani')->user()->id }}">Hapus Akun</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
