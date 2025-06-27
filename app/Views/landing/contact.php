<?= $this->extend('layouts/landing/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- start banner Area -->
<section class="relative about-banner">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div
            class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Contact Us</h1>
                <p class="text-white link-nav">
                    <a href="index.html">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="contact.html"> Contact Us</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div
                class="map-wrap"
                style="width: 100%; height: 445px"
                id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.13616252446!2d116.67199037505958!3d-8.486139091555055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcc396b49f5aefd%3A0xc72f8fb6cc76a2c0!2sPelabuhan%20Kayangan!5e0!3m2!1sen!2sid!4v1750945225664!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                    <div class="contact-details">
                        <h5>Pringgabaya, Lombok Timur, NTB</h5>
                        <p>Jl. Kayangan Port, 83654</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>
                    <div class="contact-details">
                        <h5>+62 87765058843</h5>
                        <p>Senin - Jum'at | 09.00 - 18.00</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>zaerin@gmail.com</h5>
                        <p>Beri tahu keluhan anda!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form
                    class="form-area contact-form text-right"
                    id="myForm"
                    action="mail.php"
                    method="post">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input
                                name="name"
                                placeholder="Masukkan namamu"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Masukkan namamu'"
                                class="common-input mb-20 form-control"
                                required=""
                                type="text" />

                            <input
                                name="email"
                                placeholder="Masukkan surelmu"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Masukkan surelmu'"
                                class="common-input mb-20 form-control"
                                required=""
                                type="email" />

                            <input
                                name="subject"
                                placeholder="Dalam subjek apa"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Dalam subjek apa'"
                                class="common-input mb-20 form-control"
                                required=""
                                type="text" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea
                                class="common-textarea form-control"
                                name="message"
                                placeholder="Apa keluhanmu"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Apa keluhanmu'"
                                required=""></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div
                                class="alert-msg"
                                style="text-align: left"></div>
                            <button
                                class="genric-btn primary"
                                style="float: right">
                                Kirim pesan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->
<?= $this->endSection(); ?>