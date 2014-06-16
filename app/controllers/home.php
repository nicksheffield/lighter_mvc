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

}