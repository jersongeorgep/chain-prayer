<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

/**
 * 
 */
class Pdf extends Dompdf
{
	
	function __construct()
	{
		parent::__construct();
		$this->set_option('isRemoteEnabled', true);
		$this->set_option('isFontSubsettingEnabled', true);
		if (!defined('DOMPDF_UNICODE_ENABLED')) {
			define("DOMPDF_UNICODE_ENABLED", true);
		}
	}
}