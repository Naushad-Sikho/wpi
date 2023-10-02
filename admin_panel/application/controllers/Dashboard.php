<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('About_me_model','about');
		loggedin();
	}

	public function index()
	{
	    loggedin();
	    
		$this->load->view('includes/header');
		$this->load->view('dashboard');
		$this->load->view('includes/footer');
	}
	
	
	public function inquery() {
	    
    	    $column = ['id','name','email','mobile','course','message'];
    	    $result['inquerys'] =  $this->about->getAllData($column,'inquery'); 
    	    $this->load->view('includes/header');
    		$this->load->view('inquery',$result);
    		$this->load->view('includes/footer');
	    
	}
}
