<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User_Controller extends MY_Controller {

	public $data = array();	

	function __construct()

		{

			parent::__construct();
			$this->load->module('template');
		}



}