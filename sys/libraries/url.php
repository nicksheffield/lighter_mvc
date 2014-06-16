<?php

/**
*	
*	URL manipulation class
*
*	@version 1
*	@author  Nick Sheffield
*
*/

class URL{

	/**
	*
	*	Redirect to a given url.
	*
	*	@param string $url The url to be redirected to
	*
	*/
	public static function redirect($url){
		header('location: '.$url);
		exit;
	}

	/**
	*
	*	Get an array of all the parts of the url, separated by the / character
	*
	*	@return array A list of each url part
	*
	*/
	public static function parts(){
		$parts = explode('/', $_GET['page']);

		foreach($parts as $key => $val){
			if($val == ''){
				unset($parts[$key]);
			}
		}

		return $parts;
	}

	/**
	*
	*	Get a specific part of the url
	*
	*	@uses self::parts()
	*
	*	@param  int $n The index of the url part to get
	*
	*	@return string The requested part of the url
	*
	*/
	public static function part($n){
		$parts = self::parts();

		return $parts[$n];
	}

}