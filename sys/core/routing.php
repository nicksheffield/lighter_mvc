<?php

$controller = '';
$method     = '';
$params     = [];

$parts = URL::parts();

switch(count($parts)){
	case 0:
		$controller = $config['default_controller'];
		$method     = 'index';
		break;
	case 1:
		$controller = $parts[0];
		$method     = 'index';
		break;
	case 2:
		$controller = $parts[0];
		$method     = $parts[1];
		break;
	default:
		$controller = $parts[0];
		$method     = $parts[1];
		$params     = array_slice($parts, 2);
		break;
}

if(file_exists(APP_URL.'/controllers/'.$controller.'.php') && strpos($method, '_') !== 0){
	require_once APP_URL.'/controllers/'.$controller.'.php';

	$c = new $controller($registry);

	if($c){
		if(method_exists($c, $method)){
			call_user_func_array(array($c, $method), $params);
		}else{
			include(APP_URL.'/errors/404.php');
		}
	}else{
		include(APP_URL.'/errors/404.php');
	}
}else{
	include(APP_URL.'/errors/404.php');
}