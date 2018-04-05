<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->valid_user();
        $this->load->library(array('pagination'));
    }

    public function index() {
        $data['title'] = "Clinic Dashboard";
        $this->load->view('admin/dashboard', $data);
    }

    public function contacted_members() {
        $data['title'] = "Contacted Members";
        $data['start'] = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $data['limit'] = ($this->input->get('limit')) ? $this->input->get('limit') : 25;
        $data['starting'] = ($this->input->get('page')) ? ($data['start'] - 1 ) * $data['limit'] : 0;
        $data['name'] = ($this->input->get('name')) ? $this->input->get('name') : '';
        $data['email'] = ($this->input->get('email')) ? $this->input->get('email') : '';

        $search_options = array(
            'start' => $data['starting'],
            'limit' => $data['limit'],
            'name' => $data['name'],
            'email' => $data['email']
        );
        $this->load->model('admin/login_model');
        $members = $this->login_model->getMembers($search_options);
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_global_url_suffix'] = FALSE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $members['ttl_rows'];
        $config['per_page'] = $data['limit'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $QUERY_STRING = $this->removeQueryVal($_SERVER['QUERY_STRING'], 'page');
        $config['base_url'] = base_url('admin_login/contacted_members' . $QUERY_STRING);
        $config['suffix'] = '';
        $config['first_url'] = '';
        $this->pagination->initialize($config);
        $data['ttl_rows'] = $members['ttl_rows'];
        $data['members'] = $members['members'];
        $data['pagination'] = $this->pagination->create_links();
        $data['querystring'] = $QUERY_STRING;

        $this->load->view('admin/contacted_members', $data);
    }

    function removeQueryVal($qry, $qryKey) {
        $qry_new = '';
        $qryval = array();
        if (strpos($qry, $qryKey) === false) {
            $qry_new .= ($qry) ? '?' . $qry : '';
        } else {
            if (strlen($qry) > 1) {
                $qry = (strpos($qry, "?") !== false) ? substr($qry, 1) : $qry;
                $qryArr = (strpos($qry, '&') !== false) ? explode("&", $qry) : $qry;
                if (is_array($qryArr)) {
                    foreach ($qryArr as $val) {
                        if (strpos($val, $qryKey . '=') === false) {
                            $qryPair = explode('=', $val);
                            $qry_new .= '&' . $qryPair[0] . '=' . $qryPair[1];
                        }
                    }
                }
                $qry_new = substr($qry_new, 1);
                $qry_new = ($qry_new) ? '?' . $qry_new : '';
            }
        }
        return $qry_new;
    }

    public function valid_user() {
        if (($this->session->userdata('id')) && ($this->session->userdata('is_login'))) {
            return true;
        } else {
            redirect(base_url('admin'));
        }
    }

    public function addPatient() {
        $data['title'] = "Add Patient";
        $this->load->view('admin/addPatient', $data);
    }

}
