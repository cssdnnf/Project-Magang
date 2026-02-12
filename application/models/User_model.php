<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Update: Tambahkan parameter $keyword
    public function get_all_users($keyword = null, $sort = null) {
        
        // Logika Searching
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('username', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('role', $keyword);
            $this->db->group_end();
        }

        // Logika Sorting
        switch ($sort) {
            case 'az':
                $this->db->order_by('username', 'ASC');
                break;
            case 'za':
                $this->db->order_by('username', 'DESC');
                break;
            case 'oldest': // 0-9
                $this->db->order_by('id', 'ASC');
                break;
            case 'newest': // 9-0
            default:
                $this->db->order_by('id', 'DESC');
                break;
        }

        return $this->db->get('users')->result_array();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    // === FITUR STATISTIK BARU ===

    public function count_total() {
        return $this->db->count_all('users');
    }

    public function count_active() {
        $this->db->where('is_active', 1);
        return $this->db->count_all_results('users');
    }

    public function count_by_role($role) {
        $this->db->where('role', $role);
        return $this->db->count_all_results('users');
    }
}