<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Company';	
			//isLogedUser();
		}
	
	public function update_company($id){
		$this->data['page_name']	= 'update company';		
		$this->data['company']		= $this->Compnay_m->get($id);		
		$this->data['load_page'] 	= "settings/company/company_profile";
		$this->template->admintemplate($this->data);
	}

	public function update($id) {
		$this->form_validation->set_rules('name', 'Comapny Name', 'trim|required');
		$this->form_validation->set_rules('pincode', 'Pin Code', 'required'); 
		if($this->form_validation->run() == FALSE){
			$this->data['page_name']	= 'update company';		
			$this->data['company']		= $this->Compnay_m->get($id);
			$this->data['errors']		= validation_errors();
			$this->data['load_page'] 	= "settings/company/company_profile";
			$this->template->admintemplate($this->data);
		}else{
			$data = $this->Compnay_m->array_from_post(array(
				'name',
				'addressLine1',
				'addressLine2',
				'building',
				'pincode',
				'post',
				'district',
				'state',
				'country',
				'phone',
				'mobile',
				'email',
				'website',
				'gstNumber',
				'contactPerson',
				'companyLogo',
				'status'
				)
			);
			$data['status'] = 1;
			$this->Compnay_m->update($id, $data);
			redirect('settings/company/update-company/1');
		}

	}
	
	function get_postal_details($picncode){
		$url= "https://api.postalpincode.in/pincode/".$picncode;
		$ch = curl_init($url);
		//curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result;
	}
	
}
