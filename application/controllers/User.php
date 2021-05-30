<?php

class User extends CI_controller
{
    public function __construct(){
        parent:: __construct();
        // $this->load->helper(array('form','url'));
    }
  function index(){
    $sess_id = $this->session->userdata('user_id');

    if (!empty($sess_id)) {
        if ($_SESSION['userType'] == 0) {
            redirect(site_url() . 'user/dashboard');
        } else if ($_SESSION['userType'] == 1) {
            redirect(site_url() . 'admin/dashboard');
        }
    } 

    $userdata['title'] ="Register";
    $userdata ['base_url']= base_url()."user";
    $userdata['isLoggedIn'] =0;
    $this->load->view('template/header',$userdata);
    $this->load->view('user/register');
    $this->load->view('template/footer');
  }


  public function create(){
    echo "Inside Create controller" ;

    $this->load->model('User_model');
    // $this->load->helper(array('form', 'url'));

    $this->load->library('form_validation');

    $this->form_validation->set_rules('fullname', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('mobile', 'Mobile', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required',
                    array('required' => 'You must provide a %s.')
            );
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
    
    if ($this->form_validation->run() == FALSE) {
        # code...
        // echo "Validation error";
        redirect(base_url().'user/register');
    } else {
        # save record in database
        echo "Validation okk";

         $formarray = array();
         $formarray['name'] = $this->input->post('fullname');
         $formarray['email'] = strtolower($this->input->post('email'));
         $formarray['mobile'] = $this->input->post('mobile');
         $formarray['password'] = md5($this->input->post('password'));
         $formarray['created_at'] = date('Y-m-d');
         $formarray['updated_at'] = date('Y-m-d');
         if($this->User_model->create($formarray)) {
         $this->session->set_tempdata('success','User account created successfully!',3);
         redirect(base_url().'user/login');
         }
         
         else
         {
            $this->session->set_tempdata('failure','Failed to create user account!',3);
            redirect(base_url().'user/register');
         }
    }
}

 

    function delete($userId){
        // print_r("here");
        $this->load->model('User_model');
        $user= $this->User_model->getUser($userId);

        if(empty($user)){
            $this->session->set_flashdata('failure','Record not found in database');
            
            redirect(base_url().'index.php/user/index');
            
        }
        $this->User_model->deleteUser($userId);
        $this->session->set_flashdata('success','Record deleted Successfully');

        
         redirect(base_url().'index.php/user/index');
        

    }

    public function upload(){
        $userId = 2;
  
        // $this->logged_n();
        $this->load->model('User_model');
        $user= $this->User_model->getUser($userId);
        $data = array();
        $data['user'] = $user;
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       
        
        $data['title'] = "FIle Upload";

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 500;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        // if ($this->form_validation->run() == FALSE) {
        //     # code...
        //     echo "new";
        //     // redirect(base_url().'index.php/user/upload');
        // }


    //    else 
        if ( ! $this->upload->do_upload('userfile'))
        {
                $data['error'] = "";
                if(isset($_FILES['userfile'])){
                $data['error'] = $this->upload->display_errors();
                }
                // $this->load->view('upload_form', $error);
                       // $this->load->view('header',$data);
                echo "error";
                $this->load->view('edit',$data);
                // $this->load->view('footer',$data);
                }
        else
        {

        // $user_id = $this->session->userdata('id);
        $formarray = array();
        $formarray['name'] = $this->input->post('name');
        $formarray['email'] = $this->input->post('email');
       
        $uploaddata = $this->upload->data();

        $filename = $uploaddata['file_name'];
        // echo '<pre>' ; print_r($uploaddata) ; echo '</pre>';

        // $userdata =  array(
        //     'upload_image' => $filename
        // );

        $formarray['upload_image'] = $filename;
        $this->User_model->updateUser($userId,$formarray);


        // $this->User_model->upload_image($user_id,$userdata);

        redirect( base_url()."/user");
       // $this->load->view('upload_success', $filename);
        }
    
    }


    public function do_upload()
    {
            
    }


    function login(){

        $sess_id = $this->session->userdata('user_id');

		if (!empty($sess_id)) {
			if ($_SESSION['userType'] == 0) {
				redirect(site_url() . 'user/dashboard');
			} else if ($_SESSION['userType'] == 1) {
				redirect(site_url() . 'admin/dashboard');
			}
		} 

        $userdata['title'] ="Login";
        $userdata['isLoggedIn'] =0;
        $this->load->view('template/header',$userdata);
        $this->load->view('user/login');
        $this->load->view('template/footer');

    }


    public function signIn(){

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'You must provide a %s.'));

