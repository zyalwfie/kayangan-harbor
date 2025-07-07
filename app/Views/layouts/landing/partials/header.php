<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <ul>
                        <li><a href="https://ferizy.com/">Kunjungi Kami</a></li>
                        <li><a href="<?= route_to('landing.tickets') ?>">Beli Tiket</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <div class="header-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="<?= base_url() ?>" class="text-decoration-none text-white h4"><img src="<?= base_url() ?>img/logo.png" alt="Kayangan Harbor Logo" title="Kayangan Harbor" width="50" class="mr-2" /><span>Kayangan Harbor</span></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu d-flex align-items-center">
                    <li>
                        <a href="<?= base_url() ?>" class="<?= url_is('/') ? 'nav-active' : '' ?>">
                            <?php if (url_is('/')) : ?>
                                <b>Beranda</b>
                            <?php else : ?>
                                Beranda
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= route_to('landing.about') ?>" class="<?= url_is('about') ? 'nav-active' : '' ?>">
                            <?php if (url_is('about')) : ?>
                                <b>Tentang</b>
                            <?php else : ?>
                                Tentang
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= route_to('landing.tickets') ?>" class="<?= url_is('tickets*') || url_is('order*') ? 'nav-active' : '' ?>">
                            <?php if (url_is('tickets') || url_is('order*')) : ?>
                                <b>Tiket</b>
                            <?php else : ?>
                                Tiket
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= route_to('landing.contact') ?>" class="<?= url_is('contact') ? 'nav-active' : '' ?>">
                            <?php if (url_is('contact')) : ?>
                                <b>Kontak</b>
                            <?php else : ?>
                                Kontak
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php if (logged_in()) : ?>
                        <?php if (in_groups('admin')) : ?>
                            <li>
                                <a href="<?= route_to('dashboard.admin.index') ?>">
                                    Dasbor
                                </a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="<?= route_to('dashboard.user.index') ?>">
                                    Dasbor
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <button type="button" class="btn btn-outline-warning px-3" data-toggle="modal" data-target="#confirmModal">
                                Keluar
                            </button>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?= url_to('login') ?>" class="btn btn-outline-warning px-3 py-1 text-white">
                                Masuk
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Yakin ingin keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tindakan ini akan mengakhiri sesi anda yang sekarang
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <a href="<?= url_to('logout') ?>" class="btn btn-danger">Ya, keluarkan saya</a>
            </div>
        </div>
    </div>
</div>