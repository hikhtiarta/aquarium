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
            'title' => "Produk",
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'productList' => $this->Product_model->getProductLatestPage(12),
            'categoryList' => $this->Util_model->getCategory(),
            'breadCrumbs' => [
                array(
                    "title" => "Produk",
                    "url" => "products/"
                )
            ],
        );        
        $this->load->view('pages/product',$data);
    }

    public function all(){
        $data = array(
            'title' => "Produk",
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'breadCrumbs' => [
                array(
                    "title" => "Produk",
                    "url" => "products/"
                ),
                array(
                    "title" => "Semua Produk",
                    "url" => "products/all/1"
                ),
            ],
        ); 
        $page = 0;
        if((int)$this->uri->segment(3) == 0){
            redirect('products/');
        }else{
            $page = (int)$this->uri->segment(3);
        }                
        $data['productList'] = $this->Product_model->getProductByCategory(15 * (int)$page, '');
        $this->load->view('pages/product-all',$data);   
    }

    public function category(){
        $nameCategory = urldecode($this->uri->segment(3));
        $data = array(
            'title' => "Produk",
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,   
            'category' => $this->uri->segment(3),            
            'breadCrumbs' => [
                array(
                    "title" => "Produk",
                    "url" => "products/"
                ),
                array(
                    "title" => "Kategori",
                    "url" => "products/"
                ),
                array(
                    "title" => $nameCategory,
                    "url" => "products/category/" . $nameCategory . "/1"
                ),
            ],
        );         
        $page = 0;
        if((int)$this->uri->segment(4) == 0){
            redirect('products/');
        }else{
            $page = (int)$this->uri->segment(4);
        }                
        $data['productList'] = $this->Product_model->getProductByCategory(15 * (int)$page, $nameCategory);
        $this->load->view('pages/product-all',$data);   
    }

    public function product_lookup_by_url(){        
        if($this->uri->segment(2) == 'category' || $this->uri->segment(2) == 'all'){
            redirect('products/');
        }
        $this->load->helper('Currency_helper');
        $product = $this->Product_model->getUrl($this->uri->segment(2));
        $product = (count($product) == 0 ? $product : $product[0]);
        $data = array(
            'title' => "Produk",
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,   
            'product' => $product,
            'breadCrumbs' => [
                array(
                    "title" => "Produk",
                    "url" => "products/"
                )
            ],       
        );                         
        $this->load->view('pages/product-detail',$data);        
    }

}
