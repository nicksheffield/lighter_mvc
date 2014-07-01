<?php

class Controller{

	function __GET($var){
		return $this->registry->$var;
	}

}