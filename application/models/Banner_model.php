<?php  
class Banner_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getBanner()
    {                        
        $qr = $this->db->query("SELECT * from banner")->result_array();
        return $qr;
    }

    public function createBanner($data)
    {                                
        $qr = $this->db->insert('banner', $data);
        return $qr;
    }     

}
?>