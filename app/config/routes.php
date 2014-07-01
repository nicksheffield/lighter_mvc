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

$routes['login']    = 'home/login';
$routes['wtf']      = 'blah';
$routes['page/:num'] = 'page/view/:num';
$routes['page/:any'] = 'page/view_by_name/:any';
$routes['user/:any'] = 'user/:any';