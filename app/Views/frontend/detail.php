<?php $request = \Config\Services::request(); ?>

<!DOCTYPE html>
<html lang="en">

<?= view('themes/front/head') ?>

<body>
    <?= view('themes/front/navbar') ?>

    <!-- Detail Produk -->
    <div class="container space-carousel">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <nav aria-label="breadcrumb" style="margin-top: 1.5rem;">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="#" class="link-breadcrumb">Kelontong</a></li>
                        <li class="breadcrumb-item"><a href="#" class="link-breadcrumb">Buah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Buah Anggur 1 Kg</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="clearfix">
                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                        <li data-thumb="<?= base_url() ?>/img/produk/anggur.jpg">
                            <img src="<?= base_url() ?>/img/produk/anggur.jpg" class="img-gallery" />
                        </li>
                        <li data-thumb="<?= base_url() ?>/img/produk/apel.jpg">
                            <img src="<?= base_url() ?>/img/produk/apel.jpg" class="img-gallery" />
                        </li>
                        <li data-thumb="<?= base_url() ?>/img/produk/kedondong.jpg">
                            <img src="<?= base_url() ?>/img/produk/kedondong.jpg" class="img-gallery" />
                        </li>
                        <li data-thumb="<?= base_url() ?>/img/produk/pisang.jpg">
                            <img src="<?= base_url() ?>/img/produk/pisang.jpg" class="img-gallery" />
                        </li>
                        <li data-thumb="<?= base_url() ?>/img/produk/wortel.jpg">
                            <img src="<?= base_url() ?>/img/produk/wortel.jpg" class="img-gallery" />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <h2 class="h2 product-name">Buah Anggur 1 Kg</h2>
                <div class="buy d-flex align-items-center">
                    <div class="rating-product mt-2">
                        <i class="far fa-star"></i>
                        4.5 Ulasan
                    </div>
                    <div class="info-product mt-2 mr-3 ml-3">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    <div class="info-product mt-2">
                        <span><i class="fas fa-shopping-basket"></i> 0 Produk Terjual</span>
                    </div>
                    <div class="info-product mt-2 mr-3 ml-3">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    <div class="info-product mt-2">
                        <span><i class="far fa-eye"></i> 100 Produk Dilihat</span>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="detail-price-real">Rp 100.000</p>
                    <h1 class="h1 detail-price">Rp 80.000</h1>
                    <span class="detail-sale">Hemat 20%</span>
                    <div class="row mt-4">
                        <div class="col-3 title-opsi">Kondisi</div>
                        <div class="col-9"><span class="detail-kondisi">Baru</span></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 title-opsi">Berat</div>
                        <div class="col-9">200 Gram</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 title-opsi">Stok</div>
                        <div class="col-9">200</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 title-opsi">Jumlah</div>
                        <div class="col-9">
                            <div class="number">
                                <span class="minus">-</span>
                                <input type="text" value="1" class="input-jumlah" />
                                <span class="plus">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-hr-info"></div>
                    <hr>
                </div>
                <div class="space-hr-info">
                    <button class="btn btn-keranjang mr-2"><i class="fas fa-cart-plus"></i> Masukkan Keranjang</button>
                    <button class="btn btn-beli">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">

    <!-- Detail Info -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5">
                <h3 class="title-info">Informasi Barang</h3>
            </div>
            <div class="col-md-7">
                <div class="mb-4">
                    <h5 class="title-info-detail">Kategori Barang</h5>
                    <p class="text-info-detail">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent" style="padding: 0;">
                                <li class="breadcrumb-item"><a href="#" class="link-breadcrumb">Kelontong</a></li>
                                <li class="breadcrumb-item"><a href="#" class="link-breadcrumb">Buah</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buah Anggur 1 Kg</li>
                            </ol>
                        </nav>
                    </p>
                </div>
                <div class="mb-4">
                    <h5 class="title-info-detail">Deskripsi Produk</h5>
                    <p class="text-info-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto possimus molestias repudiandae qui dicta porro, non quia tempore? Quam, doloremque. Error esse voluptas minima ut deserunt necessitatibus aperiam magnam. Nesciunt!</p>
                    <img src="<?= base_url() ?>/img/produk/anggur.jpg" alt="" class="img-info-detail">
                    <p class="text-info-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto possimus molestias repudiandae qui dicta porro, non quia tempore? Quam, doloremque. Error esse voluptas minima ut deserunt necessitatibus aperiam magnam. Nesciunt!</p>
                    <p class="text-info-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto possimus molestias repudiandae qui dicta porro, non quia tempore? Quam, doloremque. Error esse voluptas minima ut deserunt necessitatibus aperiam magnam. Nesciunt!</p>
                    <p class="text-info-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto possimus molestias repudiandae qui dicta porro, non quia tempore? Quam, doloremque. Error esse voluptas minima ut deserunt necessitatibus aperiam magnam. Nesciunt!</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <h3 class="title-info">Ulasan Barang</h3>
            </div>
            <div class="col-md-7">
                <div class="mb-4">
                    <h5 class="title-info-detail">Daftar Ulasan</h5>
                    <button class="btn btn-sm btn-rating active"><i class="fas fa-star"></i> <span class="rating-star">5</span></button>
                    <button class="btn btn-sm btn-rating"><i class="fas fa-star"></i> <span class="rating-star">4</span></button>
                    <button class="btn btn-sm btn-rating"><i class="fas fa-star"></i> <span class="rating-star">3</span></button>
                    <button class="btn btn-sm btn-rating"><i class="fas fa-star"></i> <span class="rating-star">2</span></button>
                    <button class="btn btn-sm btn-rating"><i class="fas fa-star"></i> <span class="rating-star">1</span></button>
                    <div class="review-item mt-4">
                        <div class="review-item-head">
                            <div class="review-item-head-content">
                                <img src="<?= base_url() ?>/img/rating_5.png" alt="" class="img-rating-star">
                                <h5 class="h5 title-rating">Barang Bagus Banget!</h5>
                                <small class="time-rating">Ditulis 27 Desember 202</small>
                                <p class="text-rating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima assumenda voluptas magnam animi rem a quis, similique eos at quidem dolorum reprehenderit est id iste in, blanditiis ipsam quae fugiat?</p>
                            </div>
                            <div class="testi-image">
                                <img src="<?= base_url() ?>/img/produk/anggur.jpg" alt="" class="img-testi">
                            </div>
                        </div>
                        <div class="review-item-user">
                            <img src="<?= base_url() ?>/img/user.jpg" alt="" class="review-user">
                            <span class="ml-1">Dede</span>
                        </div>
                        <hr>
                    </div>
                    <div class="review-item mt-4">
                        <div class="review-item-head">
                            <div class="review-item-head-content">
                                <img src="<?= base_url() ?>/img/rating_4.png" alt="" class="img-rating-star">
                                <h5 class="h5 title-rating">Barang Bagus Banget!</h5>
                                <small class="time-rating">Ditulis 27 Desember 202</small>
                                <p class="text-rating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima assumenda voluptas magnam animi rem a quis, similique eos at quidem dolorum reprehenderit est id iste in, blanditiis ipsam quae fugiat?</p>
                            </div>
                            <div class="testi-image">
                                <img src="<?= base_url() ?>/img/produk/anggur.jpg" alt="" class="img-testi">
                            </div>
                        </div>
                        <div class="review-item-user">
                            <img src="<?= base_url() ?>/img/user.jpg" alt="" class="review-user">
                            <span class="ml-1">Dede</span>
                        </div>
                        <hr>
                    </div>
                    <div class="review-item mt-4">
                        <div class="review-item-head">
                            <div class="review-item-head-content">
                                <img src="<?= base_url() ?>/img/rating_3.png" alt="" class="img-rating-star">
                                <h5 class="h5 title-rating">Barang Bagus Banget!</h5>
                                <small class="time-rating">Ditulis 27 Desember 202</small>
                                <p class="text-rating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima assumenda voluptas magnam animi rem a quis, similique eos at quidem dolorum reprehenderit est id iste in, blanditiis ipsam quae fugiat?</p>
                            </div>
                            <div class="testi-image">
                                <img src="<?= base_url() ?>/img/anggur.jpg" alt="" class="img-testi">
                            </div>
                        </div>
                        <div class="review-item-user">
                            <img src="<?= base_url() ?>/img/user.jpg" alt="" class="review-user">
                            <span class="ml-1">Dede</span>
                        </div>
                        <hr>
                    </div>
                    <div class="review-item mt-4">
                        <div class="review-item-head">
                            <div class="review-item-head-content">
                                <img src="<?= base_url() ?>/img/rating_2.png" alt="" class="img-rating-star">
                                <h5 class="h5 title-rating">Barang Bagus Banget!</h5>
                                <small class="time-rating">Ditulis 27 Desember 202</small>
                                <p class="text-rating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima assumenda voluptas magnam animi rem a quis, similique eos at quidem dolorum reprehenderit est id iste in, blanditiis ipsam quae fugiat?</p>
                            </div>
                            <div class="testi-image">
                                <img src="<?= base_url() ?>/img/produk/anggur.jpg" alt="" class="img-testi">
                            </div>
                        </div>
                        <div class="review-item-user">
                            <img src="<?= base_url() ?>/img/user.jpg" alt="" class="review-user">
                            <span class="ml-1">Dede</span>
                        </div>
                        <hr>
                    </div>
                    <div class="review-item mt-4">
                        <div class="review-item-head">
                            <div class="review-item-head-content">
                                <img src="<?= base_url() ?>/img/rating_1.png" alt="" class="img-rating-star">
                                <h5 class="h5 title-rating">Barang Bagus Banget!</h5>
                                <small class="time-rating">Ditulis 27 Desember 202</small>
                                <p class="text-rating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima assumenda voluptas magnam animi rem a quis, similique eos at quidem dolorum reprehenderit est id iste in, blanditiis ipsam quae fugiat?</p>
                            </div>
                            <div class="testi-image">
                                <img src="<?= base_url() ?>/img/produk/anggur.jpg" alt="" class="img-testi">
                            </div>
                        </div>
                        <div class="review-item-user">
                            <img src="<?= base_url() ?>/img/user.jpg" alt="" class="review-user">
                            <span class="ml-1">Dede</span>
                        </div>
                        <hr>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terkait -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2 text-gray-900 font-weight-bold header-product h2-border">
                    Produk Terkait
                </h2>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 mt-5">
                        <div class="card">
                            <span class="diskon">
                                <div class="label-diskon bg-danger">
                                    -25%
                                </div>
                            </span>
                            <span class="like">
                                <div class="label-like">
                                    <i class="far fa-heart"></i>
                                </div>
                            </span>
                            <div class="img-wrap">
                                <img class="card-img" src="<?= base_url() ?>/img/produk/anggur.jpg" alt="Vans">
                            </div>
                            <a href="#" class="link-product">
                                <div class="card-body">
                                    <h4 class="card-title">Buah Anggur 1 Kg</h4>
                                    <h4 class="card-price">Rp 60.000</h4>
                                    <h4 class="card-real-price">Rp 100.000</h4>
                                    <div class="buy d-flex justify-content-between align-items-center">
                                        <div class="rating-product mt-2">
                                            <i class="far fa-star"></i>
                                            4.5
                                        </div>
                                        <a href="#" class="btn btn-sm btn-buy mt-2"><i class="fas fa-shopping-cart"></i> Beli</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mt-5">
                        <div class="card">
                            <span class="diskon">
                                <div class="label-diskon bg-danger">
                                    -35%
                                </div>
                            </span>
                            <span class="like">
                                <div class="label-like">
                                    <i class="far fa-heart"></i>
                                </div>
                            </span>
                            <div class="img-wrap">
                                <img class="card-img" src="<?= base_url() ?>/img/produk/pisang.jpg" alt="Vans">
                            </div>
                            <a href="#" class="link-product">
                                <div class="card-body">
                                    <h4 class="card-title">Buah Pisang 1 Kg</h4>
                                    <h4 class="card-price">Rp 70.000</h4>
                                    <h4 class="card-real-price">Rp 120.000</h4>
                                    <div class="buy d-flex justify-content-between align-items-center">
                                        <div class="rating-product mt-2">
                                            <i class="far fa-star"></i>
                                            4.5
                                        </div>
                                        <a href="#" class="btn btn-sm btn-buy mt-2"><i class="fas fa-shopping-cart"></i> Beli</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mt-5">
                        <div class="card">
                            <span class="diskon">
                                <div class="label-diskon bg-danger">
                                    -15%
                                </div>
                            </span>
                            <span class="like">
                                <div class="label-like">
                                    <i class="far fa-heart"></i>
                                </div>
                            </span>
                            <div class="img-wrap">
                                <img class="card-img" src="<?= base_url() ?>/img/produk/kedondong.jpg" alt="Vans">
                            </div>
                            <a href="#" class="link-product">
                                <div class="card-body">
                                    <h4 class="card-title">Buah kedondong 1 Kg</h4>
                                    <h4 class="card-price">Rp 50.000</h4>
                                    <h4 class="card-real-price">Rp 100.000</h4>
                                    <div class="buy d-flex justify-content-between align-items-center">
                                        <div class="rating-product mt-2">
                                            <i class="far fa-star"></i>
                                            4.5
                                        </div>
                                        <a href="#" class="btn btn-sm btn-buy mt-2"><i class="fas fa-shopping-cart"></i> Beli</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mt-5">
                        <div class="card">
                            <span class="diskon">
                                <div class="label-diskon bg-danger">
                                    -25%
                                </div>
                            </span>
                            <span class="like">
                                <div class="label-like">
                                    <i class="far fa-heart"></i>
                                </div>
                            </span>
                            <div class="img-wrap">
                                <img class="card-img" src="<?= base_url() ?>/img/produk/apel.jpg" alt="Vans">
                            </div>
                            <a href="#" class="link-product">
                                <div class="card-body">
                                    <h4 class="card-title">Buah Apel 1 Kg</h4>
                                    <h4 class="card-price">Rp 80.000</h4>
                                    <h4 class="card-real-price">Rp 100.000</h4>
                                    <div class="buy d-flex justify-content-between align-items-center">
                                        <div class="rating-product mt-2">
                                            <i class="far fa-star"></i>
                                            4.5
                                        </div>
                                        <a href="#" class="btn btn-sm btn-buy mt-2"><i class="fas fa-shopping-cart"></i> Beli</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-view btn-user mt-4">
                        Lihat Semua
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?= view('themes/front/footer') ?>

    <script>
        $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 4,
                pauseOnHover: true,
                slideMargin: 20,
                speed: 500,
                controls: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        })
    </script>
</body>

</html>