<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Kayangan Harbor">
    <meta name="description" content="Kayangan Harbor - Platform pemesanan tiket kapal cepat dan ferry terpercaya. Pesan tiket perjalanan Anda dengan mudah, aman, dan harga terbaik ke berbagai destinasi pelabuhan.">
    <meta name="keywords" content="tiket kapal, tiket ferry, pesan tiket online, Kayangan Harbor, tiket pelabuhan, tiket perjalanan laut, booking tiket kapal, tiket cepat, pelabuhan Indonesia">
    <meta charset="UTF-8">

    <title><?= $this->renderSection('page_title', true); ?></title>

    <?= $this->include('layouts/landing/partials/head_links.php'); ?>
    <?= $this->renderSection('head_css'); ?>
</head>

<body>
    <?= $this->include('layouts/landing/partials/header.php'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('layouts/landing/partials/footer.php'); ?>

    <?= $this->include('layouts/landing/partials/scripts.php'); ?>
    <?= $this->renderSection('foot_js'); ?>
</body>

</html>