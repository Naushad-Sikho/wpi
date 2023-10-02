<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Notice_model','notice');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		$columns = array("id","notice","is_active");
		$data['notice'] = $this->notice->getSpecificData($columns,["is_active"=>1]);
                
                $this->load->view('includes/header');
		$this->load->view('notice',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_notice(){
		
		$data = $_POST;
		
		$add_response = $this->notice->insertRow("notice",$data);
		if($add_response >= 1){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
	

// Getting notice data
function get_notice_data(){
	$id = $this->input->post('id');
	$columns = array("id","notice");
    $notice_data = $this->notice->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	echo json_encode($notice_data);
}

// Editing notice
function edit_notice(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
		
	$add_response = $this->notice->updateRow("notice",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	


// Delete notice

function delete_notice(){
	
	 $id = $_POST['id'];
	 
	 $delete_response = $this->notice->delete_data("notice",["id"=>$id]);
	 
	 if($delete_response >= 1){
		 echo 1;
	}else{
		echo 0;
	}
	 
	 
}	

	
}
