<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

    public function get_all_requests() {
        $this->db->select('purchase_requests.*, users.username as requester_name');
        $this->db->from('purchase_requests');
        $this->db->join('users', 'users.id = purchase_requests.requester_id', 'left');
        $this->db->order_by('purchase_requests.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_request_by_id($id) {
        return $this->db->get_where('purchase_requests', ['id' => $id])->row_array();
    }

    public function get_request_items($request_id) {
        return $this->db->get_where('purchase_request_items', ['request_id' => $request_id])->result_array();
    }

    // Fitur Simpan Kompleks (Header + Detail)
    public function insert_request($data_header, $data_items) {
        // Mulai Transaksi
        $this->db->trans_start();

        // 1. Simpan Header
        $this->db->insert('purchase_requests', $data_header);
        $insert_id = $this->db->insert_id(); // Ambil ID yang baru dibuat

        // 2. Siapkan Data Item dengan ID Header
        $final_items = [];
        foreach ($data_items as $item) {
            $item['request_id'] = $insert_id;
            $final_items[] = $item;
        }

        // 3. Simpan Batch Items
        if (!empty($final_items)) {
            $this->db->insert_batch('purchase_request_items', $final_items);
        }

        // Selesaikan Transaksi
        $this->db->trans_complete();

        return $this->db->trans_status(); // Return TRUE jika sukses, FALSE jika gagal
    }

    // Fungsi Generate No Permintaan Otomatis (PR-YYYYMMDD-001)
    public function generate_no_pr() {
        $date = date('Ymd');
        $prefix = "PR-" . $date . "-";
        
        $this->db->select('request_no');
        $this->db->like('request_no', $prefix, 'after');
        $this->db->order_by('request_no', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('purchase_requests');

        if ($query->num_rows() > 0) {
            $last_code = $query->row()->request_no;
            $last_number = (int) substr($last_code, -3);
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        return $prefix . sprintf("%03d", $new_number);
    }
}