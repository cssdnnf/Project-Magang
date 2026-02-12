<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Project_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Projects Management';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // Filter Params
        $keyword = $this->input->get('search');
        $sort    = $this->input->get('sort');
        
        $data['search_keyword'] = $keyword;
        $data['current_sort']   = $sort;

        // Get Data
        $data['projects'] = $this->Project_model->get_all_projects($keyword, $sort);

        // Statistik
        $data['stats'] = [
            'total'     => $this->Project_model->count_all(),
            'pending'   => $this->Project_model->count_by_status('Pending'),
            'approved'  => $this->Project_model->count_by_status('Approved') + $this->Project_model->count_by_status('In Progress'),
            'budget'    => $this->Project_model->sum_budget()
        ];

        $this->load->view('projects/index', $data);
    }

    public function add() {
        // Proteksi: User biasa mungkin tidak boleh buat project
        if ($this->session->userdata('role') == 'user') { redirect('projects'); }

        $data['title'] = 'Create New Project';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('project_name', 'Project Name', 'required|trim');
        $this->form_validation->set_rules('client_name', 'Client Name', 'required|trim');
        $this->form_validation->set_rules('budget', 'Budget', 'numeric');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('projects/add', $data);
        } else {
            $data_insert = [
                'project_name' => htmlspecialchars($this->input->post('project_name', true)),
                'client_name'  => htmlspecialchars($this->input->post('client_name', true)),
                'start_date'   => $this->input->post('start_date'),
                'end_date'     => $this->input->post('end_date'),
                'budget'       => $this->input->post('budget'),
                'description'  => htmlspecialchars($this->input->post('description', true)),
                'status'       => 'Pending', // Default Pending
                'created_at'   => date('Y-m-d H:i:s')
            ];
            $this->Project_model->insert_project($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Proyek berhasil dibuat!</div>');
            redirect('projects');
        }
    }

public function edit($id) {
        if ($this->session->userdata('role') == 'user') { redirect('projects'); }

        $data['title'] = 'Edit Project';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['project'] = $this->Project_model->get_project_by_id($id);

        if(!$data['project']) show_404();

        $this->form_validation->set_rules('project_name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('projects/edit', $data);
        } else {
            $status = $this->input->post('status');
            $progress = $this->input->post('progress');

            // LOGIKA OTOMATIS: Jika Status Completed, Progress otomatis 100
            if ($status == 'Completed') {
                $progress = 100;
            }

            $data_update = [
                'project_name' => htmlspecialchars($this->input->post('project_name', true)),
                'client_name'  => htmlspecialchars($this->input->post('client_name', true)),
                'start_date'   => $this->input->post('start_date'),
                'end_date'     => $this->input->post('end_date'),
                'budget'       => $this->input->post('budget'),
                'status'       => $status,
                'progress'     => $progress,
                'description'  => htmlspecialchars($this->input->post('description', true)),
            ];
            $this->Project_model->update_project($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Proyek diperbarui!</div>');
            redirect('projects');
        }
    }

    // Detail Project (Read Only)
    public function view($id) {
        $data['title'] = 'Project Detail';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['project'] = $this->Project_model->get_project_by_id($id);
        if(!$data['project']) show_404();

        $this->load->view('projects/view', $data);
    }

    // Fungsi Cepat Update Status (Approve/Reject)
    // Fungsi Quick Status (Action Button di List)
    public function set_status($id, $status) {
        if ($this->session->userdata('role') == 'user') { redirect('projects'); }

        $allowed_status = ['Approved', 'Rejected', 'Pending', 'Completed'];
        
        if (in_array($status, $allowed_status)) {
            $data_update = ['status' => $status];

            // LOGIKA OTOMATIS: Jika diset Completed lewat tombol aksi, progress jadi 100
            if ($status == 'Completed') {
                $data_update['progress'] = 100;
            } 
            // Opsional: Jika dibalikin ke Pending/Approved, mau direset ke 0 atau biarkan?
            // Biasanya dibiarkan progress terakhirnya, jadi tidak perlu else.

            $this->Project_model->update_project($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-info">Status proyek diubah menjadi '.$status.'</div>');
        }
        redirect('projects');
    }

    public function delete($id) {
        if ($this->session->userdata('role') != 'admin') {
             redirect('projects');
        }
        $this->Project_model->delete_project($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Proyek dihapus!</div>');
        redirect('projects');
    }
}