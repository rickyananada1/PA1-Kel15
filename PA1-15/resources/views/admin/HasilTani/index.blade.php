@extends('admin.layout.layout')

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('.col-3').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

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
                    cancelButtonText: 'Batal',
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/hasiltani/" + id,
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
                                ).then(() => {
                                    location.reload();
                                });
                            },
                        });
                    }
                });
            });
        });
    </script>
@endpush

@section('title')
    Daftar Informasi Hasil Tani
@endsection

@section('content')
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong> {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 mb-3">
            <input type="text" class="form-control" id="search" placeholder="Cari Daftar Hasil Tani...">
        </div>
    </div>

    <div class="row">
        @forelse ($hasiltani as $item)
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('image/' . $item->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-text">Nama: {{ $item->nama }}</h4>
                        <h4 class="card-text">Harga: Rp{{ number_format($item->harga, 3) }}</h4>
                        <p class="card-text">Keterangan: {{ Str::limit($item->deskripsi, 10) }}</p>
                        <form action="/admin/hasiltani/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/admin/hasiltani/{{ $item->id }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="/admin/hasiltani/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-5 mr-5"><i
                                    class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm delete" name="{{ $item->nama }}"
                                id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <h1>Tidak Ada Hasil Tani</h1>
        @endforelse
    </div>
@endsection
