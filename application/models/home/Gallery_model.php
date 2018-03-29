<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_gallery() {
        $this->db->select("*");
        $this->db->from("tbl_pat_gallery");
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_gallery_view($id) {
        $this->db->select("*");
        $this->db->from("tbl_addphotos");
        $this->db->where('status', 1);
        $this->db->where('aid', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
