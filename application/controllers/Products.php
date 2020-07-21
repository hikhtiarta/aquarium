<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {	
    
    public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Product_model');
    }

    public function index(){
        echo 'Product';
    }

    public function product_lookup_by_url(){
        var_dump($this->Product_model->getUrl($this->uri->segment(2)));
    }

}
