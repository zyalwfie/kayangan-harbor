<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Statistik Profil</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldWallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold mb-2">Pengeluaran</h6>
                                    <h6 class="font-extrabold mb-0">Rp<?= number_format($spendingAmount, '0', '.', ',') ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon yellow">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold mb-2">Tertunda</h6>
                                    <h6 class="font-extrabold mb-0"><?= $pendingOrderCount ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold mb-2">Berhasil</h6>
                                    <h6 class="font-extrabold mb-0"><?= $successOrderCount ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldClose-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold mb-2">Gagal</h6>
                                    <h6 class="font-extrabold mb-0"><?= $failedOrderCount ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Pesanan Terbaru</h4>
                            <span class="badge badge-info"><?= $orderCount ?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemesan</th>
                                            <th>Total Harga</th>
                                            <th>Jadwal Masuk</th>
                                            <th>Status Tiket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recentOrder as $order) : ?>
                                            <tr>
                                                <td class="text-bold-500"><?= $order['nama_pemesan'] ?></td>
                                                <td>Rp<?= number_format($order['total_harga'], '0', '.', ',') ?></td>
                                                <td class="text-bold-500"><?= $order['jadwal_masuk'] ?></td>
                                                <td class="text-bold-500">
                                                    <?php if ($order['status_tiket'] === 'tertunda') : ?>
                                                        <span class="badge badge-warning text-capitalize"><?= $order['status_tiket'] ?></span>
                                                    <?php elseif ($order['status_tiket'] === 'kadaluarsa') : ?>
                                                        <span class="badge badge-secondary text-capitalize"><?= $order['status_tiket'] ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info text-capitalize"><?= $order['status_tiket'] ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl mr-2">
                            <img src="<?= base_url('img/profile/') . user()->avatar ?>" alt="Avatar">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= user()->full_name ? user()->full_name : user()->username ?></h5>
                            <h6 class="text-muted mb-0"><?= user()->email ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Pesan Terbaru</h4>
                        <span class="badge text-bg-info"><?= $totalNewNotif ? $totalNewNotif : '0' ?></span>
                    </div>
                </div>
                <div class="card-content pb-4">
                    <?php if (!$newNotifications) : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div>Belum ada pesan terbaru.</div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($newNotifications as $notification) : ?>
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-sm mr-3">
                                    <?php if ($notification['tipe_notifikasi'] === 'biru') : ?>
                                        <img src="<?= base_url() ?>img/notification/info.svg">
                                    <?php elseif ($notification['tipe_notifikasi'] === 'kuning') : ?>
                                        <img src="<?= base_url() ?>img/notification/warning.svg">
                                    <?php elseif ($notification['tipe_notifikasi'] === 'hijau') : ?>
                                        <img src="<?= base_url() ?>img/notification/check.svg">
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>img/notification/failed.svg">
                                    <?php endif; ?>
                                </div>
                                <div class="name">
                                    <h6 class="mb-1 font-weight-bold"><?= $notification['kepala_notifikasi'] ?></h6>
                                    <p class="text-muted mb-0 truncate-one-line"><?= $notification['isi_notifikasi'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3' id="seeMessages" style="cursor: pointer;">Lihat semua</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Notifications modal -->
<div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="notificationsModalLabel">Pesan Notifikasi</h1>
            </div>
            <div class="modal-body">
                <?php foreach ($notifications as $notification) : ?>
                    <div class="recent-message d-flex gap-1 px-4 py-3">
                        <div class="d-flex gap-1">
                            <div class="avatar avatar-sm mr-3">
                                <?php if ($notification['tipe_notifikasi'] === 'biru') : ?>
                                    <img src="<?= base_url() ?>img/notification/info.svg">
                                <?php elseif ($notification['tipe_notifikasi'] === 'kuning') : ?>
                                    <img src="<?= base_url() ?>img/notification/warning.svg">
                                <?php elseif ($notification['tipe_notifikasi'] === 'hijau') : ?>
                                    <img src="<?= base_url() ?>img/notification/check.svg">
                                <?php else : ?>
                                    <img src="<?= base_url() ?>img/notification/failed.svg">
                                <?php endif; ?>
                            </div>
                            <div class="name">
                                <div class="mb-2">
                                    <h6 class="mb-1 font-weight-bold">
                                        <?= $notification['kepala_notifikasi'] ?>
                                    </h6>
                                    <p class="text-muted mb-0"><?= $notification['isi_notifikasi'] ?></p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center gap-1">
                                    <?php if (!$notification['dibaca']) : ?>
                                        <a href="<?= route_to('dashboard.user.notifications.read', $notification['id']) ?>" class="btn btn-outline-primary d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                                                <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882zM15 7.383l-4.778 2.867L15 13.117zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765z" />
                                            </svg>
                                        </a>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-primary d-flex align-items-center" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                    <?= form_open(route_to('dashboard.user.notifications.destroy')) ?>
                                    <input type="hidden" name="id_notifikasi" value="<?= $notification['id'] ?>">
                                    <button type="submit" class="btn btn-outline-danger d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                            <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793" />
                                        </svg>
                                    </button>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('head_css'); ?>
<style>
    .truncate-one-line {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script>
    const notificationsModal = new bootstrap.Modal(document.getElementById('notificationsModal'));
    const seeMessagesBtn = document.getElementById('seeMessages');

    seeMessagesBtn.addEventListener('click', () => {
        notificationsModal.show();
    })
</script>
<?= $this->endSection(); ?>