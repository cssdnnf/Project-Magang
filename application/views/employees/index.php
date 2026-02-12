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
                        <h5 class="m-b-10">Employees</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Employees</li>
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
                                        <div class="fs-12 text-muted mb-1">Total Employees</div>
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
                                        <div class="fs-12 text-muted mb-1">Active Employees</div>
                                        <div class="fs-20 fw-bold text-success"><?= $stats['active']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-success text-success border-soft-success rounded">
                                        <i class="feather-check-circle"></i>
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
                                        <div class="fs-12 text-muted mb-1">Total Divisions</div>
                                        <div class="fs-20 fw-bold text-dark"><?= $stats['divisions']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-warning text-warning border-soft-warning rounded">
                                        <i class="feather-briefcase"></i>
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
                                        <div class="fs-12 text-muted mb-1">New This Month</div>
                                        <div class="fs-20 fw-bold text-dark">+<?= $stats['new_this_month']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-info text-info border-soft-info rounded">
                                        <i class="feather-user-plus"></i>
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
                                <h5 class="card-title">Employee List</h5>
                                <div class="card-header-action">
                                    
                                    <form action="<?= base_url('employees'); ?>" method="get" class="d-flex align-items-center gap-2">
                                        
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-end-0"><i class="feather-search text-muted"></i></span>
                                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search..." value="<?= $search_keyword; ?>">
                                        </div>

                                        <select class="form-select" name="sort" onchange="this.form.submit()" style="min-width: 150px;">
                                            <option value="newest" <?= ($current_sort == 'newest' || empty($current_sort)) ? 'selected' : ''; ?>>Newest (9-0)</option>
                                            <option value="oldest" <?= ($current_sort == 'oldest') ? 'selected' : ''; ?>>Oldest (0-9)</option>
                                            <option value="az" <?= ($current_sort == 'az') ? 'selected' : ''; ?>>Name (A-Z)</option>
                                            <option value="za" <?= ($current_sort == 'za') ? 'selected' : ''; ?>>Name (Z-A)</option>
                                        </select>

                                        <?php if($search_keyword || $current_sort): ?>
                                            <a href="<?= base_url('employees'); ?>" class="btn btn-light-brand" data-bs-toggle="tooltip" title="Reset Filter">
                                                <i class="feather-refresh-cw"></i>
                                            </a>
                                        <?php endif; ?>
                                    </form>

                                    <?php if($this->session->userdata('role') != 'user'): ?>
                                    <div class="ms-2">
                                        <a href="<?= base_url('employees/add'); ?>" class="btn btn-primary">
                                            <i class="feather-plus me-2"></i> Add
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="employeeTable">
                                        <thead>
                                            <tr>
                                                <th width="50">#</th>
                                                <th>Employee Name</th>
                                                <th>NIP / Position</th>
                                                <th>Contacts</th>
                                                <th>Division</th>
                                                <th>Status</th>
                                                <?php if($this->session->userdata('role') != 'user'): ?>
                                                <th class="text-end">Actions</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($employees as $emp) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-text bg-soft-primary text-primary">
                                                            <?= substr($emp['name'], 0, 1); ?>
                                                        </div>
                                                        <div>
                                                            <span class="d-block fw-bold text-dark"><?= $emp['name']; ?></span>
                                                            <span class="fs-12 text-muted">Joined: <?= date('M Y', strtotime($emp['hire_date'])); ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-info text-info mb-1"><?= $emp['nip']; ?></span>
                                                    <div class="fs-12 fw-medium text-dark"><?= $emp['position']; ?></div>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?= $emp['email']; ?>" class="d-block text-muted fs-12 mb-1">
                                                        <i class="feather-mail me-1"></i> <?= $emp['email']; ?>
                                                    </a>
                                                    <div class="text-muted fs-12">
                                                        <i class="feather-phone me-1"></i> <?= $emp['phone']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border"><?= $emp['division']; ?></span>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $status_class = ($emp['status'] == 'Active') ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'; 
                                                    ?>
                                                    <span class="badge <?= $status_class; ?>"><?= $emp['status']; ?></span>
                                                </td>
                                                
                                                <?php if($this->session->userdata('role') != 'user'): ?>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand" data-bs-toggle="dropdown">
                                                            <i class="feather-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="<?= base_url('employees/edit/') . $emp['id']; ?>" class="dropdown-item">
                                                                <i class="feather-edit me-2"></i>Edit
                                                            </a>
                                                            <?php if($this->session->userdata('role') == 'admin'): ?>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="<?= base_url('employees/delete/') . $emp['id']; ?>" class="dropdown-item text-danger" onclick="return confirm('Delete this employee?');">
                                                                    <i class="feather-trash-2 me-2"></i>Delete
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                            <?php if(empty($employees)): ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-5">
                                                        <i class="feather-search fs-1 mb-3 text-muted d-block"></i>
                                                        <span class="text-muted">No employees found matching "<strong><?= $search_keyword; ?></strong>"</span>
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