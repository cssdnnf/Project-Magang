<header class="nxl-header">
    <div class="header-wrapper">
        <div class="header-left d-flex align-items-center gap-4">
            <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box"><div class="hamburger-inner"></div></div>
                </div>
            </a>
        </div>
        <div class="header-right ms-auto">
            <div class="d-flex align-items-center">
                <div class="dropdown nxl-h-item">
                    <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button">
                        <img src="<?= base_url('assets/images/avatar/1.png'); ?>" alt="user" class="img-fluid user-avtar me-0">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                        <div class="dropdown-header">
                            <h6 class="text-dark mb-0"><?= $this->session->userdata('username'); ?></h6>
                            <span class="fs-12 fw-medium text-muted"><?= ucfirst($this->session->userdata('role')); ?></span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('profile'); ?>" class="dropdown-item">
                            <i class="feather-user"></i> Profile
                        </a>
                        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                            <i class="feather-log-out"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>