<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_about() {
        $this->db->select("*");
        $this->db->from("tbl_content");
        $this->db->where('id', 2);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

}
