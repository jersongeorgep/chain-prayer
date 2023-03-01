<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Userroles_m extends MY_Model {
	function __construct()
		{
			parent::__construct();
			//echo "<p>". $this->hash('General2019'). "</P>";
			
		}
		
	public $_table = 'jeah_usersrole';
	public $primary_key = 'id' ;
	public $before_create = array( 'timestamps' );
		
	protected function	timestamps($val){
		$val['created_at'] = $val['updated_at'] = date('Y-m-d H:i:s');
		return $val; 
	} 
	
	public function hash($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}
}
?>