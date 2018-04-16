<?php

class Patient_model extends CI_Model {

    public function getMedicalHistory() {
        return $this->db->get('medical_history')->result();
    }

    public function getGroups() {
        return $this->db->get('groups')->result();
    }

    public function getReferredBy() {
        return $this->db->get('referred_by')->result();
    }

    public function getBloodGroups() {
        return $this->db->get('blood_groups')->result();
    }

    public function getLanguages() {
        return $this->db->get('languages')->result();
    }

    public function getDoctors() {
        return $this->db->get('doctors')->result();
    }

    public function getCategories() {
        return $this->db->get('categories')->result();
    }

    public function getProcedures() {
        return $this->db->get('procedures')->result();
    }

    function getPatients($search) {
        $name = $search['name'];
        $email = $search['email'];
        $phone = $search['phone'];
        $reg = $search['reg'];
        $start = $search['start'];
        $limit = $search['limit'];
        $this->db->select('p_name, profile, p_mobile');
        $this->db->from('patients');
        if ($name) {
            $this->db->like('p_name', $name, 'after');
        }
        if ($email) {
            $this->db->like('email', $email, 'after');
        }
        if ($phone) {
            $this->db->like('p_mobile', $phone, 'after');
        }
        if ($reg) {
            $this->db->where('reg_status_id', $reg);
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $data['patients'] = $this->db->get()->result();
        $data['ttl_rows'] = $this->getPatientsCount($search);
        return $data;
    }

    function getPatientsCount($search) {
        $name = $search['name'];
        $email = $search['email'];
        $phone = $search['phone'];
        $reg = $search['reg'];
        $start = $search['start'];
        $limit = $search['limit'];
        $this->db->select('count(*) as ttl_rows');
        $this->db->from('patients');
        if ($name) {
            $this->db->like('p_name', $name, 'after');
        }
        if ($email) {
            $this->db->like('email', $email, 'after');
        }
        if ($phone) {
            $this->db->like('p_mobile', $phone, 'after');
        }
        if ($reg) {
            $this->db->where('reg_status_id', $reg);
        }
        $count = $this->db->get()->row();
        return $count->ttl_rows;
    }

}
