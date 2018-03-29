<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/home_model', 'my_model');
    }

    public function index() {
        $data['banners'] = $this->my_model->get_home_banners();
        $data['updates'] = $this->my_model->get_updates();
        $data['treat'] = $this->my_model->get_treatments();
        $data['speak'] = $this->my_model->get_speak();
        $data['care'] = $this->my_model->get_care();
        $data['insurance'] = $this->my_model->get_insurance_logos();
        $data['videos'] = $this->my_model->get_videos();
        $data['welcometext'] = $this->my_model->get_welcometext();
        $this->load->view('home/home', $data);
    }

}
