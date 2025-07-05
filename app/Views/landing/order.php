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
                <p class="text-white link-nav"><a href="<?= base_url() ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="<?= route_to('landing.tickets') ?>"> Tiket</a> <span class="lnr lnr-arrow-right"></span> <a href="<?= route_to('landing.tickets.order.index') ?>"><b>Pesanan</b></a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start detail order -->
<section class="hot-deal-area section-gap">
    <div class="container">
        <div class="row d-flex flex-column justify-content-center">
            <div class="menu-content pb-70">
                <div class="title text-center">
                    <h1 class="mb-10">Rincian Pemesanan</h1>
                    <p>Informasi kelengkapan tiket yang anda pesan.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-between align-items-start">
            <div class="col-lg-5 preview-image mb-3">
                <img src="<?= base_url() ?>img/ticket/<?= $order->gambar ?>" alt="Tiket" style="width: 100%;">
            </div>
            <div class="col-lg-7 row mb-4">
                <div class="col-12 mb-3 row">
                    <div class="col-6 d-flex flex-column">
                        <span class="mb-1"><i class="bi bi-arrow-left-circle-fill"></i> Pelabuhan asal</span>
                        <h4><?= $order->pelabuhan_asal ?></h4>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <span class="mb-1"><i class="bi bi-arrow-right-circle-fill"></i> Pelabuhan tujuan</span>
                        <h4><?= $order->pelabuhan_tujuan ?></h4>
                    </div>
                </div>
                <div class="col-12 row mb-3">
                    <div class="col-6 d-flex flex-column">
                        <span class="mb-1"><i class="bi bi-people-fill"></i> Jumlah penumpang</span>
                        <h4>4</h4>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <span class="mb-1"><i class="bi bi-alarm-fill"></i> Jadwal masuk</span>
                        <h4>08.00 WITA</h4>
                    </div>
                </div>
                <div class="col-12 row mb-3">
                    <div class="col-lg-6 d-flex flex-column mb-3">
                        <span class="mb-1"><i class="bi bi-wallet-fill"></i> Total harga</span>
                        <h4>Rp20,000</h4>
                    </div>
                    <div class="col-lg-6 d-flex flex-column">
                        <?php if ($order->jenis === 'Kendaraan') : ?>
                            <span class="mb-1"><i class="bi bi-car-front-fill"></i> Jenis pengguna jasa</span>
                        <?php else : ?>
                            <span class="mb-1"><i class="bi bi-luggage-fill"></i> Jenis pengguna jasa</span>
                        <?php endif; ?>
                        <h4><?= $order->jenis ?></h4>
                    </div>
                </div>
                <?php if ($order->golongan !== null) : ?>
                    <div class="col-12 mb-3 d-flex flex-column">
                        <span class="mb-1"><i class="bi bi-collection-fill"></i> Golongan kendaraan</span>
                        <h4><?= $order->golongan ?></h4>
                        <small><?= $order->deskripsi_golongan_kendaraan ?></small>
                    </div>
                <?php endif; ?>
                <div class="col-12 mb-3 row">
                    <div class="col-lg-6 d-flex flex-column mb-3">
                        <span class="mb-1"><i class="bi bi-ticket-fill"></i> Status tiket</span>
                        <h4><span class="badge bg-warning text-white">Tertunda</span></h4>
                    </div>
                    <div class="col-lg-6 d-flex flex-column">
                        <?php if ($order->bukti_pembayaran !== null) : ?>
                            <span class="mb-1"><i class="bi bi-file-earmark-arrow-up-fill"></i> Status pembayaran</span>
                            <h4>
                                <span class="badge bg-primary text-white">Bukti sudah diunggah</span>
                                <span class="badge bg-primary text-white" id="view-proof-btn" style="cursor:pointer;"><i class="bi bi-eye"></i></span>
                                <div id="proof-image-container" style="position: absolute; transform: translateY(1rem); opacity: 0;">
                                    <?php
                                    $ext = pathinfo($order->bukti_pembayaran, PATHINFO_EXTENSION);
                                    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png'])): ?>
                                        <img src="<?= base_url('img/ticket/proof/' . $order->bukti_pembayaran) ?>" alt="Bukti Pembayaran" width="100" />
                                    <?php endif; ?>
                                </div>
                            </h4>
                        <?php else : ?>
                            <span class="mb-1"><i class="bi bi-file-earmark-arrow-up-fill"></i> Status pembayaran</span>
                            <h4><span>Belum diunggah</span></h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-column align-items-start">

                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> <?= session('error') ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($order->bukti_pembayaran !== null) : ?>
                    <?= form_open_multipart(route_to('payment.upload')) ?>
                    <?= csrf_field() ?>

                    <input type="hidden" name="id_pesanan" value="<?= $order->id ?>">

                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <h5>Perbarui bukti pembayaran</h5>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= session('errors.bukti_pembayaran') ? 'is-invalid' : '' ?>" id="customFileLangHTML" name="bukti_pembayaran" accept=".jpg,.jpeg,.png,.pdf">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="Pilih file">Belum ada file terpilih</label>
                            <div class="invalid-feedback">
                                <?= session('errors.bukti_pembayaran') ?>
                            </div>
                        </div>
                        <div id="file-preview" class="mt-3"></div>
                    </div>
                    <div class="d-flex">
                        <a href="<?= route_to('landing.tickets') ?>" class="btn btn-outline-warning mr-2" id="btn-lanjut-beli">Lanjut beli</a>
                        <button type="submit" class="btn btn-warning">Perbarui</button>
                    </div>
                    <?= form_close() ?>
                <?php else : ?>
                    <?= form_open_multipart(route_to('payment.upload')) ?>
                    <?= csrf_field() ?>

                    <input type="hidden" name="id_pesanan" value="<?= $order->id ?>">

                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <h5>Unggah bukti pembayaran</h5>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= session('errors.bukti_pembayaran') ? 'is-invalid' : '' ?>" id="customFileLangHTML" name="bukti_pembayaran" accept=".jpg,.jpeg,.png,.pdf">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="Pilih file">Belum ada file terpilih</label>
                            <div class="invalid-feedback">
                                <?= session('errors.bukti_pembayaran') ?>
                            </div>
                        </div>
                        <div id="file-preview" class="mt-3"></div>
                    </div>
                    <div class="d-flex">
                        <a href="<?= route_to('order.thanks') ?>" class="btn btn-outline-warning mr-2">Lakukan nanti</a>
                        <button type="submit" class="btn btn-warning">Unggah</button>
                    </div>
                    <?= form_close() ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End detail order -->
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<!-- Viewer JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.7/viewer.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.7/viewer.min.js"></script>

