<ul
class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
id="accordionSidebar"
>
<!-- Sidebar - Brand -->
<a
class="sidebar-brand d-flex align-items-center justify-content-center"
href="{{ route('dashboard') }}"
>
<div class="sidebar-brand-icon">
    {{-- <i class="fas fa-laugh-wink"></i> --}}
  <i>
      <img src="{{ asset('assets/img/new_logo.png') }}" alt="" style="width: 35px;">
    </i>
</div>
<div class="sidebar-brand-text mx-3">SiapWolu</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0" />

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
<a class="nav-link" href="{{ route('dashboard') }}">
    <i class="fi fi-sr-chart-tree-map"></i>
    <span>Dashboard</span></a
>
</li>

{{--  Nav Item - Pages Collapse Menu  --}}
<li class="nav-item {{ request()->routeIs('surat-masuk') || request()->routeIs('surat-keluar') ? 'active' : '' }}">
<a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseTwo"
    aria-expanded="true"
    aria-controls="collapseTwo"
>
<i class="fi fi-br-envelope"></i>
{{-- <i class="fi fi-rs-envelope"></i> --}}
<span>Surat</span>
</a>
<div
    id="collapseTwo"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
>
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Jenis Surat :</h6>
    <a class="collapse-item" href="{{ route('surat-masuk') }}">Surat Masuk</a>
    <a class="collapse-item" href="{{ route('surat-keluar') }}">Surat Keluar</a>
    </div>
</div>
</li>

<li class="nav-item {{ request()->routeIs('laporan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('laporan') }}">
        <i class="fi fi-sr-file-chart-line"></i>
        {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
        <span>Laporan</span></a
    >
    </li>

<hr class="sidebar-divider d-none d-md-block" />

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle">
    
</button>
</div>
</ul>