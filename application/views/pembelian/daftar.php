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
                        <h5 class="m-b-10">Daftar Pembelian</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Pembelian</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <?= $this->session->flashdata('message'); ?>
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No. Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Vendor / Supplier</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#" class="fw-bold">PR-20231001-001</a></td>
                                        <td>01 Oct 2023</td>
                                        <td>Permintaan Pembelian</td>
                                        <td>-</td>
                                        <td>Rp 15.000.000</td>
                                        <td><span class="badge bg-soft-warning text-warning">Pending</span></td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand" data-bs-toggle="dropdown"><i class="feather-more-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item"><i class="feather-eye me-2"></i>Detail</a>
                                                    <a href="#" class="dropdown-item"><i class="feather-edit me-2"></i>Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="fw-bold">PO-20231005-088</a></td>
                                        <td>05 Oct 2023</td>
                                        <td>Pemesanan (PO)</td>
                                        <td>PT. Sinar Jaya</td>
                                        <td>Rp 5.500.000</td>
                                        <td><span class="badge bg-soft-success text-success">Approved</span></td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand" data-bs-toggle="dropdown"><i class="feather-more-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item"><i class="feather-eye me-2"></i>Detail</a>
                                                    <a href="#" class="dropdown-item"><i class="feather-printer me-2"></i>Print</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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