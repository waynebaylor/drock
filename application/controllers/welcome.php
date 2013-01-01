<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Auth_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->model('workout_model');		
	}
	
	public function index() {
		$user = $this->session->userdata('user');
		unset($user['password']);
		
		$workouts_iter = $this->workout_model->find_by_user($user);
	
		$content = $this->load->view('welcome_view', array(
			'user' => $user,
			'workouts_iter' => $workouts_iter
		), TRUE);
			
		$this->load->view('base_user_view', array(
			'title' => 'D-Rock Home',
			'content' => $content
		));
	}
}