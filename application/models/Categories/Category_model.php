<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Category_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
      
    }
    
    public function insert($category_type, $category_name,$description,$tags,$isActive,$created_at,$created_by,$updated_at,$updated_by)
    {
        var_dump($tags);
        $category = array(
            'category_type' => $category_type,
            'category_name' => $category_name,
            'description' => $description,
            'isActive' => $isActive,
            'tags' => $tags,
            'created_at' => $created_at,
            'created_by' => $created_by,
            'updated_at' => $updated_at,
            'updated_by' => $updated_by
        );

        $this->db->insert('category',$category);

        return true;

    }

    public function select()
    {
        if($_SESSION['email'] == ''){
            redirect(base_url()."user/login");
        }
        
        $this->db->select('id,category_type,category_name,description,tags,isActive,created_at,updated_at');
        $this->db->from('category');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }

    }

    public function update($id,$category_type, $category_name,$description,$isActive,$tags,$created_at,$created_by,$updated_at,$updated_by)
    {
        $category = array(
            'category_type' => $category_type,
            'category_name' => $category_name,
            'description' => $description,
            'isActive' => $isActive,
            'tags' => $tags,
            'created_at' => $created_at,
            'created_by' => $created_by,
            'updated_at' => $updated_at,
            'updated_by' => $updated_by
        );

        $this->db->update('category', $category, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->delete('categories', array('id' => $id));
        
    }

    public function find($id){
        $this->db->select('id','category_type','category_name','description','isActive','tags','created_at','updated_at');
        $this->db->from('category');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }

    }
}
                        
/* End of file Category_model.php */
                    
                                        