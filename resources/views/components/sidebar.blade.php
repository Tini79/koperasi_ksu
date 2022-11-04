<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li><a href="/datauser" class="nav-link"><i class="fas fa-user"></i><span>User</span></a></li>
            <li><a href="/dataanggota" class="nav-link"><i class="fas fa-users"></i><span>Anggota</span></a></li>
            <li><a href="/datapegawai" class="nav-link"><i class="fas fa-clipboard-user"></i><span>Pegawai</span></a></li>
            <li class="menu-header">Transaksi</li>
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-piggy-bank"></i><span>Simpanan</span></a>
                <ul class="dropdown-menu">
                    <li><a href="/datarekeningsimpanan" class="nav-link">Rekening Simpanan</a></li>
                    <li><a href="{{ route('index.produksimpanan') }}" class="nav-link">Produk Simpanan</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-check-alt"></i><span>Pinjaman</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('index.pinjaman') }}" class="nav-link">Rekening Pinjaman</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i><span>Pembukuan</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('pembukuan.akun.create') }}" class="nav-link">Chart Of Account</a></li>
                    <li><a href="{{ route('pembukuan.datamemorial.index') }}" class="nav-link">Kas</a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan-Laporan</li>
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <!-- ketua -->
                    <li><a href="{{ route('laporan.simpanan.index') }}" class="nav-link">Simpanan</a></li>
                    <li><a href="{{ route('laporan.pinjaman.index') }}" class="nav-link">Pinjaman</a></li>
                    <li><a href="{{ route('laporan.neraca.index') }}" class="nav-link">Neraca</a></li>
                    <li><a href="{{ route('laporan.labarugi.index') }}" class="nav-link">Laba Rugi</a></li>
                    <li><a href="{{ route('laporan.shu.index') }}" class="nav-link">Sisa Hasil Usaha</a></li>
                    <li><a href="{{ route('laporan.aruskas.index') }}" class="nav-link">Arus Kas</a></li>
                    <li><a href="{{ route('laporan.keuangan.index') }}" class="nav-link">Keuangan</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>