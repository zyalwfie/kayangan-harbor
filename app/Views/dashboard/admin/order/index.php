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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if (session()->has('success')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center px-3" role="alert">
                                        <div class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                            </svg>
                                            <div>
                                                <?= session('success') ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-light d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                            </svg>
                                        </button>
                                    </div>
                                <?php elseif (session()->has('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center px-3" role="alert">
                                        <div class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                            </svg>
                                            <div>
                                                <?= session('error') ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-light d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                            </svg>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Total Harga</th>
                                            <th>Jadwal Masuk</th>
                                            <th>Status Tiket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $firstPendingOrderId = null;
                                    foreach ($orders as $o) {
                                        if ($o->status_tiket === 'tertunda') {
                                            $firstPendingOrderId = $o->id;
                                            break;
                                        }
                                    }
                                    ?>
                                    <tbody>
                                        <?php if (!$orders) : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Pesanan tidak ditemukan.</td>
                                            </tr>
                                        <?php else : ?>
                                            <?php foreach ($orders as $order) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= ($order->full_name) ? $order->full_name : $order->username ?></td>
                                                    <td>Rp<?= number_format($order->total_harga, '0', '.', ',') ?></td>
                                                    <td class="text-bold-500"><?= $order->jadwal_masuk ?></td>
                                                    <td class="text-bold-500">
                                                        <?php if ($order->status_tiket === 'tertunda') : ?>
                                                            <span class="badge badge-warning text-capitalize"><?= $order->status_tiket ?></span>
                                                        <?php elseif ($order->status_tiket === 'kadaluarsa') : ?>
                                                            <span class="badge badge-secondary text-capitalize"><?= $order->status_tiket ?></span>
                                                        <?php else : ?>
                                                            <span class="badge badge-info text-capitalize"><?= $order->status_tiket ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1 align-items-center">
                                                            <button type="button" class="btn btn-outline-primary btn-lihat-order d-flex align-items-center"
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
                                                                data-status_tiket="<?= $order->status_tiket ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                                                </svg>
                                                            </button>
                                                            <button
                                                                class="btn <?= ($order->status_tiket === 'aktif') ? 'btn-success' : 'btn-outline-success' ?> btn-approve-order d-flex align-items-center"
                                                                data-bs-target="#approveModal"
                                                                data-bs-toggle="modal"
                                                                data-id_order="<?= $order->id ?>"
                                                                <?= ($order->id != $firstPendingOrderId || $order->status_tiket !== 'tertunda' || !$order->bukti_pembayaran) ? 'disabled' : '' ?>>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                                </svg>
                                                            </button>
                                                            <button
                                                                class="btn <?= ($order->status_tiket === 'kadaluarsa') ? 'btn-danger' : 'btn-outline-danger' ?> btn-cancel-order d-flex align-items-center"
                                                                data-bs-target="#cancelModal"
                                                                data-bs-toggle="modal"
                                                                data-id_pesanan="<?= $order->id ?>"
                                                                data-id_pengguna="<?= $order->id_pengguna ?>"
                                                                <?= ($order->id != $firstPendingOrderId || $order->status_tiket !== 'tertunda' || !$order->bukti_pembayaran) ? 'disabled' : '' ?>>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                                </svg>
                                                            </button>
                                                            <?php if ($order->id === $firstPendingOrderId && $order->status_tiket === 'tertunda') : ?>
                                                                <button
                                                                    class="btn btn-outline-info btn-notif-order d-flex align-items-center"
                                                                    data-bs-target="#notifModal"
                                                                    data-bs-toggle="modal"
                                                                    data-id_pesanan="<?= $order->id ?>"
                                                                    data-id_pengguna="<?= $order->id_pengguna ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                                                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                                                                    </svg>
                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination d-flex justify-content-end align-items-center mb-0">
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

<!-- Detail order Modal -->
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

<!-- Approve modal -->
<div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="approveModalLabel">Yakin Ingin Menyetujui Pesanan Ini?</h1>
            </div>
            <div class="modal-body">
                Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <form id="approveForm" method="post">
                    <button type="submit" class="btn btn-primary">Ya, setujui</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cancel order -->
<div class="modal fade" id="cancelModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cancelModalLabel">Yakin Ingin Membatalkan Pesanan Ini?</h1>
            </div>
            <div class="modal-body">
                <?= form_open(route_to('dashboard.admin.orders.cancel')) ?>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                    <span>Berikan pesan ke pengguna.</span>
                </div>
                <input type="hidden" name="id_pesanan" id="id_pesanan">
                <input type="hidden" name="id_pengguna" id="id_pengguna">
                <div class="mb-3">
                    <label for="kepala_notifikasi" class="form-label">Judul pesan</label>
                    <input type="text" class="form-control" id="kepala_notifikasi" placeholder="Apa judul pesan" name="kepala_notifikasi">
                </div>
                <div class="mb-3">
                    <label for="isi_notifikasi" class="form-label">Isi pesan</label>
                    <textarea class="form-control" id="isi_notifikasi" rows="5" placeholder="Apa isi pesannya" name="isi_notifikasi"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-danger">Ya, Batalkan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Notif order -->
<div class="modal fade" id="notifModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="notifModalLabel">Sampaikan Pesan ke Pengguna</h1>
            </div>
            <div class="modal-body">
                <?= form_open(route_to('dashboard.admin.orders.notif')) ?>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                    <span>Berikan pesan ke pengguna.</span>
                </div>
                <input type="hidden" name="id_pesanan" id="id_pesanan_notif">
                <input type="hidden" name="id_pengguna" id="id_pengguna_notif">
                <div class="mb-3">
                    <label for="kepala_notifikasi" class="form-label">Judul pesan</label>
                    <input type="text" class="form-control" id="kepala_notifikasi" placeholder="Apa judul pesan" name="kepala_notifikasi">
                </div>
                <div class="mb-3">
                    <label for="isi_notifikasi" class="form-label">Isi pesan</label>
                    <textarea class="form-control" id="isi_notifikasi" rows="5" placeholder="Apa isi pesannya" name="isi_notifikasi"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <?= form_close() ?>
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

        document.querySelectorAll('.btn-lihat-order').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const buktiPembayaran = btn.getAttribute('data-bukti-pembayaran');
                if (buktiPembayaran && buktiPembayaran !== 'null' && buktiPembayaran !== '') {
                    bukti.src = baseUrl('img/ticket/proof/' + buktiPembayaran);
                    if (statusPembayaran) {
                        statusPembayaran.innerHTML = '<span class="badge bg-primary text-white">Bukti sudah diunggah</span>';
                    }
                } else {
                    bukti.src = baseUrl('img/ticket/default.png');
                    if (statusPembayaran) {
                        statusPembayaran.innerHTML = '<span class="badge badge-danger">Belum unggah bukti</span>';
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
                        jenisIconLabel.innerHTML = '<i class="bi bi-car-front-fill"></i> Jenis pengguna jasa';
                        if (golonganContainer) golonganContainer.style.display = '';
                    } else {
                        jenisIconLabel.innerHTML = '<i class="bi bi-luggage-fill"></i> Jenis pengguna jasa';
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

        document.querySelectorAll('.btn-approve-order').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const orderId = btn.getAttribute('data-id_order');
                document.getElementById('approveForm').action = '/dashboard/admin/orders/approve/' + orderId;
            });
        });

        document.querySelectorAll('.btn-cancel-order').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const orderIdEl = document.querySelector('#id_pesanan');
                const userIdEl = document.querySelector('#id_pengguna');

                orderIdEl.value = this.dataset.id_pesanan;
                userIdEl.value = this.dataset.id_pengguna;
            })
        });

        document.querySelectorAll('.btn-notif-order').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const orderIdEl = document.querySelector('#id_pesanan_notif');
                const userIdEl = document.querySelector('#id_pengguna_notif');

                orderIdEl.value = this.dataset.id_pesanan;
                userIdEl.value = this.dataset.id_pengguna;
            })
        });

        function baseUrl(path) {
            return window.location.origin + '/' + path;
        }
    });
</script>
<?= $this->endSection(); ?>