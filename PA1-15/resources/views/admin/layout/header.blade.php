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
                <span class="badge badge-warning navbar-badge">
                    {{ Auth::guard('admin')->user()->unreadNotifications->count() }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    {{ Auth::guard('admin')->user()->unreadNotifications->count() }} Notifikasi
                </span>
                <div class="dropdown-divider"></div>
                @forelse (Auth::guard('admin')->user()->unreadNotifications as $item)
                    @if ($item->type === 'App\Notifications\OffersNotification')
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $item->data['nama'] }} Telah Melakukan Pendaftaran
                            <a href="{{ route('tandai', $item->id) }}" class="float-right text-muted text-sm">Tandai
                                Sudah Dibaca</a>
                        </a>
                        <div class="dropdown-divider"></div>
                    @elseif ($item->type === 'App\Notifications\PemesananPupukNotification')
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $item->data['nama'] }} Telah Melakukan Pemesanan
                            <a href="{{ route('tandaisudahdibaca', $item->id) }}" class="float-right text-muted text-sm">Tandai
                                Sudah Dibaca</a>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endif
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
                <a class="dropdown-item" href="{{ url('/admin/logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
