<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Controller extends MY_Controller {
	public $data = array();
	function __construct()
		{
		parent::__construct();
		$this->load->module('template');
		$this->load->model(array(
			'settings/Compnay_m',
			'settings/Settings_m',
			'settings/Center_timing_m',
			'masters/Times_m',
			'masters/Centerfhs_m',
			'masters/Localfhs_m',
			'masters/Languages_m',
			'masters/Times_m',
			'masters/Terms_m',
			'masters/Headers_m',
			'prayerchain/Members_m',
			'prayerpoints/Serial_nos_m',
			'prayerpoints/Prayer_point_m'
			
			));
		$this->load->helper('date');
			if($this->session->userdata('loggedin') == TRUE){
				//$this->data['Library'] = getsiglerowdata('Librarydetails_m', 1);
			}
		}
}
