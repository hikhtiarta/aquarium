<?php  
class Util_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getCategory()
    {                        
        $qr = $this->db->query("SELECT * from category")->result_array();
        return $qr;
    } 
    
    public function setCategory($data)
    {                                       
        $qr = $this->db->insert('category', $data);
        return $qr;
    } 

    public function deleteCategory($name)
    {                        
        $qr = $this->db->query("DELETE FROM category WHERE name = '".$name."'");
        return $qr;
    } 
}
?>