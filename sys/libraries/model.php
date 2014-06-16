<?php

require_once('../sys/libraries/active_record.php');

class Model extends Active_Record{
	function __GET($var){
		return $this->registry->$var;
	}
}