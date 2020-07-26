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
            'title' => ["Produk"],
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'productList' => $this->Product_model->getProductLatestPage(12),
            'categoryList' => $this->Util_model->getCategory()
        );        
        $this->load->view('pages/product',$data);
    }

    public function all(){
        $data = array(
            'title' => ["Produk"],
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,            
        ); 
        $page = $this->uri->segment(3);
        array_push($data['title'], "Semua Produk");
        $data['productList'] = $this->Product_model->getProductLatestPage(15 * (int)$page);
        $this->load->view('pages/product-all',$data);   
    }

    public function category(){
        $data = array(
            'title' => ["Produk"],
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,   
            'category' => $this->uri->segment(3),
        ); 
        $nameCategory = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        array_push($data['title'], 'Kategori');
        array_push($data['title'], $nameCategory);
        $data['productList'] = $this->Product_model->getProductByCategory(15 * (int)$page, $nameCategory);
        $this->load->view('pages/product-all',$data);   
    }

    public function product_lookup_by_url(){
        $this->load->helper('Currency_helper');
        $data = array(
            'title' => ["Produk"],
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,   
            'product' => $this->Product_model->getUrl($this->uri->segment(2))[0]
        );                 
        $this->load->view('pages/product-detail',$data);        
    }

}
