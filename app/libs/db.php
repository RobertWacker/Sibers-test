<?php

namespace app\libs;

use PDO;

class Db {

	/**
	 * Instance class PDO
	 *
     * @var object
     */
	protected $db;
	
	/**
	 * Connects to the database and writes to the variable.
	 */
	public function __construct() {

		// Get mySQL settings
		$config = require CONFIG.'db.php';

		// Connect to DB through PDO
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'].'', $config['user'], $config['password']);
	}
	
	/**
	 * Database query method
	 * 
	 * @param $sql string - contains SQL query
	 * @param $params array - contains variables for sql
	 *
	 * @return array - results of query
	 */
	public function query($sql, $params = []) {

		// Prepare the request
		$stmt = $this->db->prepare($sql);

		// Add variables in sql query
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}

		// execute query
		$stmt->execute();

		return $stmt;
	}
	
    /**
	 * Database column query method
	 * 
	 * @param $sql string - contains SQL query
	 * @param $params array - contains variables for sql
	 *
	 * @return array - results of query
	 */
	public function column($sql, $params = []) {

		// Prepare the request
		$result = $this->query($sql, $params);
		
		return $result->fetchColumn();
	}
}