<script>
    bsCustomFileInput.init();
    let viewer = null;
    document.getElementById('customFileLangHTML').addEventListener('change', function(e) {
        const preview = document.getElementById('file-preview');
        preview.innerHTML = '';
        const fileInput = e.target;
        const file = fileInput.files[0];
        const label = fileInput.nextElementSibling;
        if (!file) {
            label.textContent = 'Belum ada file terpilih';
            return;
        }
        const fileType = file.type;
        if (fileType.startsWith('image/')) {
            label.textContent = file.name;
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.maxWidth = '200px';
            img.style.maxHeight = '200px';
            img.className = 'img-thumbnail';
            img.setAttribute('data-original', img.src);
            img.style.cursor = 'pointer';
            preview.appendChild(img);
            if (viewer) {
                viewer.destroy();
            }
            viewer = new Viewer(preview, {
                navbar: false,
                toolbar: true,
                hidden() {
                    viewer.destroy();
                    viewer = null;
                }
            });
        } else if (fileType === 'application/pdf') {
            label.textContent = 'PDF';
            const pdfIcon = document.createElement('span');
            pdfIcon.innerHTML = '<i class="bi bi-file-earmark-pdf-fill align-middle" style="font-size:1.25rem;color:#d9534f;"></i> ' + file.name;
            preview.appendChild(pdfIcon);
            if (viewer) {
                viewer.destroy();
                viewer = null;
            }
        } else {
            label.textContent = file.name;
            preview.textContent = 'File tidak dapat dipreview.';
            if (viewer) {
                viewer.destroy();
                viewer = null;
            }
        }

        // Disable the 'Lanjut beli' button when file input changes
        const lanjutBtn = document.getElementById('btn-lanjut-beli');
        if (lanjutBtn) {
            lanjutBtn.classList.add('disabled');
            lanjutBtn.setAttribute('tabindex', '-1');
            lanjutBtn.setAttribute('aria-disabled', 'true');
            lanjutBtn.onclick = function(e) { e.preventDefault(); };
        }
    });

    const viewProofBtn = document.getElementById('view-proof-btn');
    const proofImageContainer = document.getElementById('proof-image-container');
    if (viewProofBtn && proofImageContainer) {
        viewProofBtn.addEventListener('click', function() {
            if (viewer) {
                viewer.destroy();
            }
            proofImageContainer.style.display = 'block';
            viewer = new Viewer(proofImageContainer, {
                navbar: false,
                toolbar: true,
                hidden() {
                    viewer.destroy();
                    viewer = null;
                    proofImageContainer.style.display = 'none';
                }
            });
            viewer.show();
        });
    }
</script>
<style>
.custom-file {
    position: relative;
}
.custom-file-label {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: block;
    max-width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    padding-right: 90px;
    background: transparent;
    z-index: 2;
}
.custom-file-input:focus ~ .custom-file-label {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}
</style>
<?= $this->endSection(); ?>