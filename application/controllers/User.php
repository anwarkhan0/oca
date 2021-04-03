<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('User_model');
  }

	public function dashboard()
	{
    if ($this->session->userdata('p_loggedIn') == true) {
    $data['record'] = $this->User_model->p_record($this->session->email);
    $this->load->view('template/header.php');
    $this->load->view('users/dashboard.php', $data);
    $this->load->view('template/footer.php');
    }else{
      redirect(base_url('login'));
    }
  }

  public function account_details()
	{
    $data['record'] = $this->User_model->p_record($this->session->email);
    $this->load->view('template/header.php');
    $this->load->view('users/account_details.php', $data);
    $this->load->view('template/footer.php');
  }

  public function appointments()
	{
    $data['appointments'] = $this->User_model->get_appointments();
    $this->load->view('template/header.php');
    $this->load->view('users/appointments.php',$data);
    $this->load->view('template/footer.php');
  }

  public function change_password()
	{
    $this->load->view('template/header.php');
    $this->load->view('users/change_password.php');
    $this->load->view('template/footer.php');
  }

  

   ///////////////// User registiration controller ///////////////////////////////////
   public function register(){

    /////////////////// image upload script//////////////////////
    // $config['upload_path']          = './assets/photo';
    // $config['allowed_types']        = 'gif|jpg|png|jpeg';
    // $config['max_size']             = 100;
    // $this->load->library('upload', $config);
    // $this->upload->initialize($config);
    
    // $pic = '';

    // if ( ! $this->upload->do_upload('userfile'))
    // {
    //   $error = array('error' => $this->upload->display_errors());
    //   print_r($error);
    //   $pic = 'no_image.png';
    // }
    // else
    // {
    //   $pic = $this->upload->data('file_name');
    // }
    ///////////////////// Form Data ////////////////
    $data = array(
      'name' => $this->input->post('name'),
      'district' => $this->input->post('district'),
      'state' => $this->input->post('state'),
      'contact' => $this->input->post('contact'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('pass')
    );

    $this->User_model->add_patient($data);
    echo '<script>alert("Recored added successfully");</script>';
    $patient = array(
      'type' => 'patient',
      'name' => $data['name'],
      'email' => $data['email'],
      'pass' => $data['password'],
      'p_loggedIn' => true
    );
    $this->session->set_userdata($patient);
    $this->dashboard();
  }
  
// upation of profile
  public function update_profile(){

    /////////////////// image upload script//////////////////////
    // $config['upload_path']          = './assets/photo';
    // $config['allowed_types']        = 'gif|jpg|png|jpeg';
    // $config['max_size']             = 100;
    // $this->load->library('upload', $config);
    // $this->upload->initialize($config);

    // if ( ! $this->upload->do_upload('userfile'))
    // {
    //   $error = array('error' => $this->upload->display_errors());
    //   $pic = $this->input->post('picture');
    // }
    // else
    // {
    //   $pic = $this->upload->data('file_name');
    // }
    ///////////////////// Form Data ////////////////
    $data = array(
      'name' => $this->input->post('name'),
      'district' => $this->input->post('district'),
      'state' => $this->input->post('state'),
      'contact' => $this->input->post('contact'),
      'email' => $this->input->post('email')
    );
    $this->User_model->update_profile($data, $this->input->post('id'));
    echo '<script>alert("Recored updated successfully");</script>';
    $this->dashboard();
  }



  // Loggin method
  public function login(){
    $check = $this->User_model->login($this->input->post('email'), $this->input->post('password'));
    if($check != ''){
      $doctor = array(
        'type' => 'patient',
        'p_id' => $check->id,
        'email' => $check->email,
        'name' => $check->name,
        'district' => $check->district,
        'contact' => $check->contact,
        'p_loggedIn' => true
      );
      $this->session->set_userdata($doctor);
      redirect(base_url());
    } else {
      redirect(base_url('login'));
    }
  }

  public function logout(){
    $this->session->unset_userdata(array('type', 'p_id', 'email', 'name', 'district', 'contact', 'p_loggedIn'));
    redirect(base_url());
  }
}
