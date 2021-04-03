<?php

class Appointment_model extends CI_Model {


    public function get_appointments(){
        $this->db->where('doc_id', $this->session->doc_id);
        return $this->db->get('appointments')->result_array();
    }

    public function book_slots($data){
        $this->db->set('taken_slots', $data['taken_slots'], FALSE);
        $this->db->where('doc_id', $data['doc_id']);
        $this->db->where('day', $data['day']);
        $this->db->update('appointment_slots');
    }

    public function book($data, $slot_data){
        $this->db->insert('appointments', $data);
        $this->book_slots($slot_data);
    }

    public function cancel(){
        $this->db->where('booking_id', $this->input->get('b_id'));
        $this->db->delete('appointments');
    }
}