<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Employees List';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // 1. Ambil Parameter Search & Sort
        $keyword = $this->input->get('search');
        $sort    = $this->input->get('sort'); // <--- Baru

        // Kirim balik ke view agar input tetap terisi/terpilih
        $data['search_keyword'] = $keyword;
        $data['current_sort']   = $sort;     // <--- Baru

        // 2. Ambil Data (Kirim keyword & sort ke model)
        $data['employees'] = $this->Employee_model->get_all_employees($keyword, $sort);

        // 3. Statistik (Tetap sama)
        $data['stats'] = [
            'total'     => $this->Employee_model->count_total(),
            'active'    => $this->Employee_model->count_active(),
            'divisions' => $this->Employee_model->count_divisions(),
            'new_this_month' => $this->db->where('MONTH(hire_date)', date('m'))->where('YEAR(hire_date)', date('Y'))->count_all_results('employees')
        ];

        $this->load->view('employees/index', $data);
    }

    public function add() {
        // Proteksi Role User
        if ($this->session->userdata('role') == 'user') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda tidak memiliki izin!</div>');
            redirect('employees');
        }

        $data['title'] = 'Create Employee';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        // Rules Validasi
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[employees.nip]', [
            'is_unique' => 'NIP ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        $this->form_validation->set_rules('hire_date', 'Hire Date', 'required');
        
        // [PERBAIKAN 1] Tambahkan validasi untuk status
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('employees/add', $data);
        } else {
            // [PERBAIKAN 2] Tangkap input status
            // Jika form disabled di hack/bypass, kita default ke 'Active' jika kosong
            $status_input = $this->input->post('status', true);
            $final_status = !empty($status_input) ? $status_input : 'Active';

            $data_insert = [
                'nip'       => htmlspecialchars($this->input->post('nip', true)),
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'phone'     => htmlspecialchars($this->input->post('phone', true)),
                'position'  => htmlspecialchars($this->input->post('position', true)),
                'division'  => htmlspecialchars($this->input->post('division', true)),
                'status'    => $final_status, // <--- Data Status Masuk Sini
                'hire_date' => $this->input->post('hire_date'),
                'address'   => htmlspecialchars($this->input->post('address', true)),
                'created_at'=> date('Y-m-d H:i:s')
            ];

            $this->Employee_model->insert_employee($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Karyawan berhasil ditambahkan!</div>');
            redirect('employees');
        }
    }

    public function edit($id) {
        // [PROTEKSI] Redirect jika role adalah user
        if ($this->session->userdata('role') == 'user') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda tidak memiliki izin untuk mengedit data!</div>');
            redirect('employees');
        }

        $data['title'] = 'Edit Employee';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['emp'] = $this->Employee_model->get_employee_by_id($id);

        if (!$data['emp']) { show_404(); }

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('employees/edit', $data);
        } else {
            $data_update = [
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'phone'     => htmlspecialchars($this->input->post('phone', true)),
                'position'  => htmlspecialchars($this->input->post('position', true)),
                'division'  => htmlspecialchars($this->input->post('division', true)),
                'hire_date' => $this->input->post('hire_date'),
                'address'   => htmlspecialchars($this->input->post('address', true)),
                'status' => $this->input->post('status'),
            ];
            $this->Employee_model->update_employee($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data karyawan berhasil diperbarui!</div>');
            redirect('employees');
        }
    }

    public function delete($id) {
        // [PROTEKSI] Redirect jika role BUKAN admin (User & Staff tidak boleh hapus)
        // Atau jika hanya User yg dilarang: if ($this->session->userdata('role') == 'user')
        if ($this->session->userdata('role') != 'admin') {
             $this->session->set_flashdata('message', '<div class="alert alert-danger">Akses Ditolak! Hanya Admin yang boleh menghapus.</div>');
             redirect('employees');
        }

        $this->Employee_model->delete_employee($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data karyawan telah dihapus.</div>');
        redirect('employees');
    }
}