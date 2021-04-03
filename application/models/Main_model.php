
<?php
class Main_model extends CI_Model{
    function __construct() {
    parent::__construct();
    }

    function get_docs($dist){
        $result = $this->db->get_where('doctor', array('district' => $dist), 8, 0)->result_array();
        return $result;
    }

    function get_category(){
        // getting category data
        $query = $this->db->get('category')->result_array();
        return $query;
    }

    function get_districts(){
        // getting category data
        $query = $this->db->get('districts')->result_array();
        return $query;
    }
}