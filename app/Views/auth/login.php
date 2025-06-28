<?= $this->extend('layouts/auth/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo mb-4">
                <a href="index.html"><img src="img/logo.png" alt="Kayangan Harbor Logo" style="width: 150px; height: auto;"></a>
            </div>

            <h1 class="auth-title">Masuk Kembali.</h1>
            <p class="auth-subtitle mb-3">Masuk dengan data yang Anda masukkan saat pendaftaran.</p>

            <form action="index.html">
                <div class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control"
                        placeholder="Masukkan nama pengguna/surel">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-2">
                    <input type="text" class="form-control"
                        placeholder="Masukkan sandi">
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya!
                        </label>
                    </div>
                    <small><a class="font-bold m-0 text-warning" href="auth-forgot-password.html">Lupa sandi?</a>.</small>
                </div>

                <button class="btn btn-warning btn-block shadow-lg">Masuk</button>
            </form>

            <div class="text-center mt-4 text-lg fs-4">
                <p class="text-gray-600 m-0">Belum punya akun? <a href="<?= url_to('register') ?>"
                        class="font-bold text-warning">Daftar di sini</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right-login">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>