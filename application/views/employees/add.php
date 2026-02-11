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
                    <li class="nxl-item"><a href="<?= base_url('dashboard'); ?>" class="nxl-link"><span class="nxl-micon"><i class="feather-airplay"></i></span><span class="nxl-mtext">Dashboards</span></a></li>
                    <li class="nxl-item active"><a href="<?= base_url('employees'); ?>" class="nxl-link"><span class="nxl-micon"><i class="feather-users"></i></span><span class="nxl-mtext">Employees</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="nxl-header">
        <div class="header-wrapper">
            <div class="header-left d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse"><div class="hamburger hamburger--arrowturn"><div class="hamburger-box"><div class="hamburger-inner"></div></div></div></a>
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
                        <h5 class="m-b-10">Create Employee</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('employees'); ?>">Employees</a></li>
                        <li class="breadcrumb-item">Create</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('employees/add'); ?>" method="post">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="mb-4 text-center">
                                        <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                            <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3 rounded-circle bg-light text-center d-flex align-items-center justify-content-center">
                                                <i class="feather-user fs-40 text-muted"></i>
                                            </div>
                                            <div class="wd-30 ht-30 position-absolute bottom-0 end-0 bg-primary rounded-circle text-white d-flex align-items-center justify-content-center">
                                                <i class="feather-camera"></i>
                                            </div>
                                        </div>
                                        <div class="fs-12 text-muted">Only *.png, *.jpg and *.jpeg image files are accepted</div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="form-label">Employee Status</label>
                                        <select class="form-control" disabled>
                                            <option value="Active" selected>Active</option>
                                        </select>
                                        <small class="text-muted">Default status is active.</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-8 col-xl-12">
                            <div class="card stretch stretch-full">
                                <div class="card-header">
                                    <h5 class="card-title">General Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">NIP <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nip" placeholder="e.g 2023001" value="<?= set_value('nip'); ?>">
                                            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Employee Name" value="<?= set_value('name'); ?>">
                                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="email@company.com" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone" placeholder="+62..." value="<?= set_value('phone'); ?>">
                                            <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">Position / Job Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="position" placeholder="e.g. Software Engineer" value="<?= set_value('position'); ?>">
                                            <?= form_error('position', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Division / Department</label>
                                            <select class="form-control" name="division">
                                                <option value="IT">IT / Engineering</option>
                                                <option value="HR">Human Resources</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="General">General</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Hire Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="hire_date" value="<?= set_value('hire_date'); ?>">
                                        <?= form_error('hire_date', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="4" placeholder="Full Address"><?= set_value('address'); ?></textarea>
                                    </div>

                                    <div class="text-end">
                                        <a href="<?= base_url('employees'); ?>" class="btn btn-light">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Create Employee</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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