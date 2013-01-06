<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analysis extends Auth_controller
{
	public function __construct() {
		parent::__construct();
		
		$this->load->library('app/app_analysis');
	}
	
	public function index() {
		$user = $this->session->userdata('user');
		
		$workout_data = $this->app_analysis->get_workout_data($user);
		
		$content = $this->load->view('analysis_view', array(
			'user' => $user,
			'workout_data' => $workout_data
		), TRUE);
			
		$this->load->view('base_user_view', array(
			'title' => 'D-Rock Analysis',
			'content' => $content
		));
	}
}