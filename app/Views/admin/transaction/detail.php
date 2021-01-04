<?= view('themes/admin/head') ?>
<?= $this->section('content') ?>
<div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> <?= $toko['name'] ?>
                    <small class="float-right">Date: <?= $transaction['created_at'] ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?= $toko['name'] ?></strong><br>
                    <?= $toko['kelurahan'] ?>, <?= $toko['kecamatan'] ?><br>
                    <?= $toko['kota'] ?>, <?= $toko['provinsi'] ?><br>
                    Phone: <?= $toko['telphone'] ?><br>
                    Email: admin@kelontong.xyz
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= $transaction['penerima'] ?></strong><br>
                    <?= $transaction['kelurahan'] ?>, <?= $transaction['kecamatan'] ?><br>
                    <?= $transaction['kabupaten'] ?>, <?= $transaction['provinsi'] ?>, <?= $transaction['kode_pos'] ?><br>
                    Phone: <?= $transaction['no_telphone'] ?><br>
                    Email: <?= $transaction['email'] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?= $transaction['transaction_number'] ?></b><br>
                  <br>
                  <b>Order ID:</b> <?= $transaction['transaction_id'] ?><br>
                  <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                  <!-- <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>SKU</th>
                      <th>Product</th>
                      <th>Catatan</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($detailTransaction as $key=>$value): ?>
                        <td><?= $value['qty'] ?></td>
                        <td><?= $value['sku'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['catatan'] ?></td>
                        <td><?= $value['qty'] * $value['harga_baru'] ?></td>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <img class="m-0" src="<?= base_url('img/logo.png') ?>" alt="Logo" width="50%">
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Kalkulasi</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td ><?='Rp '. number_format($transaction['sub_total'],'2',',','.')  ?></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td><?='Rp '. number_format($transaction['ongkir'],'2',',','.')?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td class="font-weight-bold"><?='Rp '. number_format($transaction['grand_total'],'2',',','.')?></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= base_url('admin/transactions') ?>"  class="btn btn-default"><i class="fas fa-arrow-left"></i> Back</a>
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div>
<?= $this->endSection() ?>
<?= view('themes/body') ?>
<?= view('themes/admin/footer') ?>