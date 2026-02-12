<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/theme.min.css'); ?>">
</head>
<body>
    <?php $this->load->view('partials/sidebar'); ?>
    <?php $this->load->view('partials/header'); ?>

    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-title"><h5 class="m-b-10"><?= $title; ?></h5></div>
            </div>
            <div class="main-content">
                <div class="card">
                    <div class="card-body text-center p-5">
                        <i class="feather-monitor fs-1 text-muted mb-3 d-block"></i>
                        <h3>Halaman <?= $title; ?></h3>
                        <p class="text-muted">Modul ini sedang dalam pengembangan.</p>
                        <a href="<?= base_url('pembelian/daftar'); ?>" class="btn btn-primary">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>