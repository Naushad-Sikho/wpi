<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('History_model','history');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		$columns = array("id","name","description","history_date","is_active");
		$data['history'] = $this->history->getSpecificData($columns,["is_active"=>1]);
		$this->load->view('includes/header');
		$this->load->view('history',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_history(){
		
		$data = $_POST;		
		
		$add_response = $this->history->insertRow("history",$data);
		if($add_response >= 1){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
	

// Getting history data
function get_history_data(){
	$id = $this->input->post('id');
	$columns = array("id","name","description","history_date");
    $history_data = $this->history->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	echo json_encode($history_data);
}

// Editing history
function edit_history(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	
		
	$add_response = $this->history->updateRow("history",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	



// Delete history

function delete_history(){
	
	 $id = $_POST['id'];
	 
	 $delete_response = $this->history->delete_data("history",["id"=>$id]);
	 
	 if($delete_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
	 
	 
}	
}
