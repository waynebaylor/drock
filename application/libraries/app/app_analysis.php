<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_analysis
{
	public function __construct() {
		$CI =& get_instance();
		
		$CI->load->model('workout_model');
		$this->workout_model = $CI->workout_model;
	}
	
	/**
	 * @param array $user [id]
	 */
	public function get_workout_data($user) {
		$results = $this->workout_model->find_workout_data_by_user($user);
		
		$workout_data = array();
		foreach($results as $r) {
			$name = $r['name'];
			if(empty($workout_data[$name])) {
				$workout_data[$name] = array();
			}
			// format is: [milliseconds, decimal number]
			$workout_data[$name][] = array(strtotime($r['tmstmp'])*1000, doubleval($r['weight'])); 
		}
		
		return $workout_data;
	}
}