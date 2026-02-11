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
    <?php $this->load->view('partials/sidebar'); ?>
    <?php $this->load->view('partials/header'); ?>
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