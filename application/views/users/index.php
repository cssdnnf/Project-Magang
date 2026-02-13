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
                        <h5 class="m-b-10">User Management</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Total Users</div>
                                        <div class="fs-20 fw-bold text-dark"><?= $stats['total']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-primary text-primary border-soft-primary rounded">
                                        <i class="feather-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Active Accounts</div>
                                        <div class="fs-20 fw-bold text-success"><?= $stats['active']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-success text-success border-soft-success rounded">
                                        <i class="feather-user-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Administrators</div>
                                        <div class="fs-20 fw-bold text-dark"><?= $stats['admin']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-danger text-danger border-soft-danger rounded">
                                        <i class="feather-shield"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Staff Users</div>
                                        <div class="fs-20 fw-bold text-dark"><?= $stats['staff']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-warning text-warning border-soft-warning rounded">
                                        <i class="feather-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->session->flashdata('message'); ?>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            
                            <div class="card-header">
                                <h5 class="card-title">All Users</h5>
                                <div class="card-header-action">
                                    
                                    <form action="<?= base_url('users'); ?>" method="get" class="d-flex align-items-center gap-2">
                                        
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-end-0"><i class="feather-search text-muted"></i></span>
                                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search Username..." value="<?= $search_keyword; ?>">
                                        </div>

                                        <select class="form-select" name="sort" onchange="this.form.submit()" style="min-width: 150px;">
                                            <option value="newest" <?= ($current_sort == 'newest' || empty($current_sort)) ? 'selected' : ''; ?>>Terbaru</option>
                                            <option value="oldest" <?= ($current_sort == 'oldest') ? 'selected' : ''; ?>>Terlama</option>
                                            <option value="az" <?= ($current_sort == 'az') ? 'selected' : ''; ?>>Username (A-Z)</option>
                                            <option value="za" <?= ($current_sort == 'za') ? 'selected' : ''; ?>>Username (Z-A)</option>
                                        </select>

                                        <?php if($search_keyword || $current_sort): ?>
                                            <a href="<?= base_url('users'); ?>" class="btn btn-light-brand" data-bs-toggle="tooltip" title="Reset">
                                                <i class="feather-refresh-cw"></i>
                                            </a>
                                        <?php endif; ?>
                                    </form>

                                    <div class="ms-2">
                                        <a href="<?= base_url('users/add'); ?>" class="btn btn-primary">
                                            <i class="feather-plus me-2"></i> Add User
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="usersTable">
                                        <thead>
                                            <tr>
                                                <th width="50" class="text-center">#</th>
                                                <th>User Profile</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Joined Date</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; foreach($users_list as $u) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-text bg-soft-primary text-primary">
                                                            <?= substr($u['username'], 0, 1); ?>
                                                        </div>
                                                        <span class="fw-bold text-dark"><?= $u['username']; ?></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?= $u['email']; ?>" class="text-muted">
                                                        <?= $u['email']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $badge_color = 'bg-secondary';
                                                        if($u['role'] == 'admin') $badge_color = 'bg-primary';
                                                        if($u['role'] == 'staff') $badge_color = 'bg-info';
                                                    ?>
                                                    <span class="badge <?= $badge_color; ?>"><?= ucfirst($u['role']); ?></span>
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
                                                            <a class="dropdown-item" href="<?= base_url('users/edit/') . $u['id']; ?>"><i class="feather-edit me-2"></i>Edit</a>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('users/delete/') . $u['id']; ?>" onclick="return confirm('Yakin ingin menghapus user ini?');"><i class="feather-trash-2 me-2"></i>Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                            <?php if(empty($users_list)): ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-5">
                                                        <i class="feather-search fs-1 mb-3 text-muted d-block"></i>
                                                        <span class="text-muted">User tidak ditemukan.</span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="footer"><p class="fs-11 text-muted mb-0">Copyright © <?= date('Y'); ?></p></footer>
    </main>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>