<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Treatments_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_treatments_name() {
        $this->db->select("id,name");
        $this->db->from("tbl_pat_treatments");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_treatment_view($id) {
        $this->db->select("*");
        $this->db->from("tbl_pat_treatments");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function get_treatments() {
        $this->db->select("id,name,subtitle,image");
        $this->db->from("tbl_pat_treatments");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
