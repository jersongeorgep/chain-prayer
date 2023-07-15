<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prayerpoints extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Chain Point';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'Prayer Point List';
		$this->data['serial_nos'] = $this->Serial_nos_m->order_by('id', 'asc')->get_all();
		$this->data['load_page'] = "prayerpoints/points/points_list";
		$this->template->admintemplate($this->data);
	}
	public function get_groups_in_center(){
		$val = $this->input->post(NULL, true);
		$data = $this->db->select('group_no')->from('members')->where('center_id', $val['center_id'])->order_by('group_no', 'asc')->group_by('group_no')->get()->result();
		echo json_encode($data);
	}
	public function get_serial_data(){
		$values = $this->input->post(NULL, true);
		$field = 'point_' . $values['lang'];
		$this->db->select('*')->from('prayer_points');
		$this->db->where('serial_no', $values['serial_no']);
		$this->db->order_by('id', 'asc');
		$data =	$this->db->get()->result();
		$slNo =1 ;
		$rowId = 0;
		foreach ($data as $key => $value) {
			$pData[$key]['sl_no'] 		= $slNo;
			$pData[$key]['select']		= '<input type="checkbox" name="ids[]" id="ids_'.$rowId.'" value="'. $value->id.'">';
			$pData[$key]['title']		= $value->title;
			$pData[$key]['points']		= $value->$field;
			$pData[$key]['action']		= '<a href="'. site_url('prayerpoints/edit/' . $value->id) .'" class="btn btn-xs btn-success"><i class="fas fa-edit"></i></a>'; 
			$slNo++;
			$rowId++;
		}
		echo json_encode($pData);
	}

	public function create_new(){
		$this->data['page_title']	= 'New Prayer Point';
        $this->data['serial_nos'] 	= $this->Serial_nos_m->order_by('id', 'asc')->get_all();
        $this->data['form']			= 'prayerpoints/forms/new_points';
		$this->data['load_page']	= "prayerpoints/points/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function get_local_fhs(){
		$val = $this->input->post(NULL, true);
		$data = $this->db->select('id, localName')->from('local_fhs as lf')->where('center_id', $val['center_id'])->order_by('localName', 'asc')->get()->result();
		echo json_encode($data);
	}

	public function get_group_number(){
		$val = $this->input->post(NULL, true);
		$group_code = get_group_number($val['centerId'], $val['timeId']);
		echo $group_code;
	}

	public function edit($id){
		$this->data['page_title']	= 'Edit Prayer Point';
        $this->data['serial_nos'] 	= $this->Serial_nos_m->order_by('id', 'asc')->get_all();
        $this->data['point'] 		= $this->Prayer_point_m->get($id);
        $this->data['form']			= 'prayerpoints/forms/edit_points';
		$this->data['load_page']	= "prayerpoints/points/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('serial_no', 'Serial No', 'trim|required');
		$this->form_validation->set_rules('title', 'Title ', 'trim|required');
		$this->form_validation->set_rules('point_eng', 'Point English', 'trim|required');
		$this->form_validation->set_rules('point_mal', 'Point Malayalam', 'trim|required');
		$this->form_validation->set_rules('point_tam', 'Point Tamil', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Prayer Point';
			$this->data['serial_nos'] 	= $this->Serial_nos_m->order_by('id', 'asc')->get_all();
			$this->data['form']			= 'prayerpoints/forms/new_points';
			$this->data['load_page']	= "prayerpoints/points/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Prayer_point_m->array_from_post(array(
				'serial_no',
				'title',
                'point_eng',
                'point_mal',
                'point_tam',
                'point_tel',
                'point_hin',
                'point_kan'
			));
			$data['status'] = 1;
			$this->Prayer_point_m->insert($data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('prayerpoints');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('serial_no', 'Serial No', 'trim|required');
		$this->form_validation->set_rules('title', 'Title ', 'trim|required');
		$this->form_validation->set_rules('point_eng', 'Point English', 'trim|required');
		$this->form_validation->set_rules('point_mal', 'Point Malayalam', 'trim|required');
		$this->form_validation->set_rules('point_tam', 'Point Tamil', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Prayer Point';
			$this->data['serial_nos'] 	= $this->Serial_nos_m->order_by('id', 'asc')->get_all();
			$this->data['point'] 		= $this->Prayer_point_m->get($id);
			$this->data['form']			= 'prayerpoints/forms/edit_points';
			$this->data['load_page']	= "prayerpoints/points/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Prayer_point_m->array_from_post(array(
				'serial_no',
				'title',
                'point_eng',
                'point_mal',
                'point_tam',
                'point_tel',
                'point_hin',
                'point_kan'
			));
			$data['status'] = 1;
			$this->Prayer_point_m->update($id, $data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('prayerpoints');
	}
}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('prayer_points');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}
	
}
