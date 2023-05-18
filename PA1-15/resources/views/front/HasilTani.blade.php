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
            const eyeButtons = document.querySelectorAll('.btn-action .bi-eye');
            eyeButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productItem = this.closest('.product-item');
                    const image = productItem.querySelector('img').getAttribute('src');
                    const title = productItem.querySelector('h6').textContent;
                    const description = productItem.querySelector('.full-description').textContent;

                    showProductDetails(image, title, description);
                });
            });
        });
    </script>
@endpush
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 bg-hero mb-5">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-white mb-md-4">Our Products</h1>
                    <a href="/" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                    <a href="/hasiltani" class="btn btn-secondary py-md-3 px-md-5">Hasil Tani</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Hasil Tani</h6>
                <h1 class="display-5">Hasil Tani AgroMaju</h1>
            </div>
            <div class="owl-carousel product-carousel px-5">
                @foreach ($hasiltani as $item)
                    <div class="pb-5">
                        <div class="product-item position-relative bg-white d-flex flex-column text-center">
                            <img class="img-fluid mb-4" src="{{ asset('image/' . $item->image) }}" alt="">
                            <h6 class="mb-3">{{ $item->nama }}</h6>
                            <h5 class="text-primary mb-0">Rp{{ number_format($item->harga, 3) }}</h5>
                            <p class="text-gray">{{ Str::limit($item->deskripsi, 80) }}</p>
                            <p class="full-description" style="display: none;">{{ $item->deskripsi }}</p>
                            <div class="btn-action d-flex justify-content-center">
                                <a class="btn bg-secondary py-2 px-3"
                                    href="/hasiltani/{{ $item->id }}?kategori={{ $item->kategori->id }}"><i
                                        class="bi bi-eye text-white"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
