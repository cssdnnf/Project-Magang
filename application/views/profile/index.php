<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/vendors.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/theme.min.css'); ?>">
</head>

<body>
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
                    <li class="nxl-item">
                        <a href="<?= base_url('dashboard'); ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span>
                        </a>
                    </li>

                    <li class="nxl-item">
                        <a href="<?= base_url('employees'); ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                            <span class="nxl-mtext">Data Karyawan</span>
                        </a>
                    </li>
                    
                    <?php if($this->session->userdata('role') == 'admin'): ?>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Users</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="<?= base_url('users'); ?>">List Users</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="<?= base_url('users/add'); ?>">Add User</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li class="nxl-item active">
                        <a href="<?= base_url('profile'); ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user"></i></span>
                            <span class="nxl-mtext">My Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                            <img src="<?= base_url('assets/images/avatar/undefined.png'); ?>" alt="user-image" class="img-fluid user-avtar me-0">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('assets/images/avatar/undefined.png'); ?>" alt="user-image" class="img-fluid user-avtar">
                                    <div>
                                        <h6 class="text-dark mb-0"><?= $user['username']; ?></h6>
                                        <span class="fs-12 fw-medium text-muted"><?= $user['role']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                                <i class="feather-log-out"></i> <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">My Profile</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Profile</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <?= $this->session->flashdata('message'); ?>
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card stretch stretch-full">
                            <div class="card-body text-center">
                                <div class="mb-4">
                                    <img src="<?= base_url('assets/images/avatar/undefined.png'); ?>" alt="" class="img-fluid rounded-circle" width="100">
                                </div>
                                <h5 class="mb-1"><?= $user['username']; ?></h5>
                                <p class="text-muted"><?= $user['email']; ?></p>
                                <span class="badge bg-primary"><?= ucfirst($user['role']); ?></span>
                                <div class="mt-4 text-start">
                                    <p class="mb-2"><strong>Member Since:</strong> <br> <?= date('d F Y', strtotime($user['created_at'])); ?></p>
                                    <p class="mb-2"><strong>Status:</strong> <br> Active</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Edit Profile & Password</h5>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('profile'); ?>" method="post">
                                    <div class="mb-4">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="<?= $user['email']; ?>" readonly disabled>
                                        <small class="text-muted">Email cannot be changed.</small>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="mb-3">Change Password</h6>
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Leave empty if not changing">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Confirm New Password</label>
                                            <input type="password" class="form-control" name="pass_conf" placeholder="Confirm new password">
                                        </div>
                                    </div>

                                    <div class="mt-4 text-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright © <?= date('Y'); ?></span>
            </p>
        </footer>
    </main>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>