          if (!$this->form_validation->run()) {
               //False
               // redirect(base_url().'pages/dashboard'); 
               echo "Validation fail" ;
               redirect(base_url().'user/login');
              
          } else {
            //    echo "23";
               // False
               $email = strtolower($this->input->post('email'));
               $password = md5($this->input->post('password'));
               //model function  
               //  $this->load->model('User');  
               if ($this->User_model->can_login($email, $password)) {
                    $result = $this->User_model->getUserByEmail($email);
                    $session_data = array(
                         'email'     =>     $email,
                         'userType' => $result[0]->userType,
                         'isLoggedIn' => 1,
                         'user_id' => $result[0]->user_id
                    );
                    $this->session->set_userdata($session_data);

                    if($session_data['userType'] == 0){
                        //  echo "user dashboard";
                         
                        //  $data = "Dashboard";
                        //  $userdata = array ();
                        //  $userdata['userType'] = 1;
                        //  $this->load->view('template/header', $data);
                        //  $this->load->view('pages/success',$userdata);
                        //  $this->load->view('template/footer');


                         redirect(base_url().'user/dashboard');
                         // $segments = array('news', 'local', '123');
                         // echo site_url($segments);
                         // redirect('/article/13', 'location', 301);
                         // redirect('redirect/computer_graphics','');

                    }
                    else if($session_data['userType'] == 1){
                        //  echo  "Admin dashboard";
                        //  $userdata = array ();
                        //  $userdata['userType'] = 1;
                        //  $this->load->view('template/header', $data);
                        //  $this->load->view('pages/success',$userdata);
                        //  $this->load->view('template/footer');
                        redirect(base_url().'admin/dashboard');
                    }
                    // echo "here";
                    //   redirect("a"); 
                    // echo "Login success";
               } else {
                    echo "Login failed";
                    $this->session->unset_tempdata('success');
                    $this->session->set_tempdata('failure', 'Invalid Username and Password',3);
                    redirect(base_url() . 'user/login');
                    // echo "Login failed";
               }
              
          }
    }

    public function dashboard() {

        $sess_id = $this->session->userdata('user_id');

		if (!empty($sess_id)) {
			if ($_SESSION['userType'] == 0) {
				// redirect(site_url() . 'user/dashboard');
                // echo "user dashboard";
            $userdata['title'] ="Dashboard";
            $userdata ['base_url']             = base_url()."user";
            $this->load->view('template/header',$userdata);
            $this->load->view('user/dashboard');
            $this->load->view('template/footer');
			} else if ($_SESSION['userType'] == 1) {
				// redirect(site_url() . 'admin/dashboard');
                // echo "admin dashboard";
                $userdata['title'] ="Admin Dashboard";
                $userdata ['base_url'] = base_url()."admin";
                $this->load->view('template/header',$userdata);
                $this->load->view('admin/dashboard');
                $this->load->view('template/footer'); 
			}
		} 

        else {
            $this->session->set_userdata(array('msg' => ''));
		    $_SESSION['isLoggedIn'] = false;
            redirect(base_url() . '/');
        }



        // if($_SESSION['userType'] == 0) {
        //     $userdata['title'] ="Dashboard";
        //     $userdata ['base_url']             = base_url()."user";
        //     $this->load->view('template/header',$userdata);
        //     $this->load->view('user/dashboard');
        //     $this->load->view('template/footer');
        // }
        // else if($_SESSION['userType'] == 1){
        //     $userdata['title'] ="Admin Dashboard";
        //     $userdata ['base_url']             = base_url()."admin";
        //     $this->load->view('template/header',$userdata);
        //     $this->load->view('admin/dashboard');
        //     $this->load->view('template/footer'); 
        // }

    }

    public function logout(){
        $session_data = array(
            'email'     => "",
            'userType' => "",
            'isLoggedIn' => false,
            'user_id' => ""
       );
       $this->session->set_userdata($session_data);

        // $this->session->unset_userdata('session_data');
        $_SESSION['isLoggedIn'] = false;
        redirect(base_url().'user/login');
        
    }

}






?>