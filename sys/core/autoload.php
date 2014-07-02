<?php

# loading for libs
if(isset($config['autoload']['libs'])){

	foreach($config['autoload']['libs'] as $lib){

		# first, make sure the library exists
		if(file_exists(APP_URL.'/libraries/'.$lib.'.php')){

			# then require it
			require_once(APP_URL.'/libraries/'.$lib.'.php');
		}
	}
}


# loading for models
if(isset($config['autoload']['models'])){

	foreach($config['autoload']['models'] as $model){

		# first, make sure the model exists
		if(file_exists(APP_URL.'/models/'.$model.'.php')){
			# Load the base Model class
			require_once(SYS_URL.'/libraries/model.php');

			# then require it
			require_once(APP_URL.'/models/'.$model.'.php');
		}
	}
}