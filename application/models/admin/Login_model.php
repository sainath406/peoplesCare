<?php

class Login_model extends CI_Model {

    function check_cred($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $data = $this->db->get('admins')->row();
        if ($data) {
            $loggedin = array(
                'is_login' => true,
                'firstname' => $data->first_name,
                'lastname' => $data->last_name,
                'email' => $data->email,
                'id' => $data->id
            );
            $this->session->set_userdata($loggedin);
        } else {
            $loggedin = array(
                'is_login' => false,
            );
        }
        return $loggedin;
    }

    function getMembers($search) {
        $name = $search['name'];
        $email = $search['email'];
        $start = $search['start'];
        $limit = $search['limit'];
        $this->db->select('*');
        $this->db->from('tbl_contacted');
        if ($name) {
            $this->db->like('name', $name);
        }
        if ($email) {
            $this->db->like('email', $email);
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $data['members'] = $this->db->get()->result();
        $data['ttl_rows'] = $this->getMembersCount($search);
        return $data;
    }

    function getMembersCount($search) {
        $name = $search['name'];
        $email = $search['email'];
        $this->db->select('count(*) as ttl_rows');
        $this->db->from('tbl_contacted');
        if ($name) {
            $this->db->like('name', $name);
        }
        if ($email) {
            $this->db->like('email', $email);
        }
        $count = $this->db->get()->row();
        return $count->ttl_rows;
    }

}
