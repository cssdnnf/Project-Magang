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
                        <h5 class="m-b-10">Edit Project</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('projects'); ?>">Projects</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('projects/edit/' . $project['id']); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card stretch stretch-full">
                                <div class="card-header">
                                    <h5 class="card-title">Project Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="project_name" value="<?= $project['project_name']; ?>" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Client Name</label>
                                        <input type="text" class="form-control" name="client_name" value="<?= $project['client_name']; ?>" required>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" class="form-control" name="start_date" value="<?= $project['start_date']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">End Date</label>
                                            <input type="date" class="form-control" name="end_date" value="<?= $project['end_date']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="5"><?= $project['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card stretch stretch-full">
                                <div class="card-header">
                                    <h5 class="card-title">Status & Budget</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Budget ($)</label>
                                        <input type="number" class="form-control" name="budget" value="<?= $project['budget']; ?>">
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status" id="statusSelect">
                                            <option value="Pending" <?= $project['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="Approved" <?= $project['status'] == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="In Progress" <?= $project['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                            <option value="Completed" <?= $project['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                            <option value="Rejected" <?= $project['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">Progress</label>
                                            <span class="fw-bold text-primary" id="progressLabel"><?= $project['progress']; ?>%</span>
                                        </div>
                                        
                                        <input type="range" class="form-range" name="progress" min="0" max="100" value="<?= $project['progress']; ?>" id="progressSlider">
                                    </div>

                                    <hr>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-warning">Update Project</button>
                                        <a href="<?= base_url('projects'); ?>" class="btn btn-light">Cancel</a>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.getElementById("progressSlider");
            const label = document.getElementById("progressLabel");
            const statusSelect = document.getElementById("statusSelect");

            // 1. Ubah Angka saat Slider digeser
            slider.addEventListener("input", function() {
                label.innerText = this.value + "%";
                
                // UX Tambahan: Jika digeser < 100, ubah status Completed jadi In Progress otomatis (opsional)
                // if (this.value < 100 && statusSelect.value === 'Completed') {
                //    statusSelect.value = 'In Progress';
                // }
                // UX Tambahan: Jika digeser mentok 100, ubah status jadi Completed
                if (this.value == 100) {
                    statusSelect.value = 'Completed';
                }
            });

            // 2. Ubah Slider saat Status Dropdown berubah
            statusSelect.addEventListener("change", function() {
                if (this.value === "Completed") {
                    slider.value = 100;
                    label.innerText = "100%";
                } else if (this.value === "Pending") {
                    slider.value = 0;
                    label.innerText = "0%";
                }
                // Untuk status Approved/In Progress biarkan user mengatur slider sendiri
            });
        });
    </script>
</body>
</html>