<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Arter Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('products.index') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Product</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('penyewas.index') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Penyewa</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Pesanan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-user-alt"></i>
        <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


  </ul>
