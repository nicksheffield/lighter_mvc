<?php

class Page_model extends Model{

	protected $table = 'tb_pages';
	protected $primary_key = 'page_id';
	protected $singular = 'Page';


	public function load_by_name($name){
		$id = $this->db
			->select('page_id')
			->from('tb_pages')
			->where(array('title'=>$name))
			->get_field('page_id');

		$this->load($id);
	}

}