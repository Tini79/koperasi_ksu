<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}" class="h6">Hita Mandiri Sejatera</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KSU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            @can('verified.anggota')
            <li class="{{ Request::is('dashboardanggota') ? 'active' : '' }}"><a href="/dashboardanggota" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard Anggota</span></a></li>
            @endcan
            @can('verified.admin')
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('datauser/*') ? 'active' : '' }}"><a href="/datauser" class="nav-link"><i class="fas fa-user"></i><span>User</span></a></li>
            <li class="{{ Request::is('dataanggota') || Request::is('dataanggota/*') ? 'active' : '' }}"><a href="/dataanggota" class="nav-link"><i class="fas fa-users"></i><span>Anggota</span></a></li>
            <li class="{{ Request::is('datapegawai') || Request::is('datapegawai/*') ? 'active' : '' }}"><a href=" /datapegawai" class="nav-link"><i class="fas fa-clipboard-user"></i><span>Pegawai</span></a></li>
            <li class="menu-header">Transaksi</li>
            <li class="dropdown {{ Request::is('datarekeningsimpanan') || Request::is('datarekeningsimpanan/*') || Request::is('dataproduksimpanan') || Request::is('dataproduksimpanan/*') ? 'active' : ''}}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-piggy-bank"></i><span>Simpanan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('datarekeningsimpanan') || Request::is('datarekeningsimpanan/*') ? 'active' : '' }}"><a href="/datarekeningsimpanan" class="nav-link">Rekening Simpanan</a></li>
                    <li class="{{ Request::is('dataproduksimpanan') || Request::is('dataproduksimpanan/*') ? 'active' : '' }}"><a href="{{ route('index.produksimpanan') }}" class="nav-link">Produk Simpanan</a></li>
                </ul>
            </li>
            <li class="dropdown {{ Request::is('datapinjaman') || Request::is('datapinjaman/*') ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-check-alt"></i><span>Pinjaman</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('datapinjaman') || Request::is('datapinjaman/*') ? 'active' : '' }}"><a href="{{ route('index.pinjaman') }}" class="nav-link">Rekening Pinjaman</a></li>
                </ul>
            </li>
            <li class="dropdown {{ Request::is('akun') || Request::is('akun/*') || Request::is('datajurnalkas') || Request::is('datajurnalkas/*') ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i><span>Pembukuan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('akun') || Request::is('akun/*') ? 'active' : '' }}"><a href="{{ route('pembukuan.akun.create') }}" class="nav-link">Chart Of Account</a></li>
                    <li class="{{ Request::is('datajurnalkas') || Request::is('datajurnalkas/*') ? 'active' : '' }}"><a href="{{ route('pembukuan.datajurnalkas.index') }}" class="nav-link">Kas</a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan-Laporan</li>
            <li class="dropdown {{ Request::is('laporan') || Request::is('laporan/*') ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <!-- ketua -->
                    <li class="{{ Request::is('laporan/simpanan') ? 'active' : '' }}"><a href="{{ route('laporan.simpanan.index') }}" class="nav-link">Simpanan</a></li>
                    <li class="{{ Request::is('laporan/pinjaman') ? 'active' : '' }}"><a href="{{ route('laporan.pinjaman.index') }}" class="nav-link">Pinjaman</a></li>
                    <li class="{{ Request::is('laporan/neraca') || Request::is('laporan/neraca/*') ? 'active' : '' }}"><a href="{{ route('laporan.neraca.index') }}" class="nav-link">Neraca</a></li>
                    <li class="{{ Request::is('laporan/labarugi') || Request::is('laporan/labarugi/*') ? 'active' : '' }}"><a href="{{ route('laporan.labarugi.index') }}" class="nav-link">Laba Rugi</a></li>
                    <li class="{{ Request::is('laporan/shu') || Request::is('laporan/shu/*') ? 'active' : '' }}"><a href="{{ route('laporan.shu.index') }}" class="nav-link">Sisa Hasil Usaha</a></li>
                    <li class="{{ Request::is('laporan/aruskas') || Request::is('laporan/aruskas/*') ? 'active' : '' }}"><a href="{{ route('laporan.aruskas.index') }}" class="nav-link">Arus Kas</a></li>
                </ul>
            </li>
            @endcan
            @can('verified.ketua')
            <li class="{{ Request::is('dashboardanggota') ? 'active' : '' }}"><a href="/dashboardketua" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard Ketua</span></a></li>
            <li class="menu-header">Laporan-Laporan</li>
            <li class="dropdown {{ Request::is('laporan') || Request::is('laporan/*') ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <!-- ketua -->
                    <li class="{{ Request::is('laporan/simpanan') ? 'active' : '' }}"><a href="{{ route('laporan.simpanan.index') }}" class="nav-link">Simpanan</a></li>
                    <li class="{{ Request::is('laporan/pinjaman') ? 'active' : '' }}"><a href="{{ route('laporan.pinjaman.index') }}" class="nav-link">Pinjaman</a></li>
                    <li class="{{ Request::is('laporan/neraca') || Request::is('laporan/neraca/*') ? 'active' : '' }}"><a href="{{ route('laporan.neraca.index') }}" class="nav-link">Neraca</a></li>
                    <li class="{{ Request::is('laporan/labarugi') || Request::is('laporan/labarugi/*') ? 'active' : '' }}"><a href="{{ route('laporan.labarugi.index') }}" class="nav-link">Laba Rugi</a></li>
                    <li class="{{ Request::is('laporan/shu') || Request::is('laporan/shu/*') ? 'active' : '' }}"><a href="{{ route('laporan.shu.index') }}" class="nav-link">Sisa Hasil Usaha</a></li>
                    <li class="{{ Request::is('laporan/aruskas') || Request::is('laporan/aruskas/*') ? 'active' : '' }}"><a href="{{ route('laporan.aruskas.index') }}" class="nav-link">Arus Kas</a></li>
                </ul>
            </li>
            @endcan
        </ul>
    </aside>
</div>