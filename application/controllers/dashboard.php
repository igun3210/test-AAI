<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('session');
		
	}
	
	public function index()
	{
		$this->_list();
	}

	public function _list() {
		$view_data = array(
			'store' => array(),
			);
		
		$this->load->view('dashboard',$view_data);
	}
}
