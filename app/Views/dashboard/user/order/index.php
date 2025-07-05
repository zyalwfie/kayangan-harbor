<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Statistik Pesanan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pesanan Terbaru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pemesan</th>
                                    <th>Jumlah Penumpang</th>
                                    <th>Total Harga</th>
                                    <th>Status Tiket</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $index => $order) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td class="text-bold-500"><?= $order->nama_pemesan ?></td>
                                        <td><?= $order->jumlah_penumpang ?></td>
                                        <td class="text-bold-500">Rp<?= number_format($order->total_harga, '0', '.', ',') ?></td>
                                        <td>
                                            <?php if ($order->status_tiket === 'aktif') : ?>
                                                <span class="badge badge-primary text-capitalize"><?= $order->status_tiket ?></span>
                                            <?php elseif ($order->status_tiket === 'tertunda') : ?>
                                                <span class="badge badge-warning text-capitalize"><?= $order->status_tiket ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-danger text-capitalize"><?= $order->status_tiket ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-outline-primary d-flex align-items-center gap-1">
                                                    <i class="bi bi-eye"></i> Lihat
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>