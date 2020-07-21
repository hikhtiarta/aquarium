<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {	
    
    public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Post_model');
    }
    
    public function post_lookup_by_url(){
        var_dump($this->Post_model->getUrl($this->uri->segment(2)));
    }

}
