<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Banner_model','banner');
		loggedin();
		error_reporting(0);
	}
	public function index()
	{
		$columns = array("id","name","description","image","is_active");
		$data['banner'] = $this->banner->getSpecificData($columns,["is_active"=>1]);
		$this->load->view('includes/header');
		$this->load->view('banner',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_banner(){
		
		$data = $_POST;
		
		foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
				$response = $this->upload_image($key,"banner");
				$data[$key] = $response['file_name'];
			}
		}
		
		$add_response = $this->banner->insertRow("banner",$data);
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

// Getting banner data
function get_banner_data(){
	$id = $this->input->post('id');
	$columns = array("id","name","description","image");
    $banner_data = $this->banner->getSpecificData($columns,["is_active"=>1,"id"=>$id]);
	echo json_encode($banner_data);
}

// Editing banner
function edit_banner(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
			$response = $this->upload_image($key,"banner");
			$data[$key] = $response['file_name'];
		}
	}
		
	$add_response = $this->banner->updateRow("banner",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}	



// Delete Banner

function delete_banner(){
	
	 $id = $_POST['id'];
	 
	 $columns = array("image");
	 $banner_image = $this->banner->getSpecificData($columns,["is_active"=>1,"id"=>$id]); 
	 
	 
	 $delete_response = $this->banner->delete_data("banner",["id"=>$id]);
	 
	 if($delete_response >= 1){
		echo 1;
		unlink("assets/images/banner/".$banner_image[0]->image);
	}else{
		echo 0;
	}
	 
	 
}	
}
