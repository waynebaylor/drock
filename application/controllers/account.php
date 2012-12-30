<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Transactional_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('app/app_account');
		$this->load->model('user_model');
	}
	
	public function create() {
		$session_user = $this->session->userdata('user');
		if(!empty($session_user)) {
			redirect('welcome');
		}
		else {
			$content = $this->load->view('account_create_view', array(), TRUE);
			
			$this->load->view('base_view', array(
				'title' => 'Create Account',
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
				$this->create();
			}
			else {
				$params = $this->input->post(array('username', 'password'));

				$this->app_account->create($params);
				
				$user = $this->user_model->find_by_username($params['username']);
				
				unset($user['password']); // don't want to put pw hash in the session.
				$this->session->set_userdata('user', $user);
				
				redirect('welcome');
			}
		}
	}
	
	public function _submit_validation() {
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_message('_check_username', 'Username already taken.');
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback__check_username');
	}
	
	public function _check_username($username) {
		return TRUE;
	}
}