<?php

class Cache_controller extends CI_controller{
   
   public function index(){
    $n=5;
    $this->output->cache($n);
    $this->load->view('test');
   }

   public function delete_file_cache(){
       $this->output->delete_cache('cachecontroller');

   }
    
}
