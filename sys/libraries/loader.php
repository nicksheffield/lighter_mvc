<?php

class Loader{

	public function __construct($reg){
		$this->registry = $reg;
	}

	public function model($name){
		if(file_exists('../app/models/'.$name.'.php')){
			require_once('../app/models/'.$name.'.php');
			$this->registry->$name = new $name($this->registry);

			return $this->registry->$name;
		}
	}

	public function view($name, $data = array()){
		if(file_exists('../app/views/'.$name.'.php')){
			if(count($data)){
				extract($data);
			}
			include('../app/views/'.$name.'.php');
		}
	}

	public function error($name, $data = array()){
		if(file_exists('../app/errors/'.$name.'.php')){
			if(count($data)){
				extract($data);
			}
			include('../app/errors/'.$name.'.php');
		}
	}

}