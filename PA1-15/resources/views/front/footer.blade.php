<div class="container-fluid bg-footer bg-primary text-white mt-5">
<div class="container">
    <div class="row gx-5">
        <div class="col-lg-8 col-md-6">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                    <h4 class="text-white mb-4">Get In Touch</h4>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-white me-2"></i>
                        <p class="text-white mb-0">Institut Teknologi Del, Laguboti, Indonesia</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-white me-2"></i>
                        <p class="text-white mb-0">trinita@gmail.com</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-white me-2"></i>
                        <p class="text-white mb-0">+628 57 6176 2717</p>
                    </div>
                    <div class="d-flex mt-4">
                        <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-secondary btn-square rounded-circle" href="#"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <h4 class="text-white mb-4">Nama-Nama Anggota</h4>
                    <div class="d-flex flex-column justify-content-start">
                        @foreach ($anggota as $item)
                            <a class="text-white mb-2" href="#"><i
                                    class="bi bi-arrow-right text-white me-2"></i>{{ $item->nama }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <h4 class="text-white mb-4">Email</h4>
                    <div class="d-flex flex-column justify-content-start">
                        @foreach ($anggota as $item)
                            <a class="text-white mb-2" href="#"><i
                                    class="bi bi-arrow-right text-white me-2"></i>{{ $item->email }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            @if (!Auth::guard('admin')->check() && !Auth::guard('petani')->check())
                <div
                    class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                    <a href="admin/login" class="btn btn-dark btn-lg mb-3">Login Sebagai Admin</a>
                    <a href="petani/login" class="btn btn-dark btn-lg mb-3">Login Sebagai Anggota</a>
                    <a href="petani/register" class="btn btn-dark btn-lg">Pendaftaran Anggota</a>
                </div>
            @endif
            @if (Auth::guard('admin')->check())
                <div
                    class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                    <a href="admin/dashboard" class="btn btn-dark btn-lg mb-3">Dashboard</a>
                </div>
            @endif
            @if (Auth::guard('petani')->check())
                <div
                    class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                    <a href="petani/dashboard" class="btn btn-dark btn-lg mb-3">Dashboard</a>
                    <a href="petani/logout" class="btn btn-dark btn-lg mb-3">LogOut</a>
                </div>
            @endif
        </div>

    </div>
</div>
</div>
<div class="container-fluid bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">Your Site Name</a>. All Rights
            Reserved. Designed by <a class="text-secondary fw-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
</div>
