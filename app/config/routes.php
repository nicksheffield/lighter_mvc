<?php

/**
*	
*	Routes are like shortcuts.
*
*	Example:
*
*	$routes['login'] = 'home/login';
*
*	This means if a user tries to access yourwebsite.com/login 
*	it will load the home controller and then run the login method
*
*	@todo wildcards
*
*/

$routes['login']   = 'home/login';
$routes['wtf']     = 'blah';
$routes['page/:id'] = 'page/view/:id';