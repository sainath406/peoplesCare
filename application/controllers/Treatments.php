<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Treatments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/treatments_model', 'my_model');
        $this->load->model('home/home_model', 'home_model');
    }

    public function index() {
        $data['speak'] = $this->home_model->get_speak();
        $data['treat'] = $this->my_model->get_treatments();
        $this->load->view('home/treatments', $data);
    }

    public function treatment_view($id) {
        $data['speak'] = $this->home_model->get_speak();
        $data['treat'] = $this->my_model->get_treatments_name();
        $data['treatview'] = $this->my_model->get_treatment_view($id);
        $this->load->view('home/view-treatment', $data);
    }

}
