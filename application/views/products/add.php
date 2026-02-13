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
                        <h5 class="m-b-10">Tambah produk</h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="<?= base_url('products'); ?>" class="btn btn-light"><i class="feather-x"></i></a>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('products/add'); ?>" method="post">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Kode Produk</label>
                                    <input type="text" class="form-control" name="code" placeholder="Kode produk" value="<?= set_value('code'); ?>">
                                    <?= form_error('code', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama produk" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Kategori Produk</label>
                                    <select class="form-control" name="category">
                                        <option value="">Pilih kategori</option>
                                        <option value="Aset" <?= set_select('category', 'Aset'); ?>>Aset</option>
                                        <option value="Jasa" <?= set_select('category', 'Jasa'); ?>>Jasa</option>
                                        <option value="Barang Jadi" <?= set_select('category', 'Barang Jadi'); ?>>Barang Jadi</option>
                                        <option value="Bahan Baku" <?= set_select('category', 'Bahan Baku'); ?>>Bahan Baku</option>
                                    </select>
                                    <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_purchase" name="is_purchase" value="1" <?= set_checkbox('is_purchase', '1'); ?>>
                                    <label class="form-check-label" for="is_purchase">
                                        Saya beli produk ini
                                    </label>
                                </div>
                            </div>

                            <div class="row" id="purchase_section">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Harga satuan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control text-end" name="unit_price" placeholder="0,00" value="<?= set_value('unit_price', '0'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Akun pembelian</label>
                                    <select class="form-control" name="purchase_account">
                                        <option value="(5-50000) - Beban Pokok Pendapatan">(5-50000) - Beban Pokok Pendapatan</option>
                                        <option value="(5-50001) - Beban Lain-lain">(5-50001) - Beban Lain-lain</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Pajak pembelian</label>
                                    <select class="form-control" name="purchase_tax">
                                        <option value="">Pilih pajak</option>
                                        <option value="PPN 11%">PPN 11%</option>
                                        <option value="Bebas Pajak">Bebas Pajak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_sale" name="is_sale" value="1" <?= set_checkbox('is_sale', '1'); ?>>
                                    <label class="form-check-label" for="is_sale">
                                        Saya jual produk ini
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="stock_monitor" name="stock_monitor" value="1" <?= set_checkbox('stock_monitor', '1'); ?>>
                                    <label class="form-check-label" for="stock_monitor">
                                        Monitor persediaan barang
                                    </label>
                                </div>
                            </div>

                            <div class="row" id="stock_section">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Batas stok minimum</label>
                                    <input type="number" class="form-control" name="min_stock" value="<?= set_value('min_stock', '0'); ?>">
                                    <small class="text-muted">Kuantitas stok awal dapat dicatat menggunakan penyesuaian stok</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Akun persediaan default</label>
                                    <select class="form-control" name="default_stock_account">
                                        <option value="(1-10200) - Persediaan Barang">(1-10200) - Persediaan Barang</option>
                                        <option value="(1-10300) - Persediaan Bahan Baku">(1-10300) - Persediaan Bahan Baku</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url('products'); ?>" class="btn btn-light">Tutup</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
