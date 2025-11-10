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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="text-center mb-4">
                    <img src="{{ asset('dist/img/login-bg.png') }}" alt="SIPESET Logo" class="logo-login">
                </div>
                <!-- <div class="sidebar-brand-text mx-3">SIPESET <sup>😊</sup></div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" nav-item menu-items {{$menu === 'home' ? 'active' : ''}} href="{{ route('dashboard.pegawai') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <li class="nav-item active">
                <a class="nav-link" nav-item menu-items {{$menu === 'meminjam' ? 'active' : ''}} href="{{ route('pegawai.meminjam.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Peminjaman</span></a>
            </li>
            

            <!-- Divider -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->