<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workout_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * @param array $user (id)
	 */
	public function find_by_user($user) {
		$sql = '
			SELECT
				id,
				user_id,
				name,
				reps,
				sets,
				weight,
				tmstmp
			FROM
				Workout
			WHERE
				user_id = :user_id
			ORDER BY
				tmstmp DESC
		';
		
		$params = array(
			'user_id' => $user['id']
		);
		
		return $this->pdo_db->query_iterator($sql, $params);
	}
}