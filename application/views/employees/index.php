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
                
                <?php if($this->session->userdata('role') != 'user'): ?>
                <div class="page-header-right ms-auto">
                    <a href="<?= base_url('employees/add'); ?>" class="btn btn-primary">
                        <i class="feather-plus me-2"></i> Add New Employee
                    </a>
                </div>
                <?php endif; ?>
                </div>

            <div class="main-content">
                <?= $this->session->flashdata('message'); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="employeeTable">
                                        <thead>
                                            <tr>
                                                <th width="50" class="text-center">#</th>
                                                <th>Employee Name</th>
                                                <th>NIP / Position</th>
                                                <th>Contacts</th>
                                                <th>Division</th>
                                                <th>Hire Date</th>
                                                <?php if($this->session->userdata('role') != 'user'): ?>
                                                    <th class="text-end">Actions</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($employees as $emp) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-image">
                                                            <div class="avatar-text bg-soft-primary text-primary">
                                                                <?= substr($emp['name'], 0, 1); ?>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="d-block fw-bold text-dark"><?= $emp['name']; ?></span>
                                                            <span class="fs-12 text-muted">ID: #<?= $emp['id']; ?></span>
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
                                                    <a href="tel:<?= $emp['phone']; ?>" class="d-block text-muted fs-12">
                                                        <i class="feather-phone me-1"></i> <?= $emp['phone']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border"><?= $emp['division']; ?></span>
                                                </td>
                                                <td><?= date('d M, Y', strtotime($emp['hire_date'])); ?></td>
                                                
                                                <?php if($this->session->userdata('role') != 'user'): ?>
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
                                                                <a href="<?= base_url('employees/delete/') . $emp['id']; ?>" class="dropdown-item text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?');">
                                                                    <i class="feather-trash-2 me-3"></i>Delete
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
                                                    <td colspan="7" class="text-center py-5">Tidak ada data karyawan ditemukan.</td>
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
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">Copyright © <?= date('Y'); ?></p>
        </footer>
    </main>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>