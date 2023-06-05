@extends('admin.layout.layout')
@section('title')
    Daftar Pengumuman
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
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
                        url: "/admin/pengumuman/" + id,
                        type: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Terhapus!',
                                'Pengumuman telah terhapus.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                    });
                }
            });
        });
    </script>
@endpush

@section('content')
    <a href="/admin/pengumuman/create" class="btn btn-info btn-sm">Tambah</a>
    <br>
    @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong> {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengumuman</th>
                <th scope="col">Isi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengumuman as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->isi }}</td>
                    <td>
                        <form action="/admin/pengumuman/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/admin/pengumuman/{{ $item->id }}" class="btn btn-primary btn-sm ml-3 mr-3"><i
                                    class="fas fa-eye"></i></a>
                            <a href="/admin/pengumuman/{{ $item->id }}/edit" class="btn btn-primary btn-sm mr-3"><i
                                    class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm delete" name="{{ $item->nama }}"
                                id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Tidak Ada Pengumuman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
