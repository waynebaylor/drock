<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	public function find_by_username($username) {
		$sql = '
			SELECT 
				id,
				username,
				password
			FROM
				User
			WHERE
				username = :username
		';
		
		return $this->pdo_db->first($sql, array('username' => $username));
	}
	
	/**
	 * @param array $params [username, password]
	 */
	public function insert($params) {
		$sql = '
			INSERT INTO
				User (
					username,
					password
				)
			VALUES (
				:username,
				:password
			)
		';
		
		$this->pdo_db->execute($sql, $params);
		
		return $this->pdo_db->last_insert_id();
	}
}