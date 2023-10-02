<?php
class Login_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}
	
	
	function getSpecificData($whr){
		$this->db->select('*');
		$this->db->from("admin");
		$this->db->where($whr);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function update_data($whr,$data){
		
		$this->db->where($whr);
		$this->db->update("admin",$data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
		
	}
	
	
}