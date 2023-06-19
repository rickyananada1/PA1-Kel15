@extends('front.layout')
@section('content')
<section class="section" style="background-color: #EDF1D6">
    <div class="container">
        <h1 class="display-5 mb-3 text-center">Tentang Kami</h1>
        <div class="row">
            <div class="col-lg-6 text-center animate__animated animate__fadeInLeft">
                <div class="image-container">
                    <img src="{{ asset('front/img/petanibekerja.jpg') }}" alt="Gambar 1" class="img-fluid w-100" style="height: 300px">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-title text-warning">Kami di Lapangan</h3>
                            <p class="overlay-description">Kami bekerja sama dengan kelompok tani untuk memastikan keberhasilan pertanian.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center animate__animated animate__fadeInRight">
                <div class="image-container">
                    <img src="{{ asset('front/img/rapatt.jpeg') }}" alt="Gambar 2" class="img-fluid w-100" style="height: 300px">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-title text-warning">Rapat Kelompok Tani</h3>
                            <p class="overlay-description">Kami melakukan kegiatan rapat untuk meningkatkan kualitas kerja kelompok tani kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <h2 class="section-subtitle text-dark">Latar Belakang</h2>
                <p class="text-dark">Sektor pertanian merupakan sektor ekonomi yang vital di Indonesia. Hal ini karena keuntungan geografis dan lahan subur yang memungkinkan pertanian menjadi mata pencaharian utama bagi sebagian besar penduduk.</p>
                <p class="text-dark">Mengembangkan website Agromaju bertujuan untuk mendukung pertumbuhan dan kemajuan sektor pertanian di negara ini. Meskipun penting, banyak kelompok tani di Indonesia masih menghadapi kendala akses terhadap informasi yang diperlukan.</p>
                <p class="text-dark">Website Agromaju memberikan solusi untuk masalah ini dengan menyediakan informasi pertanian yang relevan, seperti teknik bercocok tanam, penggunaan pupuk, dan berita terbaru dalam industri pertanian. Website Agromaju juga berfungsi sebagai platform komunikasi antara kelompok tani dan ketua kelompok. Hal ini membantu dalam menyampaikan pengumuman, arahan, atau informasi penting lainnya yang berkaitan dengan kegiatan kelompok tani.</p>
                <p class="text-dark">Dengan adanya platform ini, keterhubungan antara kelompok tani dapat ditingkatkan. Dengan menyediakan informasi dan pengumuman melalui website, kelompok tani dapat memperoleh akses yang lebih cepat dan mudah terhadap informasi yang mereka butuhkan. Hal ini dapat meningkatkan efisiensi dalam praktik pertanian mereka, seperti pemilihan varietas tanaman yang tepat, penggunaan pupuk yang optimal, dan adopsi teknik terbaru dalam bercocok tanam.</p>
            </div>
            <div class="col-lg-6">
                <h2 class="section-subtitle text-dark">Tujuan</h2>
                <p class="text-dark">Sistem pemesanan pupuk Kelompok Tani Maju masih manual, serta jangkauan pasar masih hanya di sekitaran Porsea. Website AgroMaju bertujuan untuk mempermudah proses pemesanan pupuk, ketua kelompok tani akan lebih mudah untuk mengelola pupuk dan memberikan pengumuman, arahan, dan informasi penting tentang kegiatan Kelompok Tani Maju.</p>
                <p class="text-dark">Website ini juga bertujuan untuk memperluas jangkauan pasar hasil tani Kelompok Tani Maju.</p>
                <p class="text-dark">Website Agromaju memberikan kesempatan bagi kelompok tani untuk mempromosikan hasil tani mereka dan menjangkau pasar yang lebih luas. Dengan adanya platform ini, mereka dapat meningkatkan penjualan dan pendapatan mereka serta mendapatkan apresiasi yang lebih besar atas usaha mereka.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('front/css/tentang.css')}}">
@endpush