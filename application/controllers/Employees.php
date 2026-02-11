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
        $data['employees'] = $this->Employee_model->get_all_employees();

        $this->load->view('employees/index', $data);
    }

    public function add() {
        $data['title'] = 'Create Employee';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[employees.nip]');
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        $this->form_validation->set_rules('hire_date', 'Hire Date', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('employees/add', $data);
        } else {
            $data_insert = [
                'nip'       => $this->input->post('nip', true),
                'name'      => $this->input->post('name', true),
                'email'     => $this->input->post('email', true),
                'phone'     => $this->input->post('phone', true),
                'position'  => $this->input->post('position', true),
                'division'  => $this->input->post('division', true),
                'hire_date' => $this->input->post('hire_date', true),
                'address'   => $this->input->post('address', true),
                'created_at'=> date('Y-m-d H:i:s')
            ];
            $this->Employee_model->insert_employee($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Employee created successfully!</div>');
            redirect('employees');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Employee';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['emp'] = $this->Employee_model->get_employee_by_id($id);

        if (!$data['emp']) { show_404(); }

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('employees/edit', $data);
        } else {
            $data_update = [
                'name'      => $this->input->post('name', true),
                'email'     => $this->input->post('email', true),
                'phone'     => $this->input->post('phone', true),
                'position'  => $this->input->post('position', true),
                'division'  => $this->input->post('division', true),
                'hire_date' => $this->input->post('hire_date', true),
                'address'   => $this->input->post('address', true),
            ];
            $this->Employee_model->update_employee($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Employee updated successfully!</div>');
            redirect('employees');
        }
    }

    public function delete($id) {
        if($this->session->userdata('role') != 'admin'){
             redirect('employees');
        }
        $this->Employee_model->delete_employee($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Employee deleted!</div>');
        redirect('employees');
    }
}