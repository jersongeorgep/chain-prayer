<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Chain Prayer';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'Members Register';
		//$this->data['centerfhs'] = $this->Centerfhs_m->order_by('id', 'desc')->get_all();
		$this->data['center_fh'] = $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
		$this->data['times'] = $this->Times_m->get_all();
		$this->data['load_page'] = "prayerchain/members/members_list";
		$this->template->admintemplate($this->data);
	}
	public function get_groups_in_center(){
		$val = $this->input->post(NULL, true);
		if($val['center_id'] == 'all'){
			$data = $this->db->select('group_no, group_num')->from('members')->where('group_code', 'OTH')->order_by('group_num', 'asc')->group_by('group_no')->get()->result();
		}else{
			$data = $this->db->select('group_no, group_num')->from('members')->where('center_id', $val['center_id'])->order_by('group_num', 'asc')->group_by('group_no')->get()->result();
		}
		echo json_encode($data);
	}
	public function get_members_data(){
		$values = $this->input->post(NULL, true);

		$this->db->select('m.*, cf.centerName, lf.localName, pt.prayer_time,l.language')->from('members as m')
			->join('center_fhs as cf', 'cf.id = m.center_id', 'left')
			->join('local_fhs as lf', 'lf.id = m.local_id', 'left')
			->join('prayer_time as pt', 'pt.id = m.time_id', 'left')
			->join('languages as l', 'l.id = m.lang_id', 'left');

			if(!empty($values['center_id']) && $values['center_id'] != 'all'){
				$this->db->where('m.center_id', $values['center_id']);
			}

			if($values['center_id'] == 'all'){
				$this->db->where('m.group_code', 'OTH');
			}

			if(!empty($values['local_fh']) && $values['local_fh'] != 'all'){
				$this->db->where('m.local_id', $values['local_fh']);
			}
			if(!empty($values['time_id']) && $values['time_id'] != 'all'){
				$this->db->where('m.time_id', $values['time_id']);
			}
			if(!empty($values['group_no']) && $values['group_no'] != 'all'){
				$this->db->where('m.group_no', $values['group_no']);
			}
			
			if(!empty($values['keyword'])){
				$this->db->like('m.eng_name', $values['keyword']);
				$this->db->or_like('m.mobile', $values['keyword']);
			}
			$this->db->order_by('m.time_id', 'asc');
		$data =	$this->db->get()->result();
		$lData = [];
		$slNo =1 ;
		$rowId = 0;
		foreach ($data as $key => $value) {
			$lData[$key]['sl_no'] 		= $slNo;
			$lData[$key]['select']		= '<input type="checkbox" name="ids[]" id="ids_'.$rowId.'" value="'. $value->id.'">';
			$lData[$key]['center']		= $value->centerName;
			$lData[$key]['local']		= $value->localName;
			$lData[$key]['time']		= $value->prayer_time;
			$lData[$key]['name']		= $value->bro_sis.' '.$value->eng_name;
			$lData[$key]['mobile']		= $value->mobile;
			$lData[$key]['language']	= $value->language;
			$lData[$key]['group_no']	= $value->group_no;
			$lData[$key]['action']		= '<a href="'. site_url('prayerchain/members/edit/' . $value->id) .'" class="btn btn-xs btn-success"><i class="fas fa-edit"></i></a>'; 
			$slNo++;
			$rowId++;
		}
		echo json_encode($lData);
	}

	public function create_new(){
		$this->data['page_title']	= 'New Member';
        $this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
        $this->data['times']		= $this->Times_m->get_all();
		$this->data['language'] 	= $this->Languages_m->get_all();
		$this->data['brosis']		= enum_select('members', 'bro_sis');
		$this->data['form']			= 'prayerchain/forms/new_member';
		$this->data['load_page']	= "prayerchain/members/entry_form";
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
		$this->data['page_title']	= 'Edit Member';
		$this->data['member'] 		= $this->Members_m->get($id);
        $this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
        $this->data['local_fh'] 	= $this->db->where('center_id', $this->data['member']->center_id)->get('local_fhs')->result();
		$this->data['times']		= $this->Times_m->get_all();
		$this->data['language'] 	= $this->Languages_m->get_all();
		$this->data['brosis']		= enum_select('members', 'bro_sis');
		$this->data['form']			= 'prayerchain/forms/edit_member';
		$this->data['load_page']	= "prayerchain/members/entry_form";
		$this->template->admintemplate($this->data);
	}

	public function save(){
		$this->form_validation->set_rules('center_id', 'Center', 'trim|required');
		$this->form_validation->set_rules('local_id', 'Local ', 'trim|required|is_unique[local_fhs.code]');
		$this->form_validation->set_rules('lang_id', 'Language', 'trim|required');
		$this->form_validation->set_rules('time_id', 'Time', 'trim|required');
		$this->form_validation->set_rules('bro_sis', 'Bro-Sis', 'trim|required');
		$this->form_validation->set_rules('eng_name', 'Eng Name', 'trim|required');
		$this->form_validation->set_rules('group_no', 'Group No', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'New Member';
			$this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
			$this->data['times']		= $this->Times_m->get_all();
			$this->data['language'] 	= $this->Languages_m->get_all();
			$this->data['form']			= 'prayerchain/forms/new_member';
			$this->data['load_page']	= "prayerchain/members/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Members_m->array_from_post(array(
				'center_id',
				'local_id',
                'lang_id',
                'time_id',
                'bro_sis',
                'eng_name',
                'mal_name',
                'tam_name',
                'tel_name',
                'hin_name',
                'kan_name',
                'mobile',
                'email',
                'group_no',
			));
			$data['status'] = 1;
			$this->Members_m->insert($data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('prayerchain/members');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('center_id', 'Center', 'trim|required');
		$this->form_validation->set_rules('local_id', 'Local ', 'trim|required|is_unique[local_fhs.code]');
		$this->form_validation->set_rules('lang_id', 'Language', 'trim|required');
		$this->form_validation->set_rules('time_id', 'Time', 'trim|required');
		$this->form_validation->set_rules('bro_sis', 'Bro-Sis', 'trim|required');
		$this->form_validation->set_rules('eng_name', 'Eng Name', 'trim|required');
		$this->form_validation->set_rules('group_no', 'Group No', 'trim|required');
		if($this->form_validation->run() === false){
			$this->data['page_title']	= 'Edit Member';
			$this->data['member'] 		= $this->Members_m->get($id);
			$this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
			$this->data['local_fh'] 	= $this->db->where('center_id', $this->data['member']->center_id)->get('local_fhs')->result();
			$this->data['times']		= $this->Times_m->get_all();
			$this->data['language'] 	= $this->Languages_m->get_all();
			$this->data['brosis']		= enum_select('members', 'bro_sis');
			$this->data['form']			= 'prayerchain/forms/edit_member';
			$this->data['load_page']	= "prayerchain/members/entry_form";
			$this->session->set_flashdata("danger", validation_errors());
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Members_m->array_from_post(array(
				'center_id',
				'local_id',
                'lang_id',
                'time_id',
                'bro_sis',
                'eng_name',
                'mal_name',
                'tam_name',
                'tel_name',
                'hin_name',
                'kan_name',
                'mobile',
                'email',
                'group_no',
			));
			$data['status'] = 1;
			$this->Members_m->update($id, $data);
			$this->session->set_flashdata("success", "Data saved successfully");
			redirect('prayerchain/members');
	}
}

	public function delete(){
		$ids = $this->input->post('ids');
		for ($i=0; $i < count($ids); $i++){
			$this->db->where('id', $ids[$i])->delete('members');
		}
		$response = array ( 'status' => 200, 'msg' => "your data deleted successfully" );
		echo json_encode($response);
	}
	
	public function print_member_data($centerId, $localId, $groupNo, $timeId){
			$this->db->select('m.*, cf.centerName, lf.localName, pt.prayer_time,l.language')->from('members as m')
				->join('center_fhs as cf', 'cf.id = m.center_id', 'left')
				->join('local_fhs as lf', 'lf.id = m.local_id', 'left')
				->join('prayer_time as pt', 'pt.id = m.time_id', 'left')
				->join('languages as l', 'l.id = m.lang_id', 'left');
				if($centerId != 'all'){
					$this->db->where('m.center_id', $centerId);
				}
				if($localId != 'all'){
					$this->db->where('m.local_id', $localId);
				}
				if($timeId != 'all'){
					$this->db->where('m.time_id', $timeId);
				}
				if($groupNo != 'all'){
					$this->db->where('m.group_no', $groupNo);
				}
				$this->db->order_by('m.time_id', 'asc');
				$this->data['members'] = $this->db->get()->result();
				$this->load->view('members/print_members', $this->data);
		}
	
}
