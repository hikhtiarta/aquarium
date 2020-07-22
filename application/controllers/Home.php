<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {	
    
    public function __construct(){
		parent::__construct();
        $this->load->library('session');		
        $this->load->model('User_model');
        $qr = $this->User_model->getContact();
        $this->address = $qr[0]['address'];
        $this->phone = $qr[0]['phone'];
        $this->email = $qr[0]['email'];
    }
    
    public function index(){
        $this->load->model('Banner_model');
        $this->load->model('Product_model');
        $data = array(
            'title' => "Home Page",
            'bannerList' => $this->Banner_model->getBanner(),
            'productList' => $this->Product_model->getProductLatestPage(4),
            'productListLikes' => $this->Product_model->getProductByLikes(),
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
        );
        $this->load->view('pages/home',$data);        
    }

}
