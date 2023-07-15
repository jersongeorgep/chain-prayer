<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Local_fhs extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Masters';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'All Local FaithHomes';
		//$this->data['centerfhs'] = $this->Centerfhs_m->order_by('id', 'desc')->get_all();
		$this->data['center_fh'] = $this->Centerfhs_m->get_all();
		$this->data['load_page'] = "masters/locals/locals_fhs_list";
		$this->template->admintemplate($this->data);
	}
	public function get_local_fh_data(){
		$values = $this->input->post(NULL, true);
		$this->db->select('l.id, l.code, l.localName, c.centerName, c.center_code')
		->from('local_fhs as l')->join('center_fhs as c', 'c.id = l.center_id', 'left');
		if(!empty($values['center_id'])){
			$this->db->where('l.center_id', $values['center_id']);
		}
		if(!empty($values['keyword'])){
			$this->db->like('l.localName', $values['keyword']);
			$this->db->or_like('l.address', $values['keyword']);
		}
		$data =$this->db->order_by('l.id', 'desc')->get()->result();
		$slNo =1 ;
		foreach ($data as $key => $value) {
			$lData[$key]['sl_no'] 		= $slNo;
			$lData[$key]['select'] 		= '<input type="checkbox" name="ids[]" id="ids_" value="'. $value->id.'">';
			$lData[$key]['code'] 		= ($value->code)?$value->code : code_generate($value->localName);
			$lData[$key]['localName'] 	= $value->localName;
			$lData[$key]['centerCode'] 	= $value->center_code;
			$lData[$key]['centerName'] 	= $value->centerName;
			$lData[$key]['action'] 		= '<a href="'. site_url('masters/local-fhs/edit/' . $value->id) .'" class="btn btn-xs btn-success"><i class="fas fa-edit"></i></a>'; 
			$slNo++;
		}
		echo json_encode($lData);
	}

	public function create_new(){
		$this->data['page_title']	= 'New Local FaithHome';
        $this->data['center_fh'] = $this->Centerfhs_m->get_all();
		$this->data['form']			= 'masters/forms/new_local';
		$this->data['load_page']	= "masters/locals/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function edit($id){
		$this->data['page_title']	= 'Edit Local FaithHome';
        $this->data['localFh']      = $this->Localfhs_m->get($id);
        $this->data['center_fh']    = $this->Centerfhs_m->get_all();
		$this->data['form']			= 'masters/forms/edit_local';
		$this->data['load_page']	= "masters/locals/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('center_id', 'Center Name', 'trim|required');
		$this->form_validation->set_rules('code', 'code', 'trim|required|is_unique[local_fhs.code]');
		$this->form_validation->set_rules('localName', 'Local Name', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Local FaithHome';
            $this->data['center_fh'] = $this->Centerfhs_m->get_all();
            $this->data['form']			= 'masters/forms/new_local';
            $this->data['load_page']	= "masters/locals/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Localfhs_m->array_from_post(array(
				'center_id',
				'code',
                'localName',
                'address',
                'contact'
			));
			$this->Localfhs_m->insert($data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('masters/local-fhs');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('center_id', 'Center Name', 'trim|required');
		$this->form_validation->set_rules('code', 'code', 'trim|required|is_unique[local_fhs.code]');
		$this->form_validation->set_rules('localName', 'Local Name', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Local FaithHome';
            $this->data['localFh']      = $this->Localfhs_m->get($id);
            $this->data['center_fh']    = $this->Centerfhs_m->get_all();
            $this->data['form']			= 'masters/forms/edit_local';
            $this->data['load_page']	= "masters/locals/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Localfhs_m->array_from_post(array(
				'center_id',
				'code',
                'localName',
                'address',
                'contact'
			));
			$this->Localfhs_m->update($id, $data);
			$this->session->set_flashdata("success", "Data updated successfully");
			redirect('masters/local-fhs');
		}
	}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('local_fhs');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}  

    public function generate_code(){
        $str = $this->input->post('code');
        echo code_generate($str);
    }
	
}
