@extends('front.layout')
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        function showProductDetails(image, title, description) {
            Swal.fire({
                title: title,
                html: description,
                imageUrl: image,
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const eyeButtons = document.querySelectorAll('.btn-action');
            eyeButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productItem = this.closest('.card');
                    const image = productItem.querySelector('img').getAttribute('src');
                    const title = productItem.querySelector('h6').textContent;
                    const description = productItem.querySelector('.full-description').textContent;

                    showProductDetails(image, title, description);
                });
            });

            // Pencarian
            const searchInput = document.querySelector('#search-input');
            const productItems = document.querySelectorAll('.col-lg-4');

            searchInput.addEventListener('keyup', function(event) {
                const searchTerm = event.target.value.toLowerCase();

                productItems.forEach(function(item) {
                    const productName = item.querySelector('h6').textContent.toLowerCase();

                    if (productName.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endpush
@push('css')
    <style>
        #main-container {
            background-image: url("front/img/aboutus.jpg");
            background-size: cover;
            background-position: center;
            color: white;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .btn-action {
            text-align: center;
        }

        /* Animasi tambahan */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .card {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
@endpush
@section('content')
    <!-- Hero Start -->
    <!-- Hero End -->
    <!-- Products Start -->
    <div class="container-fluid py-5" id="main-container">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h1 class="display-5">Hasil Tani AgroMaju</h1>
            </div>

            <!-- Pencarian -->
            <div class="row justify-content-start mb-2 w-50">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input id="search-input" class="form-control" type="text" placeholder="Search...">
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($hasiltani as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <img src="{{ asset('image/' . $item->image) }}" class="card-img-top w-100" alt=""
                                style="height: 200px">
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->nama }}</h6>
                                <h5 class="text-danger mb-0">Rp {{ number_format($item->harga, 3) }}</h5>
                                <p class="card-text text-dark">{{ Str::limit($item->deskripsi, 20) }}</p>
                                <p class="full-description" style="display: none;">{{ $item->deskripsi }}</p>
                                <div class="btn-action text-left">
                                    <a class="btn btn-success py-2 px-3 btn-action float-start" href="">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
