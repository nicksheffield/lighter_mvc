<?php

# If no specific page was requested...
if(!isset($_GET['page'])){
	# Then we use the default one
	$page = $config['default_controller'];
}else{
	# If a page was requested, then we have it.
	$page = $_GET['page'];
}


if(isset($routes[$page])){
	$page = $routes[$page];
}

# Figure out what is controller, what is method, and what is param from the url
$segments = explode('/', $page);

# the first segment is always the controller
$controller = $segments[0];

# If a second segment exists, it's going to be the method
if(count($segments)>1){
	$method = $segments[1];
}else{
	$method = 'index';
}

# any further segments are params
$params = array();

if(count($segments)>2){
	# start the for loop at 2. clever.
	for($i=2; $i<count($segments); $i++){
		$params[] = $segments[$i];
	}
}





# Check if the page exists
if(file_exists('../app/controllers/'.$controller.'.php')){
	require_once('../app/controllers/'.$controller.'.php');

	$loaded_controller = new $controller($registry);

	call_user_func_array(array($loaded_controller, $method), $params);
}else{
	include('../app/errors/404.php');
}

// echo 'controller: '.$controller.'<br>';
// echo 'method: '.$method.'<br>';
// echo 'params: '; print_r($params);