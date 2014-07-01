<?php

$controller = '';
$method     = '';
$params     = array();

# intercept the route process by checking if we should be using a custom route instead

foreach(Registry::$routes as $route => $newpath){
	$t_route = '/^'.str_replace(array('/',':num',':any'), array('\/','\d{0,}','[A-z0-9\-\%\s]{0,}'), $route).'$/';

	if(URL::string() == $route){

		URL::$path = $newpath;
		break;

	}else if(preg_match($t_route, URL::string())){

		# Create a format string for vsprintf to use later from the newpath (where we want to technically redirect to)
		$f_route = str_replace(array(':num', ':any'), array('%d', '%s'), $newpath);

		$route_parts = explode('/', $route);
		$url_parts = URL::parts();

		# find which indexes from the route are wildcards
		$wildcards = array();

		for($i=0; $i<count($route_parts); $i++){
			if(substr($route_parts[$i], 0, 1) == ':'){
				array_push($wildcards, $url_parts[$i]);
			}
		}

		URL::$path = vsprintf($f_route, $wildcards);
	}
}

# resume the normal route process of deciding what is the controller, method, and params

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