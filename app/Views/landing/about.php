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
                <h1 class="text-white">
                    Tentang Kami
                </h1>
                <p class="text-white link-nav"><a href="<?= base_url() ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="<?= route_to('landing.about') ?>"> <b>Tentang Kami</b></a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="about-info-area section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 info-left">
                <img class="img-fluid" src="img/about.jpg" alt="Tentang Kami">
            </div>
            <div class="col-lg-6 info-right">
                <h6>Tentang Kami</h6>
                <h1>Siapa kami?</h1>
                <p>
                    Kayangan Harbor hadir sebagai solusi pemesanan tiket kapal terintegrasi pertama di Indonesia Timur. Sejak 2015, kami telah menghubungkan lebih dari 500.000 penumpang dengan berbagai destinasi bahari eksotis melalui jaringan pelayaran terluas di kawasan ini.
                </p>
                <p>
                    Dengan teknologi booking real-time dan sistem keamanan berlapis, kami menjamin setiap transaksi Anda aman dan transparan. Tim profesional kami siap membantu 24/7 untuk memastikan perjalanan laut Anda berjalan lancar dari pemesanan hingga kedatangan.
                </p>
                <p>
                    Komitmen kami bukan sekadar menjual tiket, tetapi menciptakan pengalaman berlayar yang tak terlupakan dengan standar pelayanan tertinggi dan harga kompetitif.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End about-info Area -->

<!-- Start other-issue Area -->
<section class="other-issue-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10">Layanan tambahan untuk perjalanan anda</h1>
                    <p>Nikmati kemudahan lengkap untuk perjalan bahari anda bersama Kayangan Harbor</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-other-issue">
                    <div class="thumb">
                        <img class="img-fluid" src="img/rent-vehicle.jpg" alt="Sewa Kendaraan">
                    </div>
                    <a href="#">
                        <h4>Rental Kendaraan</h4>
                    </a>
                    <p>
                        Sewa mobil atau motor untuk menjelajahi Sumbawa dengan lebih leluasa setelah tiba di pelabuhan.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-other-issue">
                    <div class="thumb">
                        <img class="img-fluid" src="img/tour-package.jpg" alt="Paket Wisata">
                    </div>
                    <a href="#">
                        <h4>Paket Wisata</h4>
                    </a>
                    <p>
                        Nikmati paket wisata terbaik ke destinasi populer Sumbawa dengan harga spesial termasuk akomodasi.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-other-issue">
                    <div class="thumb">
                        <img class="img-fluid" src="img/hotel-book.jpg" alt="Pesan Hotel">
                    </div>
                    <a href="#">
                        <h4>Booking Hotel</h4>
                    </a>
                    <p>
                        Temukan penginapan terbaik dekat pelabuhan dengan harga kompetitif untuk kenyamanan Anda.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-other-issue">
                    <div class="thumb">
                        <img class="img-fluid" src="img/tour-guide.jpg" alt="Pemandi Wisata">
                    </div>
                    <a href="#">
                        <h4>Pemandu Wisata</h4>
                    </a>
                    <p>
                        Dapatkan pemandu lokal berpengalaman untuk menemani petualangan Anda di Sumbawa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End other-issue Area -->
<?= $this->endSection(); ?>