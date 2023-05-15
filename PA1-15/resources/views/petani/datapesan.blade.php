@extends('petani.layout.layout')
@section('title')
    Daftar Pemesanan Saya
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var pesanan = $(this).attr('name');
            var status = $(this).attr('status');
            Swal.fire({
                title: 'Hapus ' + pesanan + '?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Batalkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (status == 0) {
                        $.ajax({
                            url: "/petani/daftarpesan/" + id,
                            type: "POST",
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                Swal.fire(
                                    'Batal!',
                                    'Pesanan telah dibatalkan.',
                                    'success'
                                ).then(function() {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus item.',
                                    'error'
                                );
                            }
                        });
                    } else {
                        Swal.fire(
                            'Tidak Dapat Membatalkan Pesanan!',
                            'Anda hanya dapat membatalkan pesanan dengan status Menunggu.',
                            'error'
                        );
                    }
                }
            });
        });
    </script>
@endpush
@section('content')
    <table class="table">
        @if (session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
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

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pupuk</th>
                <th scope="col">Jenis Pupuk</th>
                <th scope="col">Stok</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pemesanan as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->pupuk->nama }}</td>
                    <td>{{ $item->pupuk->jenis }}</td>
                    <td>{{ $item->stok }}/Kg</td>
                    <td>
                        @if ($item['status'] == 1)
                            Disetujui
                        @elseif ($item['status'] == 2)
                            Ditolak
                        @else
                            Menunggu
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('hapuspesanan', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($item->status != 0)
                                <button type="submit" class="btn btn-danger btn-sm delete" name="pesanan" status="{{$item->status}}" id="{{$item->id}}">Batalkan
                                    Pesanan</button>
                            @else
                                <button type="submit" class="btn btn-danger btn-sm delete" name="pesanan" id="{{$item->id}}" status="{{$item->status}}">Batalkan
                                    Pesanan</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Tidak Ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
