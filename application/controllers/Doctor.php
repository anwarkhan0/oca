<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

  public $data = [];
  function __construct() {
    parent::__construct();
    $this->load->model('Doctor_model');
    $this->load->helper('url');
  }

  // dashboard View
  public function dashboard(){

    if($this->session->userdata('doc_loggedIn') == true){
      $data['record'] = $this->Doctor_model->doc_record($this->session->doc_id);
      $this->load->view('template/header.php');
      $this->load->view('doctors/dashboard.php', $data);
      $this->load->view('template/footer.php');
    } else{
      redirect(base_url('doctor/login'));
    }
    
  }

// search page view
  public function search_patient()
	{
    $this->load->view('template/header.php');
    $this->load->view('doctors/search_patient.php');
		$this->load->view('template/footer.php');
  }
// edit account page view
  public function account_details()
	{
    $data['record'] = $this->Doctor_model->doc_record($this->session->doc_id);
    $data['categories'] = $this->Doctor_model->get_category();
    $data['slots'] = $this->Doctor_model->slots_record($this->session->doc_id);
    $this->load->view('template/header.php');
    $this->load->view('doctors/account_details.php', $data);
		$this->load->view('template/footer.php');
  }

  public function list()
	{
    $this->load->library("pagination");
    $config = array();
    $config["base_url"] = base_url() . "doctors/list/";
    $config["total_rows"] = $this->Doctor_model->get_count('doctor');
    $config["per_page"] = 4;
    $config["uri_segment"] = 4;
    $config['full_tag_open'] = '<ul class="pagination pagination-lg justify-content-center mt-3">';
    $config['full_tag_close'] = '</ul>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['attributes'] = array('class' => 'page-link');
    $config['first_url'] = base_url() . "doctors/list/0";
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $config["cur_page"] = $page;
    $this->pagination->initialize($config);

    $data["links"] = $this->pagination->create_links();
    $data['categories'] = $this->Doctor_model->get_category();
    $data['record'] = $this->Doctor_model->get_doctors($config["per_page"], $page);
    $this->load->view('template/header.php');
    $this->load->view('doctors/list_doctors.php', $data);
		$this->load->view('template/footer.php');
  }


  ///////////////// Doctor registiration controller ///////////////////////////////////
  public function register(){

    /////////////////// image upload script//////////////////////
    $config['upload_path']          = './assets/photo';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 100;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    $pic = '';

    if ( ! $this->upload->do_upload('userfile'))
    {
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
      $pic = 'no_image.png';
    }
    else
    {
      $pic = $this->upload->data('file_name');
    }
    ///////////////////// Form Data ////////////////
    $data = array(
      'name' => $this->input->post('name'),
      'father_name' => $this->input->post('fname'),
      'reg_id' => $this->input->post('reg_id'),
      'district' => $this->input->post('district'),
      'state' => $this->input->post('state'),
      'address' => $this->input->post('address'),
      'contact' => $this->input->post('contact'),
      'email' => $this->input->post('email'),
      'qualifications' => $this->input->post('qualifications'),
      'cat_id' => $this->input->post('cat_id'),
      'fee' => $this->input->post('fee'),
      'time' => $this->input->post('time'),
      'password' => $this->input->post('pass'),
      'pic' => $pic
    );

    $days = [];
    if($this->input->post('mon') == 1){
      array_push($days,1);
    }
    if($this->input->post('tue') == 1){
      array_push($days, 2);
    }
    if($this->input->post('wed') == 1){
      array_push($days, 3);
    }
    if($this->input->post('thu') == 1){
      array_push($days, 4);
    }
    if ($this->input->post('fri') == 1) {
      array_push($days, 5);
    }
    if($this->input->post('sat') == 1){
      array_push($days, 6);
    }

    $this->Doctor_model->add_doc($data);
    $doc_data = $this->Doctor_model->login($data['reg_id'], $data['password']);
    $this->Doctor_model->create_slots($doc_data->doc_id, $this->input->post('slots'), $days);
    echo '<script>alert("Recored added successfully");</script>';
    $doctor = array(
      'type' => 'doctor',
      'doc_id' => $doc_data->doc_id,
      'name' => $doc_data->name,
      'doc_loggedIn' => true
    );
    $this->session->set_userdata($doctor);
    redirect(base_url('doctor/dashboard'));
  }
  
// upation of profile
  public function update_profile(){

    /////////////////// image upload script//////////////////////
    $config['upload_path']          = './assets/photo';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 100;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('userfile'))
    {
      $error = array('error' => $this->upload->display_errors());
      $pic = $this->input->post('picture');
    }
    else
    {
      $pic = $this->upload->data('file_name');
    }

  
    ///////////////////// Form Data ////////////////
    $data = array(
      'name' => $this->input->post('name'),
      'father_name' => $this->input->post('fname'),
      'reg_id' => $this->input->post('reg_id'),
      'district' => $this->input->post('district'),
      'state' => $this->input->post('state'),
      'contact' => $this->input->post('contact'),
      'address' => $this->input->post('address'),
      'email' => $this->input->post('email'),
      'qualifications' => $this->input->post('qualifications'),
      'cat_id' => $this->input->post('cat_id'),
      'time' => $this->input->post('time'),
      'fee' => $this->input->post('fee'),
      'pic' => $pic
    );

    $days = [];
    if($this->input->post('mon') == 1){
      array_push($days,1);
    }
    if($this->input->post('tue') == 1){
      array_push($days,2);
    }
    if($this->input->post('wed') == 1){
      array_push($days,3);
    }
    if($this->input->post('thu') == 1){
      array_push($days,4);
    }
    if ($this->input->post('fri') == 1) {
      array_push($days,5);
    }
    if($this->input->post('sat') == 1){
      array_push($days,6);
    }

    $this->Doctor_model->update_profile($data, $this->input->post('id'));
    $this->Doctor_model->update_slots($this->session->doc_id, $this->input->post('slots'), $days);
    echo '<script>alert("Recored updated successfully");</script>';
    $this->dashboard();
  }

  // Loggin method
  public function doc_login(){
    $check = $this->Doctor_model->login($this->input->post('regID'), $this->input->post('password'));
    if($check != ''){
      $doctor = array(
        'type' => 'doctor',
        'doc_id' => $check->doc_id,
        'name' => $check->name,
        'doc_loggedIn' => true
      );
      $this->session->set_userdata($doctor);
      $this->dashboard();
    } else {
      redirect(base_url('doctor/login'));
    }
  }

  public function logout(){
    $this->session->set_flashdata('loggedOutMsg', 'You are now logged out');
    $this->session->unset_userdata(array('type', 'doc_id', 'name', 'doc_loggedIn'));
    redirect(base_url());
  }

  //search doc
  public function search_doc(){
    $data['found_docs'] = $this->Doctor_model->search_doc($this->input->post('doc_name'));
    if (empty($data['found_docs'])) {
      $data['message'] = 'No Doctor found with the give Name';
      $this->load->view('template/header.php');
      $this->load->view('errors/nodoctorfound', $data);
      $this->load->view('template/footer.php');
    } else {
      $this->load->view('template/header.php');
      $this->load->view('doctors/search_result', $data);
      $this->load->view('template/footer.php');
    }
    
  }
}
