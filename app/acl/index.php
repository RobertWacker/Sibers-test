<?php

// Configuring access to site pages
return [
	'all' => [
		'IndexAction',
		'ProfileAction',
	],
	'authorize' => [
		'UsersAction',
		'EditAction',
		'DeleteAction',
		'LogoutAction',
	],
	'guest' => [
		'IndexAction',
		'LoginAction',
	],
];