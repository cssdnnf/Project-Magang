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
                        <div class="col-xl-12">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <h5 class="mb-4">Personal Information</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">NIP <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nip" value="<?= set_value('nip'); ?>">
                                            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="<?= set_value('name'); ?>">
                                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="<?= set_value('phone'); ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Position</label>
                                            <input type="text" class="form-control" name="position" value="<?= set_value('position'); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Division</label>
                                            <select class="form-control" name="division">
                                                <option value="IT">IT</option>
                                                <option value="HR">HR</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="General">General</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Active" <?= $emp['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                                                <option value="Inactive" <?= $emp['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                                                <option value="Resigned" <?= $emp['status'] == 'Resigned' ? 'selected' : ''; ?>>Resigned</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Hire Date</label>
                                        <input type="date" class="form-control" name="hire_date" value="<?= set_value('hire_date'); ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="3"><?= set_value('address'); ?></textarea>
                                    </div>
                                    <div class="text-end">
                                        <a href="<?= base_url('employees'); ?>" class="btn btn-light">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save Employee</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="footer"><p class="fs-11 text-muted mb-0">Copyright © <?= date('Y'); ?></p></footer>
    </main>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>