<?= $this->extend('layouts/landing/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

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
                    Tiket
                </h1>
                <p class="text-white link-nav"><a href="<?= base_url() ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="packages.html"> Tiket</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start hot-deal Area -->
<section class="hot-deal-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Rekomendasi Penginapan</h1>
                    <p>Temukan akomodasi terbaik dekat pelabuhan dengan fasilitas lengkap dan harga spesial untuk kenyamanan perjalanan Anda.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 active-hot-deal-carusel">
                <div class="single-carusel">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="img/samawa.jpg" alt="Samawa Transit Hotel">
                    </div>
                    <div class="price-detials">
                        <a href="https://api.whatsapp.com/send/?phone=6282342266222" class="price-btn"><i class="fa fa-phone mr-1"></i> Hubungi Kami</a>
                    </div>
                    <div class="details">
                        <h4 class="text-white">Samawa Transit Hotel</h4>
                        <p class="text-white">
                            Lempeh, Sumbawa
                        </p>
                    </div>
                </div>
                <div class="single-carusel">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="img/kaloka.jpg" alt="Kaloka Airport Hotel">
                    </div>
                    <div class="price-detials">
                        <a href="https://api.whatsapp.com/send/?phone=03712620444" class="price-btn"><i class="fa fa-phone mr-1"></i> Hubungi Kami</a>
                    </div>
                    <div class="details">
                        <h4 class="text-white">Kaloka Airport Hotel</h4>
                        <p class="text-white">
                            Lempeh, Sumbawa
                        </p>
                    </div>
                </div>
                <div class="single-carusel">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="img/samota.jpg" alt="Hotel Grand Samota">
                    </div>
                    <div class="price-detials">
                        <a href="https://api.whatsapp.com/send/?phone=6287718283888" class="price-btn"><i class="fa fa-phone mr-1"></i> Hubungi Kami</a>
                    </div>
                    <div class="details">
                        <h4 class="text-white">Hotel Grand Samota</h4>
                        <p class="text-white">
                            Labuan Sumbawa, Sumbawa
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End hot-deal Area -->

<!-- Start destinations Area -->
<section class="destinations-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Tiket</h1>
                    <p>Dapatkan harga spesial dan konfirmasi instan untuk semua rute pelayaran Kayangan Harbor.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-destinations">
                    <div class="thumb">
                        <img src="d1.jpg" alt="">
                    </div>
                    <div class="details">
                        <h4>Holiday Sea beach Blue Ocean</h4>
                        <p>
                            United staes of America
                        </p>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Duration</span>
                                <span>06 days and 7 nights</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Date</span>
                                <span>18.04.2018</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Airport</span>
                                <span>Changi</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Extras</span>
                                <span>All Inclusive</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price per person</span>
                                <a href="#" class="price-btn">$250</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destinations">
                    <div class="thumb">
                        <img src="img/packages/d2.jpg" alt="">
                    </div>
                    <div class="details">
                        <h4>Holiday Sea beach Blue Ocean</h4>
                        <p>
                            United staes of America
                        </p>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Duration</span>
                                <span>06 days and 7 nights</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Date</span>
                                <span>18.04.2018</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Airport</span>
                                <span>Changi</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Extras</span>
                                <span>All Inclusive</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price per person</span>
                                <a href="#" class="price-btn">$250</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destinations">
                    <div class="thumb">
                        <img src="img/packages/d3.jpg" alt="">
                    </div>
                    <div class="details">
                        <h4>Holiday Sea beach Blue Ocean</h4>
                        <p>
                            United staes of America
                        </p>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Duration</span>
                                <span>06 days and 7 nights</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Date</span>
                                <span>18.04.2018</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Airport</span>
                                <span>Changi</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Extras</span>
                                <span>All Inclusive</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price per person</span>
                                <a href="#" class="price-btn">$250</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destinations">
                    <div class="thumb">
                        <img src="img/packages/d4.jpg" alt="">
                    </div>
                    <div class="details">
                        <h4>Holiday Sea beach Blue Ocean</h4>
                        <p>
                            United staes of America
                        </p>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Duration</span>
                                <span>06 days and 7 nights</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Date</span>
                                <span>18.04.2018</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Airport</span>
                                <span>Changi</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Extras</span>
                                <span>All Inclusive</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price per person</span>
                                <a href="#" class="price-btn">$250</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destinations">
                    <div class="thumb">
                        <img src="img/packages/d5.jpg" alt="">
                    </div>
                    <div class="details">
                        <h4>Holiday Sea beach Blue Ocean</h4>
                        <p>
                            United staes of America
                        </p>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Duration</span>
                                <span>06 days and 7 nights</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Date</span>
                                <span>18.04.2018</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Airport</span>
                                <span>Changi</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Extras</span>
                                <span>All Inclusive</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price per person</span>
                                <a href="#" class="price-btn">$250</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destinations">
                    <div class="thumb">
                        <img src="img/packages/d6.jpg" alt="">
                    </div>
                    <div class="details">
                        <h4>Holiday Sea beach Blue Ocean</h4>
                        <p>
                            United staes of America
                        </p>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Duration</span>
                                <span>06 days and 7 nights</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Date</span>
                                <span>18.04.2018</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Airport</span>
                                <span>Changi</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Extras</span>
                                <span>All Inclusive</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Price per person</span>
                                <a href="#" class="price-btn">$250</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End destinations Area -->

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