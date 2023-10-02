<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Team_model','team');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		$columns = array("id","name","designation","image","is_active");
		$data['team'] = $this->team->getSpecificData($columns,["is_active"=>1]);
		$this->load->view('includes/header');
		$this->load->view('team',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_team(){
		
		$data = $_POST;
		
		foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
				$response = $this->upload_image($key,"team");
				$data[$key] = $response['file_name'];
				//echo "<pre>";print_r($response);die;
			}
		}
		//echo "<pre>";print_r($data);die;
		$add_response = $this->team->insertRow("team",$data);
		if($add_response >= 1){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
	function upload_image($key,$folder_name){
		
		$name = $_FILES[$key]['name'];
		$size = $_FILES[$key]['size'];
		$file_tmp = $_FILES[$key]['tmp_name'];
		$type = $_FILES[$key]['type'];
		
		$name_array = explode('.',$name);
		$file_ext=strtolower($name_array[1]);
		$new_name = str_replace(" ","_",$name_array[0]).date("his").rand().".".$file_ext;
		

		$extensions= array("jpeg","jpg","png");
		
		if(in_array($file_ext,$extensions)== false){
         $errors['error']="extension not allowed, please choose a JPEG or PNG file.";
		}
      
      if($size > 2097152){
         $errors['error']='File size must be excately 2 MB';
		}
		
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"assets/images/".$folder_name."/".$new_name);
			$errors['error']=1;
			$errors['file_name']=$new_name;
		 }else{
			$errors['error']=0;
			$errors['file_name']=""; 
		 }
		 
		 return $errors;
	}

// Getting team data
function get_team_data(){
	$id = $this->input->post('id');
	$columns = array("id","name","designation","image");
    $team_data = $this->team->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	echo json_encode($team_data);
}

// Editing team
function edit_team(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
			$response = $this->upload_image($key,"team");
			$data[$key] = $response['file_name'];
		}
	}
		
	$add_response = $this->team->updateRow("team",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	


// Delete team

function delete_team(){
	
	 $id = $_POST['id'];
	 
	 $columns = array("image");
	 $banner_image = $this->team->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	 
	 $delete_response = $this->team->delete_data("team",["id"=>$id]);
	 
	 if($delete_response >= 1){
		 unlink("assets/images/team/".$banner_image[0]->image);
		echo 1;
	}else{
		echo 0;
	}
	 
	 
}	

	
}
