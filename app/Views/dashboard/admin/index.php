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
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldWallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pendapatan</h6>
                                    <h6 class="font-extrabold mb-0">Rp<?= number_format($earnAmount, '0', '.', ',') ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon yellow">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Tertunda</h6>
                                    <h6 class="font-extrabold mb-0"><?= $pendingOrderCount ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldBag"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pesanan</h6>
                                    <h6 class="font-extrabold mb-0"><?= $successOrderCount ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldClose-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Gagal</h6>
                                    <h6 class="font-extrabold mb-0"><?= $failedOrderCount ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-9">
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
                <div class="card col-12 col-lg-3">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl mr-2">
                                <img src="<?= base_url('img/profile/' . user()->avatar) ?>" alt="<?= user()->username ?>">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"><?= user()->full_name ? user()->full_name : user()->username ?></h5>
                                <h6 class="text-muted mb-0"><?= user()->email ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>