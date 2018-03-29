<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/gallery_model', 'my_model');
        $this->load->model('home/home_model', 'home_model');
    }

    public function index() {
        $data['speak'] = $this->home_model->get_speak();
        $data['gallery'] = $this->my_model->get_gallery();
        $this->load->view('home/gallery', $data);
    }

    public function view_gallery($id) {
        $data['speak'] = $this->home_model->get_speak();
        $data['gallery'] = $this->my_model->get_gallery_view($id);
        $this->load->view("home/view-gallery", $data);
    }

}
