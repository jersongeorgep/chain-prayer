<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends Admin_Controller {
    function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Settings';
			isLogedUser();	
		}

    public function index(){
        $this->data['page_title']	= 'Separate Center';
        $this->data['center_fh'] 	= $this->Centerfhs_m->order_by('centerName', 'asc')->get_all();
        $this->data['settings']		= $this->Settings_m->get(1);
		$this->data['form']			= 'settings/settings_form';
		$this->data['load_page']	= "prayerchain/members/entry_form";
		$this->template->admintemplate($this->data);
    }

    public function update_settings($id){
        $centers  = implode(',', $this->input->post('center_id'));
        $data['group_center'] = $centers;
        $data['status'] = 1;
        $this->Settings_m->update($id, $data);
        $this->session->set_flashdata("success", "Data saved successfully");
        redirect('settings');
    }
	
	function popup($page_name = '' , $param2 = '' , $param3 = '',$param4='') {
        $this->data['param2']        =   $param2;
        $this->data['param3']        =   $param3;
        $this->data['param4']        =   $param4;
        $this->load->view('forms/'.$page_name, $this->data);
    }

}
