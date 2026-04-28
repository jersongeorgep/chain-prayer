<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Times extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Masters';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'All Times';
		$this->data['times'] = $this->Times_m->order_by('id', 'desc')->get_all();
		$this->data['load_page'] = "masters/times/times_list";
		$this->template->admintemplate($this->data);
	}
	public function create_new(){
		$this->data['page_title']	= 'New Time';
		$this->data['form']			= 'masters/forms/new_times';
		$this->data['load_page']	= "masters/times/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function edit($id){
		$this->data['page_title']	= 'Edit Time';
		$this->data['editTime'] 	= $this->Times_m->get($id);
		$this->data['form']			= 'masters/forms/edit_times';
		$this->data['load_page']	= "masters/times/entry_form";
		$this->template->admintemplate($this->data);
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('prayer_time', 'Times', 'trim|required');
		$this->form_validation->set_rules('allowed_member', 'Max Allowed', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Time';
			$this->data['form']			= 'masters/forms/new_times';
			$this->data['load_page']	= "masters/times/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Times_m->array_from_post(array(
				'prayer_time',
				'allowed_member'
			));
			$data['status'] = 1;
			$this->Times_m->insert($data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('masters/times');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('prayer_time', 'Times', 'trim|required');
		$this->form_validation->set_rules('allowed_member', 'Max Allowed', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Time';
			$this->data['editTime'] 	= $this->Times_m->get($id);
			$this->data['form']			= 'masters/forms/edit_times';
			$this->data['load_page']	= "masters/times/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Times_m->array_from_post(array(
				'prayer_time',
				'allowed_member'
			));
			$data['status'] = 1;
			$this->Times_m->update($id, $data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('masters/times');
		}
	}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('prayer_time');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}  
	
	/* Ajax requests */ 
	public function save_shade(){
		$this->form_validation->set_rules('shade', 'Shade', 'trim|required');		
		if($this->form_validation->run()) {
			$data = $this->input->post(NULL,true);			
			$param = array(
				'shade'	=> $data['shade'],
				'status' => 1
			);
			$param = $this -> security -> xss_clean($param);
			$resp = $this ->Shades_m-> insert($param);
			if(!empty($resp)) {
				$response=array('status' => 1, 'msg' => 'Added successfully!');
				echo json_encode($response);
				exit;
			} else {
				$response=array('status' => 0, 'msg' => 'Something went wrong!');
				echo json_encode($response);
				exit;
			}	
		} else {
			$response=array('status' => 0, 'msg' => validation_errors());
			echo json_encode($response);
			exit;
		}
	}
	
	
}
