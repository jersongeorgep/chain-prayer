<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Refresh_groups extends Admin_Controller {
    function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Settings';
			isLogedUser();	
		}

    public function index(){
        $this->data['page_title']	= 'Refresh Groups';
        $this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
        $this->data['settings']		= $this->Settings_m->get(1);
		$this->data['form']			= 'settings/refresh_group_form';
		$this->data['load_page']	= "prayerchain/members/entry_form";
		$this->template->admintemplate($this->data);
    }

    public function reset_members_groups(){
        $values = $this->input->post(NULL, true);
        $date['group_no'] = null;
        $date['group_code'] = null;
        $date['group_num'] = null;
        if($values['center_id'] == 'all'){
          $this->db->where('status',1 );
          $this->db->update('members', $date);
          $members = $this->db->select('*')->from('members')->order_by('id', 'asc')->get()->result();
          for($i = 0; $i < count($members); $i++){
            $groupCode = get_group_number($members[$i]->center_id, $members[$i]->time_id);
            $splitCodeNum = explode('-', $groupCode);
            $id   = $members[$i]->id;
            $updateData['group_no']     = $groupCode;
            $updateData['group_code']   = $splitCodeNum[0];
            $updateData['group_num']    = $splitCodeNum[1];
            $this->db->where('id', $id)->update('members', $updateData);
          }
          $response = array("status" => 200, "msg" => "Successfully reset all groups updated");
          echo json_encode($response);
        }else{
          $this->db->where('status',1 );
          $this->db->update('members', $date);
          $members = $this->db->select('*')->from('members')->where('center_id', $values['center_id'])->order_by('id', 'asc')->get()->result();
          for($i = 0; $i < count($members); $i++){
            $groupCode = get_group_number($members[$i]->center_id, $members[$i]->time_id);
            $splitCodeNum = explode('-', $groupCode);
            $id   = $members[$i]->id;
            $updateData['group_no']     = $groupCode;
            $updateData['group_code']   = $splitCodeNum[0];
            $updateData['group_num']    = $splitCodeNum[1];
            $this->db->where('id', $id)->update('members', $updateData);
          }
          $response = array("status" => 200, "msg" => "Successfully reset center groups updated");
          echo json_encode($response);
        }
    }
    
}
