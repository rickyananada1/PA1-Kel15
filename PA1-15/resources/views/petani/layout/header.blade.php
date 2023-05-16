{{-- <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('petani/images/logo.svg')}}" class="mr-2"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <a href="/" class="navbar nav-item btn btn-light">Home</a>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">
                    <i class="icon-bell mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <div class="text-center">Not Found Notification</div>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{url('petani/images/photo/'.Auth::guard('petani')->user()->image)}}" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a href="{{url('/petani/logout')}}" class="dropdown-item">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav> --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span
                    class="badge badge-warning navbar-badge">{{ Auth::guard('petani')->user()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    {{ Auth::guard('petani')->user()->unreadNotifications->count() }} Notifications</span>
                <div class="dropdown-divider"></div>
                @forelse (Auth::guard('petani')->user()->unreadNotifications as $item)
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Pengumuman {{ $item->data['nama'] }}
                        <a href="{{route('markasread', $item->id)}}" class="float-right text-muted text-sm">Tandai
                            Sudah Dibaca</a>
                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Tidak Ada Notifikasi
                    </a>
                    <div class="dropdown-divider"></div>
                @endforelse
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ url('/petani/logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
