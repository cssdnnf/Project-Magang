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

                <li class="nxl-item <?= ($this->uri->segment(1) == 'employees') ? 'active' : ''; ?>">
                    <a href="<?= base_url('employees'); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Employees</span>
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