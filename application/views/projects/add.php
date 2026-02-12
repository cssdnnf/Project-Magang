<!DOCTYPE html>
<html lang="zxx">
<head>
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
                    <div class="page-header-title"><h5 class="m-b-10">Create Project</h5></div>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('projects/add'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="project_name" required>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="client_name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Budget ($)</label>
                                            <input type="number" class="form-control" name="budget" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" class="form-control" name="start_date" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">End Date</label>
                                            <input type="date" class="form-control" name="end_date" required>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4"></textarea>
                                    </div>
                                    <div class="text-end">
                                        <a href="<?= base_url('projects'); ?>" class="btn btn-light">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Create Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>