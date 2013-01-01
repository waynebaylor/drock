<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workout extends Auth_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('app/app_workout');
	}
	
	public function submit() {
		$user = $this->session->userdata('user');
		
		$params = $this->input->post(array(
			'name',
			'sets',
			'reps',
			'weight',
			'tmstmp'
		));
		
		$params['user_id'] = $user['id'];
		
		$this->app_workout->create($params);
		
		redirect('welcome');
	}
}