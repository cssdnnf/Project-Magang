<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek Login
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Pembelian_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->daftar();
    }

    public function daftar() {
        $data['title'] = 'Daftar Pembelian';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['requests'] = $this->Pembelian_model->get_all_requests();

        $this->load->view('pembelian/daftar', $data);
    }

    public function permintaan() {
        $data['title'] = 'Permintaan Pembelian';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['no_pr_auto'] = $this->Pembelian_model->generate_no_pr(); // Generate nomor otomatis

        $this->form_validation->set_rules('tgl_permintaan', 'Tanggal', 'required');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pembelian/permintaan_form', $data);
        } else {
            // 1. Ambil Data Header
            $grand_total = 0;
            $items_nama = $this->input->post('item_nama');
            $items_harga = $this->input->post('item_harga');
            $items_qty = $this->input->post('item_qty');

            // Hitung Grand Total dari Input
            if($items_harga){
                for($i=0; $i<count($items_harga); $i++){
                    $grand_total += ($items_harga[$i] * $items_qty[$i]);
                }
            }

            $data_header = [
                'request_no'    => $this->input->post('no_permintaan'),
                'request_date'  => $this->input->post('tgl_permintaan'),
                'department'    => $this->input->post('departemen'),
                'requester_id'  => $data['user']['id'], // Ambil ID user yang login
                'notes'         => $this->input->post('keterangan'),
                'status'        => 'Pending',
                'grand_total'   => $grand_total,
            ];

            // 2. Ambil Data Items (Array)
            $data_items = [];
            if ($items_nama) {
                foreach ($items_nama as $key => $val) {
                    // Validasi sederhana: jangan simpan jika nama item kosong
                    if(!empty($items_nama[$key])) {
                        $qty = $this->input->post('item_qty')[$key];
                        $price = $this->input->post('item_harga')[$key];
                        
                        $data_items[] = [
                            'item_name'       => $items_nama[$key],
                            'category'        => $this->input->post('item_kategori')[$key],
                            'quantity'        => $qty,
                            'unit'            => $this->input->post('item_satuan')[$key],
                            'estimated_price' => $price,
                            'total_price'     => $qty * $price
                        ];
                    }
                }
            }

            // 3. Simpan ke Model
            if ($this->Pembelian_model->insert_request($data_header, $data_items)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Permintaan pembelian berhasil disimpan!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menyimpan data!</div>');
            }

            redirect('pembelian/daftar');
        }
    }

    // Fungsi View Detail (Optional)
    public function view_request($id) {
        $data['title'] = 'Detail Permintaan';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['req'] = $this->Pembelian_model->get_request_by_id($id);
        $data['items'] = $this->Pembelian_model->get_request_items($id);
        
        // Buat view detail jika diperlukan (misal views/pembelian/view.php)
        // $this->load->view('pembelian/view', $data);
        echo "<pre>"; print_r($data); echo "</pre>"; // Debug sementara
    }

    public function penawaran() {
        $data['title'] = 'Penawaran Pembelian';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pembelian/placeholder', $data);
    }

    public function pemesanan() {
        $data['title'] = 'Pemesanan Pembelian (PO)';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pembelian/placeholder', $data);
    }

    public function faktur() {
        $data['title'] = 'Faktur Pembelian';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pembelian/placeholder', $data);
    }

    public function tukar_faktur() {
        $data['title'] = 'Tukar Faktur Pembelian';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pembelian/placeholder', $data);
    }
}