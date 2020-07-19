<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('is_login') == null || $this->session->userdata('is_login') != 1) {
			// Prevent infinite loop by checking that this isn't the login controller               
			if ($this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'do_login') {
				redirect(base_url('admin/login'));
			}
		}else{
			if ($this->uri->segment(2) == 'login') {                        
				redirect(base_url('admin/dashboard'));
			}
		}  		
	}

	public function index() {
		redirect('admin/dashboard');				
	}
	
	public function login() {				
		$data = array(
			'title' => "Login"
		);
		$this->load->view('admin/login', $data);
	}

	public function dashboard() {
		$this->load->model('Post_model');
		$date = new DateTime();
		$date = $date->format('d - m - Y');
		$data = array(
			'title' => "Dashboard",
			'postList' => count($this->Post_model->getPost()),
			'date' => $date,
			'postinganList' => $this->Post_model->getPostByLikes()
		);
		$this->load->view('admin/dashboard', $data);
	}

	public function page_about() {
		$this->load->model('User_model');
		$qr = $this->User_model->getuser()[0];
		$data = array(
			'title' => "About",			
			'user' => $qr
		);
		$this->load->view('admin/page_about', $data);
	}

	public function page_home() {	
		$this->load->model('Banner_model');			
		$data = array(
			'title' => "Home",
			'bannerList' => $this->Banner_model->getBanner(),
		);
		$this->load->view('admin/page_home', $data);
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
			'dataPost' => null
		);
		if($this->input->get('edit') == 'true'){
			$this->load->model('Post_model');
			$dataPost = $this->Post_model->getPostById($this->input->get('post'))[0];			
			$data = array(
				'title' => "Buat Postingan",
				'categoryList' => $this->Util_model->getCategory(),
				'dataPost' => $dataPost
			);				
		}		
		$this->load->view('admin/post_create', $data);
	}

	public function post_list() {
		$this->load->model('Post_model');
		$data = array(
			'title' => "Daftar Postingan",
			'postList' => $this->Post_model->getPost(),
		);
		$this->load->view('admin/post_list', $data);
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

	public function do_create_post(){		
		$this->load->model('Post_model');
		$content = $this->input->post('content');
		$title = $this->input->post('title');
		$category = $this->input->post('category');
		$lastId = $this->Post_model->getPost();	
		if(count($lastId) != 0)	$lastId = $lastId[count($lastId)-1]['id'] + 1;
		else $lastId = 1;			
		
		if($_FILES["thumbnail"]['name']!=null){
			$target_dir = "assets/img/uploads/";
			$fileName = $lastId . "_" . basename($_FILES["thumbnail"]["name"]);
			$target_file = $target_dir . $fileName;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));		
			$check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
			if($check !== false) {	
				move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
				$data = array(
					'title' => $title,
					'category' => $category,
					'content' => $content,
					'thumbnail' => $fileName,
				);
				if($this->Post_model->createPost($data)){
					redirect(site_url('admin/post_list'));
				}
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}else{
			$data = array(
				'title' => $title,
				'category' => $category,
				'content' => $content,
				'thumbnail' => null,
			);
			if($this->Post_model->createPost($data)){
				redirect(site_url('admin/post_list'));
			}
		}																
	}

	public function do_update_post(){		
		$this->load->model('Post_model');
		$content = $this->input->post('content');
		$title = $this->input->post('title');
		$category = $this->input->post('category');
		$id = $this->input->post('post');
		date_default_timezone_set("Asia/Jakarta");
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s') . "\n";
		if($_FILES["thumbnail"]['name']!=null){
			$target_dir = "assets/img/uploads/";
			$fileName = $id . "_" . basename($_FILES["thumbnail"]["name"]);
			$target_file = $target_dir . $fileName;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));		
			$check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
			
			if($check !== false) {	
				move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);				
				$data = array(
					'title' => $title,
					'category' => $category,
					'content' => $content,
					'thumbnail' => $fileName,
					'updated_date' => $date
				);
				if($this->Post_model->updatePost($id, $data)){
					redirect(site_url('admin/dashboard'));
				}
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}else{
			$data = array(
				'title' => $title,
				'category' => $category,
				'content' => $content,				
				'updated_date' => $date
			);
			if($this->Post_model->updatePost($id, $data)){
				redirect(site_url('admin/dashboard'));
			}
		}																
	}

	public function do_delete_post(){
		$this->load->model('Post_model');
		$post = $this->input->get('post');
		$data = array('id' => $post);
		if($this->Post_model->deletePost($data)){
			redirect(site_url('admin/post_list'));
		}
	}

	public function do_get_all_post(){
		$this->load->model('Post_model');
		$res = array('result' => 1, 'data' => $this->Post_model->getPost());
		echo json_encode($res);
	}

	public function do_set_user(){
		$this->load->model('User_model');
		$name = $this->input->post('name');
		$tokoName = $this->input->post('toko_name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$bio = $this->input->post('bio');		
		$data = array(
			'name' => $name,
			'toko_name' => $tokoName,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
			'bio' => $bio
		);
		if($this->User_model->updateUser(1, $data)){
			redirect('admin/dashboard');
		}
	}	

	public function do_create_banner(){			
		$this->load->model('Banner_model');		
		$url = $this->input->post('url');	
		$lastId = $this->Banner_model->getBanner();	
		if(count($lastId) != 0)	$lastId = $lastId[count($lastId)-1]['id'] + 1;
		else $lastId = 1;			
		
		if($_FILES['banner']['name'] != null){
			$target_dir = "assets/img/banner/";
			$fileName = $lastId . "_" . basename($_FILES["banner"]["name"]);
			$target_file = $target_dir . $fileName;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));		
			$check = getimagesize($_FILES["banner"]["tmp_name"]);
			if($check !== false) {	
				move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file);
				$data = array(
					'url' => $url,					
					'img' => $fileName,
				);
				if($this->Banner_model->createBanner($data)){
					redirect(site_url('admin/dashboard'));
				}
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}														
	}

	public function do_logout(){
		$this->session->sess_destroy();
        redirect(site_url());
	}
    
}
