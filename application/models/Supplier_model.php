<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function get_all_suppliers($keyword = null, $sort = null, $group = null) {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('display_name', $keyword);
            $this->db->or_like('company_name', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->group_end();
        }

        if ($group) {
            $this->db->where('contact_group', $group);
        }

        switch ($sort) {
            case 'az':
                $this->db->order_by('display_name', 'ASC');
                break;
            case 'za':
                $this->db->order_by('display_name', 'DESC');
                break;
            case 'company_az':
                $this->db->order_by('company_name', 'ASC');
                break;
            case 'company_za':
                $this->db->order_by('company_name', 'DESC');
                break;
            case 'oldest':
                $this->db->order_by('id', 'ASC');
                break;
            case 'newest':
            default:
                $this->db->order_by('id', 'DESC');
                break;
        }

        return $this->db->get('suppliers')->result_array();
    }

    public function count_total() {
        return $this->db->count_all('suppliers');
    }

    public function count_groups() {
        $this->db->distinct();
        $this->db->select('contact_group');
        $this->db->where('contact_group !=', '');
        return $this->db->get('suppliers')->num_rows();
    }
    
    public function get_unique_groups() {
        $this->db->distinct();
        $this->db->select('contact_group');
        $this->db->where('contact_group !=', '');
        $query = $this->db->get('suppliers');
        return $query->result_array();
    }

    public function get_supplier_by_id($id) {
        return $this->db->get_where('suppliers', ['id' => $id])->row_array();
    }

    public function get_bank_accounts($supplier_id) {
        return $this->db->get_where('supplier_bank_accounts', ['supplier_id' => $supplier_id])->result_array();
    }

    public function insert_supplier($data, $banks) {
        $this->db->trans_start();
        $this->db->insert('suppliers', $data);
        $supplier_id = $this->db->insert_id();

        if (!empty($banks)) {
            $bank_data = [];
            foreach ($banks as $bank) {
                if(!empty($bank['bank_name'])) { // Simple validation
                    $bank['supplier_id'] = $supplier_id;
                    $bank_data[] = $bank;
                }
            }
            if(!empty($bank_data)) {
                $this->db->insert_batch('supplier_bank_accounts', $bank_data);
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function update_supplier($id, $data, $banks) {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('suppliers', $data);

        // Replace Bank Accounts (Delete all then insert new)
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier_bank_accounts');

        if (!empty($banks)) {
            $bank_data = [];
            foreach ($banks as $bank) {
                if(!empty($bank['bank_name'])) {
                    $bank['supplier_id'] = $id;
                    $bank_data[] = $bank;
                }
            }
            if(!empty($bank_data)) {
                $this->db->insert_batch('supplier_bank_accounts', $bank_data);
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete_supplier($id) {
        $this->db->where('id', $id);
        return $this->db->delete('suppliers');
    }
}
