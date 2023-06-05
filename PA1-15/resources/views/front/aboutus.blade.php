{{-- @extends('front.layout')
@section('content')
    <section class="section">
        <div class="container-fluid bg-primary py-5  mb-5">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="display-1 text-white mb-md-4">Tentang Pertanian Kami</h1>
                        <a href="/" class="btn btn-primary py-md-3 px-md-5 me-3" style="background-color: #183A1D">Beranda</a>
                        <a href="/aboutus" class="btn btn-secondary py-md-3 px-md-5">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
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
                        kendala akses terhadap informasi yang diperlukan.</p>
                    <p class="text-dark">Website Agromaju memberikan solusi untuk masalah ini dengan menyediakan informasi
                        pertanian
                        yang relevan, seperti teknik bercocok tanam, penggunaan pupuk, dan berita terbaru dalam industri
                        pertanian. Website Agromaju juga berfungsi sebagai platform komunikasi antara kelompok tani dan
                        ketua kelompok. Hal ini membantu dalam menyampaikan pengumuman, arahan, atau informasi
                        penting lainnya yang berkaitan dengan kegiatan kelompok tani.</p>
                    <p class="text-dark">Dengan adanya platform ini, keterhubungan antara kelompok tani dapat ditingkatkan.
                        Dengan
                        menyediakan informasi dan pengumuman melalui website, kelompok tani dapat memperoleh akses
                        yang lebih cepat dan mudah terhadap informasi yang mereka butuhkan. Hal ini dapat meningkatkan
                        efisiensi dalam praktik pertanian mereka, seperti pemilihan varietas tanaman yang tepat, penggunaan
                        pupuk yang optimal, dan adopsi teknik terbaru dalam bercocok tanam.
                    </p>
                    <p class="text-dark">
                        Website Agromaju memberikan kesempatan bagi kelompok tani untuk mempromosikan hasil tani
                        mereka dan menjangkau pasar yang lebih luas. Dengan adanya platform ini, mereka dapat
                        meningkatkan penjualan dan pendapatan mereka serta mendapatkan apresiasi yang lebih besar atas
                        usaha mereka.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('front/img/aboutus.jpg') }}" alt="About Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection --}}

@extends('front.layout')
@section('content')
    <section class="section">
        <div class="container-fluid bg-primary py-5 mb-5">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="display-1 text-white mb-md-4">Tentang Kami</h1>
                        <a href="/" class="btn btn-primary py-md-3 px-md-5 me-3" style="background-color: #183A1D">Beranda</a>
                        <a href="/aboutus" class="btn btn-secondary py-md-3 px-md-5">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title">Misi Kami</h2>
                    <p class="text-dark">Kami bertekad untuk mengembangkan sektor pertanian di Indonesia dan mendukung
                        keberlanjutan lingkungan. Melalui website Agromaju, kami menyediakan informasi dan sumber daya
                        yang relevan untuk membantu petani meningkatkan efisiensi pertanian mereka.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('front/img/aboutus.jpg') }}" alt="About Us 1" class="img-fluid w-100" style="height: 300px">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="section-title">Visi Kami</h2>
                    <p class="text-dark">Visi kami adalah menciptakan pertanian yang berkelanjutan dan inovatif di
                        Indonesia. Kami ingin menjadi mitra yang handal bagi petani, memberikan akses mudah ke
                        informasi, teknologi, dan pasar untuk meningkatkan hasil panen dan kesejahteraan petani.</p>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="{{ asset('front/img/aboutus.jpg') }}" alt="About Us 2" class="img-fluid w-100" style="height: 300px">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <h2 class="section-title">Nilai Kami</h2>
                    <ul class="list-unstyled">
                        <li class="text-dark"><i class="fas fa-check-circle me-2"></i>Komitmen terhadap keberlanjutan
                            lingkungan dan pengelolaan sumber daya alam yang bertanggung jawab</li>
                        <li class="text-dark"><i class="fas fa-check-circle me-2"></i>Pemberdayaan petani melalui
                            pendidikan dan pelatihan</li>
                        <li class="text-dark"><i class="fas fa-check-circle me-2"></i>Kolaborasi dan keterbukaan dalam
                            berbagi pengetahuan dan pengalaman</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('front/img/aboutus.jpg') }}" alt="About Us 3" class="img-fluid w-100" style="height: 300px">
                </div>
            </div>
        </div>
    </section>
@endsection
