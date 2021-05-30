<?php 

class Cookie_controller extends CI_Controller
{
     public function __construct ()
    {
        parent::__construct ();
        $this->load->helper('cookie');
        $this->load->helper('url');
        
    }

    public function index(){
        // ?Initializing a cookie
        set_cookie("cookie_name","cookie_value",'3600');
        $this->load->view('Cookie_view');
    }

    // We display the values inside cookie
    public function display_cookie(){
        echo get_cookie('cookie_name');
        
        $this->load->view('cookie_view');
        
    }

    public function deletecookie(){
        // The associated cookie will be deleted from the application
        delete_cookie('cookie_name');
        redirect("cookie");
    }
}