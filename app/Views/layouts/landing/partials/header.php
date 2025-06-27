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
                <a href="<?= base_url() ?>" class="text-decoration-none text-white h4"><img src="img/logo.png" alt="Kayangan Harbor Logo" title="Kayangan Harbor" width="50" class="mr-2" /><span>Kayangan Harbor</span></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="<?= base_url() ?>" class="<?= url_is('/') ? 'nav-active' : '' ?>">Beranda</a></li>
                    <li><a href="<?= route_to('landing.about') ?>" class="<?= url_is('about') ? 'nav-active' : '' ?>">Tentang</a></li>
                    <li><a href="<?= route_to('landing.tickets') ?>" class="<?= url_is('tickets') ? 'nav-active' : '' ?>">Tiket</a></li>
                    <li><a href="<?= route_to('landing.contact') ?>" class="<?= url_is('contact') ? 'nav-active' : '' ?>">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>