<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    // Ambil data dengan opsi Search
    // Update fungsi get_all_employees
    public function get_all_employees($keyword = null, $sort = null) {
        
        // Logika Searching
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('name', $keyword);
            $this->db->or_like('nip', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('division', $keyword);
            $this->db->or_like('position', $keyword);
            $this->db->group_end();
        }

        // Logika Sorting (Filter Baru)
        switch ($sort) {
            case 'az':
                $this->db->order_by('name', 'ASC');
                break;
            case 'za':
                $this->db->order_by('name', 'DESC');
                break;
            case 'oldest': // 0-9
                $this->db->order_by('id', 'ASC');
                break;
            case 'newest': // 9-0 (Default)
            default:
                $this->db->order_by('id', 'DESC');
                break;
        }

        return $this->db->get('employees')->result_array();
    }

    public function get_employee_by_id($id) {
        return $this->db->get_where('employees', ['id' => $id])->row_array();
    }

    public function insert_employee($data) {
        return $this->db->insert('employees', $data);
    }

    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }

    public function delete_employee($id) {
        $this->db->where('id', $id);
        return $this->db->delete('employees');
    }

    // --- FUNGSI STATISTIK BARU ---

    public function count_total() {
        return $this->db->count_all('employees');
    }

    public function count_active() {
        $this->db->where('status', 'Active');
        return $this->db->count_all_results('employees');
    }

    public function count_divisions() {
        // Menghitung jumlah divisi unik yang ada
        $this->db->distinct();
        $this->db->select('division');
        return $this->db->get('employees')->num_rows();
    }

    public function get_division_stats() {
        // Menghitung jumlah karyawan per divisi
        $this->db->select('division, COUNT(*) as total');
        $this->db->group_by('division');
        return $this->db->get('employees')->result_array();
    }
}