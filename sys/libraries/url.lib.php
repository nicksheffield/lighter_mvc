<?php

class URL{

	public static function redirect($url){
		header('location: '.$url);
		exit;
	}

	public static function segments(){
		$parts = explode($_GET['p']);

		foreach($parts as $key => $val){
			if($val == ''){
				unset($parts[$key]);
			}
		}

		return $parts;
	}

	public static function segment($n){
		$segments = self::segments();

		return $segments[$n];
	}

}