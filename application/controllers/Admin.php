<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
			// Your own constructor code
		
	}

	public function index() {
		if($this->session->userdata('is_login') != 1) redirect('admin/login');
		else redirect('admin/dashboard');
		
	}
	
	public function login() {
		if($this->session->userdata('is_login') != 1) redirect('admin/login');
		else redirect('admin/dashboard');

		$data = array(
			'title' => "Login"
		);
		$this->load->view('admin/login', $data);
	}

	public function dashboard() {
		$this->load->model('Post_model');
		$data = array(
			'title' => "Dashboard",
			'postList' => count($this->Post_model->getPost()),
		);
		$this->load->view('admin/dashboard', $data);
	}

	public function utilities_jenis() {
		$this->load->model('Util_model');
		$data = array(
			'title' => "Jenis Postingan",
			'categoryList' => $this->Util_model->getCategory(),
		);
		$this->load->view('admin/utilities_jenis', $data);
	}

	public function post_create() {
		$this->load->model('Util_model');
		$data = array(
			'title' => "Buat Postingan",
			'categoryList' => $this->Util_model->getCategory(),
		);
		$this->load->view('admin/post_create', $data);
	}

	public function do_jenis_set() {
		$this->load->model('Util_model');
		$this->Util_model->setCategory($_POST['name']);
		redirect('admin/utilities_jenis');
				
	}

	public function do_jenis_del() {
		$this->load->model('Util_model');
		$this->Util_model->deleteCategory($_POST['namedel']);
		redirect('admin/utilities_jenis');
				
	}
	
	public function do_login(){		
		$this->load->model('Auth_model');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');        
		$auth = $this->Auth_model->loginAuth($username, $pass);
		switch($auth){
			case 1:
				redirect(site_url('admin/dashboard'));
			break;
			case 0 :
                redirect(site_url('admin/login'));
            break;
		}			
	}

	public function _logout(){
		$this->session->sess_destroy();
        redirect(site_url());
	}
    
}
