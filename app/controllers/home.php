<?php

class Home extends Controller{

	function index(){
		Load::view('welcome');
	}

}