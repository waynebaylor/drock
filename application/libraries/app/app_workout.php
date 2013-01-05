<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_workout
{
	public function __construct() {
		$CI =& get_instance();
		
		$CI->load->model('workout_model');
		$this->workout_model = $CI->workout_model;
		$this->pdo_db = $CI->pdo_db;
	}
	
	/**
	 * @param array $params [user_id, name, sets, reps, weight, tmstmp]
	 */
	public function create($params) {
		$format = $this->pdo_db->default_date_format();
		
		$params = array_filter($params);
		$params = array_merge(array(
			'name' => 'Unnamed Workout',
			'sets' => 0,
			'reps' => 0,
			'weight' => 0,
			'tmstmp' => date($format)
		), $params);
		
		return $this->workout_model->insert($params);
	}
	
	/**
	 * @param array $params [user_id, id]
	 */
	public function delete($params) {
		$this->workout_model->delete($params);
	}
	
	/**
	 * @param array $params [user_id, id]
	 */
	public function undelete($params) {
		$this->workout_model->undelete($params);
	}
}