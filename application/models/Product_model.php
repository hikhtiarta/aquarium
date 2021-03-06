<?php  
class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getProduct()
    {                        
        $qr = $this->db->query("SELECT * from product order by created_date DESC")->result_array();
        return $qr;
    }

    public function getProductById($id)
    {                        
        $where = array( 'id' => $id);
        $qr = $this->db->get_where('product', $where )->result_array();           
        return $qr;
    }
    
    public function getProductLatestPage($index)
    {                        
        $qr = $this->db->query("SELECT * from product order by created_date limit ".$index." ")->result_array();
        return $qr;
    }

    public function getProductByCategory($pages, $name)
    {                        
        $query = "SELECT * from product where category like '%".$name."%' ORDER BY created_date DESC limit ". ((int)$pages - 15) .",15";
        $qr = $this->db->query($query)->result_array();
        return $qr;
    }
      
    public function getProductByLikes()
    {                        
        $qr = $this->db->query("SELECT * from product order by likes DESC limit 6")->result_array();
        return $qr;
    }
    
    public function createProduct($data)
    {                                
        $qr = $this->db->insert('product', $data);
        return $qr;
    } 

    public function updateProduct($id ,$data)
    {                               
        $this->db->where('id', $id);
        $qr = $this->db->update('product', $data);         
        return $qr;
    } 

    public function deleteProduct($data)
    {                     
        $qr = $this->db->delete("product", $data);
        return $qr;
    } 

    public function setLikes($id, $data)
    {                        
        $this->db->where('id', $id);
        $qr = $this->db->update('product', $data);         
        return $qr;
    } 

    public function setShare($id, $data)
    {                        
        $this->db->where('id', $id);
        $qr = $this->db->update('product', $data);         
        return $qr;
    } 

    public function getUrl($url){
        $where = array( 'url' => $url);
        $qr = $this->db->get_where('product', $where )->result_array();           
        return $qr;
    }
    
    public function getUrlUpdate($url, $id){        
        $where = array( 
            'url' => $url,
            'id' => $id
        );
        $qr = $this->db->get_where('product', $where )->result_array();           
        return $qr;
    }
    
}
?>