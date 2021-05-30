<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Product/Product_model', 'product');
        // $this->load->model('Categories/Category_model', 'Category');
    }

    public function addProduct(){
        // $result = $this->Category->select();
        // var_dump($result);

        // echo "Inside add product ";

        // $email = $_SESSION['email'];

        // $result = $this->User_model->getUserByEmail($email);
        // $userdata = array();
        // $userdata['result'] = $result[0];
    
    
        $data['title'] = "Product Add";
        
        if ( $_SESSION['userType'] == 1) {
          $data['isLoggedIn'] = TRUE;
          $this->load->view('template/header', $data);
        $results = $this->Category->select();
        $category = array();
        $category['results'] = $results;   

        $this->load->view('admin/product_add',$category);
        $this->load->view('template/footer');
        }

    }


    public function create()
    {
        $this->form_validation->set_rules('p_title', 'p_title', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('p_name', 'p_name', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('p_description', 'p_description', 'required|min_length[10]|max_length[1000]');
        $this->form_validation->set_rules('p_category_type', 'p_category_type', 'required');
        $this->form_validation->set_rules('p_isActive', 'p_isActive', 'required');

        // Validation fails

        if ($this->form_validation->run() == FALSE) {

            // $p_title = $this->input->post('p_title');
            // $p_name = $this->input->post('p_name');
            // $p_description = $this->input->post('p_description');
            // $p_category_type = $this->input->post('p_category_type');
            // $p_isActive = $this->input->post('p_isActive');

            // echo '<div class="container">Validation fail </div>';
            // echo $p_title.",".$p_name.",".$p_description.",".$p_category_type.",".$p_isActive;
            $this->session->set_tempdata('error','Validation fails! Please provide correct details',5);
            redirect(base_url().'admin/product_add');
        }

        // Validation success

        $user_id= $_SESSION['user_id'];
        // echo $user_id."65";

        // var_dump($_SESSION);
        // echo $this->input->post('category_name');
        $p_title = $this->input->post('p_title');
        $p_name = $this->input->post('p_name');
        $p_description = $this->input->post('p_description');
        $p_category_type = $this->input->post('p_category_type');
        $p_isActive = $this->input->post('p_isActive');
        $p_created_at =date("Y-m-d H:i:s");
        $p_created_by = $user_id;
        $p_updated_at = date("Y-m-d H:i:s");
        $p_updated_by = $user_id;

        // echo $tags;

        // // call method
      $result =  $this->product->insert($p_title,$p_name,$p_description,$p_category_type,$p_isActive,$p_created_at,$p_created_by,$p_updated_at,$p_updated_by);
        // $this->category->insert($category_type, $category_name, $description, $tags)

        // show error message

        if ( $result === false ){
            $this->session->set_tempdata('error', 'Something went wrong! cann\'t add this product',3);
            redirect(base_url() . 'admin/product_list');
        }

        // redirect view

        else {

            $this->session->set_tempdata('success', 'Product successfully added',3);
            redirect(base_url() . 'admin/product_list');
        }

      
    }

    public function view()
    {
        // $email = $_SESSION['email'];

        // $result = $this->User_model->getUserByEmail($email);
        // $userdata = array();
        // $userdata['result'] = $result[0];
    
    
        $data['title'] = "Product View";
        
        if ( $_SESSION['userType'] == 1) {
          $data['isLoggedIn'] = TRUE;
          $this->load->view('template/header', $data);
        $results = $this->product->select();
        $product = array();
        $product['results'] = $results;   

        $this->load->view('admin/product_list',$product);
        $this->load->view('template/footer');
        }

    }

    public function update()
    {

    }

    public function delete()
    {
        
    }
}
        
    /* End of file  Product.php */
        
                            