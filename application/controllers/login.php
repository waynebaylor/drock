<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Transactional_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('phpass');
		$this->pw_hasher = $this->phpass->new_instance(13);
		
		$this->load->model('user_model');
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
				$username = $this->input->post('username');
				$user = $this->user_model->find_by_username($username);

				unset($user['password']); // don't want to put pw hash in the session.
				$this->session->set_userdata('user', $user);
				
				redirect('welcome');
			}
		}
	}
	
	public function _submit_validation() {
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		
		// required to set message for callback, but we don't use it so it's blank.
		$this->form_validation->set_message('_authenticate', ''); 
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback__authenticate');
	}
	
	public function _authenticate($username) {
		$password = $this->input->post('password');
		
		if($username && $password) {
			$user = $this->user_model->find_by_username($username);
			
			$match = $this->pw_hasher->CheckPassword($password, $user['password']);
			
			if(!$match) {
				$this->general_errors->append('Invalid Username or Password.');
				return FALSE;
			}
		}
		
		return TRUE;
	}
}