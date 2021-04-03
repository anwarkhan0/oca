<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Main_model');
    }


	public function index()
	{
        $data['docs'] = $this->Main_model->get_docs(3);
        $data['categories'] = $this->Main_model->get_category();
        $this->load->view('template/header.php');
        $this->load->view('homepage.php', $data);
		$this->load->view('template/footer.php');
    }
    
    public function about(){
        $this->load->view('template/header.php');
        $this->load->view('about.php');
		$this->load->view('template/footer.php');
    }

    public function contact_us(){
        $this->load->view('template/header.php');
        $this->load->view('contact_us.php');
        $this->load->view('template/footer.php');
    }

    public function doc_login(){
        $this->load->view('template/header.php');
        $this->load->view('doctors/login.php');
        $this->load->view('template/footer.php');
    }

    public function doc_register(){
        $this->load->model('Admin_model');
        $data['categories'] = $this->Admin_model->get_category();
        $data['districts'] = $this->Main_model->get_districts();
        $this->load->view('template/header.php');
        $this->load->view('doctors/register.php', $data);
        $this->load->view('template/footer.php');
    }

    public function p_register(){
        $this->load->view('template/header.php');
        $this->load->view('users/register.php');
        $this->load->view('template/footer.php');
    }

    public function p_login(){
        $this->load->view('template/header.php');
        $this->load->view('users/login.php');
        $this->load->view('template/footer.php');
    }
}
