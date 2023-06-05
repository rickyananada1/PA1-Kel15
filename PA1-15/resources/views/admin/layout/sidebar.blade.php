<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ url('admin/images/photo/' . Auth::guard('admin')->user()->image) }}"
                class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::guard('admin')->user()->nama }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('anggota') }}" class="nav-link">
                    <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                    <p>
                        Daftar Anggota
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-bars nav-icon" aria-hidden="true"></i>
                    <p>
                        Kategori
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/kategori" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/kategori/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Kategori</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-th nav-icon"></i>
                    <p>
                        Hasil Tani
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/hasiltani" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Hasil Tani</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/hasiltani/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Hasil Tani</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-ship nav-icon" aria-hidden="true"></i>
                    <p>
                        Pupuk
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/pupuk" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Pupuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/pupuk/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Pupuk</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-shopping-cart"></i>
                    <p>
                        Pemesanan Pupuk
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/daftarpemesanan" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Pemesanan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                    <p>
                        Pengumuman
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/pengumuman" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Pengumuman</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profile
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/profile" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Diri</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Pengaturan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('admin/update-admin-password') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ubah Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/update-admin-details') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ubah Profile</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
