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
                        <h5 class="m-b-10">Projects</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Projects</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><div class="fs-12 text-muted mb-1">Total Projects</div><div class="fs-20 fw-bold text-dark"><?= $stats['total']; ?></div></div>
                                    <div class="avatar-text avatar-lg bg-soft-primary text-primary border-soft-primary rounded"><i class="feather-layers"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><div class="fs-12 text-muted mb-1">Pending Approval</div><div class="fs-20 fw-bold text-warning"><?= $stats['pending']; ?></div></div>
                                    <div class="avatar-text avatar-lg bg-soft-warning text-warning border-soft-warning rounded"><i class="feather-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><div class="fs-12 text-muted mb-1">Active Projects</div><div class="fs-20 fw-bold text-success"><?= $stats['approved']; ?></div></div>
                                    <div class="avatar-text avatar-lg bg-soft-success text-success border-soft-success rounded"><i class="feather-check-square"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><div class="fs-12 text-muted mb-1">Total Budget</div><div class="fs-20 fw-bold text-dark">$<?= number_format($stats['budget'], 0, ',', '.'); ?></div></div>
                                    <div class="avatar-text avatar-lg bg-soft-info text-info border-soft-info rounded"><i class="feather-dollar-sign"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->session->flashdata('message'); ?>

                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Project List</h5>
                        <div class="card-header-action">
                            <form action="<?= base_url('projects'); ?>" method="get" class="d-flex align-items-center gap-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="feather-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search project..." value="<?= $search_keyword; ?>">
                                </div>
                                <select class="form-select" name="sort" onchange="this.form.submit()" style="min-width: 150px;">
                                    <option value="newest" <?= ($current_sort == 'newest') ? 'selected' : ''; ?>>Newest</option>
                                    <option value="budget_high" <?= ($current_sort == 'budget_high') ? 'selected' : ''; ?>>Highest Budget</option>
                                    <option value="az" <?= ($current_sort == 'az') ? 'selected' : ''; ?>>Name (A-Z)</option>
                                </select>
                            </form>
                            
                            <?php if($this->session->userdata('role') != 'user'): ?>
                            <div class="ms-2">
                                <a href="<?= base_url('projects/add'); ?>" class="btn btn-primary"><i class="feather-plus me-2"></i> Create Project</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Client</th>
                                        <th>Timeline</th>
                                        <th>Budget</th>
                                        <th>Status</th>
                                        <th>Progress</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($projects as $p) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('projects/view/'.$p['id']); ?>" class="fw-bold text-dark mb-1 d-block"><?= $p['project_name']; ?></a>
                                            <small class="text-muted">Created: <?= date('d M Y', strtotime($p['created_at'])); ?></small>
                                        </td>
                                        <td><?= $p['client_name']; ?></td>
                                        <td>
                                            <div class="fs-12"><?= date('d M', strtotime($p['start_date'])); ?> - <?= date('d M, Y', strtotime($p['end_date'])); ?></div>
                                        </td>
                                        <td>$<?= number_format($p['budget']); ?></td>
                                        <td>
                                            <?php 
                                            $badge = 'bg-soft-warning text-warning';
                                            if($p['status'] == 'Approved') $badge = 'bg-soft-primary text-primary';
                                            if($p['status'] == 'In Progress') $badge = 'bg-soft-info text-info';
                                            if($p['status'] == 'Completed') $badge = 'bg-soft-success text-success';
                                            if($p['status'] == 'Rejected') $badge = 'bg-soft-danger text-danger';
                                            ?>
                                            <span class="badge <?= $badge; ?>"><?= $p['status']; ?></span>
                                        </td>
                                        <td width="150">
                                            <div class="progress mt-1" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $p['progress']; ?>%"></div>
                                            </div>
                                            <small class="text-muted"><?= $p['progress']; ?>% Completed</small>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand" data-bs-toggle="dropdown"><i class="feather-more-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="<?= base_url('projects/view/'.$p['id']); ?>" class="dropdown-item">
                                                        <i class="feather-eye me-2"></i>Details
                                                    </a>
                                                    
                                                    <?php if($this->session->userdata('role') != 'user'): ?>
                                                        <a href="<?= base_url('projects/edit/'.$p['id']); ?>" class="dropdown-item">
                                                            <i class="feather-edit me-2"></i>Edit
                                                        </a>
                                                        
                                                        <div class="dropdown-divider"></div>
                                                        <h6 class="dropdown-header">Quick Status</h6>
                                                        <a href="<?= base_url('projects/set_status/'.$p['id'].'/Approved'); ?>" class="dropdown-item text-primary">
                                                            <i class="feather-check me-2"></i>Approve
                                                        </a>
                                                        <a href="<?= base_url('projects/set_status/'.$p['id'].'/In Progress'); ?>" class="dropdown-item text-info">
                                                            <i class="feather-play me-2"></i>In Progress
                                                        </a>

                                                        <a href="<?= base_url('projects/set_status/'.$p['id'].'/Completed'); ?>" class="dropdown-item text-success" onclick="return confirm('Tandai project ini selesai (100%)?');">
                                                            <i class="feather-check-circle me-2"></i>Completed
                                                        </a>

                                                        <a href="<?= base_url('projects/set_status/'.$p['id'].'/Rejected'); ?>" class="dropdown-item text-danger">
                                                            <i class="feather-x me-2"></i>Reject
                                                        </a>
                                                        
                                                        <?php if($this->session->userdata('role') == 'admin'): ?>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="<?= base_url('projects/delete/'.$p['id']); ?>" class="dropdown-item text-danger" onclick="return confirm('Delete project?');">
                                                            <i class="feather-trash-2 me-2"></i>Delete
                                                        </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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