<?php

namespace app\controllers;

use app\core\Controller;
use app\models\IndexModel;
use app\models\UserModel;
use app\models\AdminModel;
use app\core\View;

// The main controller is responsible for all pages of the site
class IndexController extends Controller {

    /**
   	 * The variable contains an instance of the class for display a list of users
   	 *
	 * @var object
	 */
	protected $index;

    /**
   	 * The variable contains an instance of the class for working with user table
   	 *
	 * @var object
	 */
	protected $user;

    /**
   	 * The variable contains a class instance for authorization.
   	 *
	 * @var object
	 */
	protected $admin;

    /**
	 * Creating an instance of a classes
	 *
	 * @param $route string - contains an action of controller for check ACL in parent class
     */
	public function __construct($route) {
		parent::__construct($route);

		// For displaying a list of users
		$this->index = new IndexModel();

		// For work with entries in the users table
		$this->user = new UserModel();

		// For authorization
		$this->admin = new AdminModel();
	}

    /**
	 * The main page of the site 
	 *
	 * @return boolen
     */
	public function indexAction() {

		// Main page rendering
		View::render('index/index', 'main');

		return true;
	}

    /**
	 * Authorization method for access to the site pages
	 *
	 * @return boolen
     */
	public function loginAction() {

		// Checking the availability of entered data in $_POST
		if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {
			
			// If the method returns true, then the authorization was successful, and we show the site pages.
			if($this->admin->login()) {

				// Redirect on users page
				View::redirect('./users');
			}

			// If authorization failed, we show login page
			else {

				// Error message
				$data = 'Wrong login or password';

				// Render of login page with error message
				View::render('index/login', 'main', $data);
			}
		}

		// If we doт't have data in $_POST for authorization we show the login page
		else {

			// Render of login page
			View::render('index/login', 'main');
		}

		return true;
	}

    /**
	 * Admin exit method 
	 *
	 * @return boolen
     */
	public function logoutAction(){

		// Delete the authorization data
		session_destroy();

		// Redirect on main page
		View::redirect('./');

		return true;
	}

    /**
	 * Method display user list or add new user
	 *
	 * @return boolen
     */
	public function usersAction() {

		// If page of user list is not entered
		$page = 1;

		// If the data from the form is sent, add the user to DB
		if (!empty($_POST)) {
			$this->user->create($_POST);
		}

		// Checking page of user list
		if (!empty($_GET['p'])) {

			$page = $_GET['p'];
		}

		// Get 10 results from users table
		$data = $this->index->getUsersList($page);

		// Rendering of users page
		View::render('index/users', 'main', $data);

		return true;
	}

    /**
	 * Profile page shows information about user
	 *
	 * @param $params array - contains user login to display profile
	 *
	 * @return boolen
     */
	public function profileAction($params) {

		// Get user information for viewing on page
		$data = $this->user->read($params[0]);

		// Rendering of profile page
		View::render('index/profile', 'main', $data);

		return true;
	}

    /**
	 * Method for editing user data
	 *
	 * @param $params array - contains user login to display profile
	 *
	 * @return boolen
     */
	public function editAction($params){

		// Checks the availability of data from the form and updates the user data
		if (!empty($_POST)) {
			$this->user->update($_POST);
		}

		// Get user information for viewing on page
		$data = $this->user->read($params[0]);

		// Rendering of editing user page
		View::render('index/edit', 'main', $data);

		return true;
	}

    /**
	 * AJAX action deletes user
	 *
	 * @return boolen
     */
	public function deleteAction() {

		$this->user->delete($_POST['id']);

		return true;
	}
}