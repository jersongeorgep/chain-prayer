<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Template extends Admin_Controller {
	function __construct(){
			parent::__construct();
			
		}
	public function logintemplate($data){
		$this->load->view('login_template',$data);
	}
	
	public function admintemplate($data){
		$this->load->view('admin_template',$data);
	}
	
	public function hometemplate($data){
		$this->load->view('home_template',$data);
	}
	
}
