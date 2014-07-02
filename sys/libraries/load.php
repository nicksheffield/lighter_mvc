<?php

class Load{

	public static function model($name){
		if(file_exists(APP_URL.'/models/'.$name.'.php')){
			require_once(SYS_URL.'/libraries/model.php');
			require_once(APP_URL.'/models/'.$name.'.php');
		}
	}

	public static function library($name){
		if(file_exists(APP_URL.'/libraries/'.$name.'.php')){
			require_once(APP_URL.'/libraries/'.$name.'.php');
		}
	}

	public static function view($page_name_xyz, $data = array()){
		if(file_exists(APP_URL.'/views/'.$page_name_xyz.'.php')){
			if(count($data)){
				extract($data);
			}
			include(APP_URL.'/views/'.$page_name_xyz.'.php');
		}
	}

	public static function error($name, $data = array()){
		if(file_exists(APP_URL.'/errors/'.$name.'.php')){
			if(count($data)){
				extract($data);
			}
			include(APP_URL.'/errors/'.$name.'.php');
		}
	}

}