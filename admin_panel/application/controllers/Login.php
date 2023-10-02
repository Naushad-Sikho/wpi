<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model','login');
		
	}

	public function index()
	{
		$this->load->view('login');
	}
	
	function login_script(){
		
		 $login_email_id = $this->input->post('email_id');
		 $login_password = $this->input->post('password');
		 
		 
		 $result = $this->login->getSpecificData(['email_id' => $login_email_id, 'password' => $login_password]);
		 $row = count($result);
		 
		 if($row == 1){
			 
			  $admin_id =  $result[0]->id;
			 $admin_name =  $result[0]->name;
			 $admin_email = $result[0]->email_id;
			 $role = $result[0]->role;
			 $admin_password = $result[0]->password;
			 
			 $session_data = array('admin_id' => $admin_id,
									'admin_name' => $admin_name,
									'admin_email' => $admin_email,
									'role' => $role
									);
									
									
			 $this->session->set_userdata($session_data);	
			
			redirect('dashboard');
			 
			 
			 
		 }else{
			 
			 $this->session->set_flashdata('error','Invalid Details');
			 redirect('login');
		 }
		
		
	}
	
	function check_email(){
		
		$email_id = $this->input->post('forgot_email');
		
		$result = $this->login->getSpecificData(['email_id' => $email_id]);
		
		$count = count($result);
		
		if($count == 1){
			
			echo "1";
			
		}else{
			
			echo "0";
		}
		
		
		
	}
	
	
	function forgot_password(){
		
		 $email_id = $this->input->post('forgot_email');
		$new_password = $this->input->post('new_password');
		
		$update = $this->login->update_data(['email_id' =>$email_id],['password' => $new_password]);
		if($update){
			echo "1";
		}else{
			echo "0";
		}
		
	}
	
	
	function change_password() {
	    
	   $this->load->view('includes/header'); 
	   $this->load->view('change_password');
	   $this->load->view('includes/footer');
	    
	}
	
	
	function changePasswordScript() {
	    
	    $user_id =  $this->session->userdata('admin_id');
	    $new_password = $this->input->post('new_password');
	    $update = $this->login->update_data(['id' =>$user_id],['password' => $new_password]);
	    
	    if($update) {
	         $this->session->set_flashdata('success','Password Change SuccessFully ...');
	         redirect('login/change_password');
	    }else {
	        $this->session->set_flashdata('error','Password Not Change! Please Try Again'); 
	        redirect('login/change_password');
	    }
	    
	    
	}
	
	
	
	function logout(){
		
		
		$this->session->sess_destroy();;
		redirect('login');
	}
	
	
	
}

?>