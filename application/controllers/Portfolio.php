<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {	
    
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
        $data = array(
            'title' => "Portofolio",            
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
        );
        $this->load->view('pages/portfolio',$data);        
    }

}
