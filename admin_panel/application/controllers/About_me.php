<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_me extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('About_me_model','about_me');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		
		$columns = array("id","name","description","vission","mission","image","is_active");
		
		$data['about_me'] = $this->about_me->getAllData($columns,"about_me");
		$this->load->view('includes/header');
		$this->load->view('about_me',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_about_me(){
		
		
		$data = $_POST;
		
		foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
				$response = $this->upload_image($key,"about_me");
				$data[$key] = $response['file_name'];
			}
		}
		
		$add_response = $this->about_me->insertRow("about_me",$data);
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

// Getting about_me data
function get_about_me_data(){
	
	
	
	$id = $this->input->post('id');
	$columns = array("id","name","image","description","vission","mission");
    $about_me_data = $this->about_me->getSpecificData($columns,["id"=>$id]);
	echo json_encode($about_me_data);
}

// Editing about_me
function edit_about_me(){
	
	
	
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
			$response = $this->upload_image($key,"about_me");
			$data[$key] = $response['file_name'];
		}
	}
		
	$add_response = $this->about_me->updateRow("about_me",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	

function active_enactive(){
	
	
	
$is_active = $this->input->post("is_active");
$id = $this->input->post("id");
$response = $this->about_me->updateRow("about_me",["is_active"=>$is_active],["id"=>$id]);
}

	
}
