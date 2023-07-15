<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MakeSerialNumber extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Chain Point';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'Serial No List';
		$this->data['serial_nos'] = $this->Serial_nos_m->order_by('id', 'desc')->get_all();
		$this->data['load_page'] = "prayerpoints/serial_no/serial_no_list";
		$this->template->admintemplate($this->data);
	}


	public function create_new(){
		$this->data['page_title']	= 'New Serial No';
       	$this->data['form']			= 'prayerpoints/forms/new_serial_no';
		$this->data['load_page']	= "prayerpoints/serial_no/entry_form";
		$this->template->admintemplate($this->data);
	}


	public function edit($id){
		$this->data['page_title']	= 'Edit Serial No';
		$this->data['serial_no'] 	= $this->Serial_nos_m->get($id);
       	$this->data['form']			= 'prayerpoints/forms/edit_serial_no';
		$this->data['load_page']	= "prayerpoints/serial_no/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('serial_no', 'Serial No', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Serial No';
			$this->data['form']			= 'prayerpoints/forms/new_serial_no';
			$this->data['load_page']	= "prayerpoints/serial_no/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Serial_nos_m->array_from_post(array(
				'serial_no'
			));
			$data['status'] = 1;
			$this->Serial_nos_m->insert($data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('prayerpoints/makeSerialNumber');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('serial_no', 'Serial No', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Serial No';
			$this->data['serial_no'] 	= $this->Serial_nos_m->get($id);
			$this->data['form']			= 'prayerpoints/forms/edit_serial_no';
			$this->data['load_page']	= "prayerpoints/serial_no/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Serial_nos_m->array_from_post(array(
				'serial_no'
			));
			$data['status'] = 1;
			$this->Serial_nos_m->update($id, $data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('prayerpoints/makeSerialNumber');
	}
}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('serial_nos');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}
	

}
