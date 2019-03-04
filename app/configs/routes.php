<?php

// Settings for routing (regular URI  => controller/action)
return array(

	// Main page
	'' => 'index/index',

	// Login page
	'login' => 'index/login',

	// Logout page
	'logout' => 'index/logout',

	// List of users with sorting by (id, name, etc.) and pagination
	'users([\?][=&A-Za-z0-9]+)' => 'index/users',

	// List of users
	'users' => 'index/users',

	// Users profile
	'profile/([A-Za-z0-9]+)' => 'index/profile/$1',

	// Delete user profile
	'edit/([A-Za-z0-9]+)' => 'index/edit/$1',

	// Remove user
	'delete' => 'index/delete',
);