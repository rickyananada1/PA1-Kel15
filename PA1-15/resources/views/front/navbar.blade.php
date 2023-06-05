    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" style="background-color: #183A1D">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <h1 class="m-1 display-4" style="color: #EDF1D6">AgroMaju</h1>
        <div class="navbar-nav mx-auto py-0">
            <a href="/" class="nav-item nav-link">Beranda</a>
            <a href="/pupuk" class="nav-item nav-link">Pupuk</a>
            <a href="/hasiltani" class="nav-item nav-link">Hasil Tani</a>
            <div class="nav-item dropdown">
                <a href="/hasiltani" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                <div class="dropdown-menu m-0">
                    @foreach ($kategori as $item)
                        <a href="/hasiltani?kategori={{ $item->id }}" class="dropdown-item">{{ $item->nama }}</a>
                    @endforeach
                </div>
            </div>
            <a href="/aboutus" class="nav-item nav-link">Tentang Kami</a>
            {{-- <a href="/contactus" class="nav-item nav-link">Kontak</a> --}}
            @if (!Auth::guard('admin')->check() && !Auth::guard('petani')->check())
                <a href="petani/login" class="nav-item nav-link">Login Anggota</a>
            @endif
        </div>
        <div class="d-flex align-items-center justify-content-end">
            @if (Auth::guard('admin')->check())
                <a class="btn btn-square rounded-circle me-2" href="/admin/dashboard" style="background-color: #D7E9B9"><i class="fa fa-user"></i></a>
            @endif
            @if (Auth::guard('petani')->check())
                <a class="btn btn-square rounded-circle me-2" href="/petani/dashboard" style="background-color: #D7E9B9"><i class="fa fa-user"></i></a>
            @endif
            @if (!Auth::guard('admin')->check() && !Auth::guard('petani')->check())
                <a class="btn btn-square rounded-circle me-2" href="/admin/login" style="background-color: #D7E9B9"><i class="fa fa-user"></i></a>
            @endif
        </div>
    </div>
</nav>
