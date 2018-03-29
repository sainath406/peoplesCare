<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patientcare_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_care() {
        $this->db->select("*");
        $this->db->from("tbl_pat_care");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_care_view($id) {
        $this->db->select("*");
        $this->db->from("tbl_pat_care");
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

}
