<?php

class Controller{

	function __construct($reg){
		$this->registry = $reg;
	}

	function __GET($var){
		return $this->registry->$var;
	}

}