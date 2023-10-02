<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Gallery_model','gallery');
		$this->load->model('Event_model','event');
		loggedin();
		error_reporting(0);
	}

	public function index()
	{
		
		
		$data['events'] = $this->event->getSpecificData(["id","name"],["is_active"=>1]);
		$data['gallery'] = $this->gallery->getSpecificDataWithJoin();
		$this->load->view('includes/header');
		$this->load->view('gallery',$data);
		$this->load->view('includes/footer');
		
	}
	
	function add_gallery(){
		
		$data = $_POST;
		$files = $_FILES["image"]["name"];
		
		$i=0;
		
		foreach($files as $file){
			
		$response = $this->upload_image("image",$i,"gallery");
			
		$insert_data = array(
			"event"=>$data['event'],
			"image"=>$response["file_name"],
		);	
		
		$add_response = $this->gallery->insertRow("gallery",$insert_data);	
		$i++;
		
		}
				
		if($add_response >= 1){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
	function upload_image($key,$i,$folder_name){
		
		$name = $_FILES[$key]['name'][$i];
		$size = $_FILES[$key]['size'][$i];
		$file_tmp = $_FILES[$key]['tmp_name'][$i];
		$type = $_FILES[$key]['type'][$i];
	
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
	
		function edit_upload_image($key,$folder_name){
		
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
	
// Getting gallery data
function get_gallery_data(){
	$id = $this->input->post('id');
	$columns = array("id","event","image");
    $gallery_data = $this->gallery->getSpecificData($columns,"gallery",["is_active"=>1,"id"=>$id]);
	echo json_encode($gallery_data);
}

// Editing gallery
function edit_gallery(){
	$data = $_POST;
	$id = $data["hidden_id"];
	unset($data["hidden_id"]);	
	foreach($_FILES as $key => $value){
			if(!empty($_FILES[$key]["name"]) && $_FILES[$key]["name"] !=""){
			$response = $this->edit_upload_image($key,"gallery");
			$data[$key] = $response['file_name'];
		}
	}
		
	$add_response = $this->gallery->updateRow("gallery",$data,["id"=>$id]);
	if($add_response >= 1){
		echo 1;
	}else{
		echo 0;
	}
}


// Delete gallery

function delete_gallery(){
	
	
	$id = $this->input->post('id');
	 
	 $columns = array("image");
	 $banner_image = $this->gallery->getSpecificData($columns,"gallery",["is_active"=>1,"id"=>$id]); 
	 
 	
	 $delete_response = $this->gallery->delete_data("gallery",["id"=>$id]);
	 
	 if($delete_response >= 1){
		unlink("assets/images/gallery/".$banner_image[0]->image);
		echo 1;
	}else{
		echo 0;
	}
	 
	 
}	

	
}
