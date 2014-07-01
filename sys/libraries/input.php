<?php

class Input{

	public static $data = array();

	public static function get($key){
		if(isset(self::$data[$key])){
			return self::$data[$key];
		}else{
			return false;
		}
	}

	public static function set($key, $val){
		self::$data[$key] = $val;
	}

}