<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Auth_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
	}
	
	public function index() {
		$session_user = $this->session->userdata('user');
			
		$this->load->view('welcome_view', array('user' => $session_user));
	}
}