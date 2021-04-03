<?php

class User_model extends CI_Model {

    function get_category(){
        // getting category data
        $query = $this->db->get('category')->result_array();
        return $query;
    }

    public function p_record($email = false){
        if ($email) {
            $this->db->where('email', $email);
            return $this->db->get('patient')->row();
        } else{
            return $this->db->get('patient')->result_array();
        }
        
    }

    public function get_appointments(){
        $this->db->where('p_id', $this->session->p_id);
        return $this->db->get('appointments')->result_array();
    }

    public function add_patient($data){
        $query = $this->db->insert('patient', $data);
        return $query;
    }

    public function update_profile($data, $id){
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
    }

    public function login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('patient')->row();
    }

}