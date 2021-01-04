<?php $request = \Config\Services::request(); ?>

<!DOCTYPE html>
<html lang="en">

<?= view('themes/front/head') ?>

<body>
    <?= view('themes/front/navbar') ?>

    <div class="container space-order">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card-form-order">
                    <div class="card-profile-head">
                        <img src="assets/img/user.jpg" alt="" class="img-profile-pic">
                        <div>
                            <h3 class="name-profile">Permana</h3>
                        </div>
                    </div>
                    <div class="card-profile-content">
                        <button class="btn btn-profile text-center">
                            Change Picture
                        </button>
                        <button class="btn btn-profile text-center">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="cart-head">
                    <h4 class="card-title-head font-weight-bold">Pesanan Saya</h4>
                </div>
                <!-- item cart -->
                <div class="cart-shop">
                    <div class="product-order">
                        <div>
                            <img src="assets/img/anggur.jpg" alt="" class="img-shop">
                            <div class="product-name">
                                <a href="#" class="title-shop">Anggur Impor 1 Kg</a>
                                <div class="qty-shop">
                                    Jumlah : 20
                                </div>
                            </div>
                        </div>
                        <div class="price-order-user">
                            <h6 class="slash-price-order">Rp 100.000</h6>
                            <h6 class="final-price-order">Rp 60.000</h6>
                        </div>
                    </div>
                    <div class="product-order">
                        <div>
                            <img src="assets/img/kedondong.jpg" alt="" class="img-shop">
                            <div class="product-name">
                                <a href="#" class="title-shop">Kedondong Lokal 1 Kg</a>
                                <div class="qty-shop">
                                    Jumlah : 5
                                </div>
                            </div>
                        </div>
                        <div class="price-order-user">
                            <h6 class="final-price">Rp 80.000</h6>
                        </div>
                    </div>
                    <div class="product-order">
                        <div>
                            <h4 class="title-status">Status</h4>
                            <div class="status-dikirim">Dikirim</div>
                            <!-- <div class="status-notpay">Belum Dibayar</div> -->
                            <!-- <div class="status-finish">Selesai</div> -->
                        </div>
                        <div class="price-order-user">
                            <h4 class="title-status">Total Pesanan : <span class="price-status">Rp 180.000</span></h4>
                        </div>
                    </div>
                </div>
                <!-- item cart -->
                <div class="cart-shop">
                    <div class="product-order">
                        <div>
                            <img src="assets/img/pisang.jpg" alt="" class="img-shop">
                            <div class="product-name">
                                <a href="#" class="title-shop">Pisang Impor 1 Kg</a>
                                <div class="qty-shop">
                                    Jumlah : 20
                                </div>
                            </div>
                        </div>
                        <div class="price-order-user">
                            <h6 class="slash-price-order">Rp 100.000</h6>
                            <h6 class="final-price-order">Rp 60.000</h6>
                        </div>
                    </div>
                    <div class="product-order">
                        <div>
                            <img src="assets/img/wortel.jpg" alt="" class="img-shop">
                            <div class="product-name">
                                <a href="#" class="title-shop">Wortel Lokal 1 Kg</a>
                                <div class="qty-shop">
                                    Jumlah : 5
                                </div>
                            </div>
                        </div>
                        <div class="price-order-user">
                            <h6 class="final-price">Rp 80.000</h6>
                        </div>
                    </div>
                    <div class="product-order">
                        <div>
                            <h4 class="title-status">Status</h4>
                            <div class="status-notpay">Belum Dibayar</div>
                        </div>
                        <div class="price-order-user">
                            <h4 class="title-status">Total Pesanan : <span class="price-status">Rp 180.000</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('themes/front/footer') ?>

</body>

</html>