<?php  
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getUser()
    {                        
        $qr = $this->db->query("SELECT * from user")->result_array();
        return $qr;
    }
    
    public function updateUser($id ,$data)
    {                               
        $this->db->where('id', $id);
        $qr = $this->db->update('user', $data);         
        return $qr;
    } 
   
}
?>