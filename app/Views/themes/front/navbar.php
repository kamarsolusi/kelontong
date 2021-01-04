<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white">
    <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url() ?>/img/logo-nav.png" width="40" height="40" alt="">
        <span class="brand-logo"> Kelontong </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0 d-inline w-100">
            <div class="search-box mt-2 mb-2">
                <input type="text" placeholder="Cari kebutuhan keseharian kamu disini...">
                <button class="btn btn-custom" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <!-- Sebelum Login -->
        <ul class="navbar-nav ml-auto">
            <?php if (logged_in()) : ?>
                <input type="hidden" name="logged_in" id="logged_in" value="<?= logged_in() ?>">
                <li class="nav-item dropdown no-arrow mx-1 mr-3 mt-2 mb-2">
                    <a href="<?= base_url('carts') ?>" class="btn btn-cart" aria-haspopup="true" aria-expanded="false">
                        <i class=" fas fa-shopping-cart"></i>
                        <span class="badge badge-danger badge-counter" id="shoping-cart">5</span>
                    </a>
                </li>
                <li class="nav-item mr-3 mt-2 mb-2 pt-2 nav-space">
                    |
                </li>
                <!-- User -->
                <li class="nav-item dropdown no-arrow mt-2 mb-2">
                    <a href="#" class="btn btn-sm btn-user logged-name pt-2 dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-1 d-none d-lg-inline " id="username"><?= user()->username ?></span>
                        <img src="<?= base_url() ?>/img/default-user.png" alt="" width="25" class="rounded-circle">
                    </a>
                    
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
                        <?php if (in_groups('admin')) : ?>
                            <a class="dropdown-item" href="<?= base_url('admin/dashboard') ?>">
                                <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                <i class="fas fa-clipboard fa-sm fa-fw mr-2 text-gray-400"></i>
                                Pesanan
                            </a>
                        <?php else: ?>
                        <a class="dropdown-item" href="<?= base_url('profile') ?>">
                            <i class="fas fa-clipboard fa-sm fa-fw mr-2 text-gray-400"></i>
                            Pesanan
                        </a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            <?php else : ?>
                <li class="nav-item mr-3 mt-2 mb-2">
                    <a href="<?= route_to('login') ?>" class="btn btn-login">Login</a>
                </li>
                <li class="nav-item  mt-2 mb-2">
                    <a href="<?= route_to('register') ?>" class="btn btn-register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>