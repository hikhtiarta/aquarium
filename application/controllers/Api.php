<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {	
    
    public function post_likes(){
        $this->load->model('Post_model');
        $post = $this->input->post('post');
        $data = $this->Post_model->getPostById($post);             
        $currentLikes = $data[0]['likes'] + 1;        
        $data = array(
            "likes" => $currentLikes
        );
        $res = "";
        if($this->Post_model->setLikes($post, $data)){
            $res = array("result" => 1, "msg" => "success");
            echo json_encode($res);
        }else{
            $res = array("result" => 1, "msg" => "gagal");
            echo json_encode($res);
        }
    }

    public function post_share(){
        $this->load->model('Post_model');
        $post = $this->input->post('post');
        $data = $this->Post_model->getPostById($post);             
        $currentShare= $data[0]['share'] + 1;        
        $data = array(
            "share" => $currentShare
        );
        $res = "";
        if($this->Post_model->setShare($post, $data)){
            $res = array("result" => 1, "msg" => "success");
            echo json_encode($res);
        }else{
            $res = array("result" => 1, "msg" => "gagal");
            echo json_encode($res);
        }
    }

}
