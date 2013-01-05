<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workout_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * @param array $user [id]
	 */
	public function find_by_user($user) {
		$sql = '
			SELECT
				id,
				user_id,
				name,
				sets,
				reps,
				weight,
				tmstmp,
				status
			FROM
				Workout
			WHERE
				user_id = :user_id
			AND
				status IS NULL
			ORDER BY
				tmstmp DESC
		';
		
		$params = array(
			'user_id' => $user['id']
		);
		
		return $this->pdo_db->query_iterator($sql, $params);
	}
	
	/**
	 * @param array $params [user_id, name, sets, reps, weight, tmstmp]
	 */
	public function insert($params) {
		$sql = '
			INSERT INTO
				Workout (
					user_id,
					name,
					sets,
					reps,
					weight,
					tmstmp
				)
			VALUES (
				:user_id,
				:name,
				:sets,
				:reps,
				:weight,
				:tmstmp
			)
		';
		
		return $this->pdo_db->execute($sql, $params);
	}
	
	/**
	 * @param array $params [user_id, id]
	 */
	public function delete($params) {
		$sql = '
			UPDATE
				Workout
			SET
				status = "DELETED"
			WHERE
				user_id = :user_id
			AND
				id = :id
		';
		
		$this->pdo_db->execute($sql, $params);
	}
	
/**
	 * @param array $params [user_id, id]
	 */
	public function undelete($params) {
		$sql = '
			UPDATE
				Workout
			SET
				status = NULL
			WHERE
				user_id = :user_id
			AND
				id = :id
		';
		
		$this->pdo_db->execute($sql, $params);
	}
}

