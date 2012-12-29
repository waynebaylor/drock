<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Transactional_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('logic/app_login');
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
	
	public function submit() {
		$session_user = $this->session->userdata('user');
		if(!empty($session_user)) {
			redirect('welcome');
		}
		else {
			$this->_submit_validation();
			
			if($this->form_validation->run() === FALSE) {
				$this->index();
			}
			else {
				$params = $this->input->post(array('username', 'password'));
				
				$this->app_login->login($params);
				
				redirect('welcome');
			}
		}
	}
	
	public function _submit_validation() {
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
	}
}