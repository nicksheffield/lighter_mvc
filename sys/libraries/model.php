<?php

require_once('database.php');

class Model{

	protected $table;
	protected $primary_key = 'id';

	protected $singular = 'Record';

	protected $fields = array();
	protected $data = array();

	public $db;

	public function __construct(){
		$this->db = Registry::$db;

		$this->fields = $this->db->get_columns($this->table);
	}


	public function load($id){

		$result = $this->db
			->select('*')
			->from($this->table)
			->where($this->primary_key.'='.$id)
			->get_one();

		if(isset($result[$this->primary_key])){
			foreach($result as $field => $value){
				$this->data[$field] = $value;
			}
			// todo: foreign key relations
		}else{
			echo 'No '.$this->singular.' exists with the '.$this->primary_key.' of '.$id;
		}

		return $this;
	}

	public function fill($data){
		$this->data = array_merge($this->data, $data);
	}

	public function unload(){
		$this->data = array($primary_key => null);
	}

	function save(){
		if(!isset($this->data[$this->primary_key])){
			$this->db->insert($this->table, $this->data);

			$this->id = $this->db->last_insert_id;
		}else{
			$this->update();
		}

		return $this;
	}



	function update(){
		$this->db->update($this->table, $this->primary_key.'='.$this->id, $this->data);
		return $this;
	}

	function delete(){
		$this->db->delete($this->table, $this->primary_key.'='.$this->id);
		return $this;
	}


	function __get($var){
		if(isset($this->data[$var])){
			return $this->data[$var];
		}else if($var == 'id'){
			return $this->data[$this->primary_key];
		}
	}


	function __set($var, $val){
		if(in_array($var, $this->fields)){
			return $this->data[$var] = $val;
		}
	}
}