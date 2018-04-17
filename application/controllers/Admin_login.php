<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->valid_user();
        $this->load->library(array('pagination'));
        $this->load->model('admin/patient_model');
    }

    public function index() {
        $data['title'] = "Clinic Dashboard";
        $this->load->view('admin/dashboard', $data);
    }

    public function contacted_members() {
        $data['title'] = "Contacted Members";
        $data['start'] = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $data['limit'] = ($this->input->get('limit')) ? $this->input->get('limit') : 25;
        $data['starting'] = ($this->input->get('page')) ? ($data['start'] - 1 ) * $data['limit'] : 0;
        $data['name'] = ($this->input->get('name')) ? $this->input->get('name') : '';
        $data['email'] = ($this->input->get('email')) ? $this->input->get('email') : '';
        $data['phone'] = ($this->input->get('phone')) ? $this->input->get('phone') : '';
        $search_options = array(
            'start' => $data['starting'],
            'limit' => $data['limit'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        );
        $this->load->model('admin/login_model');
        $members = $this->login_model->getMembers($search_options);
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_global_url_suffix'] = FALSE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $members['ttl_rows'];
        $config['per_page'] = $data['limit'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $QUERY_STRING = $this->removeQueryVal($_SERVER['QUERY_STRING'], 'page');
        $config['base_url'] = base_url('admin_login/contacted_members' . $QUERY_STRING);
        $config['suffix'] = '';
        $config['first_url'] = '';
        $this->pagination->initialize($config);
        $data['ttl_rows'] = $members['ttl_rows'];
        $data['members'] = $members['members'];
        $data['pagination'] = $this->pagination->create_links();
        $data['querystring'] = $QUERY_STRING;

        $this->load->view('admin/contacted_members', $data);
    }

    function removeQueryVal($qry, $qryKey) {
        $qry_new = '';
        $qryval = array();
        if (strpos($qry, $qryKey) === false) {
            $qry_new .= ($qry) ? '?' . $qry : '';
        } else {
            if (strlen($qry) > 1) {
                $qry = (strpos($qry, "?") !== false) ? substr($qry, 1) : $qry;
                $qryArr = (strpos($qry, '&') !== false) ? explode("&", $qry) : $qry;
                if (is_array($qryArr)) {
                    foreach ($qryArr as $val) {
                        if (strpos($val, $qryKey . '=') === false) {
                            $qryPair = explode('=', $val);
                            $qry_new .= '&' . $qryPair[0] . '=' . $qryPair[1];
                        }
                    }
                }
                $qry_new = substr($qry_new, 1);
                $qry_new = ($qry_new) ? '?' . $qry_new : '';
            }
        }
        return $qry_new;
    }

    public function valid_user() {
        if (($this->session->userdata('id')) && ($this->session->userdata('is_login'))) {
            return true;
        } else {
            redirect(base_url('admin'));
        }
    }

    public function addPatient() {
        $data['title'] = "Add Patient";
        $data['med_his'] = $this->patient_model->getMedicalHistory();
        $data['groups'] = $this->patient_model->getGroups();
        $data['refs'] = $this->patient_model->getReferredBy();
        $data['bloods'] = $this->patient_model->getBloodGroups();
        $data['langs'] = $this->patient_model->getLanguages();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error_frm">', '</div>');
        $this->form_validation->set_rules('patient_name', 'Name', 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|min_length[2]|max_length[100]', array('regex_match' => '%s only accepts alphabet.'));
        $this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|max_length[50]');
        $this->form_validation->set_rules('gender', 'Gender');
        $this->form_validation->set_rules('dob', 'Date Of Birth');
        $this->form_validation->set_rules('reference', 'Referred By');
        $this->form_validation->set_rules('blood', 'Blood Group');
        $this->form_validation->set_rules('language', 'Language');
        $this->form_validation->set_rules('landline', 'Landline', 'trim|numeric|max_length[12]');
        $this->form_validation->set_rules('street', 'Street');
        $this->form_validation->set_rules('locality', 'Locality');
        $this->form_validation->set_rules('city', 'City');
        $this->form_validation->set_rules('pincode', 'Pincode');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|max_length[100]');
        $this->form_validation->set_rules('p_mobile', 'Primary Mobile', 'trim|required|numeric|min_length[7]|max_length[12]|is_unique[patients.p_mobile]', array('is_unique' => 'Patient Already Exist'));
        $this->form_validation->set_rules('s_mobile', 'Secondary Mobile', 'trim|numeric|min_length[7]|max_length[12]|is_unique[patients.p_mobile]', array('is_unique' => 'Patient Already Exist'));
        $this->form_validation->set_rules('age', 'Age', 'trim|numeric|max_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/addPatient', $data);
        } else {
            $this->load->model('common/upload_model');
            $profile = 'profile';
            $y = $_FILES[$profile]['name'];
            $profile_picture = '';
            if ($y != '') {
                $file_upl_data = $this->upload_model->uploadDocuments($profile, 'Profile');
                if ($file_upl_data['success'] == 1) {
                    $profile_picture = $file_upl_data['file_name'];
                }
            }

            $now = date('Y-m-d H:i:s', strtotime('now'));
            $data = array(
                'p_name' => $this->input->post('patient_name'),
                'p_id' => $this->input->post('patient_id'),
                'gender' => $this->input->post('gender'),
                'p_age' => $this->input->post('age'),
                'dob' => $this->input->post('dob'),
                'ref_id' => $this->input->post('reference'),
                'blood_id' => $this->input->post('blood'),
                'profile' => $profile_picture,
                'p_mobile' => $this->input->post('p_mobile'),
                's_mobile' => $this->input->post('s_mobile'),
                'lang_id' => $this->input->post('language'),
                'landline' => $this->input->post('landline'),
                'email' => $this->input->post('email'),
                'street' => $this->input->post('street'),
                'locality' => $this->input->post('locality'),
                'city' => $this->input->post('city'),
                'pincode' => $this->input->post('pincode'),
                'created' => $now,
                'modified' => $now
            );
            $insert = $this->db->insert('patients', $data);
            if ($insert) {
                $insert_id = $this->db->insert_id();
                if ($this->input->post('med_his')) {
                    $med_his = implode(',', $this->input->post('med_his'));
                    $data1 = array(
                        'patient_id' => $insert_id,
                        'med_his' => $med_his,
                        'created' => $now,
                        'modified' => $now
                    );
                    $insert1 = $this->db->insert('patient_medical_history', $data1);
                }

                if ($this->input->post('groups')) {
                    $groups = implode(',', $this->input->post('groups'));
                    $data2 = array(
                        'patient_id' => $insert_id,
                        'groups' => $groups,
                        'created' => $now,
                        'modified' => $now
                    );
                    $insert2 = $this->db->insert('patient_groups', $data2);
                }
                $this->session->set_flashdata('success', 'Patient Created Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Patient is not created, Try again later');
            }
            redirect(base_url('admin_login/addPatient'));
        }
    }

    public function addAppointment() {
        $data['title'] = "Add Appointment";
        $data['doctors'] = $this->patient_model->getDoctors();
        $data['categories'] = $this->patient_model->getCategories();
        $data['procedures'] = $this->patient_model->getProcedures();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error_frm">', '</div>');
        $this->form_validation->set_rules('patient_name', 'Name', 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|min_length[2]|max_length[100]', array('regex_match' => '%s only accepts alphabet.'));
        $this->form_validation->set_rules('procedures[]', 'Procedures');
        $this->form_validation->set_rules('doctors', 'Doctor', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('schedule_date', 'schedule_date', 'trim|required');
        $this->form_validation->set_rules('description', 'Notes');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/addAppointment', $data);
        } else {
            $now = date('Y-m-d H:i:s', strtotime('now'));
            if ($this->input->post('procedures')) {
                $procedures = implode(',', $this->input->post('procedures'));
            } else {
                $procedures = '';
            }
            $schedule_date = date('Y-m-d', strtotime($this->input->post('schedule_date')));
            $data = array(
                'p_name' => $this->input->post('patient_name'),
                'procedures' => $procedures,
                'doctor_id' => $this->input->post('doctors'),
                'category_id' => $this->input->post('category'),
                'schedule_date' => $schedule_date,
                'description' => $this->input->post('description'),
                'reg_status_id' => 2,
                'created' => $now,
                'modified' => $now
            );
            $insert = $this->db->insert('patients', $data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Appointment Created Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Appointment is not created, Try again later');
            }
            redirect(base_url('admin_login/addAppointment'));
        }
    }

    public function patient_list() {
        $data['title'] = "Patients List";
        $data['start'] = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $data['limit'] = ($this->input->get('limit')) ? $this->input->get('limit') : 12;
        $data['starting'] = ($this->input->get('page')) ? ($data['start'] - 1 ) * $data['limit'] : 0;
        $data['name'] = ($this->input->get('name')) ? $this->input->get('name') : '';
        $data['email'] = ($this->input->get('email')) ? $this->input->get('email') : '';
        $data['phone'] = ($this->input->get('phone')) ? $this->input->get('phone') : '';
        $search_options = array(
            'start' => $data['starting'],
            'limit' => $data['limit'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        );
        $this->load->model('admin/patient_model');
        $patients = $this->patient_model->getPatients($search_options);
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_global_url_suffix'] = FALSE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $patients['ttl_rows'];
        $config['per_page'] = $data['limit'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $QUERY_STRING = $this->removeQueryVal($_SERVER['QUERY_STRING'], 'page');
        $config['base_url'] = base_url('admin_login/patient_list' . $QUERY_STRING);
        $config['suffix'] = '';
        $config['first_url'] = '';
        $this->pagination->initialize($config);
        $data['ttl_rows'] = $patients['ttl_rows'];
        $data['patients'] = $patients['patients'];
        $data['pagination'] = $this->pagination->create_links();
        $data['querystring'] = $QUERY_STRING;
        $this->load->view('admin/patient_list', $data);
    }

    public function getPatients() {
        $term = $this->input->get('p_name');
        $this->db->select('id as value, CONCAT(p_name, " | ", p_mobile) as label');
        $this->db->from('patients');
        $this->db->like('p_name', $term, 'after');
        $this->db->or_like('p_mobile', $term, 'after');
        $this->db->limit(100);
        $data = $this->db->get()->result_array();
        echo json_encode($data);
    }

//    public function convert() {
//        $data = "English,
//            Hindi,
//            Telugu,
//            Marathi,
//            Gujarati,
//            Tamil,
//            Malayalam,
//            Bengali,
//            Punjabi,
//            Kannada,
//            Assamese,
//            Odia";
//        $data1 = explode(",", $data);
//        $now = date('Y-m-d H:i:s', strtotime('now'));
//        foreach ($data1 as $da) {
//            $data2 = array(
//                'language' => trim($da),
//                'created' => $now
//            );
//            $insert = $this->db->insert('languages', $data2);
//            if ($insert) {
//                echo '<pre> Success';
//            }
//        }
//    }
}
