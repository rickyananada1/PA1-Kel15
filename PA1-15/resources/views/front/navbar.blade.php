<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <img class="rounded-circle img-fluid" src="{{ asset('front/img/Logo.png') }}" alt="" width="60">
        <h1 class="m-1 display-4 text-secondary">AgroMaju</h1>
        <div class="navbar-nav mx-auto py-0">
            <a href="/" class="nav-item nav-link ">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="service.html" class="nav-item nav-link">Service</a>
            <a href="/hasiltani" class="nav-item nav-link">Hasil Tani</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                <div class="dropdown-menu m-0">
                    @foreach ($kategori as $item)
                        <a href="/hasiltani/{{$item->id}}" class="dropdown-item">{{ $item->nama }}</a>
                    @endforeach
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a class="btn btn-primary btn-square rounded-circle me-2" href="mailto:danielmanalu101@gmail.com"><i
                    class="fa fa-envelope"></i></a>
            <a class="btn btn-primary btn-square rounded-circle me-2" href="tel:085762649422"><i
                    class="fa fa-phone"></i></a>
        </div>
    </div>
</nav>
