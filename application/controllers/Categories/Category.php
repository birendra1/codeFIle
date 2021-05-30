<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Categories/Category_model', 'Category');
    }

    public function addCategory(){
        // $result = $this->Category->select();
        // var_dump($result);

        $email = $_SESSION['email'];

        $result = $this->User_model->getUserByEmail($email);
        $userdata = array();
        $userdata['result'] = $result[0];
    
    
        $data['title'] = "Category Add";
        
        if ( $_SESSION['userType'] == 1) {
          $data['isLoggedIn'] = TRUE;
          $this->load->view('template/header', $data);
        //   $this->load->view('sidebar/sidebar.php',$userdata);
        //   $this->load->view('Dashboard/admin.php');
        

        $this->load->view('admin/category_add');
        $this->load->view('template/footer');
        }

    }

    public function create()
    {
        //  echo "You are inside create";

        // echo $isActive.",".$category_name.",".$category_type.",".$description.",".$tags; 


        $this->form_validation->set_rules('category_type', 'Category_type', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('category_name', 'Category_name', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[10]|max_length[1000]');
        $this->form_validation->set_rules('tags', 'Tags', 'required');

        if ($this->form_validation->run() == FALSE) {

            // $category_type = $this->input->post('category_type');
            // $category_name = $this->input->post('category_name');
            // $description = $this->input->post('description');
            // $tags = $this->input->post('tags');
            // $isActive = $this->input->post('isActive');

            // echo '<div class="container">Validation fail </div>';
            // echo $category_type.",".$category_name.",".$description.",".$tags.",".$isActive;

            $this->session->set_tempdata('error','Validation fails! Please provide correct details',5);
            redirect(base_url().'admin/category_add');
        }
        else {
            // fetch data
            $user_id= $_SESSION['user_id'];
            // echo $user_id."65";

            // var_dump($_SESSION);
            // echo $this->input->post('category_name');
            $category_type = $this->input->post('category_type');
            $category_name = $this->input->post('category_name');
            $description = $this->input->post('description');
            $tags = $this->input->post('tags');
            $isActive = $this->input->post('isActive');
            $created_at =date("Y-m-d H:i:s");
            $created_by = $user_id;
            $updated_at = date("Y-m-d H:i:s");
            $updated_by = $user_id;

            // echo $tags;

            // // call method
          $result =  $this->Category->insert($category_type,$category_name, $description, $tags, $isActive, $created_at, $created_by,$updated_at, $updated_by);
            // $this->category->insert($category_type, $category_name, $description, $tags)

            // show error message

            if ( $result === false ){
                $this->session->set_tempdata('error', 'Something went wrong! cann\'t add this category',3);
                redirect(base_url() . 'admin/category');
            }

            // redirect view

            else {

                $this->session->set_tempdata('success', 'Category successfully added',3);
                redirect(base_url() . 'admin/category');
            }
        }

    }

    public function view()
    {
        // echo "view";

        $result = $this->Category->select();

        if ($result == FALSE){
            $email = $_SESSION['email'];

            $result = $this->User_model->getUserByEmail($email);
            $userdata = array();
            $userdata['result'] = $result[0];
        
        
            $data['title'] = "Category";
            if ( $_SESSION['userType'] == 1) {
                $data['isLoggedIn'] = TRUE;
                $results = $this->Category->select();
                $userdata = array();
                // var_dump($results);
                // if(gettype($results) == 'boolean'){
                //     echo "true";
                // }
                $userdata['results'] = $results;
    
                // var_dump($results);
    
                $this->load->view('template/header', $data);    
                $this->load->view('admin/category',$userdata);
                $this->load->view('template/footer');
            }
        }
        else{
        $email = $_SESSION['email'];

        $result = $this->User_model->getUserByEmail($email);
        $userdata = array();
        $userdata['result'] = $result[0];
    
    
        $data['title'] = "Category";
        if ( $_SESSION['userType'] == 1) {
            $data['isLoggedIn'] = TRUE;
            $results = $this->Category->select();
            $userdata = array();
            $userdata['results'] = $results;

            // var_dump($results);

            // if (gettype($results) == 'array') {
            //     echo "Inside array";
            // };

            $this->load->view('template/header', $data);    
            $this->load->view('admin/category',$userdata);
            $this->load->view('template/footer');
        }
    }
    // var_dump($result);

    }

    public function update()
    {

    }

    public function delete()
    {
        
    }
}
        
    /* End of file  Category.php */
        
                            