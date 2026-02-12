<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function get_all_projects($keyword = null, $sort = null) {
        // Logic Filter & Search
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('project_name', $keyword);
            $this->db->or_like('client_name', $keyword);
            $this->db->or_like('status', $keyword);
            $this->db->group_end();
        }

        // Logic Sorting
        switch ($sort) {
            case 'budget_high':
                $this->db->order_by('budget', 'DESC');
                break;
            case 'budget_low':
                $this->db->order_by('budget', 'ASC');
                break;
            case 'az':
                $this->db->order_by('project_name', 'ASC');
                break;
            case 'za':
                $this->db->order_by('project_name', 'DESC');
                break;
            case 'oldest':
                $this->db->order_by('id', 'ASC');
                break;
            default: // newest
                $this->db->order_by('id', 'DESC');
                break;
        }

        return $this->db->get('projects')->result_array();
    }

    public function get_project_by_id($id) {
        return $this->db->get_where('projects', ['id' => $id])->row_array();
    }

    public function insert_project($data) {
        return $this->db->insert('projects', $data);
    }

    public function update_project($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function delete_project($id) {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    // === STATISTIK ===
    public function count_all() { return $this->db->count_all('projects'); }
    
    public function count_by_status($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results('projects');
    }

    public function sum_budget() {
        $this->db->select_sum('budget');
        $query = $this->db->get('projects');
        return $query->row()->budget;
    }
}