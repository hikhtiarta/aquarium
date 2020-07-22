<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {	
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Post_model');
        $this->load->model('User_model');
        $qr = $this->User_model->getContact();
        $this->address = $qr[0]['address'];
        $this->phone = $qr[0]['phone'];
        $this->email = $qr[0]['email'];
    }

    public function index(){
      $data = array(
          'title' => "Post Page",            
          'phone' => $this->phone,
          'address' => $this->address,
          'email' => $this->email,
      );
      $this->load->view('pages/post',$data);   
    }
    
    public function post_lookup_by_url(){
        var_dump($this->Post_model->getUrl($this->uri->segment(2)));
    }

}
