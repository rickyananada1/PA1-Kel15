@extends('admin.layout.layout')
@section('title')
    Daftar Pemesanan
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
@endpush

@push('style')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush
@section('content')
    <table class="table" id="myTable">
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
                            <a href="{{ route('statuspemesanan', ['id' => $value['id'], 'status' => 1]) }}"
                                class="btn btn-info btn-sm"><i class="fas fa-check"></i></a>
                            <a href="{{ route('statuspemesanan', ['id' => $value['id'], 'status' => 2]) }}"
                                class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                        @elseif ($value['status'] == 1)
                            <a href="{{ route('statuspemesanan', ['id' => $value['id'], 'status' => 1]) }}"
                                class="btn btn-info btn-sm disabled" style="pointer-events: none; opacity: 0.6;"><i
                                    class="fas fa-check"></i></a>
                            <a href="{{ route('statuspemesanan', ['id' => $value['id'], 'status' => 2]) }}"
                                class="btn btn-danger btn-sm" style="pointer-events: none; opacity: 0.6;"><i class="fas fa-times"></i></a>
                        @elseif ($value['status'] == 2)
                            <a href="{{ route('statuspemesanan', ['id' => $value['id'], 'status' => 1]) }}"
                                class="btn btn-info btn-sm disabled" style="pointer-events: none; opacity: 0.6;"><i
                                    class="fas fa-check"></i></a>
                            <a href="{{ route('statuspemesanan', ['id' => $value['id'], 'status' => 2]) }}"
                                class="btn btn-danger btn-sm" style="pointer-events: none; opacity: 0.6;"><i
                                    class="fas fa-times"></i></a>
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
