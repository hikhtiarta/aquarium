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
		$this->load->model('Product_model');
		$date = new DateTime();
		$date = $date->format('d - m - Y');
		$data = array(
			'title' => "Dashboard",
			'postList' => count($this->Post_model->getPost()),
			'productList' => count($this->Product_model->getProduct()),
			'date' => $date,
			'postListLikes' => $this->Post_model->getPostByLikes(),
			'productListLikes' => $this->Product_model->getProductByLikes()
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

	public function utilities_category() {
		$this->load->model('Util_model');
		$data = array(
			'title' => "Kategori Produk",
			'categoryList' => $this->Util_model->getCategory(),
		);
		$this->load->view('admin/utilities_category', $data);
	}

	public function post_create() {			
		$data = array(
			'title' => "Buat Postingan",			
			'dataPost' => null
		);
		if($this->input->get('edit') == 'true'){
			$this->load->model('Post_model');
			$dataPost = $this->Post_model->getPostById($this->input->get('post'))[0];			
			$data = array(
				'title' => "Edit Postingan",				
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

	public function product_create() {	
		$this->load->model('Util_model');
		$categoryList = $this->Util_model->getCategory();
		$data = array(
			'title' => "Buat Produk",			
			'dataProduct' => null,
			'categoryList' => $categoryList
		);
		if($this->input->get('edit') == 'true'){
			$this->load->model('Product_model');
			$dataProduct = $this->Product_model->getProductById($this->input->get('product'))[0];			
			$data = array(
				'title' => "Edit Produk",				
				'dataProduct' => $dataProduct,
				'categoryList' => $categoryList
			);				
		}		
		$this->load->view('admin/product_create', $data);
	}

	public function product_list() {
		$this->load->model('Product_model');
		$data = array(
			'title' => "Daftar Produk",
			'productList' => $this->Product_model->getProduct(),
		);
		$this->load->view('admin/product_list', $data);
	}

	public function change_password() {		
		$data = array(
			'title' => "Ganti Password",			
		);
		$this->load->view('admin/change_password', $data);
	}

	public function do_change_password(){
		$data = array(
			'title' => "Ganti Password",			
		);
		$newps = $this->input->post('newps');
		$confps = $this->input->post('confps');
		if($newps != $confps){
			$this->session->set_flashdata("error", "Password tidak sama");
			redirect('admin/change_password');
		}else{
			$this->load->model('Auth_model');
			if($this->Auth_model->changePassword($confps)){				
				$this->session->set_flashdata("success", "Password berhasil diganti, Silahkan login kembali!");
				redirect('admin/change_password');
			}			
		}
	}

	public function do_category_add() {
		$this->load->model('Util_model');
		$this->Util_model->setCategory($_POST['name']);
		redirect('admin/utilities_category');
				
	}

	public function do_category_del() {
		$this->load->model('Util_model');
		$this->Util_model->deleteCategory($_POST['namedel']);
		redirect('admin/utilities_category');
				
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
					'content' => $content,
					'thumbnail' => $fileName,
				);
				if($this->Post_model->createPost($data)){
					$this->session->set_flashdata("success", "Post berhasil ditambahkan!");
					redirect(site_url('admin/post_list'));
				}
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}else{
			$data = array(
				'title' => $title,				
				'content' => $content,
				'thumbnail' => null,
			);
			if($this->Post_model->createPost($data)){
				$this->session->set_flashdata("success", "Post berhasil ditambahkan!");
				redirect(site_url('admin/post_list'));
			}
		}																
	}

	public function do_update_post(){		
		$this->load->model('Post_model');
		$content = $this->input->post('content');
		$title = $this->input->post('title');		
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
					'content' => $content,
					'thumbnail' => $fileName,
					'updated_date' => $date
				);
				if($this->Post_model->updatePost($id, $data)){
					$this->session->set_flashdata("success", "Post berhasil disimpan!");
					redirect(site_url('admin/post_list'));
				}
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}else{
			$data = array(
				'title' => $title,				
				'content' => $content,				
				'updated_date' => $date
			);
			if($this->Post_model->updatePost($id, $data)){
				$this->session->set_flashdata("success", "Post berhasil disimpan!");
				redirect(site_url('admin/post_list'));
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
			$this->session->set_flashdata("success", "About berhasil disimpan!");
			redirect('admin/page_about');
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

	public function do_create_product(){		
		$this->load->model('Product_model');
		$this->load->helper('Image_helper');
		$description = $this->input->post('description');
		$name= $this->input->post('name');		
		$category = $this->input->post('category');	
		$price= $this->input->post('price');			
		
		if($_FILES["img"]['name']!=null){
			$target_dir = "assets/img/uploads/products/";
			$image = image_conv($_FILES['img']);						
			$check = getimagesize($image['localImg']);
			if($check !== false) {	
				move_uploaded_file($image['localImg'], ($target_dir . $image['name']));
				$data = array(
					'name' => $name,					
					'description' => $description,
					'price' => $price,
					'category' => json_encode($category),
					'img' => $image['name'],
				);
				if($this->Product_model->createProduct($data)){
					$this->session->set_flashdata("success", "Produk berhasil ditambahkan!");
					redirect(site_url('admin/product_list'));
				}
			} else {
				echo "File is not an image.";				
			}
		}else{
			$data = array(
				'name' => $name,					
				'description' => $description,
				'price' => $price,
				'category' => json_encode($category),
				'img' => null,
			);
			if($this->Product_model->createProduct($data)){
				$this->session->set_flashdata("success", "Produk berhasil ditambahkan!");
				redirect(site_url('admin/product_list'));
			}
		}																
	}

	public function do_update_product(){		
		$this->load->model('Product_model');
		$this->load->helper('Image_helper');
		$description = $this->input->post('description');
		$name= $this->input->post('name');		
		$price= $this->input->post('price');		
		$id = $this->input->post('product');
		$category = $this->input->post('category');	
		date_default_timezone_set("Asia/Jakarta");
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s') . "\n";
		if($_FILES["img"]['name']!=null){
			$target_dir = "assets/img/uploads/products/";			
			$image = image_conv($_FILES['img']);						
			$check = getimagesize($image['localImg']);		
			if($check !== false) {	
				move_uploaded_file($image['localImg'], ($target_dir . $image['name']));			
				$data = array(
					'name' => $name,					
					'description' => $description,
					'price' => $price,
					'img' => $image['name'],
					'updated_date' => $date,
					'category' => json_encode($category),
				);
				if($this->Product_model->updateProduct($id, $data)){
					$this->session->set_flashdata("success", "Produk berhasil disimpan!");
					redirect(site_url('admin/product_list'));
				}
			} else {
				echo "File is not an image.";				
			}
		}else{
			$data = array(
				'name' => $name,					
				'description' => $description,
				'price' => $price,				
				'updated_date' => $date,
				'category' => json_encode($category),
			);
			if($this->Product_model->updateProduct($id, $data)){
				$this->session->set_flashdata("success", "Produk berhasil disimpan!");
				redirect(site_url('admin/product_list'));
			}
		}																
	}

	public function do_delete_product(){
		$this->load->model('Product_model');
		$product = $this->input->get('product');
		$data = array('id' => $product);
		if($this->Product_model->deleteProduct($data)){			
			redirect(site_url('admin/product_list'));
		}
	}
    
}
