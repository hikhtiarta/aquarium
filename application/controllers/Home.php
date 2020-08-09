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
        $this->csemail = $qr[0]['email'];
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
            'email' => $this->csemail,
        );
        $this->load->view('pages/home',$data);        
    }

    public function send(){

        $this->load->model('User_model');
        $user = $this->User_model->getEmailAndPassword()[0];

        $name = $this->input->post('name');
        $emailUser = $this->input->post('email');
        $msg = $this->input->post('message');

        $officeEmail = $user['email'];
        $officePassword = $user['emailPassword'];

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $officeEmail, // change it to yours
            'smtp_pass' => $officePassword, // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );
            
        $this->load->library('email');		

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($officeEmail);
        $this->email->to($officeEmail);		

        $this->email->subject('Contact Us');
        $this->email->message('From : ' . $emailUser . '<br><br>' . 'Nama :' . $name . '<br><br>' . 'Pesan : <br><br>' . $msg);

        if($this->email->send()){
            $data = array(
                "name" => $name,
                "email" => $emailUser,
                "message" => $msg
            );
            $this->load->model('Contact_model');            
            if($this->Contact_model->createContactUs($data)){
                $this->session->set_flashdata("success", "Berhasil dikirim!");
			    redirect('/');
            }else{
                $this->session->set_flashdata("error", "Gagal dikirim!");
			    redirect('/');    
            }         
        }else{
            $this->session->set_flashdata("error", "Gagal dikirim!");
			redirect('/');
        }                     
    }

}
