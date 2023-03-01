<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends REST_Controller {

	public function __construct(){
		parent::__construct();
	}
	/* Get all Center fh api */
	public function center_fhs_get(){
		$centerFhs = $this->db->select('*')->from('center_fhs')->get()->result_array();
		$this->data['results'] = $centerFhs;
		$this->response($this->data);
	}
	/* Get all local fh api */
	public function local_fhs_get(){
		$localFhs = $this->db->select('*')->from('local_fhs')->get()->result_array();
		$this->data['results'] = $localFhs;
		$this->response($this->data);
	}
	/* Get Members  */
	public function members_get(){
		$members = $this->db->select('*')->from('members')->get()->result_array();
		$this->data['results'] = $members;
		$this->response($this->data);
	}
	/* Get prayer time */
	public function prayer_time_get(){
		$payerTime = $this->db->select('*')->from('prayer_time')->get()->result_array();
		$this->data['results'] = $payerTime;
		$this->response($this->data);
	}
	/* Get Languages time */
	public function languages_get(){
		$language = $this->db->select('*')->from('languages')->get()->result_array();
		$this->data['results'] = $language;
		$this->response($this->data);
	}
	
	/* Get List Header  Data */
	public function list_header_get(){
		$listHeaders = $this->db->select('*')->from('header_data')->get()->result_array();
		$this->data['results'] = $listHeaders;
		$this->response($this->data);
	}

	/* Get List Terms  Data */
	public function list_terms_get(){
		$listTerms = $this->db->select('*')->from('terms')->get()->result_array();
		$this->data['results'] = $listTerms;
		$this->response($this->data);
	}

	public function login_post(){
		$obj =  file_get_contents("php://input");
		$Val = json_decode($obj, true);
		//$Val = $this->input->post();
		if (empty($Val['username']) && empty($Val['password'])) {
			$response = array('statusCode' =>201, 'msg'=>'Please check the fields');
			echo json_encode($response);
		} else {
			$user = $this->db->select('*')->from('prayer_chain_users')->where('username', $Val['username'])->where('password', $this->hash($Val['password']))->get()->row();
			if (!empty($user)) {
				$response = array('statusCode' => 200, 'msg' => "Logged successfully", "data" =>$user);
				echo json_encode($response);
			} else {
				$response = array('statusCode' =>201, 'msg'=>'User no found');
				echo json_encode($response);
			}
		}
	}

	function hash($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}

}
