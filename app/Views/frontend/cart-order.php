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
            <div class="col-sm-12 col-md-8">
                <div class="cart-head">
                    <h4 class="card-title-head">Keranjang Belanja</h4>
                    <h4 class="card-button-head">Hapus Semua</h4>
                </div>
                <!-- item cart -->
                <div class="cart-shop">
                    <img src="assets/img/anggur.jpg" alt="" class="img-shop">
                    <div class="product-name">
                        <a href="#" class="title-shop">Anggur Impor 1 Kg</a>
                        <div class="price-shop">
                            <h6 class="slash-price">Rp 100.000</h6>
                            <h6 class="final-price">Rp 60.000</h6>
                        </div>
                    </div>
                    <div class="cart-other">
                        <div class="note">
                            <!-- <h4 class="button-note">Tulis Catatan</h4> -->
                            <div class="input-group">
                                <input type="text" class="form-control form-note" placeholder="Tulis Catatan (Optional)">
                            </div>
                        </div>
                        <div class="cart-qty">
                            <span class="button-delete">
                                <i class="fas fa-trash"></i>
                            </span>
                            <div class="number-cart">
                                <span class="minus-cart">-</span>
                                <input type="number" value="1" class="input-jumlah" />
                                <span class="plus-cart">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-shop">
                    <img src="assets/img/kedondong.jpg" alt="" class="img-shop">
                    <div class="product-name">
                        <a href="#" class="title-shop">Kedondong Lokal 1 Kg</a>
                        <div class="price-shop">
                            <h6 class="final-price">Rp 80.000</h6>
                        </div>
                    </div>
                    <div class="cart-other">
                        <div class="note">
                            <!-- <h4 class="button-note">Tulis Catatan</h4> -->
                            <div class="input-group">
                                <input type="text" class="form-control form-note" placeholder="Tulis Catatan (Optional)">
                            </div>
                        </div>
                        <div class="cart-qty">
                            <span class="button-delete">
                                <i class="fas fa-trash"></i>
                            </span>
                            <div class="number-cart">
                                <span class="minus-cart">-</span>
                                <input type="number" value="1" class="input-jumlah" />
                                <span class="plus-cart">+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card-order">
                    <div class="card-voucher">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Kode Voucher">
                        </div>
                    </div>
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
                            Beli (<span id="total-beli"></span>)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('themes/front/footer') ?>

</body>

</html>