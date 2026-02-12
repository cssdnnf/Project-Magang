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
                        <h5 class="m-b-10">Input Permintaan Pembelian</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Pembelian</li>
                        <li class="breadcrumb-item">Permintaan</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('pembelian/permintaan'); ?>" method="post">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Informasi Dasar</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">No. Permintaan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="no_permintaan" value="PR-<?= date('Ymd-His'); ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tanggal Permintaan <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="tgl_permintaan" value="<?= date('Y-m-d'); ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Departemen / Divisi <span class="text-danger">*</span></label>
                                    <select class="form-control" name="departemen" required>
                                        <option value="">-- Pilih Departemen --</option>
                                        <option value="IT">IT / Teknologi</option>
                                        <option value="HRD">HRD</option>
                                        <option value="Keuangan">Keuangan</option>
                                        <option value="Operasional">Operasional</option>
                                        <option value="Marketing">Marketing</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Diajukan Oleh</label>
                                    <input type="text" class="form-control" name="diajukan_oleh" value="<?= $user['username']; ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Keterangan / Keperluan</label>
                                    <input type="text" class="form-control" name="keterangan" placeholder="Contoh: Pengadaan laptop untuk staff baru">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card stretch stretch-full">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title">Daftar Barang / Jasa</h5>
                            <button type="button" class="btn btn-sm btn-primary" onclick="alert('Fitur tambah baris memerlukan Javascript tambahan')">
                                <i class="feather-plus me-1"></i> Tambah Item
                            </button>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th width="30%">Nama Barang / Jasa</th>
                                            <th width="15%">Kategori</th>
                                            <th width="10%">Qty</th>
                                            <th width="10%">Satuan</th>
                                            <th width="20%">Estimasi Harga</th>
                                            <th width="10%">Total</th>
                                            <th width="5%" class="text-center"><i class="feather-trash-2"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="item_nama[]" placeholder="Nama Item" required>
                                            </td>
                                            <td>
                                                <select class="form-control" name="item_kategori[]">
                                                    <option value="Aset">Aset Tetap</option>
                                                    <option value="Jasa">Jasa</option>
                                                    <option value="Habis Pakai">Bahan Habis Pakai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="item_qty[]" value="1" min="1">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="item_satuan[]" placeholder="Pcs/Unit">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="number" class="form-control" name="item_harga[]" placeholder="0">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control bg-light" value="0" readonly>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-sm btn-soft-danger"><i class="feather-x"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="item_nama[]" placeholder="Nama Item">
                                            </td>
                                            <td>
                                                <select class="form-control" name="item_kategori[]">
                                                    <option value="Aset">Aset Tetap</option>
                                                    <option value="Jasa">Jasa</option>
                                                    <option value="Habis Pakai">Bahan Habis Pakai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="item_qty[]" value="1" min="1">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="item_satuan[]" placeholder="Pcs/Unit">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="number" class="form-control" name="item_harga[]" placeholder="0">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control bg-light" value="0" readonly>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-sm btn-soft-danger"><i class="feather-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-end fw-bold">Total Estimasi</td>
                                            <td colspan="2" class="fw-bold text-dark">Rp 0</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-end mb-5">
                            <a href="<?= base_url('pembelian/daftar'); ?>" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="feather-save me-2"></i> Simpan Permintaan</button>
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