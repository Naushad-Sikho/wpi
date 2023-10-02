<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Video_model','video');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		$columns = array("id","video_link","is_active");
		$data['videos'] = $this->video->getSpecificData($columns,["is_active"=>1]);
		$this->load->view('includes/header');
		$this->load->view('video',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_video(){
		
		$data = $_POST;
		
		$add_response = $this->video->insertRow("video",$data);
		if($add_response >= 1){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
	

// Getting video data
function get_video_data(){
	$id = $this->input->post('id');
	$columns = array("id","video_link");
    $video_data = $this->video->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	echo json_encode($video_data);
}

// Editing video
function edit_video(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
		
	$add_response = $this->video->updateRow("video",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	


// Delete video

function delete_video(){
	
	 $id = $_POST['id'];
	 
	 $delete_response = $this->video->delete_data("video",["id"=>$id]);
	 
	 if($delete_response >= 1){
		 echo 1;
	}else{
		echo 0;
	}
	 
	 
}	

	
}
