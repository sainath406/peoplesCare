<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (($this->session->userdata('id')) && ($this->session->userdata('is_login'))) {
            redirect(base_url('admin_login'));
        }
        $data['title'] = "Admin Login";
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error frm_vld">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login', $data);
        } else {
            $this->load->model('admin/login_model');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $data = $this->login_model->check_cred($email, $password);
            if ($data['is_login']) {
                redirect(base_url('admin_login'));
            } else {
                $this->session->set_flashdata('error', 'Email or Password is incorrect');
                redirect(base_url('admin'));
            }
        }
    }

    public function logout() {
        $loggedout = array('is_login', 'firstname', 'lastname', 'email', 'id');
        $this->session->unset_userdata($loggedout);
        redirect(base_url('admin'));
    }

}
