<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/blog_model', 'my_model');
        $this->load->model('home/common_model', 'common_model');
        $this->load->model('home/home_model', 'home_model');
        $this->load->library('pagination');
    }

    public function index() {
        $config['base_url'] = site_url('blog/index');
        $config['total_rows'] = $this->db->count_all("tbl_blog");
        $config['per_page'] = 10;
        $config['num_links'] = 10;
        $config['full_tag_open'] = "<div><ul class='pagination'>";
        $config['full_tag_close'] = "</ul></div>";

        $config['prev_link'] = "«";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";

        $config['next_link'] = "»";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";

        $config['first_link'] = "First";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";

        $config['last_link'] = "Last";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";

        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";

        $config['cur_tag_open'] = "<li active'><a href=''>";
        $config['cur_tag_close'] = "</a></li>";

        $this->pagination->initialize($config);

        if ($this->uri->segment(3) == true) {
            $start = $this->uri->segment(3);
        } else {
            $start = 0;
        }
        $data['pagination'] = $this->pagination->create_links();
        $data['record'] = $this->my_model->get_blog($start, $config['per_page']);
        $data['speak'] = $this->home_model->get_speak();
        $this->load->view('home/blog', $data);
    }

    public function blog_view($id) {
        $data['blog'] = $this->my_model->get_blog_view($id);
        $data['speak'] = $this->home_model->get_speak();
        $this->load->view('home/blog_view', $data);
    }

}
