<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/auth_controller.php';

class Welcome extends Auth_controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view('welcome_view');
	}
}