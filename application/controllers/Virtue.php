<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Virtue extends CI_Controller {

public function home() {
	$data = array(
		'title' => "Welcome Page"
	);
	$this->load->view('virtue/home',$data);

	}
}