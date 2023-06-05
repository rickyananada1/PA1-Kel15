{{-- @extends('petani.layout.layout')
@section('title')
    Daftar Kategori
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
                        url: "/admin/kategori/" + id,
                        type: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Terhapus!',
                                'Item telah terhapus.',
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
    <table class="table">
        @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success: </strong> {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Deskripsi Kateggori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ Str::limit($value->deskripsi, 15) }}</td>
                    <td>
                        <form action="/petani/kategori/{{ $value->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/petani/kategori/{{ $value->id }}" class="btn btn-success btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="/petani/kategori/{{ $value->id }}/edit" class="btn btn-success btn-sm mr-3 ml-3"><i
                                    class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm delete" name="{{ $value->nama }}"
                                id="{{ $value->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        <h1>Tidak Ada Data</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection --}}
@extends('petani.layout.layout')
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
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
                        url: "/petani/kategori/" + id,
                        type: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Terhapus!',
                                'Item telah terhapus.',
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

@push('style')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="container">
        <h1 class="text-center pb-2">Daftar Kategori</h1>
        <table class="table" id="table">
            <thead>
                @if (Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong> {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Deskripsi Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $key => $value)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $value->nama }}</td>
                        <td>{{ Str::limit($value->deskripsi, 25) }}</td>
                        <td>
                            <form action="/petani/kategori/{{ $value->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/petani/kategori/{{ $value->id }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <a href="/petani/kategori/{{ $value->id }}/edit"
                                    class="btn btn-success btn-sm mr-3 ml-3"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm delete" name="{{ $value->nama }}"
                                    id="{{ $value->id }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Not Found Data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
