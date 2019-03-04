<?php

namespace app\core;

use app\libs\Db;

// Parental model contains DB connectiong methods
class Model {

	/**
   	 * Contains instance DB class
   	 *
	 * @var object
	 */
	public $db;

    /**
	 * Create instance of class DB
	 *
	 * @return object
     */
	public function __construct() {
		
		$this->db = new Db;
	}
}