<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public $table_name = 'tbl_blog';

    public function __construct() {
        parent::__construct();
    }

    public function get_blog($start, $end) {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->limit($end, $start);
        $this->db->order_by('id', 'asc');
        $this->db->order_By('MONTH(record_date)');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_blog_view($id) {
        $this->db->select("*");
        $this->db->from("tbl_blog");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

}
