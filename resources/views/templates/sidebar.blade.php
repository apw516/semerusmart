<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('public/adminlte/dist/img/LOGOX.svg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SEMERUSMART</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->nama}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if($menu == 'Dashboard rekamedis' ) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard Rekamedis
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if($menu == 'Dashboard pelayanan' ) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard Pelayanan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if($menu == 'Dashboard keuangan' ) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard Keuangan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li hidden class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if($menu == 'Dashboard farmasi' ) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard Farmasi
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @if(auth()->user()->hak_akses == 1 || auth()->user()->hak_akses == 3)
                <li class="nav-header">REKAMEDIS</li>
                <li class="nav-item">
                    <a href="{{ route('pendaftaran')}}" class="nav-link @if($menu == 'Pendaftaran' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Pendaftaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayatpendaftaran')}}" class="nav-link @if($menu == 'Riwayat Pendaftaran' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Riwayat Pendaftaran
                        </p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->hak_akses == 1 || auth()->user()->hak_akses == 2)
                <li class="nav-header">PELAYANAN</li>
                <li class="nav-item">
                    <a href="{{ route('ermpasien')}}" class="nav-link @if($menu == 'ERM - Pasien' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            E-RM Pasien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayatpelayanan')}}" class="nav-link @if($menu == 'Riwayat Pelayanan' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Riwayat Pelayanan
                        </p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->hak_akses == 1)
                <li class="nav-header">KEUANGAN</li>
                <li class="nav-item">
                    <a href="{{ route('keuangan') }}" class="nav-link @if($menu == 'KASIR' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            KASIR
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporankasir') }}" class="nav-link @if($menu == 'Laporan Pendapatan Kasir' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p class="text-sm">
                            Laporan Pendapatan Kasir
                        </p>
                    </a>
                </li>
                @endif
                <li hidden class="nav-header">FARMASI</li>
                <li hidden class="nav-item">
                    <a href="{{ route('layananresep') }}" class="nav-link @if($menu == 'Layanan Resep' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Layanan Resep
                        </p>
                    </a>
                </li>
                <li hidden class="nav-item">
                    <a href="{{ route('riwayatresep') }}" class="nav-link @if($menu == 'Riwayat Resep' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Riwayat Resep
                        </p>
                    </a>
                </li>
                <li hidden class="nav-item">
                    <a href="{{ route('stokobat') }}" class="nav-link @if($menu == 'Stok Obat' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                          Stok Obat
                        </p>
                    </a>
                </li>
                <li hidden class="nav-item">
                    <a href="{{ route('masterobat') }}" class="nav-link @if($menu == 'Master Obat' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                           Master Obat
                        </p>
                    </a>
                </li>
                @if(auth()->user()->hak_akses == 1)
                <li class="nav-header">DATA MASTER</li>
                {{-- <li class="nav-item">
                    <a href="{{ route('master')}}" class="nav-link @if($menu == 'MASTER' ) active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('user')}}" class="nav-link @if($menu == 'Data User' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pasien')}}" class="nav-link @if($menu == 'PASIEN' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Pasien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pegawai')}}" class="nav-link @if($menu == 'PEGAWAI' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Karyawan
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('user')}}" class="nav-link @if($menu == 'USER' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li> --}}
                <li hidden class="nav-item">
                    <a href="{{ route('diagnosa')}}" class="nav-link @if($menu == 'DIAGNOSA' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Diagnosa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tarif')}}" class="nav-link @if($menu == 'TARIF' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tarif Pelayanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('barang')}}" class="nav-link @if($menu == 'BARANG' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Master Barang
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('barang')}}" class="nav-link @if($menu == 'STOK' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Master Stok
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('distributor')}}" class="nav-link @if($menu == 'DISTRIBUTOR' ) active @endif">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Master Distributor
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="{{ route('profil')}}" class="nav-link @if($menu == 'Profil' ) active @endif">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Info Akun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()">
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
