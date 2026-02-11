<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'My Profile';
        // Ambil data user yang sedang login saja
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('profile/index', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $new_password = $this->input->post('password');
            $conf_password = $this->input->post('pass_conf');

            // Data yang akan diupdate
            $update_data = [
                'username' => $username,
            ];

            // Cek jika user ingin ganti password
            if (!empty($new_password)) {
                if ($new_password == $conf_password) {
                    // Cek panjang password minimal
                    if(strlen($new_password) < 3) {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger">Password terlalu pendek!</div>');
                         redirect('profile');
                    }
                    $update_data['password'] = password_hash($new_password, PASSWORD_DEFAULT);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Password konfirmasi tidak cocok!</div>');
                    redirect('profile');
                }
            }

            // Update data diri sendiri berdasarkan ID di session/database
            $this->User_model->update_user($data['user']['id'], $update_data);
            
            // Update session username agar tampilan nama di header berubah langsung
            $this->session->set_userdata('username', $username);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Profil berhasil diperbarui!</div>');
            redirect('profile');
        }
    }
}