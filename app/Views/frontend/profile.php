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
                        <img src="<?= base_url('img/'.user()->profile_picture) ?>" alt="" class="img-profile-pic">
                        <div>
                            <h3 class="name-profile"><?= user()->firstname . ' '. user()->lastname ?></h3>
                        </div>
                    </div>
                    <!-- <div class="card-profile-content">
                        <button class="btn btn-profile text-center">
                            Change Picture
                        </button>
                        <button class="btn btn-profile text-center">
                            Edit Profile
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="cart-head">
                    <h4 class="card-title-head font-weight-bold">Pesanan Saya</h4>
                </div>
                <!-- item cart -->
                <?php if(!empty($transaction)): ?>
                <?php foreach($transaction as $key => $value): ?>
                <div class="cart-shop">
                    <?php foreach($detailTransaction as $keyDetail => $valueDetail) :?>
                    <div class="product-order">
                        <div>
                            <img src="<?= base_url('upload/products/'.(!empty($valueDetail['picture_name'])? $valueDetail['picture_name']:'no_image.png')) ?>" alt="" class="img-shop">
                            <div class="product-name">
                                <a href="#" class="title-shop"><?= $valueDetail['name']?></a>
                                <div class="qty-shop">
                                    Jumlah : <?= $valueDetail['qty'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="price-order-user">
                            <h6 class="slash-price-order">Rp <?= $valueDetail['harga'] ?></h6>
                            <h6 class="final-price-order">Rp <?= $valueDetail['harga_baru'] ?></h6>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="product-order">
                        <div>
                            <h4 class="title-status">Status</h4>
                            <div class="status-dikirim"><?= $value['status'] ?></div>
                            <!-- <div class="status-notpay">Belum Dibayar</div> -->
                            <!-- <div class="status-finish">Selesai</div> -->
                        </div>
                        <div class="price-order-user">
                            <h4 class="title-status">Total Pesanan : <span class="price-status">Rp <?= $value['grand_total'] ?></span></h4>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>

    <?= view('themes/front/footer') ?>

</body>

</html>