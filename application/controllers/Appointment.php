<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Doctor_model');
    $this->load->model('Appointment_model');
  }

  // appointments view
  public function appointments()
	{
    $data['appointments'] = $this->Appointment_model->get_appointments();
    if(empty($data['appointments'])){
      $data['message'] = 'You have no appointments this week';
    }
    $this->load->view('template/header.php');
    $this->load->view('doctors/appointments.php', $data);
		$this->load->view('template/footer.php');
  }

  public function doc(){
    if (!$this->session->p_loggedIn) {
      redirect('login');
    }
    $data['doctor'] = $this->Doctor_model->doc_record($this->input->post('doc_id'));

    //get all the days against the doc_id store it in array
    $slots = $this->Doctor_model->slots_record($this->input->post('doc_id'));
    //check if slots available on some day and add slot in the slots table
    foreach($slots as $slot){
      if ($this->day_available($slot['day'])) {
        if ((int)$slot['taken_slots'] < (int)$slot['total_slots']) {
          $a_num = (int)$slot['taken_slots'] + 1;
          $data['a_num'] = $a_num;
          $data['day'] = $slot['day'];
          $data['dayName'] = $this->return_day_name($slot['day']);
        break;
        }
      }else{
        $data['a_num'] = 0;
        $data['day'] = '';
        $data['dayName'] = '';
      }
    }
    $this->load->view('template/header');
    $this->load->view('appointment/doc_profile', $data);
    $this->load->view('template/footer');
  }

  // select availble doctors based on district
  public function available_docs(){
    $district = '';
    if ($this->input->post('district') == '') {
      $district = $this->session->district;
    }else{
      $district = $this->input->post('district');
    }
    $data['found_docs'] = $this->Doctor_model->available_docs($district, $this->input->post('cat_id'));
  
    $data['district'] = $this->Doctor_model->get_dist_name($district);
    if (empty($data['found_docs'])) {
      $data['message'] = 'Sorry No Doctor Found';
      $this->load->view('template/header');
      $this->load->view('errors/nodoctorfound', $data);
      $this->load->view('template/footer');
    }else{
      foreach($data['found_docs'] as $doc){
        
        //get all the days against the doc_id store it in array
        $slots = $this->Doctor_model->slots_record($doc['doc_id']);
        //check if slots available on some day and add slot in the slots table
        foreach($slots as $slot){
          //check every slot day and taken 
          if ($this->day_available($slot['day'])) {
            if ((int)$slot['taken_slots'] < (int)$slot['total_slots']) {
              $a_num = (int)$slot['taken_slots'] + 1;
              $data['slots_info'][] = array(
                'doc_id' => $doc['doc_id'],
                'a_num' => $a_num,
                'day' => $slot['day'],
                'dayName' => $this->return_day_name($slot['day'])
              );
            break;
            }
          }
        }
      }
      if (!isset($data['slots_info'])) {
        $data['slots_info'][] = array(
          'doc_id' => '',
          'a_num' => 0
        );
      }
      $this->load->view('template/header');
      $this->load->view('appointment/available_docs', $data);
      $this->load->view('template/footer');
    }
  }
  
  //check the day if the day passed or not
  public function day_available($slot_day){
    if ($slot_day > date('w') ) {
      return true;
    } else {
      return false;
    }
  }

  //return day name for number
  public function return_day_name($day_num){
    $day = array(
      "1" => 'Monday',
      "2" => 'Tuesday',
      "3" => 'Wednesday',
      "4" => 'Thursday',
      "5" => 'Friday',
      "6" => 'Saturday'
    );
    return $day[$day_num];
  }

  //return date for week day
  public function return_date($app_day){
    echo $app_day;
  }

  public function book(){
    $data = array(
      'doc_id' => $this->input->post('doc_id'),
      'dname' => $this->input->post('dname'),
      'daddress' => $this->input->post('daddress'),
      'ddistrict' => $this->input->post('district'),
      'dcontact' => $this->input->post('dcontact'),
      'time' => $this->input->post('time'),
      'p_id' => $this->session->p_id,
      'pname' => $this->session->name,
      'pcontact' => $this->session->contact,
      'pdistrict' => $this->session->district,
      'a_num' => $this->input->post('a_num'),
      'day' => $this->input->post('dayName')
    );
    $slot_data = array(
      'doc_id' => $this->input->post('doc_id'),
      'taken_slots' => $this->input->post('a_num'),
      'day' => $this->input->post('day')
    );
    
    //book query
    $this->Appointment_model->book($data, $slot_data);
    $this->session->set_flashdata('booked', 'Your Appointment has been booked successfully');
    redirect(base_url());

  }

  public function cancel(){
    $this->Appointment_model->cancel();
    redirect(base_url('user/appointments'));
  }

}
