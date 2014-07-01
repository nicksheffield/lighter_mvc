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
*	Wildcards are also possible.
*
*	For example, if you want to edit a user, you might have a controller already called "admin",
*	with a method inside that called "edit_user", but want to url of that page to look like
*	http://website.com/edit/user/9
*
*	Even if you don't have an "edit" controller, with a "user" function, you can still simulate that
*	by creating a route like:
*
*	$routes['edit/user/:num'] = 'admin/edit_user/:num';
*
*	:num can be replaced by any digit
*	:any can be replaced by any alphanumeric character (a-z, A-Z, 0-9), or hyphen (-) and percent (%)
*
*/

$routes['login']     = 'home/login';
$routes['wtf']       = 'blah';
$routes['page/:num'] = 'page/view/:num';
$routes['page/:any'] = 'page/view_by_name/:any';
$routes['user/:any'] = 'user/:any';