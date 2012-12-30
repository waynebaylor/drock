<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Auth_controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$user = $this->session->userdata('user');
		unset($user['password']);
		
		$content = $this->load->view('welcome_view', array(
			'user' => $user
		), TRUE);
			
		$this->load->view('base_user_view', array(
			'title' => 'D-Rock Home',
			'content' => $content
		));
	}
}