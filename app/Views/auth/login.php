<?= $this->extend('layouts/auth/app'); ?>

<?= $this->section('page_title'); ?>
Kayangan Harbor | Masuk
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

            <?= view('Myth\Auth\Views\_message_block') ?>

            <?= form_open(url_to('login')) ?>
            <?= csrf_field() ?>

            <?php if ($config->validFields === ['email']) : ?>
                <div class="form-group position-relative has-icon-left">
                    <input type="email" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                        placeholder="Masukkan surel">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            <?php else : ?>
                <div class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                        placeholder="Masukkan nama pengguna/surel" name="login">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group position-relative has-icon-left mb-2">
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                    placeholder="Masukkan sandi" name="password">
                <div class="form-control-icon">
                    <i class="bi bi-lock"></i>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
                <?php if ($config->allowRemembering) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="remember">
                            Ingat saya!
                        </label>
                    </div>
                <?php endif; ?>

                <?php if ($config->activeResetter) : ?>
                    <small><a class="font-bold m-0 text-warning" href="<?= url_to('forgot') ?>">Lupa sandi?</a></small>
                <?php endif; ?>
            </div>

            <button class="btn btn-warning btn-block shadow-lg" type="submit">Masuk</button>
            <?= form_close() ?>

            <?php if ($config->allowRegistration) : ?>
                <div class="text-center mt-4 text-lg fs-4">
                    <p class="text-gray-600 m-0">Belum punya akun? <a href="<?= url_to('register') ?>"
                            class="font-bold text-warning">Daftar di sini</a>.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right-login">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>