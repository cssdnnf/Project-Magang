<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_all_products($keyword = null, $sort = null, $category = null) {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('name', $keyword);
            $this->db->or_like('code', $keyword);
            $this->db->group_end();
        }

        if ($category) {
            $this->db->where('category', $category);
        }

        switch ($sort) {
            case 'az':
                $this->db->order_by('name', 'ASC');
                break;
            case 'za':
                $this->db->order_by('name', 'DESC');
                break;
            case 'price_low':
                $this->db->order_by('unit_price', 'ASC');
                break;
            case 'price_high':
                $this->db->order_by('unit_price', 'DESC');
                break;
            case 'oldest':
                $this->db->order_by('id', 'ASC');
                break;
            case 'newest':
            default:
                $this->db->order_by('id', 'DESC');
                break;
        }

        return $this->db->get('products')->result_array();
    }

    public function count_purchasable() {
        $this->db->where('is_purchase', 1);
        return $this->db->count_all_results('products');
    }

    public function count_salable() {
        $this->db->where('is_sale', 1);
        return $this->db->count_all_results('products');
    }

    public function count_categories() {
        $this->db->distinct();
        $this->db->select('category');
        return $this->db->get('products')->num_rows();
    }

    public function get_product_by_id($id) {
        return $this->db->get_where('products', ['id' => $id])->row_array();
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function count_total() {
        return $this->db->count_all('products');
    }
}
