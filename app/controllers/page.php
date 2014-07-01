<?php

class Page extends Controller{

	function view($id){

		Load::model('page_model');

		$page = new Page_model();

		$page->load($id);

		$data['name']    = $page->name;
		$data['content'] = $page->content;

		Load::view('header');
		Load::view('page', $data);
		Load::view('footer');
	}

	function view_by_name($name){

		Load::model('page_model');

		$page = new Page_model();

		$page->load_by_name($name);

		$data['name']    = $page->name;
		$data['content'] = $page->content;

		Load::view('header');
		Load::view('page', $data);
		Load::view('footer');

	}

}