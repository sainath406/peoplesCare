<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_styles() {
        $this->db->select("*");
        $this->db->from("tbl_styles");
        $this->db->where('id', 1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function get_treatments() {
        $this->db->select("*");
        $this->db->from("tbl_pat_treatments");
        $this->db->order_by('id', 'desc');
        $this->db->limit(12);
        $this->db->where('status', 1);
        $this->db->where('hstatus', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_speak() {
        $this->db->select("*");
        $this->db->from("tbl_pat_speak");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();   //echo '<pre>'; print_r($result); exit;
        return $result;
    }

    public function get_care() {
        $this->db->select("*");
        $this->db->from("tbl_pat_care");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $this->db->limit(3);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_insurance_logos() {
        $this->db->select("*");
        $this->db->from("tbl_insurances");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_videos() {
        $this->db->select("*");
        $this->db->from("tbl_videoss");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $this->db->limit(2);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_home_banners() {
        $this->db->select("*");
        $this->db->from("tbl_banners");
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_updates() {
        $this->db->select("*");
        $this->db->from("tbl_updates");
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_welcometext() {
        $this->db->select("*");
        $this->db->from("tbl_content");
        $this->db->where('id', 1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

}
