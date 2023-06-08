@extends('admin.layout.layout')
@section('title')
    Daftar Data Pupuk
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk melakukan live search
            $('#search').keyup(function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
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
                        url: "/admin/pupuk/" + id,
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
    </script>
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-md-2">
            <input type="text" id="search" class="form-control" placeholder="Cari Data Pupuk...">
        </div>
    </div>
    <table class="table" id="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pupuk as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->jenis }}</td>
                    <td>{{ $value->stok }}Kg</td>
                    <td>
                        <form action="/admin/pupuk/{{ $value->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/admin/pupuk/{{ $value->id }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="/admin/pupuk/{{ $value->id }}/edit" class="btn btn-warning btn-sm ml-3 mr-3"><i
                                    class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm delete" name="{{ $value->nama }}"
                                id="{{ $value->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Not Found Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
