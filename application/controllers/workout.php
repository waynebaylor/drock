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
		
		$this->session->set_flashdata('success_message', 'Workout created.');
		
		redirect('welcome');
	}
	
	public function delete() {
		$user = $this->session->userdata('user');
		
		// could be GET or POST request.
		$params = $this->input->get_post(array(
			'id'
		));
		$params['user_id'] = $user['id'];
		
		$this->app_workout->delete($params);
		
		$url = base_url('workout/undelete?id='.$params['id']);
		$this->session->set_flashdata('success_message', "Workout deleted. <a href='{$url}' style='font-weight:bold;'>Undo</a>");
		
		redirect('welcome');
	}
	
	public function undelete() {
		$user = $this->session->userdata('user');
		
		// could be GET or POST request.
		$params = $this->input->get_post(array(
			'id'
		));
		$params['user_id'] = $user['id'];
		
		$this->app_workout->undelete($params);
		
		$this->session->set_flashdata('success_message', "Workout restored.");
		
		redirect('welcome');
	}
	
	public function edit() {
		$user = $this->session->userdata('user');
		
		// could be GET or POST request.
		$params = $this->input->get_post(array(
			'id'
		));
		$params['user_id'] = $user['id'];
		
		$workout = $this->workout_model->find($params);
		$workout_names = $this->workout_model->find_names_by_user($user);
		
		$content = $this->load->view('workout_edit_view', array(
			'user' => $user,
			'workout' => $workout,
			'workout_names' => $workout_names
		), TRUE);
		
		$this->load->view('base_user_view', array(
			'title' => 'D-Rock Edit Workout',
			'content' => $content
		));
	}
	
	public function save() {
		$user = $this->session->userdata('user');
		
		$params = $this->input->post(array(
			'id',
			'name',
			'sets',
			'reps',
			'weight',
			'tmstmp'
		));
		$params['user_id'] = $user['id'];
		
		$this->app_workout->save($params);
		
		$this->session->set_flashdata('success_message', 'Workout saved.');
		
		redirect('welcome');
	}
}