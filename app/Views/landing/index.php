<?= $this->extend('layouts/landing/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- start banner Area -->
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-between">
            <div class="col-12 banner-left">
                <h6 class="text-white">Mulai petualangan bahari anda</h6>
                <h1 class="text-white">Kayangan Harbor</h1>
                <p class="text-white">
                    Temukan kemudahan memesan tiket kapal secara online dengan harga terbaik. Jelajahi keindahan destinasi pelabuhan di Sumbawa dengan layanan kami yang cepat, aman, dan terpercaya.
                </p>
                <a href="<?= route_to('landing.tickets') ?>" class="primary-btn text-uppercase">Cari Tiket</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start popular-destination Area -->
<section class="popular-destination-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Destinasi Populer Sumbawa</h1>
                    <p>Jelajahi keindahan alam Sumbawa yang memukau dengan tiket kapal mudah melalui Kayangan Harbor.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-destination relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="img/moyo-waterfall.jpg" alt="Pulau Moyo">
                    </div>
                    <div class="desc">
                        <a href="#" class="price-btn">Rp250,000</a>
                        <h4>Pulau Moyo</h4>
                        <p>Air Terjun Mata Jitu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destination relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="img/lakey-island.jpg" alt="Pulau Lakey">
                    </div>
                    <div class="desc">
                        <a href="#" class="price-btn">Rp180,000</a>
                        <h4>Pantai Lakey</h4>
                        <p>Surga Peselancar</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destination relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="img/tambora-mount.jpg" alt="Gunung Tambora">
                    </div>
                    <div class="desc">
                        <a href="#" class="price-btn">Rp150,000</a>
                        <h4>Gunung Tambora</h4>
                        <p>Kaldera Tengah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End popular-destination Area -->

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

<!-- Start home-about Area -->
<section class="home-about-area">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-end">
            <div class="col-lg-6 col-md-12 home-about-left">
                <h1>
                    Rute Tidak Ditemukan? <br>
                    Pesan Khusus Saja
                </h1>
                <p>
                    Kayangan Harbor memahami setiap perjalanan memiliki kebutuhan khusus. Jika Anda tidak menemukan rute pelayaran yang sesuai atau membutuhkan penyesuaian jadwal, tim kami siap memberikan solusi terbaik untuk perjalanan bahari Anda.
                </p>
                <button class="primary-btn text-uppercase" type="button" data-toggle="modal" data-target="#soon">permintaan rute khusus</button>
            </div>
            <div class="col-lg-6 col-md-12 home-about-right no-padding">
                <img class="img-fluid" src="img/customer-service.jpg" alt="Pusat Layanan">
            </div>
        </div>
    </div>
</section>
<!-- End home-about Area -->

<!-- Modal -->
<div class="modal fade" id="soon" tabindex="-1" aria-labelledby="soonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="soonLabel">Fitur belum tersedia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Fitur ini sedang dalam proses pengembangan
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>