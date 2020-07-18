<?php  
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loginAuth($username,$password)
    {        
        $password = hash('sha256', $password);
        $where = array( 'username' => $username, 'password' => $password );
        $qr = $this->db->get_where('user', $where )->result_array();        
        print_r($qr);
        if(count($qr)>0){            
            $userdata = array(
                'is_login' => 1
            );
            $this->session->set_userdata($userdata);
            return 1;
        }else{
            return 0;
        }
    }        
}
?>