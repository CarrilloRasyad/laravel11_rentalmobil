<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('home')}}" class="navbar-brand mx-4 mb-4">
            <img class="d-flex align-items-center position-relative" src="{{ asset('assets/logo/logo_nobg.png') }}" alt="" style="width: 140px; height: auto;">
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('home')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{route('users')}}" class="nav-item nav-link"><i class="fa fa-solid fa-users me-2"></i>Users</a>
            <a href="{{route('laporan')}}" class="nav-item nav-link"><i class="fa fa-clipboard-list me-2"></i>Laporan Transaksi</a>
            <a href="{{route('mobil')}}" class="nav-item nav-link"><i class="fa fa-solid fa-car me-2"></i>Mobil</a>
            <a href="{{route('transaksi')}}" class="nav-item nav-link"><i class="fa fa-wallet me-2"></i>Transaksi</a>
            
        </div>
    </nav>
</div>
<!-- Sidebar End -->
