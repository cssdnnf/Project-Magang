<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek sesi login, jika tidak ada redirect ke auth
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard - Duralux';
        // Mengambil data user dari session yang diset saat login
        $data['user'] = [
            'username' => $this->session->userdata('username'),
            'email' => $this->session->userdata('email')
        ];

        // Kita akan memuat view dashboard
        $this->load->view('dashboard/index', $data);
    }
}