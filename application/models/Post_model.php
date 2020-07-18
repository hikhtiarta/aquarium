<?php  
class Post_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getPost()
    {                        
        $qr = $this->db->query("SELECT * from post")->result_array();
        return $qr;
    } 
    
    public function setPost($name)
    {                                
        $qr = $this->db->query("INSERT INTO category(name) values('".$name."')");
        return $qr;
    } 

    public function deletePost($name)
    {                        
        $qr = $this->db->query("DELETE FROM category WHERE name = '".$name."'");
        return $qr;
    } 
}
?>