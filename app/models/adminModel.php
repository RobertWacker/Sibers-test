<?php

namespace app\models;

use app\core\Model;


class AdminModel extends Model {

	/**
	 * Admin authorization method
	 *
	 * @return boolen
	 */
	public function login() {

		// Get login and password of admin account
		$config = require 'app/configs/admin.php';

		// Checking login and pass
		if ($config['login'] == $_POST['login'] && $config['password'] == $_POST['password']) {

			// Write login and pass in session
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];

			return true;
		}

		return false;
	}

}