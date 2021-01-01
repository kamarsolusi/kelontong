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
                        <?php foreach($product as $key => $value): ?>
                            <div class="card-list-order">
                                <img src="<?= base_url('upload/products/'. ($value['picture_name']==null? 'no_image.png':$value['picture_name'])) ?>" alt="" class="img-list-order">
                                <h4 class="name-list-order"><?= $value['name'] ?></h4>
                                <div class="list-order">
                                    <div>
                                        <div class="note-list-order"><span>Catatan : </span><?= $value['catatan'] ?></div>
                                    </div>
                                    <div class="space-price">
                                        <input class="berat-brg" type="hidden" value="<?= $value['berat']==null? 0: $value['berat'] ?>">
                                        <div class="price-list-order"><?= 'Rp. '. number_format($value['harga_baru'],'0',',','.') . ' x ' . $value['qty'] ?></div>
                                        <div class="final-price-list-order"><?= 'Rp. ' . number_format($value['harga_baru'] * $value['qty'],'0',',','.' ) ?></div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
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
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputKabupaten" style="padding-left: 5px;">Kabupaten/Kota</label>
                                        <select id="inputKabupaten" class="form-control">
                                            <option>Pilih Kabupaten</option>
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
                            <label style="padding-left: 5px;">Pilih Kurir</label>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <!-- <label for="inputKurir">Kurir</label> -->
                                        <select id="inputKurir" class="form-control">
                                            <option value="">Pilih Kurir</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">Tiki</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        
                                        <!-- <label for="inputDesa"></label> -->
                                        <select id="inputService" class="form-control" required>
                                            <option value="jne">Pilih Service</option>
                                        </select>
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
                                <h4 class="price-detail-order" id="total-belanja">Rp 150.000</h4>
                            </div>
                        </div>
                        <div class="cart-other">
                            <div class="note">
                                <h4 class="text-total">Biaya Pengiriman</h4>
                            </div>
                            <div class="note">
                                <h4 class="price-detail-order" id="ongkir">Rp 0</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="cart-other">
                            <div class="note">
                                <h4 class="text-total font-weight-bold">Total Tagihan</h4>
                            </div>
                            <div class="note">
                                <h4 class="price-detail-order" id="total-tagihan">Rp 150.000</h4>
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
    <script>
        var data = $('.final-price-list-order');
        var jumlah = 0;
        var berat = 0;
        $(document).ready(function(){
            countTotalBelanja();
            countTotalBerat();
            listProvinsi();   
            $('#inputProvinsi').on('change',function(){
                listKabupaten($('#inputProvinsi').val());
            })     
            $('#inputKurir').on('change', function(){
                ongkosKirim($('#inputKurir').val());
            })   
            $('#inputService').on('change', function(){
                var ongkir = $(this).val();
                if($(this).val()){
                    $('#ongkir').text('Rp ' + Intl.NumberFormat('id').format(ongkir));
                    let ttl = parseFloat(jumlah) + parseFloat(ongkir);
                    $('#total-tagihan').text('Rp ' + Intl.NumberFormat('id').format(ttl));
                }else{
                    ongkir = 0;
                    let ttl = parseFloat(jumlah) + parseFloat(ongkir);
                    $('#ongkir').text('Rp ' + Intl.NumberFormat('id').format(ongkir));
                    $('#total-tagihan').text('Rp ' + Intl.NumberFormat('id').format(ttl));
                }
            })
        })

        function ongkosKirim(kurir){
            $('#inputService').empty();
            $('#inputService').append('<option>Pilih Service</option>')
            $.ajax({
                url: window.location.origin + '/ongkir',
                data: 'weight='+berat+'&courier='+kurir+'&destination=' + $('#inputKabupaten').val(),
                method: 'post',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $.each(response['rajaongkir']['results'][0]['costs'], function(key,value){
                        $('#inputService').append(`
                            <option value='`+value['cost'][0]['value']+`' >`+value['service'] + ' '+ value['cost'][0]['etd']+`</option>
                        `)
                        // console.log(value['service']);
                    })
                }
            })
        }

        function listProvinsi(){
            $.ajax({
                url: window.location.origin + '/rajaongkir/province',
                method: 'get',
                dataType: 'json',
                success: function(response){
                    $.each(response['rajaongkir']['results'], function(key,value){
                        $('#inputProvinsi').append(`
                            <option value='`+value['province_id']+`'>`+value['province']+`</option>
                        `);
                    })
                }
            })
        }

        function listKabupaten(province_id){
            var pilih = $('#inputKabupaten').clone();
            $('#inputKabupaten').empty();
            $('#inputKabupaten').append(pilih);
            $.ajax({
                url: window.location.origin + '/rajaongkir/city/'+ province_id,
                method: 'get',
                dataType: 'json',
                success: function(response){
                    $.each(response['rajaongkir']['results'], function(key,value){
                        $('#inputKabupaten').append(`
                            <option value='`+value['city_id']+`'>`+value['city_name']+`</option>
                        `);

                    })
                }
            })
        }
        function countTotalBerat(){
            var weight = $('.berat-brg');
            $.each(weight, function(key,value){
                berat += parseFloat(value.value);
            })
        }

        function countTotalBelanja(){
            $.each(data, function(key,value){
                jumlah += parseFloat(value.textContent.replace( /^\Rp./,"")) * 1000;
            })
            $('#total-belanja').text('Rp ' + Intl.NumberFormat('id').format(jumlah));
            $('#total-tagihan').text('Rp ' + Intl.NumberFormat('id').format(jumlah));
        }
        
    </script>

</body>

</html>