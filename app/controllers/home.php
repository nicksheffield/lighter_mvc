<?php

class Home extends Controller{

	public function index(){
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

}