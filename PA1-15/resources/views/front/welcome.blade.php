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
    <!-- Carousel Start -->
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error: </strong> {{ Session::get('error') }}
    </div>
@endif
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('front/img/Home.jpg') }}" alt="Image">
                    <div
                        class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h1 class="text-warning">AgroMaju</h1>
                            <h1 class="display-1 text-white mb-md-4">Pertanian Untuk Hasil Tani yang Berkualitas dan juga
                                lebih baik</h1>
                            <a href="/aboutus" class="btn py-md-3 px-md-5 me-3" style="background-color:#183A1D">Explore</a>
                            <a href="/contactus" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('front/img/Home1.jpg') }}" alt="Image" height="918px">
                    <div
                        class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h1 class="text-warning">Kelompok Tani Maju</h1>
                            <h1 class="display-1 text-white mb-md-4">Kelompok Pertanian yang memiliki tujuan untuk
                                menghasilkan pertanian yang baik</h1>
                            <a href="/aboutus" class="btn py-md-3 px-md-5 me-3" style="background-color:#183A1D">Explore</a>
                            <a href="/contactus" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('front/img/Home2.jpg') }}" alt="Image" height="918px">
                    <div
                        class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h1 class="text-warning">Kelompok Tani Maju</h1>
                            <h1 class="display-1 text-white mb-md-4">Kelompok Pertanian yang memiliki tujuan untuk
                                menghasilkan pertanian yang baik</h1>
                            <a href="/aboutus" class="btn py-md-3 px-md-5 me-3"
                                style="background-color: #183A1D">Explore</a>
                            <a href="/contactus" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <hr>

    <!-- News Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="news-item">
                        <img class="w-50" src="{{ asset('front/img/pupuk.jpg') }}" alt="News Image" class="img-fluid">
                        <div class="news-content">
                            <h3 class="news-title">Pemesanan Pupuk</h3>
                            <p class="news-description">Pemesanan pupuk menjadi lebih mudah dengan adanya platform online
                                kami. Dapatkan pupuk berkualitas dengan harga terjangkau. Pesan sekarang dan tingkatkan
                                hasil pertanian Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="news-item">
                        <img class="w-100" src="{{ asset('front/img/hasiltani.jpg') }}" alt="News Image" class="img-fluid"
                            height="320px">
                        <div class="news-content">
                            <h3 class="news-title">Pengenalan Hasil Tani Unggulan</h3>
                            <p class="news-description">Kami memperkenalkan hasil tani unggulan yang dihasilkan oleh
                                petani-petani terbaik. Dapatkan produk-produk berkualitas tinggi dengan rasa dan nutrisi
                                yang terjaga. Jelajahi produk-produk kami sekarang.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News End -->

    <hr>
    <br>


    <!-- About Start -->
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title">Tentang Kami</h2>
                    <p class="text-dark">Sektor pertanian merupakan sektor ekonomi yang vital di Indonesia. Hal ini karena
                        keuntungan
                        geografis dan lahan subur yang memungkinkan pertanian menjadi mata pencaharian utama bagi
                        sebagian besar penduduk.
                        Mengembangkan website Agromaju bertujuan untuk mendukung pertumbuhan dan kemajuan sektor
                        pertanian di negara ini.Meskipun penting, banyak kelompok tani di Indonesia masih menghadapi
                        kendala akses terhadap informasi yang diperlukan.
                        Website Agromaju memberikan solusi untuk masalah ini dengan menyediakan informasi pertanian
                        yang relevan, seperti teknik bercocok tanam, penggunaan pupuk, dan berita terbaru dalam industri
                        pertanian. Website Agromaju juga berfungsi sebagai platform komunikasi antara kelompok tani dan
                        ketua kelompok. Hal ini membantu dalam menyampaikan pengumuman, arahan, atau informasi
                        penting lainnya yang berkaitan dengan kegiatan kelompok tani.</p>
                    <p class="text-dark">Dengan adanya platform ini, keterhubungan antara kelompok tani dapat ditingkatkan.
                        Dengan
                        menyediakan informasi dan pengumuman melalui website, kelompok tani dapat memperoleh akses
                        yang lebih cepat dan mudah terhadap informasi yang mereka butuhkan.<a class="text-info"
                            href="/aboutus">Baca Selengkapnya...</a> </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('front/img/aboutus.jpg') }}" alt="About Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- Services Start -->
    <!-- Services End -->


    <!-- Features Start -->
    <!-- Features Start -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Hasil Tani</h6>
                <h1 class="display-5">Hasil Tani Kami</h1>
            </div>
            <div class="owl-carousel product-carousel px-5">
                @foreach ($hasiltani as $item)
                    <div class="pb-5">
                        <div class="product-item position-relative bg-white d-flex flex-column text-center">
                            <img class="img-fluid mb-4" src="{{ asset('image/' . $item->image) }}" alt="">
                            <h6 class="mb-3">{{ $item->nama }}</h6>
                            <h5 class="text-primary mb-2">Rp{{ number_format($item->harga, 3) }}</h5>
                            <p class="text-gray">{{ Str::limit($item->deskripsi, 10) }}</p>
                            <p class="full-description" style="display: none;">{{ $item->deskripsi }}</p>
                            <div class="btn-action d-flex justify-content-center">
                                <a class="btn bg-secondary py-2 px-3" href=""><i
                                        class="bi bi-eye text-white"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Testimonial Start -->

    <!-- Testimonial End -->


    <!-- Team Start -->



    <!-- Team End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Blog Kegiatan</h6>
                <h1 class="display-5">Kegiatan Dalam Petanian AgroMaju</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('front/img/blog-1.jpg') }}" alt="">
                        <a class="blog-overlay" href="">
                            <h4 class="text-white">Petani menanam padi</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('front/img/blog-2.jpg') }}" alt="">
                        <a class="blog-overlay" href="">
                            <h4 class="text-white">Menghasilkan Hasil Tani yang berkualitas</h4>
                            {{-- <span class="text-white fw-bold">Jan 01, 2050</span> --}}
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('front/img/blog-3.jpg') }}" alt="">
                        <a class="blog-overlay" href="">
                            <h4 class="text-white">Siap untuk memperkenalkan Hasil Tani</h4>
                            {{-- <span class="text-white fw-bold">Jan 01, 2050</span> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
