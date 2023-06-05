@extends('admin.layout.layout')
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.approve', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Terima Akun?',
                text: 'Apakah Anda ingin menyetujui akun ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval
                    var approveUrl = "{{ route('status', ['id' => ':id']) }}";
                    approveUrl = approveUrl.replace(':id', id);

                    $.ajax({
                        url: approveUrl,
                        type: 'GET',
                        success: function(response) {
                            Swal.fire(
                                'Akun Disetujui!',
                                'Akun berhasil disetujui.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menyetujui akun.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $(document).on('click', '.reject', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Tolak Akun?',
                text: 'Apakah Anda ingin menolak akun ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the rejection
                    var rejectUrl = "{{ route('status', ['id' => ':id']) }}";
                    rejectUrl = rejectUrl.replace(':id', id);

                    $.ajax({
                        url: rejectUrl,
                        type: 'GET',
                        success: function(response) {
                            Swal.fire(
                                'Akun Ditolak!',
                                'Akun berhasil ditolak.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menolak akun.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Hapus Akun?',
                text: 'Anda tidak akan dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the account deletion
                    var deleteUrl = "{{ route('deleteakun', ['id' => ':id']) }}";
                    deleteUrl = deleteUrl.replace(':id', id);

                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Akun Terhapus!',
                                'Akun berhasil dihapus.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus akun.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endpush
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('success_message'))
        <div class="alert alert-danger">
            {{ session('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table" border="1" id="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota as $key => $value)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $value['nama'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td> <img src="{{ asset('petani/images/photo/' . $value['image']) }}" width="50px" style="border-radius: 50%"></td>
                    <td>
                        @if ($value['status'] == 1)
                            Nonaktif
                        @else
                            Aktif
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('deleteakun', ['id' => $value['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($value['status'] == 1)
                                <a href="#" class="btn btn-info btn-sm approve" data-id="{{ $value['id'] }}">Terima</a>
                            @elseif ($value['status'] == 0)
                                <a href="#" class="btn btn-danger btn-sm reject" data-id="{{ $value['id'] }}">Tolak</a>
                            @endif
                            <button type="submit" class="btn btn-danger btn-sm delete" data-id="{{ $value['id'] }}"><i
                                    class="fas fa-trash"> Hapus
                                    Akun</i></button>
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
@endsection
