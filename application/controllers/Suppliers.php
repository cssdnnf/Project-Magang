<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Daftar Supplier';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        // Filter Params
        $keyword = $this->input->get('search');
        $sort = $this->input->get('sort');
        $group = $this->input->get('group');

        $data['keyword'] = $keyword;
        $data['sort'] = $sort;
        $data['selected_group'] = $group;

        // Data & Stats
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers($keyword, $sort, $group);
        $data['stats'] = [
            'total' => $this->Supplier_model->count_total(),
            'groups' => $this->Supplier_model->count_groups()
        ];
        $data['contact_groups'] = $this->Supplier_model->get_unique_groups();

        $this->load->view('suppliers/index', $data);
    }

    public function add() {
        $data['title'] = 'Tambah Kontak';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('display_name', 'Nama Tampilan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('suppliers/add', $data);
        } else {
            // Prepare Supplier Data
            $data_supplier = [
                'display_name' => htmlspecialchars($this->input->post('display_name')),
                'contact_group' => $this->input->post('contact_group'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'mobile_phone' => $this->input->post('mobile_phone'),
                'identity_type' => $this->input->post('identity_type'),
                'identity_number' => $this->input->post('identity_number'),
                'email' => $this->input->post('email'),
                'info_lain' => $this->input->post('info_lain'),
                'company_name' => $this->input->post('company_name'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'npwp' => $this->input->post('npwp'),
                'billing_address' => $this->input->post('billing_address'),
                'shipping_address' => $this->input->post('same_as_billing') ? $this->input->post('billing_address') : $this->input->post('shipping_address'),
                'receivable_account' => $this->input->post('receivable_account'),
                'payable_account' => $this->input->post('payable_account'),
                'is_max_receivable' => $this->input->post('is_max_receivable') ? 1 : 0,
                'max_receivable_amount' => $this->input->post('max_receivable_amount'),
                'is_max_payable' => $this->input->post('is_max_payable') ? 1 : 0,
                'max_payable_amount' => $this->input->post('max_payable_amount'),
                'payment_term' => $this->input->post('payment_term'),
            ];

            // Prepare Bank Data
            $banks = [];
            $bank_names = $this->input->post('bank_name');
            if ($bank_names) {
                foreach ($bank_names as $key => $val) {
                    $banks[] = [
                        'bank_name' => $val,
                        'branch' => $this->input->post('bank_branch')[$key],
                        'account_holder' => $this->input->post('bank_holder')[$key],
                        'account_number' => $this->input->post('bank_number')[$key],
                    ];
                }
            }

            $this->Supplier_model->insert_supplier($data_supplier, $banks);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Kontak berhasil ditambahkan!</div>');
            redirect('suppliers');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Kontak';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->Supplier_model->get_supplier_by_id($id);
        $data['banks'] = $this->Supplier_model->get_bank_accounts($id);

        if (!$data['supplier']) { show_404(); }

        $this->form_validation->set_rules('display_name', 'Nama Tampilan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('suppliers/edit', $data);
        } else {
             // Prepare Supplier Data (Same as add)
             $data_supplier = [
                'display_name' => htmlspecialchars($this->input->post('display_name')),
                'contact_group' => $this->input->post('contact_group'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'mobile_phone' => $this->input->post('mobile_phone'),
                'identity_type' => $this->input->post('identity_type'),
                'identity_number' => $this->input->post('identity_number'),
                'email' => $this->input->post('email'),
                'info_lain' => $this->input->post('info_lain'),
                'company_name' => $this->input->post('company_name'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'npwp' => $this->input->post('npwp'),
                'billing_address' => $this->input->post('billing_address'),
                'shipping_address' => $this->input->post('same_as_billing') ? $this->input->post('billing_address') : $this->input->post('shipping_address'),
                'receivable_account' => $this->input->post('receivable_account'),
                'payable_account' => $this->input->post('payable_account'),
                'is_max_receivable' => $this->input->post('is_max_receivable') ? 1 : 0,
                'max_receivable_amount' => $this->input->post('max_receivable_amount'),
                'is_max_payable' => $this->input->post('is_max_payable') ? 1 : 0,
                'max_payable_amount' => $this->input->post('max_payable_amount'),
                'payment_term' => $this->input->post('payment_term'),
            ];

            // Prepare Bank Data
            $banks = [];
            $bank_names = $this->input->post('bank_name');
            if ($bank_names) {
                foreach ($bank_names as $key => $val) {
                    $banks[] = [
                        'bank_name' => $val,
                        'branch' => $this->input->post('bank_branch')[$key],
                        'account_holder' => $this->input->post('bank_holder')[$key],
                        'account_number' => $this->input->post('bank_number')[$key],
                    ];
                }
            }

            $this->Supplier_model->update_supplier($id, $data_supplier, $banks);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Kontak berhasil diperbarui!</div>');
            redirect('suppliers');
        }
    }

    public function delete($id) {
        $this->Supplier_model->delete_supplier($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Kontak berhasil dihapus!</div>');
        redirect('suppliers');
    }
}
