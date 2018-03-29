<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booknow_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_booknow() {
        $set_data = array(
            'service' => mysql_real_escape_string($this->input->post('service', TRUE)),
            'date' => mysql_real_escape_string($this->input->post('date', TRUE)),
            'name' => mysql_real_escape_string(ucfirst($this->input->post('name', TRUE))),
            'email' => mysql_real_escape_string($this->input->post('email', TRUE)),
            'mobile' => mysql_real_escape_string($this->input->post('mobile', TRUE)),
            'time' => mysql_real_escape_string($this->input->post('time', TRUE)),
            'patient_type' => mysql_real_escape_string(ucfirst($this->input->post('patient_type', TRUE)))
        );
        /* echo "<pre>";print_r($set_data);exit; */
        $result = $this->db->insert("tbl_contacted", $set_data);
        return $result;
    }

}
