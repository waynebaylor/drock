<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/transactional_controller.php';

class Login extends Transactional_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
	}
	
	public function index() {
		$session_user = $this->session->userdata('user');
		if(!empty($session_user)) {
			redirect('welcome');
		}
		else {
			$content = $this->load->view('login_view', array(), TRUE);
			
			$this->load->view('base_view', array(
				'title' => 'Login',
				'content' => $content
			));
		}
	}
}