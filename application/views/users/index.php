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
                        <h5 class="m-b-10">List Users</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="<?= base_url('users/add'); ?>" class="btn btn-primary">
                        <i class="feather-plus me-2"></i> Add New User
                    </a>
                </div>
            </div>

            <div class="main-content">
                <?= $this->session->flashdata('message'); ?>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="usersTable">
                                        <thead>
                                            <tr>
                                                <th width="50">#</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Role</th> <th>Status</th>
                                                <th>Created At</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; foreach($users_list as $u) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar-text avatar-sm bg-soft-primary"><?= substr($u['username'], 0, 1); ?></div>
                                                        <span class="fw-bold"><?= $u['username']; ?></span>
                                                    </div>
                                                </td>
                                                <td><?= $u['email']; ?></td>
                                                
                                                <td>
                                                    <?php if($u['role'] == 'admin'): ?>
                                                        <span class="badge bg-primary">Admin</span>
                                                    <?php elseif($u['role'] == 'staff'): ?>
                                                        <span class="badge bg-info">Staff</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">User</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if($u['is_active'] == 1): ?>
                                                        <span class="badge bg-soft-success text-success">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-soft-danger text-danger">Inactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= date('d M Y', strtotime($u['created_at'])); ?></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand" data-bs-toggle="dropdown">
                                                            <i class="feather-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="<?= base_url('users/edit/') . $u['id']; ?>">
                                                                <i class="feather-edit me-2"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('users/delete/') . $u['id']; ?>" onclick="return confirm('Yakin ingin menghapus user ini?');">
                                                                <i class="feather-trash-2 me-2"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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