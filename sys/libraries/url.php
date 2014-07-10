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

	public static $path = '';
	public static $old  = '';

	/**
	*
	*	Redirect to a given url.
	*
	*	@param string $url The url to be redirected to
	*
	*/
	public static function redirect($url){
		header('location: '.Registry::$config['base_url'].$url);
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
		if(!self::$path){
			self::$path = str_replace(Registry::$config['base_url'], '', $_SERVER['REQUEST_URI']);
		}

		$parts = explode('/', self::$path);
		$return_parts = array();
		
		foreach($parts as $key => $val){
			if($val != ''){
				$return_parts[] = $val;
			}
		}

		return $return_parts;
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

	/**
	*
	*	Get the url in string form
	*
	*	@uses self::parts()
	*
	*	@return string The url
	*
	*/
	public static function string(){
		$parts = self::parts();
		$str = '';

		foreach($parts as $part){
			$str .= $part.'/';
		}

		return substr($str, 0, -1);
	}

	/**
	* @todo try this stuff
	*/
	public function save($url = false){
		$_SESSION['url']['old'] = $url ? $url : self::string();
	}

	public function restore(){
		self::redirect($_SESSION['url']['old']);
	}

}