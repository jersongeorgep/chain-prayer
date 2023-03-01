<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Reports';
			//isLogedUser();
		}
	
	public function Prescription_report(){
		$this->data['clinics'] = $this->Clinics_m->get_all();
		$this->data['page_name'] = 'Prescription Report';
		$this->data['load_page'] = "reports/prescription_report";
		$this->template->admintemplate($this->data);
	}
	public function get_search_result(){
		$fromDate = date('Y-m-d', strtotime($this->input->post('fromDate')));
		$toDate = date('Y-m-d', strtotime($this->input->post('toDate')));
		$clinicId = $this->input->post('clinic_id');
		$this->data['clinics'] = $this->Clinics_m->get_all();
		$this->data['prescriptions'] =	$this->db->select('a.*, b.doctor_name, b.clients_name')-> from('prescription_orders as a')->order_by('id', 'desc')->join('clinics as b', 'a.clinic_id = b.id', 'left')->
										where('a.po_date >=',$fromDate)->where('a.po_date <=',$toDate)-> where('a.clinic_id',$clinicId)->get()->result();
		$this->data['page_name'] = 'Prescription Report';
		$this->data['load_page'] = "reports/prescription_report";
		$this->template->admintemplate($this->data);
	}

	public function proforma_report(){
		$this->data['clinics'] = $this->Clinics_m->get_all();
		$this->data['page_name'] = 'Proforma Invoice Report';
		$this->data['load_page'] = "reports/proforma_report";
		$this->template->admintemplate($this->data);
	}

	public function get_proforma_search_result(){
		$fromDate = date('Y-m-d', strtotime($this->input->post('fromDate')));
		$toDate = date('Y-m-d', strtotime($this->input->post('toDate')));
		$clinicId = $this->input->post('clinic_id');
		$this->data['proforma_items'] = $this->db->query("SELECT a.invoice_no, a.invoice_date, b.po_number, b.patient_name, (SELECT GROUP_CONCAT(d.variation_item) FROM prescription_options_line as c LEFT JOIN variations AS d ON d.id = c.options_id WHERE c.prescri_id = b.id AND d.category_id = 5) AS work, a.total_amount FROM `proforma_invoice`AS a LEFT JOIN prescription_orders AS b ON b.id=a.order_id WHERE a.invoice_date >= '". $fromDate . "' and a.invoice_date <= '".$toDate."' AND b.clinic_id=".$clinicId)->result(); 
		$this->data['clinics'] = $this->Clinics_m->get_all();
		$this->data['page_name'] = 'Proforma Invoice Report';
		$this->data['load_page'] = "reports/proforma_report";
		$this->template->admintemplate($this->data);
	}

	public function print_proforma_report(){
		$fromDate 	= date('Y-m-d', strtotime($this->input->post('fromDate')));
		$toDate		= date('Y-m-d', strtotime($this->input->post('toDate')));
		$clinicId 	= $this->input->post('clinic_id');
		$this->data['company'] = $this->Compnay_m->get(1);
		$clinics = $this->Clinics_m->get($clinicId);
		$this->data['proforma_items'] = $this->db->query("SELECT a.invoice_no, a.invoice_date, b.po_number, b.patient_name, (SELECT GROUP_CONCAT(d.variation_item) FROM prescription_options_line as c LEFT JOIN variations AS d ON d.id = c.options_id WHERE c.prescri_id = b.id AND d.category_id = 5) AS work, a.total_amount FROM `proforma_invoice`AS a LEFT JOIN prescription_orders AS b ON b.id=a.order_id WHERE a.invoice_date >= '". $fromDate . "' and a.invoice_date <= '".$toDate."' AND b.clinic_id=".$clinicId)->result(); 
		$this->data['page_name'] = (($clinics->doctor_name)? 'Dr.'.$clinics->doctor_name.' | ':""). (($clinics->clients_name)?' M/S. '.$clinics->clients_name:""). ' <br ><small> From '.date('d-m-Y', strtotime($fromDate)).' to '.date('d-m-Y', strtotime($toDate)).'</small>';
		$this->load->view("reports/print_report", $this->data);
	}
	

	public function statement_report(){
		$this->data['clinics'] = $this->Clinics_m->get_all();
		$this->data['page_name'] = 'Statement Report';
		$this->data['load_page'] = "reports/statement_report";
		$this->template->admintemplate($this->data);
	}

	public function get_statement_result(){
		$fromDate = date('Y-m-d', strtotime($this->input->post('fromDate')));
		$toDate = date('Y-m-d', strtotime($this->input->post('toDate')));
		$clinicId = $this->input->post('clinic_id');
		$this->data['proforma_items'] = $this->db->query("SELECT a.invoice_no, a.invoice_date, b.po_number, b.patient_name, (SELECT GROUP_CONCAT(d.variation_item) FROM prescription_options_line as c LEFT JOIN variations AS d ON d.id = c.options_id WHERE c.prescri_id = b.id AND d.category_id = 5) AS work, a.total_amount FROM `proforma_invoice`AS a LEFT JOIN prescription_orders AS b ON b.id=a.order_id WHERE a.invoice_date >= '". $fromDate . "' and a.invoice_date <= '".$toDate."' AND b.clinic_id=".$clinicId)->result(); 
		$this->data['receipts'] = $this->db->query("SELECT * FROM `receipts` WHERE receipt_date >= '". $fromDate . "' and receipt_date <= '".$toDate."' AND clinic_id=".$clinicId)->result(); 
		$this->data['opening_balance'] = get_opening_balance($fromDate, $clinicId);
		$this->data['clinics'] = $this->Clinics_m->get_all();
		$this->data['page_name'] = 'Proforma Invoice Report';
		$this->data['load_page'] = "reports/statement_report";
		$this->template->admintemplate($this->data);
	}

	public function print_statement_report(){
		$fromDate 	= date('Y-m-d', strtotime($this->input->post('fromDate')));
		$toDate		= date('Y-m-d', strtotime($this->input->post('toDate')));
		$clinicId 	= $this->input->post('clinic_id');
		$clinics = $this->Clinics_m->get($clinicId);
		$this->data['company'] = $this->Compnay_m->get(1);
		//$this->data['proforma_items'] = $this->db->query("SELECT a.invoice_no, a.invoice_date, b.po_number, b.patient_name, (SELECT GROUP_CONCAT(d.variation_item) FROM prescription_options_line as c LEFT JOIN variations AS d ON d.id = c.options_id WHERE c.prescri_id = b.id AND d.category_id = 5) AS work, a.total_amount FROM `proforma_invoice`AS a LEFT JOIN prescription_orders AS b ON b.id=a.order_id WHERE a.invoice_date >= '". $fromDate . "' and a.invoice_date <= '".$toDate."' AND b.clinic_id=".$clinicId)->result(); 
		$this->data['receipts'] = $this->db->query("SELECT * FROM `receipts` WHERE receipt_date >= '". $fromDate . "' and receipt_date <= '".$toDate."' AND clinic_id=".$clinicId)->result(); 
		$this->data['opening_balance'] = get_opening_balance($fromDate, $clinicId);
		$this->data['clinics'] = $this->Clinics_m->get($clinicId);
		$this->data['proforma_items'] = $this->db->query("SELECT a.invoice_no, a.invoice_date, b.po_number, b.patient_name, (SELECT GROUP_CONCAT(d.variation_item) FROM prescription_options_line as c LEFT JOIN variations AS d ON d.id = c.options_id WHERE c.prescri_id = b.id AND d.category_id = 5) AS work, a.total_amount FROM `proforma_invoice`AS a LEFT JOIN prescription_orders AS b ON b.id=a.order_id WHERE a.invoice_date >= '". $fromDate . "' and a.invoice_date <= '".$toDate."' AND b.clinic_id=".$clinicId)->result(); 
		$this->data['page_name'] = 'From '.date('d-m-Y', strtotime($fromDate)).' to '.date('d-m-Y', strtotime($toDate));
		$this->load->view("reports/print_statement_report", $this->data);
	}
	
}
