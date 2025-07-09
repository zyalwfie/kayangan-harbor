<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Data Pengguna</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-3">
                    <h4>Daftar Pengguna yang Sudah Daftar</h4>
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
                                    <th>Avatar</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th style="text-align: end !important;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td class="text-bold-500">
                                            <img src="<?= base_url('img/profile/' . $user->avatar) ?>" alt="Avatar" width="50">
                                        </td>
                                        <td><?= $user->username ?></td>
                                        <td class="text-bold-500"><?= $user->email ?></td>
                                        <td class="text-bold-500">
                                            <span class="badge badge-info text-capitalize"><?= $user->groupName ?></span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end align-items-center gap-2">
                                                <button class="btn btn-outline-primary d-flex align-items-center btn-detail-user"
                                                    data-bs-toggle="modal" data-bs-target="#detailModal"
                                                    data-avatar="<?= $user->avatar ?>"
                                                    data-full_name="<?= $user->full_name ?>"
                                                    data-username="<?= $user->username ?>"
                                                    data-email="<?= $user->email ?>"
                                                    data-role="<?= $user->groupName ?>">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button id="deleteBtn" data-user_id="<?= $user->id ?>" class="btn btn-outline-danger d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                <h1 class="modal-title fs-5" id="detailModalLabel">Detail Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="single-destinations">
                    <div class="thumb mb-3">
                        <img alt="Pengguna" style="width: 100%; height: auto; object-fit: cover;" id="modalAvatar" />
                    </div>
                    <div class="details">
                        <h4 class="d-flex justify-content-between mb-1" id="modalFullName">
                        </h4>
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nama Pengguna</span>
                                <span id="modalUsername"></span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Email</span>
                                <span id="modalEmail"></span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Peran</span>
                                <span id="modalRole" class="badge badge-info text-capitalize"></span>
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
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-detail-user').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('modalAvatar').src = `/img/profile/${btn.getAttribute('data-avatar')}`;
                document.getElementById('modalFullName').textContent = btn.getAttribute('data-full_name');
                document.getElementById('modalEmail').textContent = btn.getAttribute('data-email');
                document.getElementById('modalUsername').textContent = btn.getAttribute('data-username');
                document.getElementById('modalRole').textContent = btn.getAttribute('data-role');
            });
        });
    });

    document.querySelectorAll('#deleteBtn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const userId = btn.getAttribute('data-user_id');
            document.getElementById('deleteForm').action = '/dashboard/admin/users/destroy/' + userId;
        });
    });
</script>
<?= $this->endSection(); ?>