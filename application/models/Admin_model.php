
<?php
class Admin_model extends CI_Model{
    function __construct() {
    parent::__construct();
    }

    function add_category($data){
        // Inserting data
        $this->db->insert('category', $data);
    }

    function get_category(){
        // getting category data
        $query = $this->db->get('category')->result_array();
        return $query;
    }

    function get_docs(){
        $query = $this->db->get('doctor')->result_array();
        return $query;
    }

    function get_patients(){
        $query = $this->db->get('patient')->result_array();
        return $query;
    }

    function approve(){
        $this->db->set('approved', 1);
        $this->db->where('doc_id', $this->input->get('id'));
        $this->db->update('doctor');
    }

    function disapprove(){
        $this->db->set('approved', 0);
        $this->db->where('doc_id', $this->input->get('id'));
        $this->db->update('doctor');
    }

    public function login($username, $password){
        $this->db->where('user_name', $username);
        $this->db->where('password', $password);
        return $this->db->get('users')->row();
    }
}