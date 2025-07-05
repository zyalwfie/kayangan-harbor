<?= $this->extend('layouts/landing/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <a href="<?= route_to('landing.tickets') ?>" class="btn btn-outline-warning btn-lg mr-3">Lanjut beli</a>
                <a href="<?= route_to('dashboard.user.orders.index') ?>" class="btn btn-warning btn-lg">Cek pesanan</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Content -->
<section class="hot-deal-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70">
                <div class="title text-center">
                    <div class="display-3 mb-2">
                        <i class="bi bi-bag-check-fill"></i>
                    </div>
                    <h1 class="mb-10"><?= session()->has('success') ? session('success') : 'Silahkan Cek Kembali Pesanan Anda' ?></h1>
                    <p>Terima kasih, pesanan kamu sedang diproses.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        confetti({
            particleCount: 120,
            spread: 80,
            origin: {
                y: 0.6
            },
            colors: ['#f8b600', '#ffd966', '#ffce5a', '#f7c873'],
        });
        $('.toast').toast({
            delay: 4000
        });
        $('.toast').toast('show');
    });
</script>
<?= $this->endSection(); ?>