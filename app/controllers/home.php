<?php

class Home extends Controller{

	function index(){
		Load::view('header');
		Load::view('homepage');
		Load::view('footer');
	}

	function login(){
		Load::view('header');
		Load::view('login');
		Load::view('footer');
	}

	function page($id){
		Load::model('page_model');

		$page = new Page_model();

		$page->load($id);

		echo $page->content;
	}

	# This method is private to this controller.
	# It cannot be accessed by url
	function _private(){
		echo 'This is a private page';
	}

}