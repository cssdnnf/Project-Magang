<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek Login
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Daftar Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        // Filter Params
        $keyword = $this->input->get('search');
        $sort = $this->input->get('sort');
        $category = $this->input->get('category');

        $data['keyword'] = $keyword;
        $data['sort'] = $sort;
        $data['selected_category'] = $category;

        // Data & Stats
        $data['products'] = $this->Product_model->get_all_products($keyword, $sort, $category);
        $data['stats'] = [
            'total' => $this->Product_model->count_total(),
            'purchasable' => $this->Product_model->count_purchasable(),
            'salable' => $this->Product_model->count_salable(),
            'categories' => $this->Product_model->count_categories()
        ];

        $this->load->view('products/index', $data);
    }

    public function add() {
        $data['title'] = 'Tambah Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('code', 'Kode Produk', 'trim|is_unique[products.code]', [
            'is_unique' => 'Kode produk sudah digunakan!'
        ]);
        $this->form_validation->set_rules('name', 'Nama Produk', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('products/add', $data);
        } else {
            $data = [
                'code' => $this->input->post('code') ? $this->input->post('code') : 'PROD-' . time(),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'category' => $this->input->post('category'),
                'is_purchase' => $this->input->post('is_purchase') ? 1 : 0,
                'unit_price' => $this->input->post('unit_price'),
                'purchase_account' => $this->input->post('purchase_account'),
                'purchase_tax' => $this->input->post('purchase_tax'),
                'is_sale' => $this->input->post('is_sale') ? 1 : 0,
                'stock_monitor' => $this->input->post('stock_monitor') ? 1 : 0,
                'min_stock' => $this->input->post('min_stock'),
                'default_stock_account' => $this->input->post('default_stock_account'),
            ];

            $this->Product_model->insert_product($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Produk berhasil ditambahkan!</div>');
            redirect('products');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_model->get_product_by_id($id);

        if (!$data['product']) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'Nama Produk', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('products/edit', $data);
        } else {
            $data_update = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'category' => $this->input->post('category'),
                'is_purchase' => $this->input->post('is_purchase') ? 1 : 0,
                'unit_price' => $this->input->post('unit_price'),
                'purchase_account' => $this->input->post('purchase_account'),
                'purchase_tax' => $this->input->post('purchase_tax'),
                'is_sale' => $this->input->post('is_sale') ? 1 : 0,
                'stock_monitor' => $this->input->post('stock_monitor') ? 1 : 0,
                'min_stock' => $this->input->post('min_stock'),
                'default_stock_account' => $this->input->post('default_stock_account'),
            ];

            $this->Product_model->update_product($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Produk berhasil diperbarui!</div>');
            redirect('products');
        }
    }

    public function delete($id) {
        $this->Product_model->delete_product($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Produk berhasil dihapus!</div>');
        redirect('products');
    }

    public function view($id) {
         // Re-use edit view for now or redirect
         redirect('products/edit/'.$id);
    }
}
