@extends('front.layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('front/css/front.css') }}">
@endpush
@section('content')
    <!-- Carousel Start -->
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> {{ Session::get('error') }}
        </div>
    @endif

    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Carousel Items -->

                <!-- Carousel Item 1 -->
                <div class="carousel-item active" style="height: 700px">
                    <img class="w-100" src="{{ asset('front/img/Home.jpg') }}" alt="Image">
                    <div
                        class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h1 class="text-warning">AgroMaju</h1>
                            <h1 class="display-1 text-white mb-md-4">Pertanian Untuk Hasil Tani yang Berkualitas dan juga
                                lebih baik</h1>
                            <a href="#footer" class="btn btn-secondary py-md-3 px-md-5">Kontak Kami</a>
                        </div>
                    </div>
                </div>
                <!-- End of Carousel Item 1 -->

                <!-- Carousel Item 2 -->
                <div class="carousel-item" style="height: 700px">
                    <img class="w-100" src="{{ asset('front/img/Home1.jpg') }}" alt="Image" height="918px">
                    <div
                        class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h1 class="text-warning">AgroMaju</h1>
                            <h1 class="display-1 text-white mb-md-4">Membantu Pertanian Lebih Produktif</h1>
                            <a href="#footer" class="btn btn-secondary py-md-3 px-md-5">Kontak Kami</a>
                        </div>
                    </div>
                </div>
                <!-- End of Carousel Item 2 -->

                <!-- Carousel Item 3 -->
                <div class="carousel-item" style="height: 700px">
                    <img class="w-100" src="{{ asset('front/img/Home2.jpg') }}" alt="Image" height="918px">
                    <div
                        class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h1 class="text-warning">AgroMaju</h1>
                            <h1 class="display-1 text-white mb-md-4">Meningkatkan Kualitas Hasil Pertanian dan Pupuk</h1>
                            <a href="#footer" class="btn btn-secondary py-md-3 px-md-5">Kontak Kami</a>
                        </div>
                    </div>
                </div>
                <!-- End of Carousel Item 3 -->

                <!-- End of Carousel Items -->
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <!-- End of Carousel Controls -->
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Additional Farming Information -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="info-card">
                    <img src="{{ asset('front/img/bckpupuk.jpg') }}" alt="Farming 1">
                    <div class="card-body">
                        <h5 class="card-title">Cara Meningkatkan Hasil Panen</h5>
                        <p class="card-text">Untuk meningkatkan hasil panen, Anda perlu merencanakan dengan matang seluruh
                            siklus pertanian, memilih varietas tanaman yang tepat, mempersiapkan tanah dengan baik,
                            memberikan pemupukan yang tepat, mengendalikan hama dan penyakit, menggunakan irigasi yang
                            efisien, melakukan penyiangan dan pemangkasan, memanen pada waktu yang tepat, terus meningkatkan
                            pengetahuan, dan melakukan pemantauan dan evaluasi secara teratur.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <img src="{{ asset('front/img/bckpupuk.jpg') }}" alt="Farming 2">
                    <div class="card-body">
                        <h5 class="card-title">Pengendalian Hama dan Penyakit</h5>
                        <p class="card-text">Pengendalian hama dan penyakit merupakan langkah penting dalam meningkatkan
                            hasil panen. Hama dan penyakit dapat merusak tanaman dan mengurangi produktivitas. Untuk
                            mengendalikan hama, dapat dilakukan dengan menggunakan metode pengendalian hayati, seperti
                            memanfaatkan musuh alami hama, atau menggunakan pestisida nabati yang lebih ramah
                            lingkungan.Dengan pengendalian hama dan penyakit yang efektif.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <img src="{{ asset('front/img/bckpupuk.jpg') }}" alt="Farming 3">
                    <div class="card-body">
                        <h5 class="card-title">Teknologi Terkini dalam Pertanian</h5>
                        <p class="card-text">Teknologi terkini dalam pertanian, seperti pertanian presisi, Internet of
                            Things (IoT), dan penggunaan drone, telah mengubah cara kita mengelola pertanian. Pertanian
                            presisi memungkinkan pengelolaan lahan yang lebih akurat, sementara IoT memungkinkan pemantauan
                            kondisi lingkungan secara real-time. Penggunaan drone membantu dalam pemetaan lahan dan inspeksi
                            tanaman. Dengan teknologi ini, petani dapat mengoptimalkan penggunaan SDA.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Additional Farming Information -->



    <!-- Additional Text Section -->
    <div class="container additional-text-section">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center text-dark">
                    <h2>Informasi Pengolahan Hasil Tani</h2>
                    <hr>
                    <p>di indonesia pada saat panen, hasil pertanian Petani seperti sayur-sayuran, buah-buahan, umbi-umbian
                        dan serealia banyak mengalami kerusakan sebelum dikonsumsi, hal ini dikarenakan hasil panen yang
                        melimpah hanya dijual oleh Petani dalam bentuk segar saja tanpa ada proses penangan yang baik.
                        penanganan yang tidak benar dan tidak tepat dapat mengakibatkan kerusakan /kerugian yang cukup
                        tinggi karena sifat hasil pertanian yang mudah rusak terutama untuk golongan buah dan sayuran (
                        sekitar 30 – 40 % ). Hal ini juga menyebababkan hasil penjualan dari hasil pertanian tersebut tidak
                        maksimal.
                    </p>
                    <p>mengingat pentingnya peranan hasil-hasil pertanian tersebut di dalam kehidupan manusia, maka untuk
                        mengurangi jumlah kerusakan tersebut serta menambah nilai jual dari hasil pertanian maka diperlukan
                        penanganan yang benar dan tepat salah satunya yaitu teknik pengolahan.
                    </p>
                    <p>Proses pengolahan adalah proses pembuatan bahan dari bahan mentah/segar menjadi produk-produk guna
                        memenuhi kebutuhan manusia baik secara Fisik, Kimiawi maupun biokimiawi. Adapun perlakuan dalam
                        proses pengolahan hasil pertanian melingkupi beberapa proses diantaranya Penanganan bahan,
                        pembersihan, pemisahan, sortasi, pemanasan dengan suhu tinggi, pendinginan dan pembekuan,
                        pengeringan, pengentalan, pengkristalan, ekstraksi, distilasi,penggilingan, pencampuran,
                        pengemasan,penyimpanan dan penggudangan
                    </p>
                    <p>
                        Dengan teknik pengolahan di harapkan dapat menekan kerusakan hasil pertanian petani dan dapat
                        memperoleh nilai tambah yang jauh lebih besar serta dapat menghasilkan produk-produk pertanian dari
                        komuditas lokal.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center text-dark">
                    <h2>Informasi Teknik Pembuatan Pupuk</h2>
                    <hr>
                    <p>Kelangkaan pupuk kimia (Anorganik) sering kali membuat kita kebingungan untuk melakukan usaha budi
                        daya tanaman , baik tanaman pangan maupun tanaman hortikultura ( sayur sayuran ) sehingga sering
                        kali produksi yang dihasilkan tidak sesuai dengan yang di inginkan karena tanaman kekurangan unsur
                        hara yang dibutuhkan.
                    </p>
                    <p>Jika kita melihat sekeliling lingkungan tempat tinggal kita banyak sekali sampah organik bertebaran
                        dimana mana sehingga menimbulkan kesan yang kurang sehat. Hal ini disebabkan karena kurangnya
                        tingkat kesadaran kita terhadap kebersihan lingkungan serta belum tau manfaat dari sampah organik
                        tersebut setelah diproses menjadi pupuk organik.
                    </p>
                    <p>Dilahan sawah banyak petani yang masih belum memahami manfaat dari limbah jerami setelah habis panen.
                        Sebagian besar petani senang membakar limbah jeraminya setelah selesai panen, dengan alasan
                        jeraminya akan mengganggu pada saat pengolahan tanah . Masyarakat tani kurang memahami bahwa
                        sebenarnya dalam satu hektar lahan sawah akan diperoleh lebih kurang 7- 8 ton jerami segar.
                    </p>
                    <p>
                        Menurut hasil penelitian menyebutkan bahwa dari 1 ton kompos jerami yang sudah diolah menjadi pupuk
                        organik , setara dengan 41,3 kg Urea, 5,6 kg SP 36 dan 89,17 kg KCL Bisa kita bayangkan , berapa
                        banyak pupuk yang kita buang percuma jika jerami hasil panen kita bakar.
                    </p>
                    <p>
                        Pupuk organik dari limbah pertanian ,dewasa ini banyak dijadikan bahan pembicaraan hampir disemua
                        kalangan , baik pemerintah , pelaku utama, pelaku usaha dan konsumen.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Additional Text Section -->


    <!-- Google Maps Section -->
    <div class="container google-maps-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <h1 class="display-4 text-center">Lokasi AgroMaju</h1>
                        <hr>
                        <div class="card-body">
                            <!-- Informasi Alamat -->
                            <h5 class="card-title">Alamat:</h5>
                            <p class="card-text">Sosor Sihobuk, Pangombusan</p>
                            <!-- Informasi Email -->
                            <h5 class="card-title">Email:</h5>
                            <p class="card-text">admin@gmail.com</p>
                            <!-- Informasi Nomor Telepon -->
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lokasi Terkini:</h5>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63777.295704003984!2d99.1926741!3d2.4801401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303201d908a47355%3A0x53d7644c1ab82e10!2sPangombusan%2C%20Kec.%20Parmaksian%2C%20Toba%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1686146184884!5m2!1sid!2sid"
                                    allowfullscreen="" width="100%" height="400px" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Google Maps Section -->
@endsection
