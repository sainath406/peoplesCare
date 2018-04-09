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

}
