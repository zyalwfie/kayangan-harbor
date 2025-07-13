<footer class="footer-area section-gap">
    <div class="container">

        <div class="row justify-content-between">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Tentang Pelabuhan Kayangan Lombok</h6>
                    <p>
                        Pelabuhan modern dengan fasilitas lengkap di Lombok Utara yang melayani rute reguler ke Sumbawa. Nikmati kemudahan booking online,
                        waiting area ber-AC, dan akses transportasi yang terhubung langsung
                        dengan bandara dan hotel utama.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Tautan Navigasi</h6>
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li><a href="<?= base_url() ?>" class="<?= url_is('/') ? 'nav-active' : '' ?>">Beranda</a></li>
                                <li><a href="<?= route_to('landing.about') ?>" class="<?= url_is('about') ? 'nav-active' : '' ?>">Tentang</a></li>
                                <li><a href="<?= route_to('landing.tickets') ?>" class="<?= url_is('tickets') ? 'nav-active' : '' ?>">Tiket</a></li>
                                <li><a href="<?= route_to('landing.contact') ?>" class="<?= url_is('contact') ? 'nav-active' : '' ?>">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | Didesain dan dikembangkan <span class="font-weight-bold" style="color: #F564A9;">Kayangan Harbor</span></p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>