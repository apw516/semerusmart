<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SEMERUSMART</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if($menu == 'Dashboard' ) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-header">REKAMEDIS</li>
                <li class="nav-item">
                    <a href="{{ route('pendaftaran')}}" class="nav-link @if($menu == 'Pendaftaran' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Pendaftaran
                        </p>
                    </a>
                </li>
                <li class="nav-header">PELAYANAN</li>
                <li class="nav-item">
                    <a href="{{ route('ermpasien')}}" class="nav-link @if($menu == 'ERM - Pasien' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            E-RM Pasien
                        </p>
                    </a>
                </li>
                <li class="nav-header">KEUANGAN</li>
                <li class="nav-item">
                    <a href="{{ route('kasir') }}" class="nav-link @if($menu == 'KASIR' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            KASIR
                        </p>
                    </a>
                </li>
                <li class="nav-header">DATA MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('master')}}" class="nav-link @if($menu == 'MASTER' ) active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard 
                        </p>
                    </a>
                    <a href="{{ route('pasien')}}" class="nav-link @if($menu == 'PASIEN' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Pasien 
                        </p>
                    </a>
                    <a href="{{ route('pegawai')}}" class="nav-link @if($menu == 'PEGAWAI' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Pegawai 
                        </p>
                    </a>
                    <a href="{{ route('user')}}" class="nav-link @if($menu == 'USER' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data User 
                        </p>
                    </a>
                    <a href="{{ route('diagnosa')}}" class="nav-link @if($menu == 'DIAGNOSA' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Diagnosa 
                        </p>
                    </a>
                    <a href="{{ route('tarif')}}" class="nav-link @if($menu == 'TARIF' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Tarif 
                        </p>
                    </a>
                </li>
                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Info Akun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
