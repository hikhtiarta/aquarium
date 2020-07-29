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
        $archive = [];
        for($i=2024; $i>=2019; $i--){
            array_push($archive, 
                array(
                    "year" => $i,
                    "count" => count($this->Post_model->getPostYear($i))
                )
            );
            
        }
        $this->archive = $archive;
    }

    public function index(){
      redirect(base_url('post/all/1'));
    }

    public function all(){
      $data = array(
          'title' => "Post",
          'phone' => $this->phone,
          'address' => $this->address,
          'email' => $this->email,  
          'archive'  => $this->archive,
          'breadCrumbs' => [
            array(
                "title" => "Semua Postingan",                
            )
        ],       
      ); 
      $page = 0;
      // var_dump($this->uri); die;
      if((int)$this->uri->segment(3) == 0){
          redirect('post/all/1');
      }else{
          $page = (int)$this->uri->segment(3);
      }                
      $data['postList'] = $this->Post_model->getPostByPage(10 * (int)$page, '');
      $this->load->view('pages/post',$data);         
    }

    public function year(){
        $data = array(
            'title' => "Post",
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,   
            'archive'  => $this->archive,
            'year' => $this->uri->segment(3),
            'breadCrumbs' => [
                array(
                    "title" => "Semua Postingan",                
                    "url" => 'post/',
                ),
                array(
                    "title" => "Tahun " . $this->uri->segment(3),
                    "url" => $this->uri->segment(3),
                )
          ],       
        ); 
        $page = 0;
        // var_dump($this->uri); die;
        if((int)$this->uri->segment(4) == 0){
            redirect('post/year/2020/1');
        }else{
            $page = (int)$this->uri->segment(4);
        }                
        $data['postList'] = $this->Post_model->getPostByPage(10 * (int)$page, $this->uri->segment(3));
        $this->load->view('pages/post',$data);         
    }
    
    public function post_lookup_by_url(){    
        if($this->uri->segment(2) == 'all'){
            redirect('post/');
        }
        $this->load->helper('Currency_helper');
        $post = $this->Post_model->getUrl($this->uri->segment(2));
        $post = (count($post) == 0 ? $post : $post[0]);
        $data = array(
            'title' => "Post",
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,   
            'archive'  => $this->archive,
            'post' => $post,
            'latestPost' => $this->Post_model->getPostLatestPage(6),
            'breadCrumbs' => [
                array(
                    "title" => "Postingan",                    
                )
            ],       
        );                         
        $this->load->view('pages/post-detail',$data);    
    
    }

}
