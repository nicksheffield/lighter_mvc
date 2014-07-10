<?php

class Error{
	
	private static $data = array();

	public static function get($var){

		# Check if the var is in the $data, if so return that
		if(isset(self::$data[$var])){
			return self::$data[$var];

			# If not found at all, return false
		}else{
			return false;
		}
	}

	public static function set($var, $val){
		self::$data[$var] = $val;
	}

}