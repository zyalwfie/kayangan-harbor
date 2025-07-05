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
                            <span class="badge badge-info">3</span>
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
                                                        <span class="badge badge-warning text-capitalize"><?= $order->status_tiket ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info text-capitalize"><?= $order->status_tiket ?></span>
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
    </section>
</div>
<?= $this->endSection(); ?>