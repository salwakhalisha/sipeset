<style>

        .logo-login {
            width: 70px;
            height: auto;
            margin-bottom: 15px;
            margin-top: 35px;
        }
        
        
    </style>
    @php($menu = $menu ?? '')

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="text-center mb-4">
            <img src="{{ asset('dist/img/login-bg.png') }}" alt="SIPESET Logo" class="logo-login">
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{$menu === 'home' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Pegawai Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePegawai"
           aria-expanded="{{ in_array($menu, ['pegawai','unitkerja','jabatan']) ? 'true' : 'false' }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pegawai</span>
        </a>
        <div id="collapsePegawai" class="collapse {{ in_array($menu, ['pegawai','unitkerja','jabatan']) ? 'show' : '' }}">
            <div class="bg-white text-dark py-2 collapse-inner rounded">
                <a class="collapse-item {{$menu === 'pegawai' ? 'active' : ''}}" href="{{ route('pegawai.index') }}">
                    <i class="fas fa-user-circle"></i> Data Pegawai
                </a>
                <a class="collapse-item {{$menu === 'unitkerja' ? 'active' : ''}}" href="{{ route('unitkerja.index') }}">
                    <i class="fas fa-door-open"></i> Unit Kerja
                </a>
                <a class="collapse-item {{$menu === 'jabatan' ? 'active' : ''}}" href="{{ route('jabatan.index') }}">
                    <i class="fas fa-user-tie"></i> Jabatan
                </a>
            </div>
        </div>
    </li>

    <!-- Aset Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAset"
           aria-expanded="{{ in_array($menu, ['kategori','aset','konfirmasi']) ? 'true' : 'false' }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Aset</span>
        </a>
        <div id="collapseAset" class="collapse {{ in_array($menu, ['kategori','aset','konfirmasi']) ? 'show' : '' }}">
            <div class="bg-white text-dark py-2 collapse-inner rounded">
                <a class="collapse-item {{$menu === 'kategori' ? 'active' : ''}}" href="{{ route('kategori.index') }}">
                    <i class="fas fa-paste"></i> Kategori Aset
                </a>
                <a class="collapse-item {{$menu === 'aset' ? 'active' : ''}}" href="{{ route('aset.index') }}">
                    <i class="fas fa-archive"></i> Data Aset
                </a>
                <a class="collapse-item {{$menu === 'konfirmasi' ? 'active' : ''}}" href="{{ route('admin.konfirmasi.index') }}">
                    <i class="fas fa-database"></i> Pinjam dan Kembali
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
