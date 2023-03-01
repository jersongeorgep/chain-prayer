<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends User_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['page_heading'] = 'Login';
		$this->load->model(array('login/Auth_m'));		
	}
	public function index()
	{
		if ($this->session->userdata('loggedin') == true) {
			redirect('dashboard');
		}
		$this->data['pagename'] = 'Login';
		$this->data['load_page'] = "login/Login_page";
		$this->template->logintemplate($this->data);
	}

	public function check_user_valid()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->data['pagename'] = 'Login';
			$this->data['errors'] = validation_errors();
			$this->data['load_page'] = "login/Login_page";
			$this->template->logintemplate($this->data);
		} else {
			if ($this->Auth_m->authorize_user() == TRUE) {
				$activity = 'Login';
				$userName = getsingledata('Auth_m', 'username', $this->session->userdata('user_id'));
				$logdata = $userName . " logged at " . date('d F Y  H:i a');
				//logoreport($activity, $logdata);
				$this->session->set_flashdata('success', "Welcome ".$userName." to the ". config_item('app_name'));
				redirect('dashboard');
			} else {
				$this->data['error'] = "Please Check username and password";
				$this->data['username'] = $this->input->post('username');
				$this->data['password'] = $this->input->post('password');
				$this->data['pagename'] = 'Login';
				$this->data['load_page'] = "login/Login_page";
				$this->template->logintemplate($this->data);
			}
		}
	}

	public function logout()
	{
		$this->Auth_m->logout();
		redirect('login');
	}
}
