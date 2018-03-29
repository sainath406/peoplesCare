<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Videos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_videos() {
        $this->db->select("*");
        $this->db->from("tbl_videoss");
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
