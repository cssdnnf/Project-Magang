<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="<?= base_url('dashboard'); ?>" class="b-brand">
                <img src="<?= base_url('assets/images/logo-full.png'); ?>" alt="" class="logo logo-lg">
                <img src="<?= base_url('assets/images/logo-abbr.png'); ?>" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption"><label>Navigation</label></li>

                <li class="nxl-item <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                    <a href="<?= base_url('dashboard'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="nxl-item nxl-hasmenu <?= ($this->uri->segment(1) == 'pembelian') ? 'active open' : ''; ?>">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-shopping-cart"></i></span>
                        <span class="nxl-mtext">Pembelian</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link <?= ($this->uri->segment(2) == 'daftar' || $this->uri->segment(2) == '') ? 'active' : ''; ?>" href="<?= base_url('pembelian/daftar'); ?>">Daftar Pembelian</a></li>
                        <li class="nxl-item"><a class="nxl-link <?= ($this->uri->segment(2) == 'permintaan') ? 'active' : ''; ?>" href="<?= base_url('pembelian/permintaan'); ?>">Permintaan Pembelian</a></li>
                        <li class="nxl-item"><a class="nxl-link <?= ($this->uri->segment(2) == 'penawaran') ? 'active' : ''; ?>" href="<?= base_url('pembelian/penawaran'); ?>">Penawaran Pembelian</a></li>
                        <li class="nxl-item"><a class="nxl-link <?= ($this->uri->segment(2) == 'pemesanan') ? 'active' : ''; ?>" href="<?= base_url('pembelian/pemesanan'); ?>">Pemesanan Pembelian</a></li>
                        <li class="nxl-item"><a class="nxl-link <?= ($this->uri->segment(2) == 'faktur') ? 'active' : ''; ?>" href="<?= base_url('pembelian/faktur'); ?>">Faktur Pembelian</a></li>
                        <li class="nxl-item"><a class="nxl-link <?= ($this->uri->segment(2) == 'tukar_faktur') ? 'active' : ''; ?>" href="<?= base_url('pembelian/tukar_faktur'); ?>">Tukar Faktur</a></li>
                    </ul>
                </li>

                <li class="nxl-item <?= ($this->uri->segment(1) == 'projects') ? 'active' : ''; ?>">
                    <a href="<?= base_url('projects'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layers"></i></span>
                        <span class="nxl-mtext">Projects</span>
                    </a>
                </li>
                
                <li class="nxl-item <?= ($this->uri->segment(1) == 'employees') ? 'active' : ''; ?>">
                    <a href="<?= base_url('employees'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Employees</span>
                    </a>
                </li>

                <li class="nxl-item <?= ($this->uri->segment(1) == 'products') ? 'active' : ''; ?>">
                    <a href="<?= base_url('products'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-box"></i></span>
                        <span class="nxl-mtext">Data Produk</span>
                    </a>
                </li>

                <li class="nxl-item <?= ($this->uri->segment(1) == 'suppliers') ? 'active' : ''; ?>">
                    <a href="<?= base_url('suppliers'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Data Kontak</span>
                    </a>
                </li>

                <?php if($this->session->userdata('role') == 'admin'): ?>
                <li class="nxl-item <?= ($this->uri->segment(1) == 'users') ? 'active' : ''; ?>">
                    <a href="<?= base_url('users'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-lock"></i></span>
                        <span class="nxl-mtext">User Management</span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="nxl-item <?= ($this->uri->segment(1) == 'profile') ? 'active' : ''; ?>">
                    <a href="<?= base_url('profile'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-user"></i></span>
                        <span class="nxl-mtext">My Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>