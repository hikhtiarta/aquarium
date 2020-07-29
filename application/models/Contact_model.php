<?php  
class Contact_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getContactUs()
    {                        
        $qr = $this->db->query("SELECT * from contactus")->result_array();
        return $qr;
    }

    public function createContactUs($data)
    {                                
        $qr = $this->db->insert('contactus', $data);
        return $qr;
    }  


}
?>