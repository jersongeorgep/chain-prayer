<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Terms extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Masters';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'All Terms';
		$this->data['terms'] = $this->db->select('t.*,l.language')->from('terms as t')->join('languages as l', 'l.id = t.lang_id', 'left')->order_by('t. id', 'desc')->get()->result();
		$this->data['load_page'] = "masters/terms/terms_list";
		$this->template->admintemplate($this->data);
	}
	public function create_new(){
		$this->data['page_title']	= 'New Term';
		$this->data['language'] 	= $this->Languages_m->get_all();
		$this->data['form']			= 'masters/forms/new_terms';
		$this->data['load_page']	= "masters/terms/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function edit($id){
		$this->data['page_title']	= 'Edit Term';
		$this->data['terms'] = $this->Terms_m->get($id);
		$this->data['language'] 	= $this->Languages_m->get_all();
		$this->data['form']			= 'masters/forms/edit_terms';
		$this->data['load_page']	= "masters/terms/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('lang_id', 'Language', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('terms', 'Terms', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Term';
			$this->data['language'] = $this->Languages_m->get_all();
			$this->data['form']			= 'masters/forms/new_terms';
			$this->data['load_page']	= "masters/terms/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Terms_m->array_from_post(array(
				'lang_id',
				'title',
				'terms'
			));
			$data['status'] = 1;
			$check = $this->Terms_m->get_by('lang_id', $data['lang_id']);
			if(!empty($check)){
				$id = $check->id;
				$this->Terms_m->update($id, $data);
				$this->session->set_flashdata("success", "Data updated successfully");
			}else{
				$this->Terms_m->insert($data);
				$this->session->set_flashdata("success", "Data saved successfully");
			}
			redirect('masters/terms');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('lang_id', 'Language', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('terms', 'Terms', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Term';
			$this->data['terms'] = $this->Terms_m->get($id);
			$this->data['language'] 	= $this->Languages_m->get_all();
			$this->data['form']			= 'masters/forms/edit_terms';
			$this->data['load_page']	= "masters/terms/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Terms_m->array_from_post(array(
				'lang_id',
				'title',
				'terms'
			));
			$data['status'] = 1;
			$this->Terms_m->update($id, $data);
			$this->session->set_flashdata("success", "Data updated successfully");
			redirect('masters/terms');
		}
	}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('terms');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}  
	
}
