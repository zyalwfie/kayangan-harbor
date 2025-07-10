<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-4">
        <h5 class="card-title fw-semibold mb-3">Avatar</h5>
        <div class="card py-4">
            <img id="imgPreview" src="<?= base_url('img/profile/') . user()->avatar ?>" alt="<?= user()->username ?>" style="width: 81%; margin: auto;">
        </div>
    </div>
    <div class="col-lg-8">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title fw-semibold">Detail Profil</h5>
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
                </div>
            <?php endif; ?>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="full_name" class="form-label">Name Lengkap</label>
                    <input
                        type="text"
                        class="form-control" disabled name="full_name" value="<?= user()->full_name ?>" name="full_name"
                        <?php if (user()->full_name) : ?>
                        value="<?= user()->full_name ?>"
                        <?php else : ?>
                        placeholder="Belum ada nama lengkap"
                        <?php endif; ?>>
                    <div class="invalid-feedback">
                        <?= session('errors.full_name') ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="full_name" class="form-label">Name Pengguna</label>
                    <input type="text" class="form-control" disabled name="username" value="<?= user()->username ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.username') ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="full_name" class="form-label">Surel</label>
                    <input type="email" class="form-control" disabled name="email" value="<?= user()->email ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.username') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>