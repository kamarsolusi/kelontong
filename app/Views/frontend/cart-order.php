<?php $request = \Config\Services::request(); ?>

<!DOCTYPE html>
<html lang="en">

<?= view('themes/front/head') ?>

<body>
    <?= view('themes/front/navbar') ?>

    <div class="container space-carousel">
        <div class="row space-cart">
            <!-- Keranjang Belanja Kosong -->
            <!-- <div class="col-sm-12 col-md-12">
                <div class="box-cart">
                    <div class="text-center">
                        <img src="assets/img/empty_cart.svg" alt="" class="img-empty-cart">
                        <h3 class="text-heading">Wah, keranjang belanjamu kosong</h3>
                        <p class="text-desc">Daripada dianggurin, mending isi dengan barang-barang kebutuhanmu. Yuk, cek sekarang!</p>
                        <a href="" class="btn btn-empty">Mulai Belanja</a>
                    </div>
                </div>
            </div> -->
            <!-- Keranjang Belanja Terisi -->
            <div class="col-sm-12 col-md-8" id="keranjang">
                <div class="cart-head" id="keranjang-head">
                    <h4 class="card-title-head">Keranjang Belanja</h4>
                    <h4 class="card-button-head" onclick="deleteCart()">Hapus Semua</h4>
                </div>
                <!-- item cart -->
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card-order">
                    <!-- <div class="card-voucher">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Kode Voucher">
                        </div>
                    </div> -->
                    <div class="card-total-price">
                        <h5 class="text-order">Ringkasan Order</h5>
                        <div class="cart-other">
                            <div class="note">
                                <h4 class="text-total">Total Harga</h4>
                            </div>
                            <div class="note">
                                <h4 class="price-total">Rp 150.000</h4>
                            </div>
                        </div>
                        <button class="btn btn-order text-center">
                            <a href="<?= base_url('order') ?>" class="text-light">
                                Beli (<span id="total-beli"></span>)
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('themes/front/footer') ?>

</body>

</html>