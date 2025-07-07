<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Daftar Semua Pesanan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center mb-3">
                            <h4>Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Total Harga</th>
                                            <th>Jadwal Masuk</th>
                                            <th>Status Tiket</th>
                                            <th>Status Pembayaran</th>
                                            <th style="text-align: end !important;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $order) : ?>
                                            <tr>
                                                <td class="text-bold-500"><?= ($order->full_name) ? $order->full_name : $order->username ?></td>
                                                <td>Rp<?= number_format($order->total_harga, '0', '.', ',') ?></td>
                                                <td class="text-bold-500"><?= $order->jadwal_masuk ?></td>
                                                <td class="text-bold-500">
                                                    <?php if ($order->status_tiket === 'tertunda') : ?>
                                                        <span class="badge badge-secondary text-capitalize"><?= $order->status_tiket ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info text-capitalize"><?= $order->status_tiket ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-bold-500">
                                                    <?php if ($order->status_pembayaran === 'tertunda') : ?>
                                                        <span class="badge badge-warning text-capitalize"><?= $order->status_pembayaran ?></span>
                                                    <?php elseif ($order->status_pembayaran === 'berhasil') : ?>
                                                        <span class="badge badge-success text-capitalize"><?= $order->status_pembayaran ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-danger text-capitalize"><?= $order->status_pembayaran ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-end gap-1">
                                                        <button type="button" class="btn btn-outline-primary btn-lihat-order"
                                                            data-bs-toggle="modal" data-bs-target="#detailModal"
                                                            data-bukti-pembayaran="<?= $order->bukti_pembayaran ?>"
                                                            data-pelabuhan_asal="<?= htmlspecialchars($order->pelabuhan_asal) ?>"
                                                            data-pelabuhan_tujuan="<?= htmlspecialchars($order->pelabuhan_tujuan) ?>"
                                                            data-nama_pemesan="<?= htmlspecialchars(($order->full_name) ? $order->full_name : $order->username) ?>"
                                                            data-jumlah_penumpang="<?= htmlspecialchars($order->jumlah_penumpang) ?>"
                                                            data-total_harga="<?= number_format($order->total_harga, '0', '.', ',') ?>"
                                                            data-jadwal_masuk="<?= htmlspecialchars($order->jadwal_masuk) ?>"
                                                            data-jenis="<?= $order->jenis ?>"
                                                            data-golongan="<?= $order->golongan ?>"
                                                            data-deskripsi_golongan_kendaraan="<?= $order->deskripsi_golongan_kendaraan ?>"
                                                            data-status_tiket="<?= $order->status_tiket ?>">Lihat</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination d-flex justify-content-end align-items-center">
                                                        <li class="page-item"><a class="page-link" href="#">&LeftTeeArrow;</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">&RightTeeArrow;</a></li>
                                                    </ul>
                                                </nav>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Order Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailModalLabel">Rincian Pesanan</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 preview-image mb-3">
                        <img id="buktiPembayaran" alt="Tiket" style="width: 100%; height: auto;">
                    </div>
                    <div class="col-lg-12 row mb-4">
                        <div class="col-12 mb-3 row">
                            <div class="col-6 d-flex flex-column">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-arrow-left-circle-fill"></i> Pelabuhan asal</span>
                                <h4 id="pelabuhanAsal"></h4>
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-arrow-right-circle-fill"></i> Pelabuhan tujuan</span>
                                <h4 id="pelabuhanTujuan"></h4>
                            </div>
                        </div>
                        <div class="col-12 row mb-3">
                            <div class="col-6 d-flex flex-column">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-people-fill"></i> Jumlah penumpang</span>
                                <h4 id="jumlahPenumpang"></h4>
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-alarm-fill"></i> Jadwal masuk</span>
                                <h4 id="jadwalMasuk"></h4>
                            </div>
                        </div>
                        <div class="col-12 row mb-3">
                            <div class="col-lg-6 d-flex flex-column mb-3">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-wallet-fill"></i> Total harga</span>
                                <h4 id="totalHarga"></h4>
                            </div>
                            <div class="col-lg-6 d-flex flex-column">
                                <span class="mb-1 d-flex align-items-center" id="jenisIconLabel"><i class="bi"></i> Jenis pengguna jasa</span>
                                <h4 id="jenis"></h4>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-flex flex-column" id="golonganContainer">
                            <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-collection-fill"></i> Golongan kendaraan</span>
                            <h4 id="golongan"></h4>
                            <small id="deskripsiGolongan"></small>
                        </div>
                        <div class="col-12 mb-3 row">
                            <div class="col-lg-6 d-flex flex-column mb-3">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-ticket-fill"></i> Status tiket</span>
                                <h4 id="statusTiket"></h4>
                            </div>
                            <div class="col-lg-6 d-flex flex-column">
                                <span class="mb-1 d-flex align-items-center"><i class="mr-2 bi bi-file-earmark-arrow-up-fill"></i> Status pembayaran</span>
                                <h4 id="statusPembayaran" class="mb-3"></h4>
                                <form id="formUploadBukti" action="<?= route_to('order') ?>" method="post" enctype="multipart/form-data" style="display:none;">
                                    <input type="hidden" name="uri_string" value="<?= uri_string() ?>">
                                    <input type="hidden" name="order_id" id="orderIdInput">
                                    <div class="mb-2">
                                        <input type="file" class="form-control" name="bukti_pembayaran" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bukti = document.getElementById('buktiPembayaran');
        const asal = document.getElementById('pelabuhanAsal');
        const tujuan = document.getElementById('pelabuhanTujuan');
        const jumlah = document.getElementById('jumlahPenumpang');
        const harga = document.getElementById('totalHarga');
        const jadwal = document.getElementById('jadwalMasuk');
        const jenis = document.getElementById('jenis');
        const jenisIconLabel = document.getElementById('jenisIconLabel');
        const golongan = document.getElementById('golongan');
        const deskripsiGolongan = document.getElementById('deskripsiGolongan');
        const golonganContainer = document.getElementById('golonganContainer');
        const statusTiket = document.getElementById('statusTiket');
        const statusPembayaran = document.getElementById('statusPembayaran');
        const formUploadBukti = document.getElementById('formUploadBukti');
        const orderIdInput = document.getElementById('orderIdInput');

        document.querySelectorAll('.btn-lihat-order').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const buktiPembayaran = btn.getAttribute('data-bukti-pembayaran');
                const orderId = btn.getAttribute('data-order_id');
                if (buktiPembayaran && buktiPembayaran !== 'null' && buktiPembayaran !== '') {
                    bukti.src = baseUrl('img/ticket/proof/' + buktiPembayaran);
                    if (statusPembayaran) {
                        statusPembayaran.innerHTML = '<span class="badge bg-primary text-white">Bukti sudah diunggah</span>';
                    }
                    if (formUploadBukti) formUploadBukti.style.display = 'none';
                } else {
                    bukti.src = baseUrl('img/ticket/default.png');
                    if (statusPembayaran) {
                        statusPembayaran.innerHTML = '<span class="badge badge-danger">Belum unggah bukti</span>';
                    }
                    if (formUploadBukti) {
                        formUploadBukti.style.display = '';
                        if (orderIdInput) orderIdInput.value = orderId || '';
                    }
                }

                asal.textContent = btn.getAttribute('data-pelabuhan_asal') || '';
                tujuan.textContent = btn.getAttribute('data-pelabuhan_tujuan') || '';
                jumlah.textContent = btn.getAttribute('data-jumlah_penumpang') || '';
                harga.textContent = 'Rp' + (btn.getAttribute('data-total_harga') || '0');
                jadwal.textContent = btn.getAttribute('data-jadwal_masuk') || '';

                const jenisVal = btn.getAttribute('data-jenis') || '';
                jenis.textContent = jenisVal;
                if (jenisIconLabel) {
                    if (jenisVal.toLowerCase() === 'kendaraan') {
                        jenisIconLabel.innerHTML = '<i class="bi bi-car-front-fill mr-2"></i> Jenis pengguna jasa';
                        if (golonganContainer) golonganContainer.style.display = '';
                    } else {
                        jenisIconLabel.innerHTML = '<i class="bi bi-luggage-fill mr-2"></i> Jenis pengguna jasa';
                        if (golonganContainer) golonganContainer.style.display = 'none';
                    }
                }

                if (golongan) {
                    golongan.textContent = btn.getAttribute('data-golongan') || '-';
                }
                if (deskripsiGolongan) {
                    deskripsiGolongan.textContent = btn.getAttribute('data-deskripsi_golongan_kendaraan') || '';
                }
                if (statusTiket) {
                    const status = btn.getAttribute('data-status_tiket') || '';
                    let badgeClass = 'badge badge-info text-capitalize';
                    if (status.toLowerCase() === 'tertunda') {
                        badgeClass = 'badge badge-secondary text-capitalize';
                    }
                    statusTiket.innerHTML = `<span class="${badgeClass}">${status}</span>`;
                }
            });
        });

        function baseUrl(path) {
            return window.location.origin + '/' + path;
        }
    });
</script>
<?= $this->endSection(); ?>