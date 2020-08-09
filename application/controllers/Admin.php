<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('UrlTitle_helper');
		date_default_timezone_set("Asia/Jakarta");
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
		$this->load->model('Util_model');
		$date = new DateTime();
		$date = $date->format('d - m - Y');
		$data = array(
			'title' => "Dashboard",
			'postList' => count($this->Post_model->getPost()),
			'productList' => count($this->Product_model->getProduct()),
			'categoryList' => count($this->Util_model->getCategory()),
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
	
	public function utilities_contactus() {
		$this->load->model('Contact_model');
		$data = array(
			'title' => "Daftar Pesan",
			'contactUsList' => $this->Contact_model->getContactUs(),
		);
		$this->load->view('admin/utilities_contactus', $data);
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
		$this->load->helper('Image_helper');

		if($_FILES['img']['name'] != null){
			$target_dir = "img/category/";
			$image = image_conv($_FILES['img']);									
			$check = getimagesize($_FILES["img"]["tmp_name"]);
			if($check !== false) {	
				move_uploaded_file($_FILES["img"]["tmp_name"], ($target_dir . $image['name']));
				$data = array(
					'name' => ucwords($_POST['name']),					
					'img' => $image['name'],
				);
				if($this->Util_model->setCategory($data)){
					$this->session->set_flashdata("success", "Kategori berhasil ditambahkan!");
					redirect(site_url('admin/utilities_category'));
				}
			} else {
				$this->session->set_flashdata("error", "Hanya gambar yang dapat diupload!");
				redirect(site_url('admin/utilities_category'));
			}
		}	

		// $this->Util_model->setCategory(ucwords($_POST['name']));
		// redirect('admin/utilities_category');				
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
		$this->load->helper('Image_helper');
		$content = $this->input->post('content');
		$title = $this->input->post('title');	
		$url = create_url($title);		
		$date = new DateTime();		
		if(count($this->Post_model->getUrl($url)) == 0){			
			if($_FILES["thumbnail"]['name'][0]!=null){				
				$image = image_conv_multiple($_FILES['thumbnail']);					
				if(!$image) {
					$this->session->set_flashdata("error", "Hanya gambar yang dapat diupload!");
					redirect(site_url('admin/post_list'));	
					die;
				}

				$pathImage = date('Y') . "/" . date('m') . "/" . date('d') . "/";
				$target_dir = "img/post/". $pathImage;
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0755, true);
				}

				for($i = 0; $i<count($image['name']); $i++){					
					move_uploaded_file($image['localImg'][$i], ($target_dir . $image['name'][$i]));	
					$image['name'][$i] = $pathImage . $image['name'][$i];
				}
				$data = array(
					'title' => $title,					
					'content' => $content,
					'thumbnail' => json_encode($image['name']),
					'url' => $url,

				);
				if($this->Post_model->createPost($data)){
					$this->session->set_flashdata("success", "Post berhasil ditambahkan!");
					redirect(site_url('admin/post_list'));
				}
			}else{
				$data = array(
					'title' => $title,				
					'content' => $content,
					'thumbnail' => null,
					'url' => $url,
				);
				if($this->Post_model->createPost($data)){
					$this->session->set_flashdata("success", "Post berhasil ditambahkan!");
					redirect(site_url('admin/post_list'));
				}
			}
		}else{
			$this->session->set_flashdata("error", "Postingan telah ada/sama, silahkan ganti judul postingan!");
			redirect(site_url('admin/post_list'));
		}																		
	}

	public function do_update_post(){		
		$this->load->model('Post_model');
		$this->load->helper('Image_helper');
		$content = $this->input->post('content');
		$title = $this->input->post('title');		
		$id = $this->input->post('post');		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s') . "\n";
		$url = create_url($title);
		$status = 1;
		if(count($this->Post_model->getUrlUpdate($url, $id)) == 1){
			$status = 1;
		}else{
			if(count($this->Post_model->getUrl($url)) == 0){
				$status = 1;
			}else{
				$status = 0;
			}
		}
		if($status == 1){
			if($_FILES["thumbnail"]['name'][0]!=null){
				$image = image_conv_multiple($_FILES['thumbnail']);					
				if(!$image) {
					$this->session->set_flashdata("error", "Hanya gambar yang dapat diupload!");
					redirect(site_url('admin/post_list'));	
					die;
				}

				$pathImage = date('Y') . "/" . date('m') . "/" . date('d') . "/";
				$target_dir = "img/post/". $pathImage;

				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0755, true);
				}

				for($i = 0; $i<count($image['name']); $i++){					
					move_uploaded_file($image['localImg'][$i], ($target_dir . $image['name'][$i]));		
					$image['name'][$i] = $pathImage . $image['name'][$i];		
				}

				$data = array(
					'title' => $title,					
					'content' => $content,
					'updated_date' => $date,
					'thumbnail' => json_encode($image['name']),
					'url' => $url,

				);
				if($this->Post_model->updatePost($id, $data)){
					$this->session->set_flashdata("success", "Post berhasil disimpan!");
					redirect(site_url('admin/post_list'));
				}														
			}else{
				$data = array(
					'title' => $title,				
					'content' => $content,				
					'updated_date' => $date,
					'url' => $url
				);
				if($this->Post_model->updatePost($id, $data)){
					$this->session->set_flashdata("success", "Post berhasil disimpan!");
					redirect(site_url('admin/post_list'));
				}
			}
		}else{
			$this->session->set_flashdata("error", "Postingan telah ada/sama, silahkan ganti judul postingan!");
			redirect(site_url('admin/post_list'));
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
		$emailPassword = $this->input->post('emailPassword');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$bio = $this->input->post('bio');		
		$data = array(
			'name' => $name,
			'toko_name' => $tokoName,
			'email' => $email,
			'email_password' => $emailPassword,
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
		$this->load->helper('Image_helper')		;
		$url = $this->input->post('url');					
		
		if($_FILES['banner']['name'] != null){
			$target_dir = "img/banner/";
			$image = image_conv($_FILES['banner']);									
			$check = getimagesize($_FILES["banner"]["tmp_name"]);
			if($check !== false) {	
				move_uploaded_file($_FILES["banner"]["tmp_name"], ($target_dir . $image['name']));
				$data = array(
					'url' => $url,					
					'img' => $image['name'],
				);
				if($this->Banner_model->createBanner($data)){
					$this->session->set_flashdata("success", "Banner berhasil ditambahkan!");
					redirect(site_url('admin/page_home'));
				}
			} else {
				$this->session->set_flashdata("error", "Postingan telah ada/sama, silahkan ganti judul postingan!");
				redirect(site_url('admin/page_home'));
			}
		}														
	}

	public function do_delete_banner(){
		$this->load->model('Banner_model');
		$banner = $this->input->post('bannerdel');
		$data = array('id' => $banner);
		if($this->Banner_model->deleteBanner($data)){			
			redirect(site_url('admin/page_home'));
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
		$url = create_url($name);
		if(count($this->Product_model->getUrl($url)) == 0){			
			if($_FILES["img"]['name'][0]!=null){

				$image = image_conv_multiple($_FILES['img']);					
				if(!$image) {
					$this->session->set_flashdata("error", "Hanya gambar yang dapat diupload!");
					redirect(site_url('admin/product_list'));	
					die;
				}

				$pathImage = date('Y') . "/" . date('m') . "/" . date('d') . "/";
				$target_dir = "img/product/". $pathImage;
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0755, true);
				}

				for($i = 0; $i<count($image['name']); $i++){					
					move_uploaded_file($image['localImg'][$i], ($target_dir . $image['name'][$i]));			
					$image['name'][$i] = $pathImage . $image['name'][$i];	
				}
				$data = array(
					'name' => $name,					
					'description' => $description,
					'price' => $price,
					'category' => json_encode($category),
					'img' => json_encode($image['name']),
					'url' => $url,
				);
				if($this->Product_model->createProduct($data)){
					$this->session->set_flashdata("success", "Produk berhasil ditambahkan!");
					redirect(site_url('admin/product_list'));
				}				
			}else{
				$data = array(
					'name' => $name,
					'url' => $url,				
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
		}else{
			$this->session->set_flashdata("error", "Produk telah ada/sama, silahkan ganti nama produk!");
			redirect(site_url('admin/product_list'));
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
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s') . "\n";
		$url = create_url($name);
		$status = 1;
		if(count($this->Product_model->getUrlUpdate($url, $id)) == 1){
			$status = 1;
		}else{
			if(count($this->Product_model->getUrl($url)) == 0){
				$status = 1;
			}else{
				$status = 0;
			}
		}
		if($status == 1){
			if($_FILES["img"]['name'][0]!=null){
				$image = image_conv_multiple($_FILES['img']);					
				if(!$image) {
					$this->session->set_flashdata("error", "Hanya gambar yang dapat diupload!");
					redirect(site_url('admin/product_list'));	
					die;
				}

				$pathImage = date('Y') . "/" . date('m') . "/" . date('d') . "/";
				$target_dir = "img/product/". $pathImage;
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0755, true);
				}

				for($i = 0; $i<count($image['name']); $i++){					
					move_uploaded_file($image['localImg'][$i], ($target_dir . $image['name'][$i]));
					$image['name'][$i] = $pathImage . $image['name'][$i];				
				}
				$data = array(
					'name' => $name,					
					'description' => $description,
					'price' => $price,
					'category' => json_encode($category),
					'img' => json_encode($image['name']),
					'url' => $url,
					'updated_date' => $date,
				);						
				if($this->Product_model->updateProduct($id, $data)){
					$this->session->set_flashdata("success", "Produk berhasil disimpan!");
					redirect(site_url('admin/product_list'));
				}					
			}else{
				$data = array(
					'name' => $name,					
					'description' => $description,
					'price' => $price,				
					'updated_date' => $date,
					'category' => json_encode($category),
					'url' => $url
				);
				if($this->Product_model->updateProduct($id, $data)){
					$this->session->set_flashdata("success", "Produk berhasil disimpan!");
					redirect(site_url('admin/product_list'));
				}
			}
		}else{
			$this->session->set_flashdata("error", "Produk telah ada/sama, silahkan ganti nama produk!");
			redirect(site_url('admin/product_list'));
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
