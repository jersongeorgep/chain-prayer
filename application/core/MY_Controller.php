<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class MY_Controller extends MX_Controller { 
	public $data = array();	 
	function __construct() 
		{ 
			parent::__construct(); 
			$this->lang->load('Admin','english'); 
			$this->data['app_name'] = config_item('app_name'); 
			$this->data['copyright'] = config_item('company'); 
			 
			$config = Array( 
				'protocol' => 'sendmail', 
				'mailpath'	=> '/usr/sbin/sendmail', 
				'mailtype' => 'html', 
				'charset' => 'iso-8859-1', 
				'wordwrap' => TRUE, 
				'newline' => "\r\n" 
				 );  
			$this->email->initialize($config); 
			 
		} 
	 
	 
}