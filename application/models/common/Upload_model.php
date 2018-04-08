<?php

class Upload_model extends CI_Model {

    function buildAmazonUploadConfig($f_type) {
        $config_upload = array();
        switch ($f_type) {

            case "Profile":
                $config_upload['upload_to'] = 'assets/profile_pictures';
                $config_upload['upload_path'] = 'assets/profile_pictures';
                $config_upload['allowed_types'] = '*';
                $config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB
                $config_upload['status'] = 1;
                break;

            default:
                $config_upload['upload_to'] = 'assets/default_images';
                $config_upload['upload_path'] = 'assets/default_images';
                $config_upload['allowed_types'] = '*';
                $config_upload['max_size'] = '10240'; // // 10240 Kb = 10 MB
                break;
        }
        return $config_upload;
    }

    function uploadDocuments($file_field_name, $file_type) {
        $conf_arr = $this->buildAmazonUploadConfig($file_type);
        $this->load->library('upload');
        $present_file_name = $_FILES[$file_field_name]['name'];
        $extntion_pos = strrpos($present_file_name, '.');
        if ($extntion_pos) {  // Rename the file to eliminate unwnated characters and spaces
            $new_file_name = $file_type . '_' . date('YmdHis');
            $new_file_name .= substr($present_file_name, $extntion_pos);
        } else {
            $new_file_name = $present_file_name;
        }
        $conf_arr['file_name'] = $new_file_name;
        $this->upload->initialize($conf_arr);
        if (!$this->upload->do_upload($file_field_name)) {
            $upl_file_data['msg'] = $this->upload->display_errors(); //$error;
            $upl_file_data['file_path'] = '';
            $upl_file_data['file_name'] = '';
            $upl_file_data['success'] = 0;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upl_file_data['msg'] = 'File upload successfully';
            $upl_file_data['file_path'] = $conf_arr['upload_path'] . '/' . $data['upload_data']['file_name'];
            $upl_file_data['file_name'] = $data['upload_data']['file_name'];
            $upl_file_data['success'] = 1;
        }
        return $upl_file_data;
    }

    function change_file_name($file_field_name) {
        $extntion_pos = strrpos($file_field_name, '.');
        $ext = pathinfo($file_field_name, PATHINFO_EXTENSION);
        if ($extntion_pos) {
            $new_file_name = $ext . '_' . date('YmdHis');
            $new_file_name .= substr($present_file_name, $extntion_pos);
        }
        echo $ext;
        exit;
    }

}

?>