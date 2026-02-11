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
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Employee</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('employees'); ?>">Employees</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('employees/edit/' . $emp['id']); ?>" method="post">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="mb-4 text-center">
                                        <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                            <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3 rounded-circle bg-light text-center d-flex align-items-center justify-content-center">
                                                <span class="fs-40 text-primary fw-bold"><?= substr($emp['name'], 0, 1); ?></span>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold mb-1"><?= $emp['name']; ?></h5>
                                        <p class="text-muted"><?= $emp['position']; ?></p>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="form-label">NIP (Read-only)</label>
                                        <input type="text" class="form-control" value="<?= $emp['nip']; ?>" readonly disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-8 col-xl-12">
                            <div class="card stretch stretch-full">
                                <div class="card-header">
                                    <h5 class="card-title">Update Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-lg-12">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="<?= $emp['name']; ?>">
                                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" value="<?= $emp['email']; ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone" value="<?= $emp['phone']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">Position / Job Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="position" value="<?= $emp['position']; ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Division / Department</label>
                                            <select class="form-control" name="division">
                                                <option value="IT" <?= $emp['division'] == 'IT' ? 'selected' : ''; ?>>IT / Engineering</option>
                                                <option value="HR" <?= $emp['division'] == 'HR' ? 'selected' : ''; ?>>Human Resources</option>
                                                <option value="Finance" <?= $emp['division'] == 'Finance' ? 'selected' : ''; ?>>Finance</option>
                                                <option value="Marketing" <?= $emp['division'] == 'Marketing' ? 'selected' : ''; ?>>Marketing</option>
                                                <option value="General" <?= $emp['division'] == 'General' ? 'selected' : ''; ?>>General</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Hire Date</label>
                                        <input type="date" class="form-control" name="hire_date" value="<?= $emp['hire_date']; ?>">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="4"><?= $emp['address']; ?></textarea>
                                    </div>

                                    <div class="text-end">
                                        <a href="<?= base_url('employees'); ?>" class="btn btn-light">Cancel</a>
                                        <button type="submit" class="btn btn-warning">Save Changes</button>
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