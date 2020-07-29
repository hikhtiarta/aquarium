<?php  
class Post_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getPost(){                        
        $qr = $this->db->query("SELECT * from post order by created_date DESC")->result_array();
        return $qr;
    }

    public function getPostByPage($pages){                                
        $query = "SELECT * from post ORDER BY created_date DESC limit ". ((int)$pages - 10) .",".$pages." ";
        $qr = $this->db->query($query)->result_array();
        return $qr;
    }

    public function getPostById($id){                        
        $where = array( 'id' => $id);
        $qr = $this->db->get_where('post', $where )->result_array();           
        return $qr;
    }
    
    public function getPostLatestPage($index){                        
        $qr = $this->db->query("SELECT * from post order by created_date desc limit ".$index." ")->result_array();
        return $qr;
    }
      
    public function getPostByLikes(){                        
        $qr = $this->db->query("SELECT * from post order by likes DESC limit 6")->result_array();
        return $qr;
    }
    
    public function createPost($data){                                
        $qr = $this->db->insert('post', $data);
        return $qr;
    } 

    public function updatePost($id ,$data){                               
        $this->db->where('id', $id);
        $qr = $this->db->update('post', $data);         
        return $qr;
    } 

    public function deletePost($data){                        
        $qr = $this->db->delete("post", $data);
        return $qr;
    } 

    public function setLikes($id, $data){                        
        $this->db->where('id', $id);
        $qr = $this->db->update('post', $data);         
        return $qr;
    } 

    public function setShare($id, $data){                        
        $this->db->where('id', $id);
        $qr = $this->db->update('post', $data);         
        return $qr;
    } 

    public function getUrl($url){
        $where = array( 'url' => $url);
        $qr = $this->db->get_where('post', $where )->result_array();           
        return $qr;
    }

    public function getUrlUpdate($url, $id){        
        $where = array( 
            'url' => $url,
            'id' => $id
        );
        $qr = $this->db->get_where('post', $where )->result_array();           
        return $qr;
    }
}
?>