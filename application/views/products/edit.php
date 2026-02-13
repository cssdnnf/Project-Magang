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
                        <h5 class="m-b-10">Edit Produk</h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="<?= base_url('products'); ?>" class="btn btn-light"><i class="feather-x"></i></a>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('products/edit/'.$product['id']); ?>" method="post">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Kode Produk</label>
                                    <input type="text" class="form-control" name="code" value="<?= $product['code']; ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?= set_value('name', $product['name']); ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Kategori Produk</label>
                                    <select class="form-control" name="category">
                                        <option value="">Pilih kategori</option>
                                        <option value="Aset" <?= set_select('category', 'Aset', ($product['category'] == 'Aset')); ?>>Aset</option>
                                        <option value="Jasa" <?= set_select('category', 'Jasa', ($product['category'] == 'Jasa')); ?>>Jasa</option>
                                        <option value="Barang Jadi" <?= set_select('category', 'Barang Jadi', ($product['category'] == 'Barang Jadi')); ?>>Barang Jadi</option>
                                        <option value="Bahan Baku" <?= set_select('category', 'Bahan Baku', ($product['category'] == 'Bahan Baku')); ?>>Bahan Baku</option>
                                    </select>
                                    <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_purchase" name="is_purchase" value="1" <?= set_checkbox('is_purchase', '1', ($product['is_purchase'] == 1)); ?>>
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
                                        <input type="number" class="form-control text-end" name="unit_price" value="<?= set_value('unit_price', $product['unit_price']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Akun pembelian</label>
                                    <select class="form-control" name="purchase_account">
                                        <option value="(5-50000) - Beban Pokok Pendapatan" <?= set_select('purchase_account', '(5-50000) - Beban Pokok Pendapatan', ($product['purchase_account'] == '(5-50000) - Beban Pokok Pendapatan')); ?>>(5-50000) - Beban Pokok Pendapatan</option>
                                        <option value="(5-50001) - Beban Lain-lain" <?= set_select('purchase_account', '(5-50001) - Beban Lain-lain', ($product['purchase_account'] == '(5-50001) - Beban Lain-lain')); ?>>(5-50001) - Beban Lain-lain</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Pajak pembelian</label>
                                    <select class="form-control" name="purchase_tax">
                                        <option value="">Pilih pajak</option>
                                        <option value="PPN 11%" <?= set_select('purchase_tax', 'PPN 11%', ($product['purchase_tax'] == 'PPN 11%')); ?>>PPN 11%</option>
                                        <option value="Bebas Pajak" <?= set_select('purchase_tax', 'Bebas Pajak', ($product['purchase_tax'] == 'Bebas Pajak')); ?>>Bebas Pajak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_sale" name="is_sale" value="1" <?= set_checkbox('is_sale', '1', ($product['is_sale'] == 1)); ?>>
                                    <label class="form-check-label" for="is_sale">
                                        Saya jual produk ini
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="stock_monitor" name="stock_monitor" value="1" <?= set_checkbox('stock_monitor', '1', ($product['stock_monitor'] == 1)); ?>>
                                    <label class="form-check-label" for="stock_monitor">
                                        Monitor persediaan barang
                                    </label>
                                </div>
                            </div>

                            <div class="row" id="stock_section">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Batas stok minimum</label>
                                    <input type="number" class="form-control" name="min_stock" value="<?= set_value('min_stock', $product['min_stock']); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Akun persediaan default</label>
                                    <select class="form-control" name="default_stock_account">
                                        <option value="(1-10200) - Persediaan Barang" <?= set_select('default_stock_account', '(1-10200) - Persediaan Barang', ($product['default_stock_account'] == '(1-10200) - Persediaan Barang')); ?>>(1-10200) - Persediaan Barang</option>
                                        <option value="(1-10300) - Persediaan Bahan Baku" <?= set_select('default_stock_account', '(1-10300) - Persediaan Bahan Baku', ($product['default_stock_account'] == '(1-10300) - Persediaan Bahan Baku')); ?>>(1-10300) - Persediaan Bahan Baku</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url('products'); ?>" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
