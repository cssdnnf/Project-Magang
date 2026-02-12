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
                        <h5 class="m-b-10">Project Details</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('projects'); ?>">Projects</a></li>
                        <li class="breadcrumb-item">Detail</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="<?= base_url('projects'); ?>" class="btn btn-light-brand">
                        <i class="feather-arrow-left me-2"></i> Back
                    </a>
                </div>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h3 class="fw-bold"><?= $project['project_name']; ?></h3>
                                    <?php 
                                        $badge = 'bg-soft-warning text-warning';
                                        if($project['status'] == 'Approved') $badge = 'bg-soft-primary text-primary';
                                        if($project['status'] == 'In Progress') $badge = 'bg-soft-info text-info';
                                        if($project['status'] == 'Completed') $badge = 'bg-soft-success text-success';
                                        if($project['status'] == 'Rejected') $badge = 'bg-soft-danger text-danger';
                                    ?>
                                    <span class="badge <?= $badge; ?> fs-12"><?= $project['status']; ?></span>
                                </div>
                                
                                <h6 class="text-muted">Description</h6>
                                <p class="text-dark mb-5"><?= nl2br($project['description']); ?></p>

                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="p-3 border rounded">
                                            <span class="fs-12 text-muted">Client Name</span>
                                            <h6 class="fw-bold mb-0 mt-1"><?= $project['client_name']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-3 border rounded">
                                            <span class="fs-12 text-muted">Budget</span>
                                            <h6 class="fw-bold mb-0 mt-1 text-success">Rp. <?= number_format($project['budget']); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <h5 class="mb-4">Timeline & Progress</h5>
                                
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-bold">Progress</span>
                                        <span class="text-muted"><?= $project['progress']; ?>%</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" style="width: <?= $project['progress']; ?>%"></div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush border-top">
                                    <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                        <span class="text-muted">Start Date</span>
                                        <span class="fw-bold"><?= date('d M Y', strtotime($project['start_date'])); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                        <span class="text-muted">End Date</span>
                                        <span class="fw-bold"><?= date('d M Y', strtotime($project['end_date'])); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between px-0 py-3">
                                        <span class="text-muted">Created At</span>
                                        <span><?= date('d M Y H:i', strtotime($project['created_at'])); ?></span>
                                    </li>
                                </ul>

                                <?php if($this->session->userdata('role') != 'user'): ?>
                                <div class="d-grid mt-4">
                                    <a href="<?= base_url('projects/edit/' . $project['id']); ?>" class="btn btn-primary">Edit Project</a>
                                </div>
                                <?php endif; ?>
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