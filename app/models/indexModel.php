<?php

namespace app\models;

use app\core\Model;

// The model is designed to display a list of users.
class indexModel extends Model {

	/**
	 * How many lines on the page
	 *
	 * @var integer
	 */
	private $rowsOnPage = 10;

	/**
	 * Get a list of users
	 *
	 * @param $startPage integer
	 *
	 * @return array
	 */
	public function getUsersList($startPage) {

		// Preparing a request
		$query = 'SELECT * FROM users';

		// Add sorting in request
		if (isset($_GET['s'])) {
			$query .= ' ORDER BY '.$_GET['s'];
		}

		// Left and right interval for limit
		$firstRow = ($startPage - 1) * $this->rowsOnPage;
		$lastRow = $firstRow + $this->rowsOnPage;

		// Add interval in sql
		$query .= ' limit '.$firstRow.',10';

		// Execute request
		$result = $this->db->query($query);

		$i = 0;

		// Parsing results
		while ($row = $result -> fetch ()) {
			$data['rows'][$i] = $row;

			$i++;
		}

		// Get number of pages
		$data['pages'] = $this->getNumPages();

		return $data;
	}

	/**
	 * Find out the number of pages
	 *
	 * @return integer
	 */
	private function getNumPages(){

		// Prepare a query for the number of rows
		$query = 'SELECT count(`id`) FROM `users`';

		// Execute query and get the number of rows
		$numRows = $this->db->column($query);

		// Know the number of pages
		$pages = $numRows / $this->rowsOnPage;

		// Round the number of pages and we get the value of the last page
		$data = ceil($pages);

		return $data;
	}

}