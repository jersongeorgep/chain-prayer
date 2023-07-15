<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members_limit_settings extends Admin_Controller {
    function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Settings';
			isLogedUser();	
		}

    public function index(){
        $this->data['page_title']	=   'Members Limit Settings';
        $settings = $this->Settings_m->get(1);
        $centers = explode(',', $settings->group_center);
        $this->data['center_fh'] 	=   $this->Centerfhs_m->where_in('id', $centers)->order_by('centerName', 'asc')->get_all();
        $this->data['load_page']	=   "settings/gorup_limit_settings/timing_sheet";
		$this->template->admintemplate($this->data);
    }

    public function get_timing_sheet(){
        $values =   $this->input->post(NULL, true);
        $updateData     =  $this->db->select('ct.center_id, ct.time_id, pt.prayer_time, pt.id, ct.allowed_member')
                           ->from('centers_timing as ct')
                           ->join('center_fhs as cf', 'cf.id = ct.center_id', 'left')
                           ->join('prayer_time as pt', 'pt.id= ct.time_id', 'left')
                           ->where('ct.center_id', $values['center_id'])->get()->result();
        $this->data['time_limit'] = $this->db->select('*')->from('print_time_divisions')->where('center_id', $values['center_id'])->get()->row();
        if(!empty($updateData)){
            $this->data['center_fh'] = $this->db->select('*')->from('center_fhs')->where('id', $values['center_id'])->get()->row(); 
            $this->data['times'] = $updateData;
            $this->load->view('settings/gorup_limit_settings/view_timing_sheet', $this->data);
        }else{
            $this->data['center_fh'] = $this->db->select('*')->from('center_fhs')->where('id', $values['center_id'])->get()->row(); 
            $this->data['times'] = $this->db->select('*')->from('prayer_time')->order_by('id', 'asc')->get()->result();
            $this->load->view('settings/gorup_limit_settings/view_timing_sheet', $this->data);
        }                        
    }

    public function update_timing(){
        $center_id = $this->input->post('centerId');
        $time_id = $this->input->post('timeId');
        $allowed_member = $this->input->post('allow_members');
        $left_linit = $this->input->post('left_limit');
        $right_limit = $this->input->post('right_limit');
        for($i =0; $i < count($time_id); $i++){
            $data['center_id'] = $center_id[$i];
            $data['time_id'] = $time_id[$i];
            $data['allowed_member'] = $allowed_member[$i];
            $data['status'] = 1;
            $check = $this->db->select('*')->from('centers_timing')->where('center_id',$data['center_id'])->where('time_id', $data['time_id'])->get()->row();
            if(!empty($check)){
                $id = $check->id;
                $this->Center_timing_m->update($id, $data);
            }else{
                $this->Center_timing_m->insert($data);
            }
        }
        if(!empty($left_linit) && !empty($right_limit)){
            update_time_division($center_id[0], $left_linit, $right_limit);
        }
        redirect('settings/Members_limit_settings');
    }
	
}
