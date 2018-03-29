<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Videos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/videos_model', 'my_model');
        $this->load->model('home/home_model', 'home_model');
    }

    public function index() {
        $data['speak'] = $this->home_model->get_speak();
        $data['videos'] = $this->my_model->get_videos();
        $this->load->view('home/videos', $data);
    }

}
