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
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    {{ Auth::guard('petani')->user()->unreadNotifications->count() }} Notifications</span>
                <div class="dropdown-divider"></div>
                @forelse (Auth::guard('petani')->user()->unreadNotifications as $item)
                    <a href="/petani/pengumuman" class="dropdown-item bg-lg">
                        <i class="fa fa-check mr-2" aria-hidden="true"></i> Pengumuman {{ $item->data['nama'] }}
                        <span class="float-end text-muted text-sm" style="word-wrap: break-word"> &nbsp;
                            @if ($item->created_at->diffInSeconds() < 60)
                                {{ $item->created_at->diffInSeconds() }} detik
                            @elseif ($item->created_at->diffInMinutes() < 60)
                                {{ $item->created_at->diffInMinutes() }} menit
                            @elseif ($item->created_at->diffInHours() < 24)
                                {{ $item->created_at->diffInHours()}} jam
                            @else
                            {{ $item->created_at->diffInDays() }} hari
                            @endif
                        </span>
                    </a>
                    <a href="{{ route('markasread', $item->id) }}" class="float-right text-muted text-sm">Tandai Sudah
                        Dibaca</a>
                    <div class="dropdown-divider"></div>
                @empty
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-check mr-2" aria-hidden="true"></i> Tidak Ada Notifikasi
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
