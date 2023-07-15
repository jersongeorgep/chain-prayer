<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class General_settings extends Admin_Controller {
	
	function popup($page_name = '' , $param2 = '' , $param3 = '',$param4='') {

        $this->data['param2']        =   $param2;
        $this->data['param3']        =   $param3;
        $this->data['param4']        =   $param4;
		
        $this->load->view('forms/'.$page_name, $this->data);

    }

}
