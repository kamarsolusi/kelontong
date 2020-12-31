<?php $request = \Config\Services::request(); ?>

<!DOCTYPE html>
<html lang="en">

<?= view('themes/front/head') ?>

<body>
    <?= view('themes/front/navbar') ?>

    <div class="container space-order">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card-form-order">
                    <div class="card-form-head">
                        <h3 class="title-form">Detail Transaksi</h3>
                    </div>
                    <div class="form-order">
                        <div class="card-list-order">
                            <img src="assets/img/anggur.jpg" alt="" class="img-list-order">
                            <h4 class="name-list-order">Anggur Impor 1 Kg</h4>
                            <div class="list-order">
                                <div>
                                    <div class="note-list-order"><span>Catatan : </span>Pakai Buble Wrap</div>
                                </div>
                                <div class="space-price">
                                    <div class="price-list-order">Rp 60.000 x 3</div>
                                    <div class="final-price-list-order">Rp 180.000</div>
                                </div>

                            </div>
                        </div>
                        <div class="card-list-order">
                            <img src="assets/img/kedondong.jpg" alt="" class="img-list-order">
                            <h4 class="name-list-order">Kedondong Lokal 1 Kg</h4>
                            <div class="list-order">
                                <div>
                                    <div class="note-list-order"><span>Catatan : </span>-</div>
                                </div>
                                <div class="space-price">
                                    <div class="price-list-order">Rp 80.000 x 3</div>
                                    <div class="final-price-list-order">Rp 240.000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-form-order">
                    <div class="card-form-head">
                        <h3 class="title-form">Form Order</h3>
                    </div>
                    <div class="form-order">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputAlamat" class="form-control" placeholder="Alamat Sebagai" required>
                                        <label for="inputAlamat">Alamat Sebagai</label>
                                        <small class="form-text text-muted">
                                            Contoh : Kantor, Rumah, Kos, Dll
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputNama" class="form-control" placeholder="Nama Penerima" required>
                                        <label for="inputNama">Nama Penerima</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required>
                                        <label for="inputEmail">Email</label>
                                        <small class="form-text text-muted">
                                            Contoh : jhon@gmail.com
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputNoHp" class="form-control" placeholder="No Telepon" required>
                                        <label for="inputNoHp">No Telepon</label>
                                        <small class="form-text text-muted">
                                            Contoh : 08xxxxxxxxxx
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputProvinsi" style="padding-left: 5px;">Provinsi</label>
                                        <select id="inputProvinsi" class="form-control">
                                            <option>Pilih Provinsi</option>
                                            <option>Yogyakarta</option>
                                            <option>Jakarta</option>
                                            <option>Bandung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputKabupaten" style="padding-left: 5px;">Kabupaten/Kota</label>
                                        <select id="inputKabupaten" class="form-control">
                                            <option>Pilih Kabupaten</option>
                                            <option>Sleman</option>
                                            <option>Bantul</option>
                                            <option>Kulon Progo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="inputKecamatan" class="form-control" placeholder="Kecamatan" required>
                                        <label for="inputKecamatan">Kecamatan</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="inputDesa" class="form-control" placeholder="Desa/Kelurahan" required>
                                        <label for="inputDesa">Desa/Kelurahan</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="inputKode" class="form-control" placeholder="ZIP Code / Kode Pos" required>
                                        <label for="inputKode">ZIP Code / Kode Pos</label>
                                    </div>
                                </div>
                            </div>
                            <label style="padding-left: 5px;">Metode Pembayaran</label>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label class="label-pay">
                                        <input type="radio" name="radioname" value="Dana" />
                                        <div class="div-pay">
                                            <div class="name-pay">Dana</div>
                                            <img src="assets/img/icon-dana.png" alt="" class="img-pay">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-pay">
                                        <input type="radio" name="radioname" value="Gopay" />
                                        <div class="div-pay">
                                            <div class="name-pay">Gopay</div>
                                            <img src="assets/img/icon-gopay.png" alt="" class="img-pay">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-pay">
                                        <input type="radio" name="radioname" value="Ovo" />
                                        <div class="div-pay">
                                            <div class="name-pay">Ovo</div>
                                            <img src="assets/img/icon-ovo.png" alt="" class="img-pay">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card-form-order">
                    <div class="card-form-head">
                        <h3 class="title-form">Ringkasan Order</h3>
                    </div>
                    <div class="card-total-price">
                        <div class="cart-other">
                            <div class="note">
                                <h4 class="text-total">Total Belanja</h4>
                            </div>
                            <div class="note">
                                <h4 class="price-detail-order">Rp 150.000</h4>
                            </div>
                        </div>
                        <div class="cart-other">
                            <div class="note">
                                <h4 class="text-total">Biaya Pengiriman</h4>
                            </div>
                            <div class="note">
                                <h4 class="price-detail-order">Rp 0</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="cart-other">
                            <div class="note">
                                <h4 class="text-total font-weight-bold">Total Tagihan</h4>
                            </div>
                            <div class="note">
                                <h4 class="price-detail-order">Rp 150.000</h4>
                            </div>
                        </div>
                        <button class="btn btn-order text-center">
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('themes/front/footer') ?>

</body>

</html>