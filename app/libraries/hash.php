<?php

/**
*	
*	Password hashing class
*
*	@version 1.1
*	@author  Nick Sheffield
*
*/

class Hash{

	/**
	*
	*	Encrypt a given string with a salt.
	*
	*	@param  string $str  The string to be hashed
	*	@param  string $salt The salt to be used in the hash
	*
	*	@return string The hash based on the string and salt
	*
	*/
	public static function encrypt($str, $salt){
		return hash('sha256', $salt.$str);
	}

	/**
	*
	*	Generate a unique salt.
	*
	*	@return string The salt
	*
	*/
	public static function salt(){
		return hash('sha256', time());
	}

	/**
	*
	*	Create a password.
	*
	*	@uses self::salt() and self::encrypt()
	*
	*	@param  string $password  The password to be hashed
	*
	*	@return string The hash based on the string and salt
	*
	*/
	public static function make_password($password){
		return self::encrypt($password, self::salt());
	}

}