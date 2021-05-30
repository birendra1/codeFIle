<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Product_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        // if($_SESSION['email'] == ''){
        //     redirect(base_url()."user/login");
        // }
    }
    
    public function insert($p_title,$p_name,$p_description,$p_category_type,$p_isActive,$p_created_at,$p_created_by,$p_updated_at,$p_updated_by)
    {
        // var_dump($tags);
        $product = array(
            'p_title' => $p_title,
            'p_name' => $p_name,
            'p_description' => $p_description,
            'p_category_type' => $p_category_type,
            'p_isActive' => $p_isActive,
            'p_created_at' => $p_created_at,
            'p_created_by' => $p_created_by,
            'p_updated_at' => $p_updated_at,
            'p_updated_by' => $p_updated_by        
        );
        $this->db->insert('product',$product);

        return true;
    

    }

    public function select()
    {
        $this->db->select('p_title, p_name,p_description,p_category_type,p_isActive,p_created_at,p_created_by,p_updated_at,p_updated_by');
        $this->db->from('product');
        $query = $this->db->get();
        // var_dump($query->result());

        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }

    }

    public function update()
    {

    }

    public function delete()
    {
        
    }
}
                        
/* End of file Product_model.php */
                    
                                        