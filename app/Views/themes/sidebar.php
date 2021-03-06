<?php $request = \Config\Services::request();
$uri = $request->uri->getSegment(2) ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>/img/LogoKelontong.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kelontong</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/img/<?= user()->profile_picture ?>" class="img-circle elevation-2" alt="<?= user()->profile_picture ?>">
            </div>
            <div class="info">
                <a href="<?= base_url().'/admin/profile/'.user()->username ?>" class="d-block"><?= user()->firstname .' '. user()->lastname ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $uri == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/users') ?>" class="nav-link <?= $uri == 'users' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/banner') ?>" class="nav-link <?= $uri == 'banner' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/categories') ?>" class="nav-link <?= $uri == 'categories' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/products') ?>" class="nav-link <?= $uri == 'products' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/transactions') ?>" class="nav-link <?= $uri == 'transactions' ? 'active' : '' ?>">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>
                <li class="nav-header">Customize</li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/options') ?>" class="nav-link <?= $uri == 'products' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Options
                        </p>
                    </a>
                </li>
                <li class="nav-header">AKUN</li>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>