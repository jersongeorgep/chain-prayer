<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Dashboard';
			isLogedUser();	
		}
	public function index($pages=NULL){
		//print_r($this->session->userdata());
		$this->data['page_title'] = "Dashboard";
		$this->data['totalMembers'] = $this->db->select('*')->from('members')->get()->num_rows();
		$this->data['totalFaithhomes'] = $this->db->select('*')->from('local_fhs')->get()->num_rows();
		$this->data['totalGroups'] = $this->db->select('*')->from('members')->group_by('group_no')->get()->num_rows();
		$this->data['totalCenters'] = $this->db->select('*')->from('center_fhs')->get()->num_rows();
		$this->data['load_page'] = "dashboard/new_dashboard";
		$this->template->admintemplate($this->data);
	}
	
	
	
	
}
