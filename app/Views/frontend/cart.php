<?php $request = \Config\Services::request(); ?>

<!DOCTYPE html>
<html lang="en">

<?= view('themes/front/head') ?>

<body>
  <?= view('themes/front/navbar') ?>

    <!-- Carousel -->
    <div class="container-fluid space-carousel">
        <div class="row">
            <div class="owl-carousel owl-theme" id="owl-carousel">
            <?php if(!empty($banner)) : ?>
                <?php foreach($banner as $key => $value): ?>
                <div class="item item-header">
                    <img src="<?= base_url('/upload/banner/') . '/' . $value['banner_name'] ?>" class="img-slider" alt="<?= $value['banner_name']; ?>">
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>

  <!-- Cart -->
  <div class="container mt-5">
    <div class="row">
      <div class="col md-12">
        <h4>Carts</h4>
      </div>
      <div class="col-md-12">
        <table class="table " id="cart-body" style="width: 100%;">
            <thead>
                <td>No</td>
                <td>Product</td>
                <td class="text-center">Qty</td>
                <td>Harga</td>
                <td>Subtotal</td>
                <td>Action</td>
            </thead>
            <tbody >
                
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Total -->
  <div class="container mt-5">

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-6">
      <p class="lead">Payment Methods:</p>
      <img src="../../dist/img/credit/visa.png" alt="Visa">
      <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
      <img src="../../dist/img/credit/american-express.png" alt="American Express">
      <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
        plugg
        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
      </p>
    </div>
    <!-- /.col -->
    <div class="col-6">
      <p class="lead">Amount Due 2/22/2014</p>

      <div class="table-responsive">
        <table class="table">
          <tbody><tr>
            <th style="width:50%">Subtotal:</th>
            <td id="grand-total">$250.30</td>
          </tr>
          <tr>
            <th>Tax (9.3%)</th>
            <td>$10.34</td>
          </tr>
          <tr>
            <th>Shipping:</th>
            <td>$5.80</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>$265.24</td>
          </tr>
        </tbody></table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  </div>

  
  <?= view('themes/front/footer') ?>
  <script src="<?= base_url() ?>/src/js/carts.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>/themes/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
