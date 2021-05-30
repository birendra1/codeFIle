<?php
class Upload extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->helper(array('form','url'));
    }
    public function index(){
        $data['error'] = "";
        $this->load->view('upload_form',$data);

    }

    public function do_upload(){
        // echo "here";
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpeg|png';
        $config['max_size'] = 102400;

        $this->load->library('upload',$config);
    
        if(!$this->upload->do_upload('userfile')){
            $data['error'] = "File was not uploaded";
            $this->load->view('upload_form',$data);
        }
        else{
            $this->view->upload('upload_success',$data);
        }
    }
}





?>