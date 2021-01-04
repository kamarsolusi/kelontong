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

  <!-- Kategori -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2 class="h2 text-gray-900 mb-4 font-weight-bold">Kategori Pilihan</h2>
        <div class="owl-carousel" id="owl-carousel-kategori">
          <?php foreach($categories as $key => $value): ?>
            <div class="item">
              <div class="icon-card">
                <a href="<?= base_url('categories/'.strtolower($value['category_name'])) ?>" class="link-kateogri">
                  <img src="<?= base_url('/upload/category/'.$value['category_image']) ?>" class="img-kategori" alt="">
                  <h6><?= $value['category_name'] ?></h6>
                </a>
              </div>
            </div>
            <?php if($key > 5){break;} ?>
          <?php endforeach; ?>
          
          <div class="item">
            <div class="icon-card">
              <a href="" class="link-kateogri" data-toggle="modal" data-target="#myModal" id="kategori-lain">
                <img src="<?= base_url() ?>/img/kategori/kategori-lain.png" class="img-kategori" alt="">
                <h6>Kategori Lain</h6>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Produk Terlaris -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h2 text-gray-900 font-weight-bold header-product h2-border">
          <span><?= !empty($products)? $products[0]['category_name'] : '' ; ?></span>
        </h2>
        <div class="row">
        <?php foreach($products as $key=> $value): ?>
          <div class="col-12 col-sm-6 col-md-3 mt-5">
            <div class="card">
              <?php if($value['harga_baru'] < $value['harga']): ?>
                <span class="diskon">
                  <div class="label-diskon bg-danger">
                    <?= number_format(($value['harga_baru'] - $value['harga']) / $value['harga_baru'] * 100, '0'); ?> %
                  </div>
                </span>
              <?php endif; ?>
              <a class="like" onclick="addCart(<?= $value['sku']?>)">
                <div class="label-like">
                  <i class="far fa-heart"></i>
                </div>
              </a>
              <div class="img-wrap">
                <img class="card-img" src="<?= $value['picture_name'] == NULL? base_url('upload/products/no_image.png') : base_url('upload/products/'.$value['picture_name']) ?>" alt="<?= $value['picture_name'] ?>">
              </div>
              <a href="<?= base_url('detail/'.$value['product_slug']) ?>" class="link-product">
                <div class="card-body">
                  <h4 class="card-title"><?= $value['name'] ?></h4>
                  <?php if($value['harga'] == $value['harga_baru']): ?>
                    <h4 class="card-price"><?= 'Rp '. number_format($value['harga_baru'],2,',','.') ?></h4>
                  <?php else: ?>
                    <h4 class="card-price"><?= 'Rp '. number_format($value['harga_baru'],2,',','.') ?></h4>
                    <h4 class="card-real-price"><?= 'Rp '. number_format($value['harga'],2,',','.') ?></h4>
                  <?php endif; ?>
                  <div class="buy d-flex justify-content-between align-items-center">
                    <div class="rating-product mt-2">
                      <i class="far fa-star"></i>
                      4.5
                    </div>
                    <a href="<?= base_url('order/'.$value['product_slug']) ?>" class="btn btn-sm btn-buy mt-2"><i class="fas fa-shopping-cart"></i> Beli</a>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <!-- <div class="text-center">
          <a href="#" class="btn btn-view btn-user mt-4">
            Lihat Semua
          </a>
        </div> -->
      </div>
    </div>
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kategori Lainnya</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="kategory-body">
          <div class="row">
            <?php foreach($categories as $key => $value): ?>
              <div class="col-12 col-sm-6 col-md-2 mt-5">
                <a href="<?= base_url('categories/'.strtolower($value['category_name'])) ?>" style="white-space: normal;">
                  <div class="card">
                    <img class="card-img-top w-100" src="<?= base_url('upload/category/' . $value['category_image']) ?>" alt="<?= $value['category_image'] ?>">
                    <div class="card-body">
                      <small>
                        <?= $value['category_name'] ?>
                      </small>    
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= view('themes/front/footer') ?>
</body>

</html>
