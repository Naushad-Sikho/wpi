<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('achievement_model','achievement');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		$columns = array("id","name","image","is_active");
		$data['achievement'] = $this->achievement->getSpecificData($columns,["is_active"=>1]);
		$this->load->view('includes/header');
		$this->load->view('achievement',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_achievement(){
		
		$data = $_POST;
		
		foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
				$response = $this->upload_image($key,"achievement");
				$data[$key] = $response['file_name'];
			}
		}
		
		$add_response = $this->achievement->insertRow("achievement",$data);
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

// Getting achievement data
function get_achievement_data(){
	$id = $this->input->post('id');
	$columns = array("id","name","image");
    $achievement_data = $this->achievement->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	echo json_encode($achievement_data);
}

// Editing achievement
function edit_achievement(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
			$response = $this->upload_image($key,"achievement");
			$data[$key] = $response['file_name'];
		}
	}
		
	$add_response = $this->achievement->updateRow("achievement",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	



// Delete achievement

function delete_achievement(){
	
	 $id = $_POST['id'];
	 
	 $columns = array("image");
	 $achievement_image = $this->achievement->getSpecificData($columns,["is_active"=>1,"id"=>$id]); 
	 
	 
	 $delete_response = $this->achievement->delete_data("achievement",["id"=>$id]);
	 
	 if($delete_response >= 1){
		echo 1;
		unlink("assets/images/achievement/".$achievement_image[0]->image);
	}else{
		echo 0;
	}
	 
	 
}	
}
