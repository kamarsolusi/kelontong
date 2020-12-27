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
      
    </div>
    <!-- /.col -->
    <div class="col-6">
      <p class="lead">Amount Due <?= date("d/m/Y") ?></p>

      <div class="table-responsive">
        <table class="table">
          <tbody><tr>
            <th style="width:50%">Subtotal:</th>
            <td id="grand-total" class="text-right">$250.30</td>
          </tr>
          <tr>
            <th>Tax (10%)</th>
            <td id="tax" class="text-right">$10</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td id="total-bayar" class="font-weight-bold text-right">$265.24</td>
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
