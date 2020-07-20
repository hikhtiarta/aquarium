<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

public function __construct() {
	 parent::__construct();
	 $this->load->helper('url');
}

public function main() {
	$data = array(
		'title' => "Main Page"
	);
	$this->load->view('pages/main',$data);
	}


}