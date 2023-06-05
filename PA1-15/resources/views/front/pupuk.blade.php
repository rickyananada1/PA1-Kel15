@extends('front.layout')
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('#search-input');
            const productItems = document.querySelectorAll('tbody tr');
            const paginationLinks = document.querySelectorAll('.pagination a');

            searchInput.addEventListener('keyup', function(event) {
                const searchTerm = event.target.value.toLowerCase();

                productItems.forEach(function(item) {
                    const productName = item.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const productType = item.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const productStock = item.querySelector('td:nth-child(4)').textContent.toLowerCase();

                    if (
                        productName.includes(searchTerm) ||
                        productType.includes(searchTerm) ||
                        productStock.includes(searchTerm)
                    ) {
                        item.style.display = 'table-row';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Reset pagination links to the first page with the search term
                paginationLinks.forEach(function(link) {
                    let href = link.getAttribute('href');
                    if (href.includes('?')) {
                        href += '&search=' + searchTerm;
                    } else {
                        href += '?search=' + searchTerm;
                    }
                    link.setAttribute('href', href);
                });
            });
        });
    </script>
@endpush

@push('css')
    <style>
        #main-container {
            background-image: url("front/img/bckpupuk1.jpg");
            background-size: cover;
            background-position: center;
            color: orange;
        }

        .table-container {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            animation: slideIn 0.5s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border-radius: 5px;
        }

        .input-group-text {
            background-color: #D8D8D8;
            border: none;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid pb-3" id="main-container">
        <div class="mx-auto text-center" style="max-width: 500px;">
            <h1 class="display-4">Daftar Pupuk AgroMaju</h1>
        </div>
        <div class="mb-3 float-end">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input id="search-input" class="form-control" type="text" placeholder="Search..."
                    value="{{ request('search') }}">
            </div>
        </div>
        <div class="table-container mt-5">
            <table class="table table-hover text-dark">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pupuk</th>
                        <th scope="col">Jenis Pupuk</th>
                        <th scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pupuk as $key => $item)
                        <tr>
                            <td>{{ ($pupuk->currentPage() - 1) * $pupuk->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->stok }}/Kg</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-left mt-4">
                {{ $pupuk->appends(['search' => request('search')])->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
