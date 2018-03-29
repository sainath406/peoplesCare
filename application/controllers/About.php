<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/about_model', 'my_model');
        $this->load->model('home/home_model', 'home_model');
    }

    public function index() {
        $data['speak'] = $this->home_model->get_speak();
        $data['about'] = $this->my_model->get_about();
        $this->load->view('home/about', $data);
    }

}
