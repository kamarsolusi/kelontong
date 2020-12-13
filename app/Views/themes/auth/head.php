<?php $request = \Config\Services::request(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('img/LogoKelontong.png') ?>" type="image/x-icon">

    <title><?= isset($title) ? $title : 'Kelontong' ?></title>

    <link href="<?= base_url() ?>/themes/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/themes/assets/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/themes/assets/css/style.css" rel="stylesheet">

    <?= $this->renderSection('custom_css') ?>
</head>