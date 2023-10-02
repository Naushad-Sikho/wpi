<?php
class Constitution_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}
	
	function insertRow($table, $data){
		$this->db->insert($table,$data);
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
        
        
        function getAllData($columns,$table){
		$this->db->select($columns);
		$this->db->from($table);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function getSpecificData($columns,$whr){
		$this->db->select($columns);
		$this->db->from("constitution");
		$this->db->where($whr);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function updateRow($table,$data,$whr){
		$this->db->where($whr);
		$this->db->update($table,$data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	
	
	function delete_data($table_name,$where){
		
		$this->db->delete($table_name,$where);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	
}

	
	
	
