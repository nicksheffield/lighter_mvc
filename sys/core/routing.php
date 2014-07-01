<?php

$controller = '';
$method     = '';
$params     = array();

foreach(Registry::$routes as $route => $newpath){
	$t_route = '/^'.str_replace(array(
		'/', ':num', ':any'
	),array(
		'\/', '\d{0,}', '[A-z0-9\-]{0,}'
	), $route).'$/';

	if(URL::string() == $route){

		$_GET['page'] = $newpath;

	}else if(preg_match($t_route, URL::string())){
		//echo $t_route.' - match<br>';


	}
}

$parts = URL::parts();

switch(count($parts)){
	case 0:
		$controller = Registry::$config['default_controller'];
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

	$c = new $controller();

	if($c){
		if(method_exists($c, $method)){
			call_user_func_array(array($c, $method), $params);
		}else{
			Load::error('404');
		}
	}else{
		Load::error('404');
	}
}else{
	Load::error('404');
}