<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->database();

		// $this->load->library('mylibrary');
		// $this->mylibrary->some_function();

		$sess_id = $this->session->userdata('user_id');

		if (!empty($sess_id)) {
			if ($_SESSION['userType'] == 0) {
				redirect(site_url() . 'user/dashboard');
			} else if ($_SESSION['userType'] == 1) {
				redirect(site_url() . 'admin/dashboard');
			}
		} else {

			$this->session->set_userdata(array('msg' => ''));
			//load the login page
			// $this->load->view('user/login');

		$_SESSION['isLoggedIn'] = false;
		$userdata['title'] ="Home Page";
		$this->load->view('template/header',$userdata);
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
		}

	
	}
}
