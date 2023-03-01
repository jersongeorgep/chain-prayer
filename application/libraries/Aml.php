<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once APPPATH.'third_party/asterisk/AsteriskManager.php';

class Aml extends Net_AsteriskManager { 

public function __construct() {
   parent::__construct();
   include_once APPPATH.'third_party/asterisk/AsteriskManager.php';
}

public function aml_libs($params ){

	$params = array('server' => '192.168.0.50', 'port' => '5038');		
	
	/**
	 * Instantiate Asterisk object and connect to server
	 */
	$ast = new Net_AsteriskManager($params);
	
	/**
	 * Connect to server
	 */
	try {
		$ast->connect();
	} catch (PEAR_Exception $e) {
		echo $e;
	}
	
	/**
	 * Login to manager API
	 */
	try {
		$ast->login('admin', 'password');
	} catch(PEAR_Exception $e) {
		echo $e;
	}
	
	/**
	 * Monitoring
	 * Begin monitoring channel to filename "test.gsm"
	 * If it fails then echo Asterisk error
	 */
	$chan = 'SIP/868';
	
	try {
		$ast->startMonitor($chan, 'test', 'gsm', 1);
	}  catch (PEAR_Exception $e) {
		echo $e;
	}
	
	/**
	 * Queues
	 * List queues then add and remove a handset from a queue
	 */
	
	// Print all the queues on the server
	try {
		echo $ast->getQueues();
	} catch(PEAR_Exception $e) {
		echo $e;
	}
	
	// Add the SIP handset 234 to a the applicants queue
	try {
		$ast->queueAdd('applicants', 'SIP/234', 1);
	} catch(PEAR_Exception $e) {
		echo $e;
	}
	
	// Take it out again
	try {
		$ast->queueRemove('applicants', 'SIP/234');
	} catch (PEAR_Exception $e) {
		echo $e;
	}
	
}
	
}
?>