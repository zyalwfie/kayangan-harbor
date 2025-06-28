<?= $this->extend('layouts/auth/app'); ?>

<?= $this->section('page_title'); ?>
Kayangan Harbor | Daftar
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo mb-4">
                <a href="index.html"><img src="img/logo.png" alt="Kayangan Harbor Logo" style="width: 150px; height: auto;"></a>
            </div>

            <h1 class="auth-title">Daftar Sekarang.</h1>
            <p class="auth-subtitle mb-3">Masukkan data Anda untuk mendaftar ke situs web kami.</p>

            <?= view('Myth\Auth\Views\_message_block') ?>

            <?= form_open('register') ?>
            <?= csrf_field() ?>

            <div class="form-group position-relative has-icon-left">
                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                    placeholder="Masukkan nama pengguna" name="username" value="<?= old('username') ?>">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>

            <div class="form-group position-relative has-icon-left">
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                    placeholder="Masukkan surel" value="<?= old('email') ?>" aria-describedby="emailHelp">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>

            <div class="form-group position-relative has-icon-left mb-3">
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                    placeholder="Masukkan sandi" name="password" autocomplete="off">
                <div class="form-control-icon">
                    <i class="bi bi-lock"></i>
                </div>
            </div>

            <div class="form-group position-relative has-icon-left mb-3">
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm"
                    placeholder="Konfirmasi sandi" autocomplete="off">
                <div class="form-control-icon">
                    <i class="bi bi-lock"></i>
                </div>
            </div>

            <button class="btn btn-warning btn-block shadow-lg" type="submit">Daftar</button>
            <?= form_close() ?>

            <div class="text-center mt-4 text-lg fs-4">
                <p class="text-gray-600 m-0">Sudah pernah daftar? <a href="<?= url_to('login') ?>"
                        class="font-bold text-warning">Masuk di sini</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right-register">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>