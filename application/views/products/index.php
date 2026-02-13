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
                        <h5 class="m-b-10">Daftar Produk</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Produk</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                
                <!-- Statistics -->
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Total Produk</div>
                                        <div class="fs-20 fw-bold text-dark"><?= $stats['total']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-primary text-primary border-soft-primary rounded">
                                        <i class="feather-box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Dapat Dibeli</div>
                                        <div class="fs-20 fw-bold text-success"><?= $stats['purchasable']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-success text-success border-soft-success rounded">
                                        <i class="feather-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Dapat Dijual</div>
                                        <div class="fs-20 fw-bold text-info"><?= $stats['salable']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-info text-info border-soft-info rounded">
                                        <i class="feather-tag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-12 text-muted mb-1">Kategori</div>
                                        <div class="fs-20 fw-bold text-warning"><?= $stats['categories']; ?></div>
                                    </div>
                                    <div class="avatar-text avatar-lg bg-soft-warning text-warning border-soft-warning rounded">
                                        <i class="feather-layers"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">List Produk</h5>
                                <div class="card-header-action">
                                    <form action="<?= base_url('products'); ?>" method="get" class="d-flex align-items-center gap-2">
                                        
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-end-0"><i class="feather-search text-muted"></i></span>
                                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search..." value="<?= $keyword; ?>">
                                        </div>

                                        <select class="form-select" name="category" onchange="this.form.submit()" style="min-width: 150px;">
                                            <option value="">Semua Kategori</option>
                                            <option value="Aset" <?= ($selected_category == 'Aset') ? 'selected' : ''; ?>>Aset</option>
                                            <option value="Jasa" <?= ($selected_category == 'Jasa') ? 'selected' : ''; ?>>Jasa</option>
                                            <option value="Barang Jadi" <?= ($selected_category == 'Barang Jadi') ? 'selected' : ''; ?>>Barang Jadi</option>
                                            <option value="Bahan Baku" <?= ($selected_category == 'Bahan Baku') ? 'selected' : ''; ?>>Bahan Baku</option>
                                        </select>

                                        <select class="form-select" name="sort" onchange="this.form.submit()" style="min-width: 150px;">
                                            <option value="newest" <?= ($sort == 'newest' || empty($sort)) ? 'selected' : ''; ?>>Terbaru</option>
                                            <option value="oldest" <?= ($sort == 'oldest') ? 'selected' : ''; ?>>Terlama</option>
                                            <option value="az" <?= ($sort == 'az') ? 'selected' : ''; ?>>Nama (A-Z)</option>
                                            <option value="za" <?= ($sort == 'za') ? 'selected' : ''; ?>>Nama (Z-A)</option>
                                            <option value="price_low" <?= ($sort == 'price_low') ? 'selected' : ''; ?>>Harga Terendah</option>
                                            <option value="price_high" <?= ($sort == 'price_high') ? 'selected' : ''; ?>>Harga Tertinggi</option>
                                        </select>

                                        <?php if($keyword || $sort || $selected_category): ?>
                                            <a href="<?= base_url('products'); ?>" class="btn btn-light-brand" data-bs-toggle="tooltip" title="Reset Filter">
                                                <i class="feather-refresh-cw"></i>
                                            </a>
                                        <?php endif; ?>
                                    </form>

                                    <div class="ms-2">
                                        <a href="<?= base_url('products/add'); ?>" class="btn btn-primary">
                                            <i class="feather-plus me-2"></i> Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th class="text-end">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(empty($products)) : ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-5">
                                                        <i class="feather-search fs-1 mb-3 text-muted d-block"></i>
                                                        <span class="text-muted">Tidak ada produk ditemukan.</span>
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach($products as $p) : ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?= base_url('products/view/'.$p['id']); ?>" class="fw-bold">
                                                            <?= $p['code']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?= $p['name']; ?></td>
                                                    <td>
                                                        <span class="badge bg-light text-dark border"><?= $p['category']; ?></span>
                                                    </td>
                                                    <td>Rp <?= number_format($p['unit_price'], 2, ',', '.'); ?></td>
                                                    <td>Rp 0</td>
                                                    <td>
                                                        <?= $p['min_stock']; ?> (Min)
                                                        <?php if($p['stock_monitor']): ?>
                                                            <i class="feather-check-circle text-success ms-1" title="Monitored"></i>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                                                <i class="feather-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="<?= base_url('products/edit/'.$p['id']); ?>" class="dropdown-item"><i class="feather-edit-3 me-3"></i>Edit</a>
                                                                <a href="<?= base_url('products/delete/'.$p['id']); ?>" class="dropdown-item text-danger" onclick="return confirm('Yakin ingin menghapus produk ini?');"><i class="feather-trash-2 me-3"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
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
        
        <footer class="footer"><p class="fs-11 text-muted mb-0">Copyright © <?= date('Y'); ?></p></footer>
    </main>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
</body>
</html>
