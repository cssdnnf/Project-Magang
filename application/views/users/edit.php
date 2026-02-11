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