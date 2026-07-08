<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
    </div>
</div>
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class=" mt-3 mb-3  ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item ml-1">
                <h4 class="nav-link text-light">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <b>
                        <p class="fs-3 fw-bold">Mebel.id</p>
                    </b>
                </h4>
            </li>
        </ul>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open ">
                <a href="" class="nav-link bg-dark">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    {{-- <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p> --}}
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ml-1">
                        <a href="../../../dashboard" class="nav-link {{ $title === 'dashboard' ? 'active' : '' }}">
                            <i class="bi bi-card-heading nav-icon"></i>
                            <p>dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ml-1">
                        <a href="../../../dashboard/artikel"
                            class="nav-link {{ $title === 'Artikel' ? 'active' : '' }}">
                            <i class="bi bi-card-heading nav-icon"></i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item ml-1">
                        <a href="../../../dashboard/berita" class="nav-link {{ $title === 'Berita' ? 'active' : '' }}">
                            <i class="bi bi-newspaper card-heading nav-icon"></i>
                            <p>Berita</p>
                        </a>
                    </li>
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item ml-1">
                                <a href="{{ route('admin.comments.index') }}"
                                    class="nav-link {{ $title === 'Komentar Berita' ? 'active' : '' }}">
                                    <i class="bi bi-chat-dots-fill card-heading nav-icon"></i>
                                    <p>Komentar Berita</p>
                                </a>
                            </li>
                            <li class="nav-item ml-1">
                                <a href="{{ route('admin.orders.index') }}"
                                    class="nav-link {{ $title === 'Transaksi' || $title === 'Data Pesanan' ? 'active' : '' }}">
                                    <i class="bi bi-receipt-cutoff nav-icon"></i>
                                    <p>Data Pesanan</p>
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item ml-1">
                        <a href="{{ route('product.index') }}"
                            class="nav-link {{ $title === 'Product' ? 'active' : '' }}">
                            <i class="bi bi-binoculars-fill card-heading nav-icon"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="nav-item ml-1">
                        <a href="../../../dashboard/kontaks"
                            class="nav-link {{ $title === 'Kontaks' ? 'active' : '' }}">
                            <i class="bi bi-person-lines-fill card-heading nav-icon"></i>
                            <p>Kontak</p>
                        </a>
                    </li>
                </ul>
            </li>
