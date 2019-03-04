<?php

namespace app\models;

use app\core\Model;


// CRUD - model for work with the `users` table.
class UserModel extends Model {

	/**
	 * Rainbow table protection
	 *
	 * @var string
	 */
	private $salt = 'sibers';

	/**
	 * Add user to DB
	 *
	 * @param $array array - user data array
	 *
	 * @return boolen
	 */
	public function create($array){

		// If there is no such user and passwords match
		if(!$this->issetLogin($array['login']) && $array['password'] == $array['repassword']){

			// Clearing POST data
			$array = $this->cleanArray($array);

			// Receive password hash with salt
			$password = md5($array['password'].$this->salt);

			// Parameters for sql query
			$params = [
				'id' => '',
				'login' => $array['login'],
				'password' => $password,
				'name' => $array['name'],
				'lastname' => $array['lastname'],
				'gender' => $array['gender'],
				'bday' => $array['bday'],
			];

			// Preparing a request to add a user to the database
			$query = 'INSERT INTO `users`
					  VALUES (:id, :login, :password, :name, :lastname, :gender, :bday)';

			// Execute the query
			$result = $this->db->query($query, $params);

			return true;
		}

		return false;
	}

	/**
	 * Get user row from DB
	 *
	 * @param $login string
	 *
	 * @return array
	 */
	public function read($login){

		// Clearing parameters for sql query
		$params = ['login' => $this->clean($login)];

		// Preparing a request to add a user to the database
		$query = 'SELECT `id`, `name`, `login`, `lastname`, `gender`, `bday` FROM `users` WHERE `login` = :login LIMIT 1';

		// Execute the query
		$result = $this->db->query($query, $params);
		
		// Result parsing
		$data = $result -> fetch ();

		return $data;
	}

	/**
	 * Update user row in the DB
	 *
	 * @param $array array
	 *
	 * @return boolen
	 */
	public function update($array){

		// If user exists and passwords match
		if($this->issetLogin($array['login']) && $array['password'] == $array['repassword']){

			// Clearing POST data
			$array = $this->cleanArray($array);

			// Receive password hash with salt
			$password = md5($array['password'].$this->salt);

			// Parameters for sql query
			$params = [
				'login' => $array['login'],
				'password' => $password,
				'name' => $array['name'],
				'lastname' => $array['lastname'],
				'gender' => $array['gender'],
				'bday' => $array['bday'],
			];

			// Preparing a request to update user row
			$query = 'UPDATE `users` SET `password` = :password, `name` = :name, `lastname` = :lastname,
					 `gender` = :gender, `bday` = :bday WHERE `login` = :login';

			// Execute the query
			$result = $this->db->query($query, $params);

			return true;
		}

		return false;
	}

	/**
	 * Delete user row from DB
	 *
	 * @param $id integer
	 *
	 * @return boolen
	 */
	public function delete($id){

		// If id exists
		if($this->issetID($id)) {

			// Preparing and cleaning parameters for sql query
			$params = ['id' => $this->clean($id)];

			// Preparing a request
			$query = 'DELETE FROM `users` WHERE `id`= :id LIMIT 1';

			// Execute the query
			$this->db->query($query, $params);

			return true;

		}

		return false;
	}

	/*========================= Helper methods =========================*/

	/**
	 * Checks user availability in the DB by login
	 *
	 * @param $login string
	 *
	 * @return boolen
	 */
	private function issetLogin($login) {

		$params = ['login' => $this->clean($login)];

		$query = 'SELECT count(login) FROM `users` WHERE login = :login LIMIT 1';

		$numRows = $this->db->column($query, $params);

		if ($numRows > 0) return true;
		
		return false;
	}

	/**
	 * Checks user availability in the DB by ID
	 *
	 * @param $login string
	 *
	 * @return boolen
	 */
	private function issetID($id) {

		$params = ['id' => $this->clean($id)];

		$query = 'SELECT count(id) FROM `users` WHERE id = :id LIMIT 1';

		$numRows = $this->db->column($query, $params);

		if ($numRows > 0) return true;
		
		return false;
	}

	/**
	 * Clears data from special characters and html tags
	 *
	 * @param $value string
	 *
	 * @return string
	 */
	private function clean($value) {

		// For remove spaces from the beginning and end of the line
	    $value = trim($value);

	    // Remove other characters
	    $value = stripslashes($value);

	    // Remove html and php tags
	    $value = strip_tags($value);

	    // Converts special characters to HTML
	    $value = htmlspecialchars($value);

	    // Removes inaccessible characters
	    $value = preg_replace('/[^ a-zа-яё\d]/ui', '', $value);

	    return $value;
	}

	/**
	 * Clears array from special characters and html tags
	 *
	 * @param $array array
	 *
	 * @return array
	 */
	private function cleanArray($array){

		// Clear each array element
		foreach($array as $key => $value) {
			$array[$key] = $this->clean($value);
		}

		return $array;
	}

}










