<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_m extends MY_Model {
	function __construct()
		{
			parent::__construct();
			//echo $this->hash("wonderful@123");
		}
		
	public $_table = 'prayer_chain_users';
	public $primary_key = 'id' ;
	public $before_create = array( 'timestamps' );
		
	protected function	timestamps($val){
		$val['created_at'] = $val['updated_at'] = date('Y-m-d H:i:s');
		return $val; 
	} 
	
	public function authorize_user(){
		$user = $this->get_many_by(array('username'=>$this->input->post('username'), 'password'=>$this->hash($this->input->post('password'))),TRUE);
		//$pass = $this->get_many_by(array('auth_pass'=>$this->hash($this->input->post('auth_email'))));
		if(count($user)){
			if($this->input->post('passremember')==1){
				$this->load->helper('cookie');
				$cookie = array(
				'name'		=> 'name',
				'value'		=> $this->input->post('username'),
				'expaire'	=> 86500,
				'domain'	=> site_url(),
				'path'		=> '/',
				'prefix'	=> 'CQUP_',
				'secure'	=> TRUE
				);
				$cookie1 = array(
				'name'		=> 'auth_pass',
				'value'		=> $this->hash($this->input->post('password')),
				'expaire'	=> 86500,
				'domain'	=> site_url(),
				'path'		=> '/',
				'prefix'	=> 'CQUP_',
				'secure'	=> TRUE
				);
				$this->input->set_cookie('$cookie');
				$this->input->set_cookie('$cookie1');
			}
			
			$this->data = array(
				'user_id'=> $user[0]->id,
				'username' => $user[0]->username,
				'userEmail' => $user[0]->email,
				'designation' => $user[0]->designation,
				'loggedin' => TRUE
			);
			$this->session->set_userdata($this->data);
			return TRUE;
		}
	}
	
	public function logout(){
		$activity = 'Logout';
		$logdata = getsingledata('Auth_m', 'name', $this->session->userdata('user_id')). " logout at ". date('d F Y  H:i a');
		//logoreport($activity, $logdata);
		$this->session->sess_destroy();
	}
	
	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}
	
	public function hash($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}
	
}
?>