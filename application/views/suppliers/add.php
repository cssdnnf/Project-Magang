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
                        <h5 class="m-b-10">Kontak baru</h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="<?= base_url('suppliers'); ?>" class="btn btn-light"><i class="feather-x"></i></a>
                </div>
            </div>

            <div class="main-content">
                <form action="<?= base_url('suppliers/add'); ?>" method="post">
                    
                    <!-- INFO KONTAK -->
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title text-primary"><i class="feather-user me-2"></i> Info kontak</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Tampilan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="display_name" placeholder="Nama" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Grup Kontak</label>
                                    <input type="text" class="form-control" name="contact_group" placeholder="Pilih grup">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INFO UMUM -->
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                             <h5 class="card-title text-primary"><i class="feather-book-open me-2"></i> Info umum</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-2"><label class="form-label">Nama lengkap</label></div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="Nama depan">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="middle_name" placeholder="Nama tengah">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="last_name" placeholder="Nama belakang">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Nomor handphone</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="mobile_phone" placeholder="Contoh: 081 2 9374 546">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Identitas</label>
                                <div class="col-md-2">
                                    <select class="form-control" name="identity_type">
                                        <option value="KTP">KTP</option>
                                        <option value="SIM">SIM</option>
                                        <option value="PASSPORT">PASSPORT</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="identity_number" placeholder="Nomor ID">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Info Lain</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="info_lain" placeholder="Info lain">
                                </div>
                            </div>

                             <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Nama Perusahaan</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="company_name" placeholder="Nama perusahaan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Nomor telepon</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="phone" placeholder="Contoh: (012) 3456789">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Fax</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="fax" placeholder="Contoh: 0812 3456 78910">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">NPWP</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="npwp" placeholder="NPWP">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Alamat penagihan</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="billing_address" rows="3" placeholder="e.g. Jalan Indonesia Blok C No. 22"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="show_shipping" onchange="toggleShipping()">
                                        <label class="form-check-label" for="show_shipping">
                                            Tambah rincian alamat pengiriman
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="shipping_section" style="display:none;">
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">Alamat pengiriman</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="shipping_address" id="shipping_address" rows="3" placeholder="Alamat pengiriman"></textarea>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="same_as_billing" name="same_as_billing" value="1" onchange="copyBilling()">
                                            <label class="form-check-label" for="same_as_billing">
                                                Samakan dengan alamat penagihan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INFO BANK -->
                     <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title text-primary"><i class="feather-home me-2"></i> Info bank</h5>
                        </div>
                        <div class="card-body">
                            <label class="form-label fw-bold mb-3">Akun bank</label>
                            
                            <div id="bank_accounts_container">
                                <!-- Initial Bank Row -->
                                <div class="bank-row border-bottom pb-3 mb-3">
                                    <div class="row mb-2">
                                        <label class="col-md-2 col-form-label">Nama Bank</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="bank_name[]">
                                                <option value="">-- Pilih Bank --</option>
                                                <option value="BCA">BCA</option>
                                                <option value="Mandiri">Mandiri</option>
                                                <option value="BNI">BNI</option>
                                                <option value="BRI">BRI</option>
                                                <option value="CIMB Niaga">CIMB Niaga</option>
                                                <option value="Permata">Permata</option>
                                                <option value="Danamon">Danamon</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-md-2 col-form-label">Kantor cabang</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="bank_branch[]">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-md-2 col-form-label">Pemegang akun bank</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="bank_holder[]">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-md-2 col-form-label">Nomor rekening</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="bank_number[]">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-outline-primary w-100" onclick="addBankRow()">
                                <i class="feather-plus-circle me-1"></i> Tambah bank lain
                            </button>
                        </div>
                    </div>

                    <!-- PEMETAAN AKUN -->
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title text-primary"><i class="feather-grid me-2"></i> Pemetaan akun</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Akun piutang</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="receivable_account">
                                        <option value="(1-10100) - Piutang Usaha">(1-10100) - Piutang Usaha</option>
                                    </select>
                                </div>
                            </div>
                             <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Akun hutang</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="payable_account">
                                        <option value="(2-20100) - Hutang Usaha">(2-20100) - Hutang Usaha</option>
                                    </select>
                                </div>
                            </div>

                             <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Max. Receivable</label>
                                <div class="col-md-10">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="is_max_receivable" name="is_max_receivable" value="1" onchange="toggleMaxRec()">
                                        <label class="form-check-label" for="is_max_receivable">Aktifkan piutang maksimal</label>
                                    </div>
                                    <input type="number" class="form-control" name="max_receivable_amount" id="max_receivable_amount" placeholder="0" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Maksimal hutang</label>
                                <div class="col-md-10">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="is_max_payable" name="is_max_payable" value="1" onchange="toggleMaxPay()">
                                        <label class="form-check-label" for="is_max_payable">Aktifkan hutang maksimal</label>
                                    </div>
                                    <input type="number" class="form-control" name="max_payable_amount" id="max_payable_amount" placeholder="0" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Syarat pembayaran utama</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="payment_term">
                                        <option value="Net 30">Net 30</option>
                                        <option value="Net 15">Net 15</option>
                                        <option value="Net 60">Net 60</option>
                                        <option value="Cash on Delivery">Cash on Delivery</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-end mb-5">
                            <a href="<?= base_url('suppliers'); ?>" class="btn btn-light">Batalkan</a>
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
    <script>
        function toggleShipping() {
            var chk = document.getElementById('show_shipping');
            var div = document.getElementById('shipping_section');
            if(chk.checked) {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
                document.getElementById('same_as_billing').checked = false;
            }
        }

        function copyBilling() {
            var chk = document.getElementById('same_as_billing');
            var billing = document.getElementsByName('billing_address')[0].value;
            var shipping = document.getElementById('shipping_address');
            
            if(chk.checked) {
                shipping.value = billing;
                shipping.readOnly = true;
            } else {
                shipping.readOnly = false;
            }
        }

        function toggleMaxRec() {
            var chk = document.getElementById('is_max_receivable');
            var inp = document.getElementById('max_receivable_amount');
            inp.disabled = !chk.checked;
        }

        function toggleMaxPay() {
            var chk = document.getElementById('is_max_payable');
            var inp = document.getElementById('max_payable_amount');
            inp.disabled = !chk.checked;
        }

        function addBankRow() {
            var container = document.getElementById('bank_accounts_container');
            var template = `
            <div class="bank-row border-bottom pb-3 mb-3 position-relative">
                <button type="button" class="btn btn-sm btn-icon btn-danger position-absolute top-0 end-0" onclick="this.parentElement.remove()" title="Hapus Bank"><i class="feather-x"></i></button>
                <div class="row mb-2">
                    <label class="col-md-2 col-form-label">Nama Bank</label>
                    <div class="col-md-10">
                        <select class="form-control" name="bank_name[]">
                            <option value="">-- Pilih Bank --</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="CIMB Niaga">CIMB Niaga</option>
                            <option value="Permata">Permata</option>
                            <option value="Danamon">Danamon</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-md-2 col-form-label">Kantor cabang</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="bank_branch[]">
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-md-2 col-form-label">Pemegang akun bank</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="bank_holder[]">
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-md-2 col-form-label">Nomor rekening</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="bank_number[]">
                    </div>
                </div>
            </div>`;
            container.insertAdjacentHTML('beforeend', template);
        }
    </script>
</body>
</html>
