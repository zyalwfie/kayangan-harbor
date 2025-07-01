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
                    Tiket
                </h1>
                <p class="text-white link-nav"><a href="<?= base_url() ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="packages.html"> <b>Tiket</b></a></p>
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
        <div class="row d-flex pb-50 justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Tiket</h1>
                    <p>Dapatkan harga spesial dan konfirmasi instan untuk semua rute pelayaran Kayangan Harbor.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if (session()->has('error')) : ?>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> <?= session('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12 d-flex flex-column flex-lg-row justify-content-lg-between align-items-start align-items-lg-end">
                <div class="form-group m-0 w-100">
                    <form method="get" class="d-flex align-items-end gap-2">
                        <div class="mr-2">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Cari tiket di sini">
                        </div>
                        <button class="btn btn-warning"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right"></i></a></li>
                    </ul>
                </nav>
            </div>
            <?php foreach ($tickets as $ticket) : ?>
                <div class="col-lg-4">
                    <div class="single-destinations">
                        <div class="thumb">
                            <img src="img/ticket/<?= $ticket->gambar ?>" alt="<?= $ticket->gambar ?>">
                        </div>
                        <div class="details">
                            <h4>Tujuan <?= $ticket->pelabuhan_tujuan ?></h4>
                            <p>Jenis pengguna jasa, <b><?= $ticket->jenisPenggunaJasa ?></b></p>
                            <button type="button" class="btn btn-secondary" disabled data-toggle="tooltip" data-placement="right" title="<?= $ticket->golonganKendaraan ? $ticket->deskripsiGolonganKendaraan : 'Tidak ada golongan kendaraan' ?>"><b><?= $ticket->golonganKendaraan ? $ticket->golonganKendaraan : 'Golongan 0' ?></b></button>
                            <ul class="package-list">
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Durasi</span>
                                    <span>± 1 jam 30 menit</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Tanggal Tersedia</span>
                                    <?php
                                    $formatter = new \IntlDateFormatter('id_ID', \IntlDateFormatter::NONE, \IntlDateFormatter::NONE, null, null, "MMMM d, yyyy");
                                    ?>
                                    <span><?= $formatter->format(new DateTime($ticket->jadwal_tiket_tersedia)); ?></span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Tanggal Habis</span>
                                    <span><?= $formatter->format(new DateTime($ticket->jadwal_tiket_tersedia)); ?></span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Tersisa</span>
                                    <span><?= $ticket->stok ?></span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Harga Perorang</span>
                                    <span class="price-btn">Rp<?= number_format($ticket->harga, '0', '.', ',') ?></span>
                                </li>
                                <li>
                                    <?php if (logged_in()) : ?>
                                        <button class="btn btn-outline-warning w-100 showOrderModalBtn" type="button" data-toggle="modal" data-target="#orderModal" data-id_tiket="<?= $ticket->id ?>" data-pelabuhan_asal="<?= $ticket->pelabuhan_asal ?>" data-pelabuhan_tujuan="<?= $ticket->pelabuhan_tujuan ?>" data-harga="<?= $ticket->harga ?>" id="<?= 'show-' . $ticket->id ?>">Pesan Sekarang</button>
                                    <?php else : ?>
                                        <a href="<?= url_to('login') ?>" class="btn btn-outline-warning w-100">Masuk Untuk Pesan</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Rincian Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open(route_to('order.store')) ?>
            <?= csrf_field() ?>

            <input type="hidden" name="id_tiket" id="id_tiket">
            <input type="hidden" name="pelabuhan_asal" id="pelabuhan_asal">
            <input type="hidden" name="pelabuhan_tujuan" id="pelabuhan_tujuan">
            <input type="hidden" name="total_harga" id="total_harga">

            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pelabuhan_asal" class="form-label">Pelabuhan asal</label>
                        <input type="email" class="form-control" id="pratinjau_pelabuhan_asal" disabled name="pelabuhan_asal">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pelabuhan_tujuan" class="form-label">Pelabuhan tujuan</label>
                        <input type="text" class="form-control" id="pratinjau_pelabuhan_tujuan" disabled name="pelabuhan_tujuan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_pemesan" class="form-label">Nama pemesan</label>
                    <input type="text" class="form-control" id="nama_pemesan" placeholder="Tulis namamu di sini" name="nama_pemesan" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jumlah_penumpang" class="form-label">Jumlah penumpang</label>
                        <input type="number" class="form-control" id="jumlah_penumpang" placeholder="0" name="jumlah_penumpang" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="total_harga" class="form-label">Total harga</label>
                        <input type="text" class="form-control" id="pratinjau_total_harga" disabled>
                    </div>
                </div>
                <select class="custom-select mb-4" name="jadwal_masuk" required>
                    <option selected>Pilih jadwal masuk</option>
                    <option value="06.00 WITA">06.00 WITA</option>
                    <option value="08.00 WITA">08.00 WITA</option>
                    <option value="10.00 WITA">10.00 WITA</option>
                    <option value="12.45 WITA">12.45 WITA</option>
                    <option value="14.30 WITA">14.30 WITA</option>
                    <option value="15.45 WITA">15.45 WITA</option>
                    <option value="17.45 WITA">17.45 WITA</option>
                    <option value="21.00 WITA">21.00 WITA</option>
                </select>
                <div class="d-flex flex-column">
                    <p class="mb-2">Transfer ke sini</p>
                    <div class="d-flex align-items-center">
                        <img src="<?= base_url() ?>img/bank/bca.svg" alt="Bank BCA Logo" width="100" class="mr-3">
                        <div>
                            <h4 class="mb-0">1281202</h4>
                            <p class="mb-0">a/n Zaerin</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Buat Pesanan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Soon Modal -->
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

<?= $this->section('head_css'); ?>
<style>
    .page-link {
        color: #f8b600 !important;
    }

    .page-link:hover {
        color: #ffce3a !important;
    }

    .page-link:focus {
        box-shadow: 0 0 0 .2rem rgba(248, 182, 0, .25) !important;
    }

    .page-item.active .page-link {
        background-color: #f8b600 !important;
        border-color: #f8b600 !important;
        color: #fff !important;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script>
    const ticketId = document.querySelector('#id_tiket');
    const homeInput = document.querySelector('#pelabuhan_asal');
    const awayInput = document.querySelector('#pelabuhan_tujuan');
    const price = document.querySelector('#total_harga');
    const previewHomeInput = document.querySelector('#pratinjau_pelabuhan_asal');
    const previewAwayInput = document.querySelector('#pratinjau_pelabuhan_tujuan');
    const previewPrice = document.querySelector('#pratinjau_total_harga');
    const passangerInput = document.querySelector('#jumlah_penumpang');
    const showModalBtn = document.querySelectorAll('.showOrderModalBtn');

    let originalPrice = 0;

    showModalBtn.forEach(item => {
        item.addEventListener('click', function() {
            ticketId.value = this.dataset.id_tiket;
            homeInput.value = this.dataset.pelabuhan_asal;
            awayInput.value = this.dataset.pelabuhan_tujuan;
            previewHomeInput.value = this.dataset.pelabuhan_asal;
            previewAwayInput.value = this.dataset.pelabuhan_tujuan;
            originalPrice = Number(this.dataset.harga);
            price.value = this.dataset.total_harga;
            previewPrice.value = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0,
                minimumFractionDigits: 0
            }).format(originalPrice).replace(/\s+/g, '');
        })
    });

    passangerInput.addEventListener('change', function() {
        const totalPrice = originalPrice * Number(passangerInput.value || 1);
        price.value = totalPrice;
        previewPrice.value = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0,
            minimumFractionDigits: 0
        }).format(totalPrice).replace(/\s+/g, '');
    });
</script>
<?= $this->endSection(); ?>