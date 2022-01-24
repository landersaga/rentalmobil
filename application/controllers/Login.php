<?php 

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}
	function index(){
		$this->load->view('forms/login');
	}
	function cekLogin(){
		$this->m_login->cekUserPass();
		redirect('login');
	}
	function out(){
		$this->session->session_destroy();
		redirect('login');
	}
}

 ?>