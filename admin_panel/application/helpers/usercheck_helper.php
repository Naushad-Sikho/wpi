<?php 

	function loggedin(){
    $ci=& get_instance();
    
	$admin_id = $ci->session->userdata('admin_id');
	
	if(empty($admin_id)){
		redirect('login');
	}else{
		
	}

    
}
	
	
?>