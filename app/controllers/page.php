<?php

class Page extends Controller{

	public function view($id){

		$this->load->model('page_model');

		$this->page_model->load($id);

		$data['title'] = $this->page_model->title;
		$data['content'] = $this->page_model->content;

		$this->load->view('header');
		$this->load->view('page', $data);
		$this->load->view('footer');
	}

}