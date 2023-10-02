<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Counter_model','counter');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		
		$columns = array("id","campus","students","teachers","class_room");
		$data['counter'] = $this->counter->getSpecificData($columns,"counter",["is_active"=>1]);
		$this->load->view('includes/header');
		$this->load->view('counter',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_counter(){	
		
		$data = $_POST;
		
		$add_response = $this->counter->insertRow("counter",$data);
		if($add_response >= 1){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	

// Getting counter data
function get_counter_data(){
	
	
	
	$id = $this->input->post('id');
	$columns = array("id","campus","students","teachers","class_room");
    $counter_data = $this->counter->getSpecificData($columns,"counter",["is_active"=>1,"id"=>$id]);
	echo json_encode($counter_data);
}

// Editing counter
function edit_counter(){
	
	
	
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	
	$add_response = $this->counter->updateRow("counter",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	
	
}
