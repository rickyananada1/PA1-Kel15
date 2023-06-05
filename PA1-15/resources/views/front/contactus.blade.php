{{-- @extends('front.layout')
@section('content')
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-white mb-md-4">Tentang Pertanian Kami</h1>
                    <a href="/" class="btn btn-primary py-md-3 px-md-5 me-3" style="background-color: #183A1D">Beranda</a>
                    <a href="/contactus" class="btn btn-secondary py-md-3 px-md-5">Kontak Kami</a>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-5" style="background-color: #D0F5BE">
        <div class="container">
            <div class="row">
                <h2 class="section-title mb-4 text-center" style="font-family: ALGERIAN">Kontak Kami</h2>
                <hr class="w-100">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daniel Manalu</h4>
                            <ul class="contact-info list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Contoh No. 123, Kota Anda</li>
                                <li><i class="fas fa-phone"></i> Telepon: 123-456-789</li>
                                <li><i class="fas fa-envelope"></i> Email: info@example.com</li>
                            </ul>
                            <div class="social-links">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Helen Sihombing</h4>
                            <ul class="contact-info list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Contoh No. 123, Kota Anda</li>
                                <li><i class="fas fa-phone"></i> Telepon: 123-456-789</li>
                                <li><i class="fas fa-envelope"></i> Email: info@example.com</li>
                            </ul>
                            <div class="social-links">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Trinita Situmorang</h4>
                            <ul class="contact-info list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Contoh No. 123, Kota Anda</li>
                                <li><i class="fas fa-phone"></i> Telepon: 123-456-789</li>
                                <li><i class="fas fa-envelope"></i> Email: info@example.com</li>
                            </ul>
                            <div class="social-links">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blessherin Pangaribuan</h4>
                            <ul class="contact-info list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Contoh No. 123, Kota Anda</li>
                                <li><i class="fas fa-phone"></i> Telepon: 123-456-789</li>
                                <li><i class="fas fa-envelope"></i> Email: info@example.com</li>
                            </ul>
                            <div class="social-links">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <h2 class="section-title mb-4">Hubungi Kami</h2>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form" action="#" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nama Anda" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Anda" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tulis pesan Anda" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection --}}
