<?php

/**
*
*	@todo Proper documentation
*
*/

$config['default_controller']  = 'home';
$config['base_url']            = '/mvc/public/';

$config['autoload']['libs']    = array('url', 'form');
$config['autoload']['models']  = array('page');

$config['db']['hostname']      = 'localhost';
$config['db']['username']      = 'root';
$config['db']['password']      = '';
$config['db']['database']      = 'cms';