<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-text mx-3">Gendhis Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::url() == url('/admin') ? 'active' : '' }}"> 
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ Request::url() == url('/admin/wedding-package') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('wedding-package.index') }}">
          <i class="fas fa-fw fa-gift"></i>
          <span>Paket Pernikahan</span></a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ Request::url() == url('/admin/gallery') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('gallery.index') }}">
        <i class="fas fa-fw fa-image"></i>
        <span>Galeri</span></a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ Request::url() == url('/admin/transaction') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('transaction.index') }}">
        <i class="fas fa-fw fa-funnel-dollar"></i>
        <span>Transaksi</span></a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
