<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('img/LogoKelontong.png') ?>" type="image/x-icon">

    <title><?= isset($title) ? $title : 'Kelontong' ?></title>

    <link href="<?= base_url() ?>/themes/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="<?= base_url() ?>/themes/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/themes/assets/css/owl.theme.default.css" rel="stylesheet">
    <link href="<?= base_url() ?>/themes/assets/css/main.css" rel="stylesheet">

    <script src="<?= base_url() ?>/themes/assets/js/jquery.min.js" rel="stylesheet"></script>
    <script src="<?= base_url() ?>/themes/assets/js/bootstrap.bundle.min.js" rel="stylesheet"></script>
    <script src="<?= base_url() ?>/themes/assets/js/bootstrap.min.js" rel="stylesheet"></script>
    <script src="<?= base_url() ?>/themes/assets/js/jquery.easing.min.js" rel="stylesheet"></script>
    <script src="<?= base_url() ?>/themes/assets/js/owl.carousel.js" rel="stylesheet"></script>
    <script src="<?= base_url() ?>/themes/assets/js/owl.carousel.min.js" rel="stylesheet"></script>
    <script src="<?= base_url() ?>/themes/assets/js/style.js" rel="stylesheet"></script>

    <?= $this->renderSection('custom_css') ?>
</head>