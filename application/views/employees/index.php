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
                    <li class="nxl-item active">
                        <a href="<?= base_url('employees'); ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Employees</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('role') == 'admin'): ?>
                    <li class="nxl-item">
                        <a href="<?= base_url('users'); ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-check"></i></span>
                            <span class="nxl-mtext">Users Management</span>
                        </a>
                    </li>
                    <?php endif; ?>
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
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button">
                            <img src="<?= base_url('assets/images/avatar/1.png'); ?>" alt="user" class="img-fluid user-avtar me-0">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                            <div class="dropdown-header">
                                <h6 class="text-dark mb-0"><?= $user['username']; ?></h6>
                                <span class="fs-12 fw-medium text-muted"><?= $user['role']; ?></span>
                            </div>
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item"><i class="feather-log-out"></i> Logout</a>
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
                        <h5 class="m-b-10">Employees</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Employees</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex align-items-center gap-2">
                            <a href="<?= base_url('employees/add'); ?>" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Add Employee</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <?= $this->session->flashdata('message'); ?>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="customerList">
                                        <thead>
                                            <tr>
                                                <th width="50">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                                        <label class="custom-control-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>Employee Name</th>
                                                <th>NIP / Position</th>
                                                <th>Contact Info</th>
                                                <th>Division</th>
                                                <th>Hire Date</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($employees as $emp) : ?>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck<?= $emp['id']; ?>">
                                                        <label class="custom-control-label" for="customCheck<?= $emp['id']; ?>"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-image">
                                                            <div class="avatar-text bg-soft-primary text-primary">
                                                                <?= substr($emp['name'], 0, 1); ?>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <span class="d-block text-dark fw-bold"><?= $emp['name']; ?></span>
                                                            <span class="fs-12 text-muted">ID: #<?= $emp['id']; ?></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-primary text-primary mb-1"><?= $emp['nip']; ?></span>
                                                    <div class="fs-12 text-dark"><?= $emp['position']; ?></div>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?= $emp['email']; ?>" class="d-block text-muted fs-12"><i class="feather-mail me-1"></i> <?= $emp['email']; ?></a>
                                                    <a href="tel:<?= $emp['phone']; ?>" class="d-block text-muted fs-12"><i class="feather-phone me-1"></i> <?= $emp['phone']; ?></a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border"><?= $emp['division']; ?></span>
                                                </td>
                                                <td><?= date('d M, Y', strtotime($emp['hire_date'])); ?></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand" data-bs-toggle="dropdown">
                                                            <i class="feather-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="<?= base_url('employees/edit/') . $emp['id']; ?>" class="dropdown-item">
                                                                <i class="feather-edit me-3"></i>Edit
                                                            </a>
                                                            <?php if($this->session->userdata('role') == 'admin'): ?>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="<?= base_url('employees/delete/') . $emp['id']; ?>" class="dropdown-item text-danger" onclick="return confirm('Delete this employee?');">
                                                                <i class="feather-trash-2 me-3"></i>Delete
                                                            </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                            <?php if(empty($employees)): ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-5">No employees found.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                    <li><a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a></li>
                                    <li><a href="javascript:void(0);" class="active">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li><a href="javascript:void(0);"><i class="bi bi-dot"></i></a></li>
                                    <li><a href="javascript:void(0);">8</a></li>
                                    <li><a href="javascript:void(0);">9</a></li>
                                    <li><a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">Copyright © <?= date('Y'); ?></p>
        </footer>
    </main>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>