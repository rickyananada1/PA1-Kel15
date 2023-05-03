@extends('admin.layout.layout')
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
@endpush

@push('style')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush
<style>
    h1 {
        overflow: hidden;
        animation: typing 0.5s steps(10, end) 0.5s 0.5 normal both;
    }

    h1 {
        overflow: hidden;
        white-space: nowrap;
        margin: 0 auto;
        letter-spacing: 0.15em;
        animation: typing-loop 2s steps(30, end) 1s 1 normal;
    }

    @keyframes typing-loop {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }
</style>
@section('content')
    <div class="container">
        <h1 style="color:red" class="text-center my-5">List Kategori</h1>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Deskripsi Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $key => $items)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $items->nama }}</td>
                        <td>{{ Str::limit($items->deskripsi, 25) }}</td>
                        <td>
                            <form action="/kategori/{{ $items->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/kategori/{{ $items->id }}" class="btn btn-success">Read</a>
                                <a href="/kategori/{{ $items->id }}/edit" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-success btn-sm">Delete</button>
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
