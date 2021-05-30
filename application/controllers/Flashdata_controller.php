<?php

class Flashdata_controller extends CI_Controller{

    public function index(){
        // Load session library
        $this->load->library('session');
        // Redire to home page

        $this->load->view('flashdata_view');
               
    }

    public function add(){
        // load session library

        
        $this->load->library('session');
        
        $this->load->helper('url');
        // add flash data
        
        $this->session->set_flashdata('xyz', 'xyz-flash-value');

        // Redirect to homepage
        redirect('flashdata');
        
        
        
    }
}



?>