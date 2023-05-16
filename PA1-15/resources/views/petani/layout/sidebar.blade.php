<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{url('petani/images/photo/'.Auth::guard('petani')->user()->image)}}"
                class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::guard('petani')->user()->nama }}</a>
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
                <a href="/petani/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Kategori
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/petani/kategori" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/petani/kategori/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Kategori</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Hasil Tani
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/petani/hasiltani" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Hasil Tani</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/petani/hasiltani/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Hasil Tani</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                        Order Pupuk
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('listpesanan')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/petani/pesan" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Order</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/petani/pengumuman" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Pengumuman
                    </p>
                </a>
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
                        <a href="/petani/profile" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Personal Data</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('petani/update-petani-password') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Setting Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('petani/update-petani-details') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Setting Profile</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
