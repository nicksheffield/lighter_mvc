<?php

class Page extends Controller{

	function view($id){

		# Load the page model
		Load::model('page_model');

		# instantiate the page model
		$page = new Page_model();

		# load the page
		$page->load($id);

		# put the pages name and content into the $data
		$data['name']    = $page->name;
		$data['content'] = $page->content;

		# load each view. Send the $data to the 'page' view
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