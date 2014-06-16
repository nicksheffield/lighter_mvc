<?php

require_once('database.php');

class Active_Record{

	protected $table;
	protected $primary_key;

	protected $singular = 'Record';

	protected $fields = array();
	protected $data = array();

	public $db;

	public function __CONSTRUCT($reg){
		# Set the database property to the db we supplied.
		$this->registry = $reg;
		if(!isset($reg->db)){
			echo 'No database loaded';
			exit;
		}
		$this->db = $reg->db;

		$this->fields = $this->db->get_fields($this->table);
		$this->data[$this->primary_key] = null;
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
			echo 'No '.$this->singular.' exists with the id of '.$id;
		}

		return $this;
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


	function __GET($var){
		if(isset($this->data[$var])){
			return $this->data[$var];
		}else if($var == 'id'){
			return $this->data[$this->primary_key];
		}
	}


	function __SET($var, $val){
		if(in_array($var, $this->fields)){
			return $this->data[$var] = $val;
		}
	}
}