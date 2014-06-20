<?php

$controller = '';
$method     = '';
$params     = array();

$parts = URL::parts();

switch(count($parts)){
	case 0:
		$controller = $registry->config['default_controller'];
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
			$registry->load->error('404');
		}
	}else{
		$registry->load->error('404');
	}
}else{
	$registry->load->error('404');
}