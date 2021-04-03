<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


  function __construct() {
    parent::__construct();
    $this->load->model('Admin_model');
  }

    
	public function dashboard()
	{
    if(!$this->session->admin_loggedIn){
      redirect(base_url('admin/login'));
    }
    $this->load->model('Doctor_model');
    $data['total_docs'] = $this->Doctor_model->get_count('doctor');
    $data['total_patients'] = $this->Doctor_model->get_count('patient');
    $data['total_appointments'] = $this->Doctor_model->get_count('appointments');
    $this->load->view('admin/includes/header.php');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/includes/footer.php');
  }

  public function doctors()
	{
    $data['categories'] = $this->Admin_model->get_category();
    $data['docs'] = $this->Admin_model->get_docs();
    $this->load->view('admin/includes/header.php');
    $this->load->view('admin/doctors', $data);
    $this->load->view('admin/includes/footer.php');
  }

  public function doc_requests(){
    $data['categories'] = $this->Admin_model->get_category();
    $data['docs'] = $this->Admin_model->get_docs();
    $this->load->view('admin/includes/header.php');
    $this->load->view('admin/pending', $data);
    $this->load->view('admin/includes/footer.php');
  }

  public function approve(){
    $this->Admin_model->approve();
    redirect(base_url('admin/doctors'));
  }

  public function disapprove(){
    $this->Admin_model->disapprove();
    redirect(base_url('admin/doctors'));
  }

  public function category()
	{
    $data['categories'] = $this->Admin_model->get_category();
    $this->load->view('admin/includes/header.php');
    $this->load->view('admin/category', $data);
    $this->load->view('admin/includes/footer.php');
  }

  public function add_category(){
    $data = array(
      'name' => $this->input->post('category')
    );
    //Transfering data to Model
    $this->Admin_model->add_category($data);
    $this->category();
    
  }

  public function patients()
	{
    $data['patients'] = $this->Admin_model->get_patients();
    $this->load->view('admin/includes/header.php');
    $this->load->view('admin/patients', $data);
    $this->load->view('admin/includes/footer.php');
  }

  public function appointments()
	{
    $this->load->view('template/header.php', array('title'=> 'admin panel'));
    $this->load->view('admin/appointments');
    $this->load->view('template/footer.php');
  }

  public function feedbacks()
	{
    $this->load->view('template/header.php', array('title'=> 'admin panel'));
    $this->load->view('admin/feedbacks');
    $this->load->view('template/footer.php');
  }

  //login view
  public function login(){
    $this->load->view('template/header.php');
    $this->load->view('admin/login');
    $this->load->view('template/footer.php');
  }

  // Loggin method
  public function admin_login(){
    $check = $this->Admin_model->login($this->input->post('userID'), $this->input->post('password'));
    if($check != ''){
      $doctor = array(
        'type' => 'admin',
        'userID' => $check->userID,
        'username' => $check->user_name,
        'admin_loggedIn' => true
      );
      $this->session->set_userdata($doctor);
      redirect(base_url('admin'));
    } else {
      redirect(base_url('admin/login'));
    }
  }

  public function logout(){
    $this->session->unset_userdata(array('type', 'userID', 'username', 'admin_loggedIn'));
    $this->session->set_flashdata('loggedOutMsg', 'You are now logged out');
    redirect(base_url());
  }

}
