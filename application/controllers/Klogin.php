<?php 

/**
* 
*/
class Klogin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_klogin');
		$this->load->model('m_karyawan');
		$this->load->helper('url');
	}

	function index(){
		$data['login'] = $this->m_klogin->tampil_data()->result();
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$this->load->view('v-klogin',$data);
	}

	function tambah(){
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$this->load->view('v-inputklogin',$data);
	}
	function tambah_aksi(){
		$nik = $this->input->post('nik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$type = $this->input->post('type');

		$data = array(
			'nik' => $nik,
			'username' => $username,
			'password' => $password,
			'type' => $type
			);
		$this->m_klogin->input_data($data,'login');
		redirect('klogin/index');
	}

	function hapus($nik){
		$where = array('nik' => $nik);
		$this->m_klogin->hapus_data($where,'login');
		redirect('klogin/index');
	}
	function edit($nik){
		$where = array('nik' => $nik);
		$data['login'] = $this->m_klogin->edit_data($where,'login')->result();
		$this->load->view('v-editklog', $data);
	}
	function update(){
		$nik = $this->input->post('nik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$type = $this->input->post('type');	

		$data = array(
			'username' => $username,
			'password' => $password,
			'type' => $type
			);
		$where = array(
			'nik' => $nik	
			);
		$this->m_klogin->update_data($where, $data,'login');
		redirect('klogin/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>