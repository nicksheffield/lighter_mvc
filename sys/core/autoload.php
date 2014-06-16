<?php

# loading for libs
if(isset($config['autoload']['libs'])){

	foreach($config['autoload']['libs'] as $lib){

		# first, make sure the library exists
		if(file_exists(SYS_URL.'/libraries/'.$lib.'.php')){

			# then include it
			include_once(SYS_URL.'/libraries/'.$lib.'.php');

		}else if(file_exists(APP_URL.'/libraries/'.$lib.'.php')){

			# then include it
			include_once(APP_URL.'/libraries/'.$lib.'.php');
		}
	}
}


# loading for models
if(isset($config['autoload']['models'])){

	foreach($config['autoload']['models'] as $model){

		# first, make sure the model exists
		if(file_exists(APP_URL.'/models/'.$model.'.php')){

			# then include it
			include_once(APP_URL.'/models/'.$model.'.php');

			$registry->$model = new $model($registry);
		}
	}
}


# loading for system classes that definitely need to be loaded into the registry
require_once(SYS_URL.'/libraries/loader.php');

$registry->load = new Loader($registry);