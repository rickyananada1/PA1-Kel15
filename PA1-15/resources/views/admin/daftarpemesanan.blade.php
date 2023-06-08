@extends('admin.layout.layout')

@section('title')
    Daftar Pemesanan
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').keyup(function() {
                var value = $(this).val().toLowerCase();
                $("tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).on('click', '.btn-approve', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Verifikasi Pesanan',
                text: 'Apakah Anda ingin menyetujui pesanan ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the verification
                    var verifyUrl = "{{ route('statuspemesanan', ['id' => ':id', 'status' => '1']) }}";
                    verifyUrl = verifyUrl.replace(':id', id);

                    $.ajax({
                        url: verifyUrl,
                        type: 'GET',
                        success: function(response) {
                            Swal.fire(
                                'Pesanan Diverifikasi!',
                                'Pesanan telah disetujui.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat memverifikasi pesanan.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-reject', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Tolak Pesanan',
                text: 'Apakah Anda ingin menolak pesanan ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the rejection
                    var rejectUrl = "{{ route('statuspemesanan', ['id' => ':id', 'status' => '2']) }}";
                    rejectUrl = rejectUrl.replace(':id', id);

                    $.ajax({
                        url: rejectUrl,
                        type: 'GET',
                        success: function(response) {
                            Swal.fire(
                                'Pesanan Ditolak!',
                                'Pesanan telah ditolak.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menolak pesanan.',
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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Pemesan...">
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Nama Pupuk</th>
                <th scope="col">Jenis Pupuk</th>
                <th scope="col">Stok Pupuk</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Status Pemesanan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pemesanan as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->anggota->nama }}</td>
                    <td>{{ $value->pupuk->nama }}</td>
                    <td>{{ $value->pupuk->jenis }}</td>
                    <td>{{ $value->stok }}/Kg</td>
                    <td>{{ $value->tanggal }}</td>
                    <td>
                        @if ($value['status'] == 1)
                            Disetujui
                        @elseif ($value['status'] == 2)
                            Ditolak
                        @else
                            Menunggu
                        @endif
                    </td>
                    <td>
                        @if ($value['status'] == 0)
                            <a href="#" class="btn btn-info btn-sm btn-approve" data-id="{{ $value['id'] }}"><i
                                    class="fas fa-check"></i></a>
                            <a href="#" class="btn btn-danger btn-sm btn-reject" data-id="{{ $value['id'] }}"><i
                                    class="fas fa-times"></i></a>
                        @elseif ($value['status'] == 1)
                            <a href="#" class="btn btn-info btn-sm disabled"
                                style="pointer-events: none; opacity: 0.6;"><i class="fas fa-check"></i></a>
                            <a href="#" class="btn btn-danger btn-sm disabled"
                                style="pointer-events: none; opacity: 0.6;"><i class="fas fa-times"></i></a>
                        @elseif ($value['status'] == 2)
                            <a href="#" class="btn btn-info btn-sm disabled"
                                style="pointer-events: none; opacity: 0.6;"><i class="fas fa-check"></i></a>
                            <a href="#" class="btn btn-danger btn-sm disabled"
                                style="pointer-events: none; opacity: 0.6;"><i class="fas fa-times"></i></a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak Ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
