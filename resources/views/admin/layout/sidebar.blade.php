<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL('/admin') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('public/images/logoAsmat_1.png') }}" alt="" style="width: auto; height: 50px">
        </div>
        <div class="sidebar-brand-text mx-3">Asmat Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    @if (Auth::user()->is_super == true)    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('superAdmin.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>User</span></a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminProduct.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Produk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminStory.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Cerita</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminCustomer.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pelanggan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-table"></i>
            <span>Alamat Customer</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">JENIS ALAMAT:</h6>
                <a class="collapse-item" href="{{ route('adminAddressMain.index') }}">Alamat Utama</a>
                <a class="collapse-item" href="{{ route('adminAddressSecond.index') }}">Alamat Cadangan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Pesanan Customer</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">STATUS PESANAN:</h6>
                <a class="collapse-item" href="{{ url('adminIsPending') }}">Pembayaran Pending</a>
                <a class="collapse-item" href="{{ route('adminPaymentSuccess.index') }}">Pembayaran Berhasil</a>
                <a class="collapse-item" href="{{ url('adminDelivered') }}">Paket Terkirim</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->