<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= in_groups('admin') ? route_to('dashboard.admin.index') : route_to('dashboard.user.index') ?>"><img src="<?= base_url('img/logo.png') ?>" alt="Kayangan Harbor Logo" style="width: 100%; height: auto; object-fit: cover;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu Utama</li>
                <li class="sidebar-item">
                    <a href="<?= base_url() ?>" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Kembali</span>
                    </a>
                </li>
                <li class="sidebar-item <?= uri_string() === 'dashboard/admin' || uri_string() === 'dashboard/user' ? 'active' : '' ?>">
                    <a href="<?= in_groups('admin') ? route_to('dashboard.admin.index') : route_to('dashboard.user.index') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dasbor</span>
                    </a>
                </li>

                <li class="sidebar-title">Manajemen</li>
                <?php if (in_groups('admin')) : ?>
                    <li class="sidebar-item <?= url_is('dashboard/users*') ? 'active' : '' ?>">
                        <a href="<?= route_to('dashboard.admin.users.index') ?>" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= url_is('dashboard/admin/tickets*') ? 'active' : '' ?>">
                        <a href="<?= route_to('dashboard.admin.tickets.index') ?>" class='sidebar-link'>
                            <i class="bi bi-ticket-fill"></i>
                            <span>Tiket</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="sidebar-item <?= url_is('dashboard/user/orders*') || url_is('dashboard/admin/orders*') ? 'active' : '' ?>">
                    <a href="<?= in_groups('admin') ? route_to('dashboard.admin.orders.index') :  route_to('dashboard.user.orders.index') ?>" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Pesanan</span>
                    </a>
                </li>

                <li class="sidebar-title">Pengaturan</li>
                <li class="sidebar-item <?= uri_string() === 'dashboard/profile' ? 'active' : '' ?>">
                    <a href="<?= route_to('dashboard.profile.index') ?>" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="sidebar-item <?= uri_string() === 'dashboard/profile/edit' ? 'active' : '' ?>">
                    <a href="<?= route_to('dashboard.profile.edit') ?>" class='sidebar-link'>
                        <i class="bi bi-pencil-fill"></i>
                        <span>Ubah Profil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= url_to('logout') ?>" class='sidebar-link'>
                        <i class="bi bi-arrow-right-square-fill"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>