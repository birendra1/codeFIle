<?php

class User_model extends CI_model {

    function create($formArray){
       $query = $this->db->insert('users',$formArray);  // Insert into useres(name,email);
       if($query->num_rows() > 0)  
       {  
            return true;  
       }  
       else  
       {  
            return false;       
       }  

    }

    function all(){
       $query=  $this->db->get('users')->result_array(); // Select * from useres
       if($query->num_rows() > 0)  
       {  
            return $query;  
       }  
       else  
       {  
            return false;       
       }
    }

    function getUser($email){
        $this->db->where('email',$email);
        $query =  $this->db->get('users')->row_array(); // select *form users where userid=?
        if($query->num_rows() > 0)  
        {  
             return $query;  
        }  
        else  
        {  
             return false;       
        }
    }

    function updateUser($userId,$formArray){
        $this->db->where('user_id',$userId);
        $this->db->update('users',$formArray); // Update users set name =?, email = ?


    }

    function deleteUser($userId){
        $this->db->where('user_id',$userId);
        $this->db->delete('users'); // Delete from users Where user_id = ?
        
        // print_r("Deleted");
    }

    function upload_image($user_id,$userdata){
        $this->db->where('user_id',$user_id);
        $this->db->update('users',$userdata); // Update users set name =?, email = ?


    }

    public function can_login($email,$password){
        $this->db->where('email', $email);  
        $this->db->where('password', $password);  
        $query = $this->db->get('users');  
        //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
        if($query->num_rows() > 0)  
        {  
             return true;  
        }  
        else  
        {  
             return false;       
        }  

    }
    public function getUserByEmail($email){
        $this->db->select('user_id,email,name,mobile,userType',null);
        $this->db->from('users');
        $this->db->where('email',$email);
        $query = $this->db->get();
        if($query->num_rows() > 0)  
        {  
            return $query->result();  
        }  
        else  
        {  
             return false;       
        }
		
    }

    




}




?>