<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // 1. Cek Login
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        // 2. PROTEKSI: Cek Role. Jika bukan admin, tendang ke dashboard atau block
        if ($this->session->userdata('role') != 'admin') {
            redirect('dashboard'); 
            // atau bisa pakai: show_error('Anda tidak memiliki akses ke halaman ini', 403);
        }

        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

public function index() {
        $data['title'] = 'List Users';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['users_list'] = $this->User_model->get_all_users();
        $this->load->view('users/index', $data);
    }

    public function add() {
        $data['title'] = 'Add User';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|matches[pass_conf]');
        $this->form_validation->set_rules('pass_conf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('users/add', $data);
        } else {
            $save_data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role' => htmlspecialchars($this->input->post('role', true)), // Simpan Role
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->User_model->insert_user($save_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User baru berhasil ditambahkan!</div>');
            redirect('users');
        }
    }

public function edit($id) {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_user'] = $this->User_model->get_user_by_id($id);

        // Jika user tidak ditemukan
        if(empty($data['edit_user'])){
             show_404();
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required');
        // Validasi Status (Opsional, tapi baik untuk keamanan)
        $this->form_validation->set_rules('is_active', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('users/edit', $data);
        } else {
            $update_data = [
                'username'  => htmlspecialchars($this->input->post('username', true)),
                'role'      => htmlspecialchars($this->input->post('role', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true)), // <--- TAMBAHAN INI
            ];

            // Jika password diisi, maka update password
            if ($this->input->post('password')) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->User_model->update_user($id, $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil diperbarui!</div>');
            redirect('users');
        }
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User telah dihapus!</div>');
        redirect('users');
    }
}