<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <ul>
                        <li><a href="#">Visit Us</a></li>
                        <li><a href="#">Buy Tickets</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <div class="header-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
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
                    <li><a href="<?= base_url() ?>" class="<?= url_is('/') ? 'nav-active' : '' ?>">Home</a></li>
                    <li><a href="<?= route_to('landing.about') ?>" class="<?= url_is('about') ? 'nav-active' : '' ?>">About</a></li>
                    <li><a href="<?= route_to('landing.packages') ?>" class="<?= url_is('packages') ? 'nav-active' : '' ?>">Packages</a></li>
                    <li><a href="<?= route_to('landing.hotels') ?>" class="<?= url_is('hotels') ? 'nav-active' : '' ?>">Hotels</a></li>
                    <li><a href="<?= route_to('landing.contact') ?>" class="<?= url_is('contact') ? 'nav-active' : '' ?>">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>