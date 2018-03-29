<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booknow extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/booknow_model', 'my_model');
        $this->load->model('home/home_model', 'home_model');
        $this->load->library('email');
    }

    public function index() {
        if ($this->input->post('submit') != '') {
            $recaptcha = trim($this->input->post('g-recaptcha-response'));
            $userIp = $this->input->ip_address();
            $secret = '9LuDh9kyetYYYYdT0jsVckScsH8Ks3KA';
            $data = array('secret' => "$secret", 'response' => "$recaptcha", 'remoteip' => "$userIp");
            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
            $status = json_decode($response, true);
            if (empty($status['success'])) {
                $result = $this->my_model->add_booknow();
                if ($result) {
                    $assigned_message = "Hi, Someone is Contacted Through Peoplesdentalcare... Here are the details. Name: " . $this->input->post('name') . " , Email:  " . $this->input->post('email') . ", Mobile:  " . $this->input->post('mobile') . " , Date:  " . $this->input->post('date') . ", Time:  " . $this->input->post('time') . " , Service Type:  " . $this->input->post('service') . " , New Patient:  " . $this->input->post('patient_type') . " .Thank You ...!";
                    $this->sms("8143011112", $assigned_message);
                    $msg = '<table  border="1" style="text-align:center;"><tr><td style="padding: 15px;">Name:</td><td style="padding: 15px;">' . $this->input->post('name') . '</td></tr><tr><td style="padding: 15px;">Email :</td><td style="padding: 15px;">' . $this->input->post('email') . '</td></tr><tr><td style="padding: 15px;">Mobile:</td><td style="padding: 15px;">' . $this->input->post('mobile') . '</td></tr><tr><td style="padding: 15px;">Date:</td><td style="padding: 15px;">' . $this->input->post('date') . '</td></tr><tr><td style="padding: 15px;">Time:</td><td style="padding: 15px;">' . $this->input->post('time') . '</td></tr><tr><td style="padding: 15px;">Service Type:</td><td style="padding: 15px;">' . $this->input->post('service') . '</td></tr><tr><td style="padding: 15px;">New Patient:</td><td style="padding: 15px;">' . $this->input->post('patient_type') . '</td></tr></table>';
                    $this->emailssend($msg);
                    $this->session->set_flashdata('msg_succ', 'Contacted Successfully.');
                    redirect(site_url() . "booknow");
                }
            } else {
                $this->session->set_flashdata('msg_succ', 'Failed try again.');
                redirect(site_url() . "booknow");
            }
        }
        $data['fstyles'] = $this->home_model->get_styles();
        $data['speak'] = $this->home_model->get_speak();
        $this->load->view('home/booknow', $data);
    }

    function sms($num, $msg) {
        $url = "http://sms.royalitpark.com/spanelv2/api.php?username=royaladminp&password=mission2015&to=" . urlencode($num) . "&from=ITPARK&message=" . urlencode($msg);
        file($url);
        /* $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_TIMEOUT, 4);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
          $start = array_sum(explode(' ', microtime()));
          $result = curl_exec($ch);
          return $result; */
    }

    function emailssend($msg) {
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to('info@royalinfosys.com');
        $this->email->set_mailtype("html");
        /* $this->email->to('naresh@royalitpark.com'); */
        $this->email->subject('Someone is Contacted Through Peoplesdentalcare... ');
        $this->email->message($msg);
        return $result = $this->email->send();
    }

}
