<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $title ?? 'GenBIpedia' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/images/' . auth()->user()->foto) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Absensi Kegiatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manajemen Kegiatan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kegiatan') }}"
                                class="nav-link {{ $active === 'kegiatans' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('level') }}"
                                class="nav-link {{ $active === 'level_kegiatans' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/jabatan" class="nav-link {{ $active === 'jabatan_kegiatans' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jabatan Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/panitia-kegiatan"
                                class="nav-link {{ $active === 'panitia_kegiatans' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Panitia Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/peserta-kegiatan"
                                class="nav-link {{ $active === 'peserta_kegiatans' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peserta Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ $active === 'index' ? 'active' : '' }}" aria-current="page">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manajemen Berita
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('berita') }}"
                                class="nav-link {{ $active === 'beritas' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manajemen Berita</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link " aria-current="page">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manajemen User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/komisariat" class="nav-link {{ $active === 'komisariats' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Komisariat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/jabatan-user" class="nav-link {{ $active === 'jabatans' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link {{ $active === 'users' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link {{ $active === 'profile' ? 'active' : '' }}"
                        aria-current="page">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
