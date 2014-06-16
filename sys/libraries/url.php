<?php

class URL{

	public static function redirect($url){
		header('location: '.$url);
		exit;
	}

	public static function parts(){
		$parts = explode('/', $_GET['page']);

		foreach($parts as $key => $val){
			if($val == ''){
				unset($parts[$key]);
			}
		}

		return $parts;
	}

	public static function part($n){
		$parts = self::parts();

		return $parts[$n];
	}

}