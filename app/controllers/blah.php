<?php

class Blah extends Controller{

	function index(){
		Load::view('header');
		Load::view('abcd');
		Load::view('footer');
	}

	function test(){
		echo 'This is the test method, in the blah controller';
	}

}