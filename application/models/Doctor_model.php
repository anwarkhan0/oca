<?php

class Doctor_model extends CI_Model {

    function get_category(){
        // getting category data
        $query = $this->db->get('category')->result_array();
        return $query;
    }

    public function doc_record($id = false){
        if ($id) {
            $this->db->where('doc_id', $id);
            return $this->db->get('doctor')->row();
        } else{
            return $this->db->get('doctor')->result_array();
        }
        
    }

    public function get_dist_name($d_id){
        $this->db->where('district_id', $d_id);
        return $this->db->get('districts')->row();
    }

    public function get_count($table) {
        return $this->db->count_all($table);
    }

    public function get_doctors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('doctor');

        return $query->result_array();
    }

    public function search_doc($name){
        $this->db->like('name', $name);
        $query = $this->db->get('doctor')->result_array();
        return $query;
    }

    public function available_docs($district, $category){
        $this->db->where('district', $district);
        $this->db->where('cat_id', $category);
        return $this->db->get('doctor')->result_array();
    }

    public function slots_record($id = false){
        if ($id) {
            $this->db->where('doc_id', $id);
            return $this->db->get('appointment_slots')->result_array();
        } else{
            return $this->db->get('appointment_slots')->result_array();
        }
        
    }

    public function add_doc($data){
        $query = $this->db->insert('doctor', $data);
        return $query;
    }

    public function create_slots($id, $total_slots, $days){
        foreach($days as $day){
            $this->db->insert('appointment_slots', array(
                'doc_id' => $id,
                'day' => $day,
                'taken_slots' => 0,
                'total_slots' => $total_slots
            ));
        }
    }

    public function update_slots($id, $total_slots, $days){
        $this->db->where('doc_id', $id);
        $this->db->delete('appointment_slots');
        $this->create_slots($id, $total_slots, $days);
    }

    public function update_profile($data, $id){
        $this->db->where('doc_id', $id);
        $this->db->update('doctor', $data);
    }

    public function login($reg_id, $password){
        $this->db->where('reg_id', $reg_id);
        $this->db->where('password', $password);
        return $this->db->get('doctor')->row();
    }

}