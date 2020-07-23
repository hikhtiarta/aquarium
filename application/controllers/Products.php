<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {	
    
    public function __construct(){
		parent::__construct();
		$this->load->library('session');
        $this->load->model('Util_model');
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $qr = $this->User_model->getContact();
        $this->address = $qr[0]['address'];
        $this->phone = $qr[0]['phone'];
        $this->email = $qr[0]['email'];
    }

    public function index(){
        $data = array(
            'title' => "Product Page",            
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'productList' => $this->Product_model->getProductLatestPage(12),
            'categoryList' => $this->Util_model->getCategory()
        );
        $view = $this->input->get('view');
        $page = $this->input->get('page');
        if($view != null && $view == 'all'){
            $data['productList'] = $this->Product_model->getProductLatestPage(20 * (int)$page);
            $this->load->view('pages/product-all',$data);   
        }else{
            $this->load->view('pages/product',$data);   
        }        
    }

    public function product_lookup_by_url(){
        var_dump($this->Product_model->getUrl($this->uri->segment(2)));
    }

}
