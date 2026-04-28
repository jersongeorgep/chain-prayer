<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Headers_data extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Masters';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'All Headers';
		$this->data['headers'] = $this->db->select('h.*,l.language')->from('header_data as h')->join('languages as l', 'l.id = h.lang_id', 'left')->order_by('h. id', 'desc')->get()->result();
		$this->data['load_page'] = "masters/headers/headers_list";
		$this->template->admintemplate($this->data);
	}
	public function create_new(){
		$this->data['page_title']	= 'New Header';
		$this->data['language'] 	= $this->Languages_m->get_all();
		$this->data['form']			= 'masters/forms/new_headers';
		$this->data['load_page']	= "masters/terms/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function edit($id){
		$this->data['page_title']	= 'Edit Header';
		$this->data['headers'] 		= $this->Headers_m->get($id);
		$this->data['language'] 	= $this->Languages_m->get_all();
		$this->data['form']			= 'masters/forms/edit_headers';
		$this->data['load_page']	= "masters/terms/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('lang_id', 'Language', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('details', 'Detail', 'trim|required');
		$this->form_validation->set_rules('verses', 'Verses', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Header';
			$this->data['language'] 	= $this->Languages_m->get_all();
			$this->data['form']			= 'masters/forms/new_headers';
			$this->data['load_page']	= "masters/terms/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Headers_m->array_from_post(array(
				'lang_id',
				'praise',
				'title',
				'details',
				'verses'
			));
			$data['status'] = 1;
			$check = $this->Headers_m->get_by('lang_id', $data['lang_id']);
			if(!empty($check)){
				$id = $check->id;
				$this->Headers_m->update($id, $data);
				$this->session->set_flashdata("success", "Data updated successfully");
			}else{
				$this->Headers_m->insert($data);
				$this->session->set_flashdata("success", "Data saved successfully");
			}
			redirect('masters/headers-data');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('lang_id', 'Language', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('details', 'Detail', 'trim|required');
		$this->form_validation->set_rules('verses', 'Verses', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Header';
			$this->data['language'] 	= $this->Languages_m->get_all();
			$this->data['form']			= 'masters/forms/new_headers';
			$this->data['load_page']	= "masters/terms/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Headers_m->array_from_post(array(
				'lang_id',
				'praise',
				'title',
				'details',
				'verses'
			));
			$data['status'] = 1;
			$this->Headers_m->update($id, $data);
			$this->session->set_flashdata("success", "Data updated successfully");
			redirect('masters/headers-data');
		}
	}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('header_data');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}  
	
}
