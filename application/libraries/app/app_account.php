<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_account
{
	public function __construct() {
		$CI =& get_instance();
		
		$CI->load->model('user_model');
		$this->user_model = $CI->user_model;
		
		$CI->load->library('phpass');
		$this->pw_hasher = $CI->phpass->new_instance();
	}
	
	/**
	 * @param array $params (username, password)
	 */
	public function create($params) {
		$hash = $this->pw_hasher->HashPassword($params['password']);
		$params['password'] = $hash;

		return $this->user_model->insert($params);
	}
}