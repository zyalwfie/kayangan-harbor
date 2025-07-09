<?= $this->extend('layouts/dashboard/app'); ?>

<?= $this->section('page_title'); ?>
<?= $pageTitle ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Aksi Tiket</h3>
</div>
<div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Tiket Baru</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?= form_open(isset($ticket) ? route_to('dashboard.admin.tickets.update', $ticket['id']) : route_to('dashboard.admin.tickets.store'), ['class' => 'form']) ?>
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="id_jenis_pengguna_jasa">Jenis pengguna jasa</label>
                                    <fieldset class="form-group">
                                        <select class="form-select <?= session('errors.id_jenis_pengguna_jasa') ? 'is-invalid' : '' ?>" id="id_jenis_pengguna_jasa" name="id_jenis_pengguna_jasa">
                                            <?php if (isset($ticket)) : ?>
                                                <option <?= old('id_jenis_pengguna_jasa') ? '' : 'selected' ?>>Pilih jenis pengguna jasa</option>
                                                <?php foreach ($typeOfServiceUser as $item) : ?>
                                                    <option value="<?= $item['id'] ?>" <?= old('id_jenis_pengguna_jasa', $ticket['id_jenis_pengguna_jasa']) == $item['id'] ? 'selected' : '' ?>><?= $item['jenis'] ?></option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option <?= old('id_jenis_pengguna_jasa') ? '' : 'selected' ?>>Pilih jenis pengguna jasa</option>
                                                <?php foreach ($typeOfServiceUser as $item) : ?>
                                                    <option value="<?= $item['id'] ?>" <?= old('id_jenis_pengguna_jasa') == $item['id'] ? 'selected' : '' ?>><?= $item['jenis'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_jenis_pengguna_jasa') ?>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="id_golongan_kendaraan">Golongan kendaraan</label>
                                    <fieldset class="form-group">
                                        <select class="form-select <?= session('errors.id_golongan_kendaraan') ? 'is-invalid' : '' ?>" id="id_golongan_kendaraan" name="id_golongan_kendaraan" <?= (isset($ticket) && $ticket['id_jenis_pengguna_jasa'] == 'Kendaraan') || old('id_jenis_pengguna_jasa') == 'Kendaraan' ? '' : 'disabled' ?>>
                                            <?php if (isset($ticket)) : ?>
                                                <option>Pilih golongan kendaraan</option>
                                                <?php foreach ($vehicleClass as $item) : ?>
                                                    <option value="<?= $item['id'] ?>" <?= old('id_golongan_kendaraan', $ticket['id_golongan_kendaraan']) == $item['id'] ? 'selected' : '' ?>><?= $item['golongan'] ?></option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option <?= old('id_golongan_kendaraan') ? '' : 'selected' ?>>Pilih golongan kendaraan</option>
                                                <?php foreach ($vehicleClass as $item) : ?>
                                                    <option value="<?= $item['id'] ?>" <?= old('id_golongan_kendaraan') == $item['id'] ? 'selected' : '' ?>><?= $item['golongan'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= session('errors.id_golongan_kendaraan') ?>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="pelabuhan_asal">Pelabuhan asal</label>
                                        <input type="text" id="pelabuhan_asal" class="form-control <?= session('errors.pelabuhan_asal') ? 'is-invalid' : '' ?>" placeholder="Dari" name="pelabuhan_asal" value="<?= old('pelabuhan_asal', isset($ticket) ? $ticket['pelabuhan_asal'] : '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.pelabuhan_asal') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="pelabuhan_tujuan">Pelabuhan tujuan</label>
                                        <input type="text" id="pelabuhan_tujuan" class="form-control <?= session('errors.pelabuhan_tujuan') ? 'is-invalid' : '' ?>" name="pelabuhan_tujuan" placeholder="Ke" value="<?= old('pelabuhan_tujuan', isset($ticket) ? $ticket['pelabuhan_tujuan'] : '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.pelabuhan_tujuan') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="jadwal_tiket_tersedia">Jadwal tiket tersedia</label>
                                        <input type="date" id="jadwal_tiket_tersedia" class="form-control <?= session('errors.jadwal_tiket_tersedia') ? 'is-invalid' : '' ?>" name="jadwal_tiket_tersedia" value="<?= old('jadwal_tiket_tersedia', isset($ticket) ? $ticket['jadwal_tiket_tersedia'] : '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.jadwal_tiket_tersedia') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="jadwal_tiket_habis">Jadwal tiket habis</label>
                                        <input type="date" id="jadwal_tiket_habis" class="form-control <?= session('errors.jadwal_tiket_habis') ? 'is-invalid' : '' ?>" name="jadwal_tiket_habis" value="<?= old('jadwal_tiket_habis', isset($ticket) ? $ticket['jadwal_tiket_habis'] : '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.jadwal_tiket_habis') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" id="harga" class="form-control <?= session('errors.harga') ? 'is-invalid' : '' ?>" name="harga" placeholder="Rp1xxxxx" value="<?= old('harga', isset($ticket) ? $ticket['harga'] : '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.harga') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" id="stok" class="form-control <?= session('errors.stok') ? 'is-invalid' : '' ?>" name="stok" placeholder="0" value="<?= old('stok', isset($ticket) ? $ticket['stok'] : '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.stok') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning me-1 mb-1">Tambah</button>
                                    <a href="<?= route_to('dashboard.admin.tickets.index') ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>

<?= $this->section('foot_js'); ?>
<script>
    const typeOfServiceUser = document.getElementById('id_jenis_pengguna_jasa');
    const vehicleClass = document.getElementById('id_golongan_kendaraan');
    const jadwalTiketTersedia = document.getElementById('jadwal_tiket_tersedia');
    const jadwalTiketHabis = document.getElementById('jadwal_tiket_habis');

    if (jadwalTiketHabis) {
        jadwalTiketHabis.disabled = true;
    }

    typeOfServiceUser.addEventListener('change', function() {
        const selectedText = typeOfServiceUser.options[typeOfServiceUser.selectedIndex].text;
        if (selectedText.trim().toLowerCase() === 'kendaraan') {
            vehicleClass.disabled = false;
        } else {
            vehicleClass.disabled = true;
            vehicleClass.selectedIndex = 0;
        }
    });

    if (jadwalTiketTersedia && jadwalTiketHabis) {
        jadwalTiketTersedia.addEventListener('change', function() {
            if (jadwalTiketTersedia.value) {
                jadwalTiketHabis.disabled = false;
                jadwalTiketHabis.min = jadwalTiketTersedia.value;
                if (jadwalTiketHabis.value && jadwalTiketHabis.value < jadwalTiketTersedia.value) {
                    jadwalTiketHabis.value = '';
                }
            } else {
                jadwalTiketHabis.disabled = true;
                jadwalTiketHabis.value = '';
                jadwalTiketHabis.removeAttribute('min');
            }
        });
    }

    function setInitialFormState() {
        const selectedText = typeOfServiceUser.options[typeOfServiceUser.selectedIndex].text;
        if (selectedText.trim().toLowerCase() === 'kendaraan') {
            vehicleClass.disabled = false;
        } else {
            vehicleClass.disabled = true;
            vehicleClass.selectedIndex = 0;
        }
        if (jadwalTiketTersedia.value) {
            jadwalTiketHabis.disabled = false;
            jadwalTiketHabis.min = jadwalTiketTersedia.value;
            if (jadwalTiketHabis.value && jadwalTiketHabis.value < jadwalTiketTersedia.value) {
                jadwalTiketHabis.value = '';
            }
        } else {
            jadwalTiketHabis.disabled = true;
            jadwalTiketHabis.value = '';
            jadwalTiketHabis.removeAttribute('min');
        }
    }

    setInitialFormState();
</script>
<?= $this->endSection(); ?>