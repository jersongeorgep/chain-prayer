<?php
require_once APPPATH .'third_party/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
 	/* public function Header() {
	 	$CI =& get_instance();
	 	$data = $CI->Librarydetails_m->get(1);
	 	$this->SetAutoPageBreak(true);
		$this->SetAuthor('Jerson George');
		$this->SetDisplayMode('real', 'default');
		$this->SetFont('helvetica', '', 12);
		$this->SetHeaderMargin(0);
		$this->setFooterMargin(25);
	 	$this->SetLeftMargin(10);
    	$html = $CI->load->view('Print_header',$data, true);
		$this->writeHTML($html, true, false, true, false, '');
	 	$this->SetTopMargin(30);
     } */
    
   
    // Page footer
    /* public function Footer() {
		$CI =& get_instance();
		$data = $CI->Librarydetails_m->get(1);
        $this->SetY(-15);
	    $this->SetFont('helvetica','',8);
        $data = $data = $CI->Librarydetails_m->get(1);
        $html = $CI->load->view('Print_footer',$data, true);
		$this->writeHTML($html, true, false, true, false, '');
		$this->Ln(5);
	}  */
}
