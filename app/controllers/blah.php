<?php

class Blah extends Controller{

	public function index(){
		$this->load->view('header');
		$this->load->view('abcd');
		$this->load->view('footer');
	}

	public function test(){
		echo 'This is the test method, in the blah controller';
	}

}