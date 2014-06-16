<?php

class Home extends Controller{

	function index(){
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
	}

	function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	# This method is private to this controller.
	# It cannot be accessed by url
	function _private(){
		echo 'This is a private page';
	}

}