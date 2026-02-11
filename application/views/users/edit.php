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
                            <span class="nxl-mtext">Users Management</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="<?= base_url('users'); ?>">List Users</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="<?= base_url('users/add'); ?>">Add User</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li class="nxl-item">
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
                                        <span class="fs-12 fw-medium text-muted"><?= $user['email']; ?></span>
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
                        <h5 class="m-b-10">Add User</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('users'); ?>">Users</a></li>
                        <li class="breadcrumb-item">Add</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Edit User Information</h5>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('users/edit/' . $edit_user['id']); ?>" method="post">
                                    
                                    <div class="mb-4">
                                        <label class="form-label">Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" value="<?= $edit_user['username']; ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="<?= $edit_user['email']; ?>" readonly disabled>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Role / Hak Akses <span class="text-danger">*</span></label>
                                        <select class="form-control" name="role">
                                            <option value="admin" <?= $edit_user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                            <option value="staff" <?= $edit_user['role'] == 'staff' ? 'selected' : ''; ?>>Staff</option>
                                            <option value="user" <?= $edit_user['role'] == 'user' ? 'selected' : ''; ?>>User Biasa</option>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Status Akun <span class="text-danger">*</span></label>
                                        <select class="form-control" name="is_active">
                                            <option value="1" <?= $edit_user['is_active'] == 1 ? 'selected' : ''; ?>>Active (Aktif)</option>
                                            <option value="0" <?= $edit_user['is_active'] == 0 ? 'selected' : ''; ?>>Inactive (Tidak Aktif)</option>
                                        </select>
                                        <small class="text-muted">Jika Inactive, user tidak akan bisa login.</small>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Change Password <small class="text-muted">(Biarkan kosong jika tidak ingin mengganti)</small></label>
                                        <input type="password" class="form-control" name="password" placeholder="New Password">
                                    </div>

                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-warning">Update User</button>
                                        <a href="<?= base_url('users'); ?>" class="btn btn-light">Cancel</a>
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