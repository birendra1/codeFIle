<?php

class Session_controller extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');

        $this->session->set_userdata('name','User');

        $this->load->view('session_view');
        
    }

    public function unset_session_data(){
        // Loading session library;
        $this->load->library('session');

        // Removing session data
        $this->session->unset_userdata('name');
        $this->load->view('session_view');
        
        
    }
}

?>