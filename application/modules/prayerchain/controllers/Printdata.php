<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Printdata extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Chain Prayer';
			//isLogedUser();	
		}

	public function index(){
		$this->data['page_title'] = 'Group wise';
		//$this->data['centerfhs'] = $this->Centerfhs_m->order_by('id', 'desc')->get_all();
		$this->data['center_fh'] 	= $this->Centerfhs_m->get_all();
		$this->data['times'] 		= $this->Times_m->get_all();
		$this->data['languages'] 	= $this->Languages_m->get_all();
		$this->data['load_page'] 	= "prayerchain/group_wise/group_wise_list";
		$this->template->admintemplate($this->data);
	}

	public function get_groups_in_center(){
		$val = $this->input->post(NULL, true);
		$data = $this->db->select('group_no')->from('members')->where('center_id', $val['center_id'])->order_by('id', 'asc')->group_by('group_no')->get()->result();
		echo json_encode($data);
	}

	public function get_group_wise_data(){
		$values = $this->input->post(NULL, true);
		$this->data['language'] = $this->Languages_m->get($values['lang_id']);
		//times divisions 
		$times_limit = $this->db->select('*')->from('print_time_divisions')->where('center_id', $values['center_id'])->get()->row();
		$limitLeft = (($times_limit->left_limit)?$times_limit->left_limit : 17) ;
		$limitRight = (($times_limit->right_limit)?$times_limit->right_limit : 13);

		$this->data['left_time'] = $this->Times_m->limit($limitLeft)->get_all();
		$this->data['right_time'] = $this->Times_m->limit($limitRight,$limitLeft)->get_all();

		$this->data['headers'] = $this->db->select('*')->from('header_data')->where('lang_id', $values['lang_id'])->get()->row();
		$this->data['terms'] = $this->db->select('*')->from('terms')->where('lang_id', $values['lang_id'])->get()->row();
		$this->data['center_id'] = $values['center_id'];
		$this->data['group_no'] = $values['group_no'];
		$this->load->view('prayerchain/group_wise/view_group_wise', $this->data);
		
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

	public function members_wise(){
		$this->data['page_title'] = 'Member wise';
		//$this->data['centerfhs'] = $this->Centerfhs_m->order_by('id', 'desc')->get_all();
		$this->data['center_fh'] 	= $this->Centerfhs_m->get_all();
		$this->data['times'] 		= $this->Times_m->get_all();
		$this->data['languages'] 	= $this->Languages_m->get_all();
		$this->data['load_page'] 	= "prayerchain/member_wise/member_wise_list";
		$this->template->admintemplate($this->data);
	}

	public function get_members(){
		$val = $this->input->post(NULL, true);
		$members = $this->db->select('*')->from('members')->where('center_id', $val['centerId'])->where('group_no', $val['group_no'])->get()->result();
		echo json_encode($members);
	}

	public function get_member_wise_data(){
		$values = $this->input->post(NULL, true);
		//$this->data['language'] = $this->Languages_m->get($values['lang_id']);
		$this->db->select('m.*, l.localName, pt.prayer_time')->from('members as m')->join('local_fhs as l', 'l.id = m.local_id', 'left')->join('prayer_time as pt', 'pt.id= m.time_id', 'left')->where('m.group_no', $values['group_no']);
		if($values['members'] != 'all'){
			$this->data['viewMembers'] = $this->db->where('m.id', $values['members'])->get()->result();
		}else{
			$this->data['viewMembers'] = $this->db->get()->result();
		}
		//times divisions 
		$times_limit = $this->db->select('*')->from('print_time_divisions')->where('center_id', $values['center_id'])->get()->row();
		$limitLeft = (($times_limit->left_limit)?$times_limit->left_limit : 17) ;
		$limitRight = (($times_limit->right_limit)?$times_limit->right_limit : 13);

		$this->data['left_time'] = $this->Times_m->limit($limitLeft)->get_all();
		$this->data['right_time'] = $this->Times_m->limit($limitRight,$limitLeft)->get_all();
		$this->data['center_id'] = $values['center_id'];
		$this->data['group_no'] = $values['group_no'];
		$this->data['member_value'] = $values['members'];

		$this->load->view('prayerchain/member_wise/view_member_wise', $this->data);
	}

	public function print_group_wise($center_id, $group_no, $lang_id){
		//$values = $this->input->post(NULL, true);
		$this->data['language'] = $this->Languages_m->get($lang_id);
		//times divisions 
		$times_limit = $this->db->select('*')->from('print_time_divisions')->where('center_id', $center_id)->get()->row();
		$limitLeft = (($times_limit->left_limit)?$times_limit->left_limit : 17) ;
		$limitRight = (($times_limit->right_limit)?$times_limit->right_limit : 13);

		$this->data['left_time'] = $this->Times_m->limit($limitLeft)->get_all();
		$this->data['right_time'] = $this->Times_m->limit($limitRight,$limitLeft)->get_all();

		$this->data['headers'] = $this->db->select('*')->from('header_data')->where('lang_id', $lang_id)->get()->row();
		$this->data['terms'] = $this->db->select('*')->from('terms')->where('lang_id', $lang_id)->get()->row();
		$this->data['center_id'] = $center_id;
		$this->data['group_no'] = $group_no;
		$this->load->view('prayerchain/group_wise/print_group_wise', $this->data);
	}

	public function print_member_wise($center_id, $group_no, $members){
		//$values = $this->input->post(NULL, true);
		//$this->data['language'] = $this->Languages_m->get($values['lang_id']);
		$this->db->select('m.*, l.localName, pt.prayer_time')->from('members as m')->join('local_fhs as l', 'l.id = m.local_id', 'left')->join('prayer_time as pt', 'pt.id= m.time_id', 'left')->where('m.group_no', $group_no);
		if($members != 'all'){
			$this->data['viewMembers'] = $this->db->where('m.id', $members)->get()->result();
		}else{
			$this->data['viewMembers'] = $this->db->get()->result();
		}
		//times divisions 
		$times_limit = $this->db->select('*')->from('print_time_divisions')->where('center_id', $center_id)->get()->row();
		$limitLeft = (($times_limit->left_limit)?$times_limit->left_limit : 17) ;
		$limitRight = (($times_limit->right_limit)?$times_limit->right_limit : 13);

		$this->data['left_time'] = $this->Times_m->limit($limitLeft)->get_all();
		$this->data['right_time'] = $this->Times_m->limit($limitRight,$limitLeft)->get_all();

		$this->data['center_id'] = $center_id;
		$this->data['group_no'] = $group_no;
		$this->load->view('prayerchain/member_wise/print_member_wise', $this->data);
	}

	public function faith_home_wise(){
		$this->data['page_title'] 	= 'Faith Home wise';
		$this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
		$this->data['times'] 		= $this->Times_m->get_all();
		$this->data['languages'] 	= $this->Languages_m->get_all();
		$this->data['load_page'] 	= "prayerchain/faith_home_wise/faith_home_wise_list";
		$this->template->admintemplate($this->data);
	}

	public function get_local_fh_wise_data(){
		$values = $this->input->post(NULL, true);		
		$this->db->select('m.*, l.localName, pt.prayer_time')->
		from('members as m')->
		join('local_fhs as l', 'l.id = m.local_id', 'left')->
		join('prayer_time as pt', 'pt.id= m.time_id', 'left')->
		where('m.center_id', $values['center_id'])->
		where('m.local_id', $values['local_fh']);
		$this->data['viewMembers'] = $this->db->get()->result();
		//times divisions 
		$times_limit = $this->db->select('*')->from('print_time_divisions')->where('center_id', $values['center_id'])->get()->row();
		$limitLeft = (($times_limit->left_limit)?$times_limit->left_limit : 17) ;
		$limitRight = (($times_limit->right_limit)?$times_limit->right_limit : 13);

		$this->data['left_time'] = $this->Times_m->limit($limitLeft)->get_all();
		$this->data['right_time'] = $this->Times_m->limit($limitRight,$limitLeft)->get_all();
		$this->data['center_id'] = $values['center_id'];
		$this->data['local_id'] = $values['local_fh'];
		$this->load->view('prayerchain/faith_home_wise/view_faith_home_wise', $this->data);
	}

	public function send_local_fh_wise_data(){
		$this->load->library('pdf');
		$values = $this->input->post(NULL, true);		
		$this->db->select('m.*, l.localName, pt.prayer_time')->
		from('members as m')->
		join('local_fhs as l', 'l.id = m.local_id', 'left')->
		join('prayer_time as pt', 'pt.id= m.time_id', 'left')->
		where('m.center_id', $values['center_id'])->
		where('m.local_id', $values['local_fh']);
		$this->data['viewMembers'] = $this->db->get()->result();
		$this->data['left_time'] = $this->Times_m->limit(16)->get_all();
		$this->data['right_time'] = $this->Times_m->limit(12,16)->get_all();
		$this->data['center_id'] = $values['center_id'];
		$this->data['local_id'] = $values['local_fh']; 
		$html = $this->load->view('prayerchain/faith_home_wise/view_faith_home_wise', $this->data, true);
		$this->load->library('pdf');
		//$html = 'testing pdf testing pdf';

		$dompdf = new PDF();
		$dompdf->loadHtml($html);
		$dompdf->render();
		$output = $dompdf->output();
		file_put_contents('test.pdf', $output);
		
	}

	public function print_local_faith_home_wise($center_id, $local_fh){
		//$values = $this->input->post(NULL, true);		
		
		$this->db->select('m.*, l.localName, pt.prayer_time')->
		from('members as m')->
		join('local_fhs as l', 'l.id = m.local_id', 'left')->
		join('prayer_time as pt', 'pt.id= m.time_id', 'left')->
		where('m.center_id', $center_id)->
		where('m.local_id', $local_fh);
		$this->data['viewMembers'] = $this->db->get()->result();
		
		//times divisions 
		$times_limit = $this->db->select('*')->from('print_time_divisions')->where('center_id', $center_id)->get()->row();
		$limitLeft = (($times_limit->left_limit)?$times_limit->left_limit : 17) ;
		$limitRight = (($times_limit->right_limit)?$times_limit->right_limit : 13);

		$this->data['left_time'] = $this->Times_m->limit($limitLeft)->get_all();
		$this->data['right_time'] = $this->Times_m->limit($limitRight,$limitLeft)->get_all();
		$this->data['center_id'] = $center_id;
		$this->data['local_id'] = $local_fh;
		$this->load->view('prayerchain/faith_home_wise/print_faith_home_wise', $this->data);
	}

	public function send_member_wise($center_id, $group_no, $members){
		//$values = $this->input->post(NULL, true);
		//$this->data['language'] = $this->Languages_m->get($values['lang_id']);
		$this->db->select('m.*, l.localName, pt.prayer_time')->from('members as m')->join('local_fhs as l', 'l.id = m.local_id', 'left')->join('prayer_time as pt', 'pt.id= m.time_id', 'left')->where('m.center_id', $center_id)->where('m.group_no', $group_no);
		$this->data['viewMembers'] = $this->db->where('m.id', $members)->get()->result();
		$this->data['left_time'] = $this->Times_m->limit(17)->get_all();
		$this->data['right_time'] = $this->Times_m->limit(13,17)->get_all();
		$this->data['center_id'] = $center_id;
		$this->data['group_no'] = $group_no;

		//$this->load->view('prayerchain/member_wise/mail_member_wise', $this->data);

		$msg = $this->load->view('prayerchain/member_wise/mail_member_wise', $this->data, true);
		$to		= $this->data['viewMembers'][0]->email;
		$sub	= "TPM Chain Payer group ".$this->data['viewMembers'][0]->group_no ." list";
		if(sendMail($to,$sub, $msg)){
			$this->data['page_title'] 	= 'Success';
			$this->data['load_page'] 	= "success";
			$this->template->admintemplate($this->data); 
		}else{
			$this->data['page_title'] 	= 'Faild';
			$this->data['load_page'] 	= "faild";
			$this->template->admintemplate($this->data); 
		}
		
	}

	
}
