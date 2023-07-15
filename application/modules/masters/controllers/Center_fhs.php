<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Center_fhs extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Masters';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'All Center FaithHomes';
		//$this->data['centerfhs'] = $this->Centerfhs_m->order_by('id', 'desc')->get_all();
		$this->data['centerfhs'] = $this->db->select('c.*, COUNT(l.localName) as no_local')->from('center_fhs as c')->join('local_fhs as l', 'l.center_id = c.id', 'left')->group_by('l.center_id')->order_by('c.id', 'desc')->get()->result();
		$this->data['load_page'] = "masters/centers/center_fhs_list";
		$this->template->admintemplate($this->data);
	}
	public function create_new(){
		$this->data['page_title']	= 'New Center FaithHome';
		$this->data['form']			= 'masters/forms/new_center';
		$this->data['load_page']	= "masters/centers/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function edit($id){
		$this->data['page_title']	= 'Edit Center FaithHome';
		$this->data['centerfhs'] 	= $this->Centerfhs_m->get($id);
		$this->data['form']			= 'masters/forms/edit_center';
		$this->data['load_page']	= "masters/centers/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('centerName', 'Center Name', 'trim|required');
		$this->form_validation->set_rules('center_code', 'Country', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Center FaithHome';
            $this->data['form']			= 'masters/forms/new_center';
            $this->data['load_page']	= "masters/centers/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Centerfhs_m->array_from_post(array(
				'centerName',
				'center_code'
			));
			$this->Centerfhs_m->insert($data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('masters/center-fhs');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('centerName', 'Center Name', 'trim|required');
		$this->form_validation->set_rules('center_code', 'Country', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Center FaithHome';
            $this->data['centerfhs'] 	= $this->Centerfhs_m->get($id);
            $this->data['form']			= 'masters/forms/edit_center';
            $this->data['load_page']	= "masters/centers/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Centerfhs_m->array_from_post(array(
				'centerName',
				'center_code'
			));
			$this->Centerfhs_m->update($id, $data);
			$this->session->set_flashdata("success", "Data updated successfully");
			redirect('masters/center-fhs');
		}
	}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('center_fhs');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}  
	
}
