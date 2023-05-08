@extends('admin.layout.layout')
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
        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
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
                        <td> <img src="{{ asset('petani/images/photo/' . $value['image']) }}"></td>
                        <td>
                            @if ($value['status'] == 1)
                                Inactive
                            @else
                                Active
                            @endif
                        </td>
                        <td>
                                @if ($value['status'] == 1)
                                <a href="{{ route('status', ['id' => $value['id']]) }}" class="btn btn-info btn-sm">Approve</a>
                                @elseif ($value['status'] == 0)
                                <a href="{{ route('status', ['id' => $value['id']]) }}" class="btn btn-danger btn-sm">Reject</a>
                                @endif
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
