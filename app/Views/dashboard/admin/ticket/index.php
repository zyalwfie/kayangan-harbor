<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Data Tiket</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center mb-3">
                    <h4>Daftar Tiket yang Tersedia</h4>
                    <a href="<?= route_to('dashboard.admin.tickets.create') ?>" class="btn btn-warning d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <span>Tambah Tiket</span>
                    </a>
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
                        <?php elseif (session()->has('failed')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center px-3" role="alert">
                                <div class="d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg>
                                    <div>
                                        <?= session('failed') ?>
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
                                    <th>Jenis Pengguna Jasa</th>
                                    <th>Golongan Kendaraan</th>
                                    <th>Jadwal Tikek Tersedia</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th style="text-align: end !important;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tickets as $ticket) : ?>
                                    <tr>
                                        <td class="text-bold-500"><?= ($ticket->jenis) ?></td>
                                        <td><?= $ticket->jenis === 'Kendaraan' ? $ticket->golongan : '-' ?></td>
                                        <td class="text-bold-500"><?= $ticket->jadwal_tiket_tersedia ?></td>
                                        <td class="text-bold-500">Rp<?= number_format($ticket->harga, '0', '.', ',') ?></td>
                                        <td class="text-bold-500"><?= $ticket->stok ?></td>
                                        <td>
                                            <div class="d-flex justify-content-end align-items-center gap-2">
                                                <button class="btn btn-outline-primary d-flex align-items-center btn-detail-tiket"
                                                    data-bs-toggle="modal" data-bs-target="#detailModal"
                                                    data-jenis="<?= $ticket->jenis ?>"
                                                    data-golongan="<?= $ticket->golongan ?>"
                                                    data-deskripsi_golongan="<?= $ticket->deskripsiGolonganKendaraan ?>"
                                                    data-tujuan="<?= $ticket->pelabuhan_tujuan ?>"
                                                    data-tanggal-tersedia="<?= $ticket->jadwal_tiket_tersedia ?>"
                                                    data-tanggal-habis="<?= $ticket->jadwal_tiket_habis ?>"
                                                    data-harga="<?= $ticket->harga ?>"
                                                    data-stok="<?= $ticket->stok ?>">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="<?= route_to('dashboard.admin.tickets.edit', $ticket->id) ?>" class="btn btn-outline-warning d-flex align-items-center">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                                <button id="deleteBtn" data-id_ticket="<?= $ticket->id ?>" class="btn btn-outline-danger d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
    </section>
</div>

<!-- Detail modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailModalLabel">Detail Tiket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="single-destinations">
                    <div class="thumb mb-3">
                        <img src="<?= base_url('img/ticket/default.png') ?>" alt="Tiket" style="width: 100%; height: auto; object-fit: cover;" />
                    </div>
                    <div class="details">
                        <h4 class="d-flex justify-content-between mb-1" id="modalTujuan">
                        </h4>
                        <p>Jenis pengguna jasa, <b id="modalJenis"></b></p>
                        <div class="mb-3 d-flex flex-column gap-1">
                            <button type="button" disabled class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="botton" data-bs-title="Bottom"><b id="modalGolongan"></b></button>
                            <small id="modalDeskripsiGolongan"></small>
                        </div>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Durasi</span>
                                <span>± 1 jam 30 menit</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Tanggal Tersedia</span>
                                <span id="modalTanggalTersedia"></span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Tanggal Habis</span>
                                <span id="modalTanggalHabis"></span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Tersisa</span>
                                <span id="modalStok"></span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Harga Perorang</span>
                                <span class="price-btn" id="modalHarga"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Apakah Kamu Yakin Ingin Menghapus?</h1>
            </div>
            <div class="modal-body">
                Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <form id="deleteForm" method="post">
                    <button type="submit" class="btn btn-warning">Ya, hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-detail-tiket').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('modalTujuan').textContent = 'Tujuan ' + (btn.getAttribute('data-tujuan') || '-');
                document.getElementById('modalJenis').textContent = btn.getAttribute('data-jenis') || '-';
                document.getElementById('modalGolongan').textContent = btn.getAttribute('data-golongan') || 'Golongan 0';
                document.getElementById('modalDeskripsiGolongan').textContent = btn.getAttribute('data-deskripsi_golongan') || '';

                function formatTanggal(str) {
                    if (!str) return '-';
                    const date = new Date(str);
                    if (isNaN(date)) return str;
                    return date.toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                }
                document.getElementById('modalTanggalTersedia').textContent = formatTanggal(btn.getAttribute('data-tanggal-tersedia'));
                document.getElementById('modalTanggalHabis').textContent = formatTanggal(btn.getAttribute('data-tanggal-habis'));
                document.getElementById('modalStok').textContent = btn.getAttribute('data-stok') || '-';
                document.getElementById('modalHarga').textContent = 'Rp' + Number(btn.getAttribute('data-harga') || 0).toLocaleString('id-ID');
            });
        });
    });

    document.querySelectorAll('#deleteBtn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const ticketId = btn.getAttribute('data-id_ticket');
            document.getElementById('deleteForm').action = '/dashboard/admin/tickets/destroy/' + ticketId;
        });
    });
</script>
<?= $this->endSection(); ?>