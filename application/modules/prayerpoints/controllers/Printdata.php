<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Printdata extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Chain Point';
			//isLogedUser();	
		}

	public function index(){
		$this->data['page_title'] 	= 'Serial wise';
		$this->data['serial_nos'] 	= $this->Serial_nos_m->order_by('id', 'asc')->get_all();
		$this->data['languages'] 	= $this->Languages_m->get_all();
		$this->data['load_page'] 	= "prayerpoints/serial_wise/serial_wise_list";
		$this->template->admintemplate($this->data);
	}

	public function get_serial_wise_data(){
		$values = $this->input->post(NULL, true);
		$this->data['serial_no'] 	= $this->Serial_nos_m->order_by('id', 'asc')->get($values['serial_no']);
		$this->data['language'] 	= $this->Languages_m->get($values['lang_id']);
		$this->data['headers'] 		= $this->db->select('*')->from('header_data')->where('lang_id', $values['lang_id'])->get()->row();
		$this->data['points'] 		= $this->db->select('*')->from('prayer_points')->where('serial_no',$values['serial_no'])->order_by('id', 'asc')->get()->result();
		$this->load->view('prayerpoints/serial_wise/view_serial_wise', $this->data);
		
	}

	
}
