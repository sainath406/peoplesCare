<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patientcare extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/patientcare_model', 'my_model');
        $this->load->model('home/home_model', 'home_model');
    }

    public function index() {
        $data['speak'] = $this->home_model->get_speak();
        $data['care'] = $this->my_model->get_care();
        $this->load->view('home/patientcare', $data);
    }

    public function view_patient_care($id) {
        $data['speak'] = $this->home_model->get_speak();
        $data['care_view'] = $this->my_model->get_care_view($id);
        $this->load->view('home/view-care', $data);
    }

}
