<?php

class Email_model extends CI_Model {

    function send_email($subject, $message, $email) {
        $this->db->where('id', 1);
        $cred = $this->db->get('integration_passwords')->row();
        $this->load->library('email');
        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => $cred->username,
            'smtp_pass' => $cred->password,
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));
        $this->email->from('info@apnrt.com', 'APNRT ITCENTRAL');
        if (!empty($email)) {
            $this->email->to($email);
        }
        if (!empty($subject)) {
            $this->email->subject($subject);
        }
        if (!empty($message)) {
//            $data['message'] = $message;
//            $message = $this->load->view('common/mail_html_view', $data, TRUE);
            $this->email->message($message);
        }
        if ($this->email->send()) {
            return true;
        } else {
            //echo $this->email->print_debugger();
            return false;
        }
    }

}
