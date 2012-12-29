<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	public function find_by_username($username) {
		return array(
			'id' => 1,
			'username' => 'wade',
			'password' => 'wade'
		);
	}
}