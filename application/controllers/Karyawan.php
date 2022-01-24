<?php 

/**
* 
*/
class Karyawan extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_karyawan');
		$this->load->helper('url');
	}

	function index(){
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$this->load->view('v-tampil',$data);
	}

	function tambah(){
		$data['kode'] = $this->m_karyawan->kode_otomatis();
		$this->load->view('v-input',$data);
	}
	function tambah_aksi(){
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('notelp');
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$type = $this->input->post('type');	

		$data = array(
			'nik' => $nik,
			'nama_karyawan' => $nama,
			'alamat_karyawan' => $alamat,
			'telp_karyawan' => $telpon,
			'username' => $user,
			'password' => $pass,
			'type' => $type
			);
		$this->m_karyawan->input_data($data,'karyawan');
		redirect('karyawan/index');
	}

	function hapus($nik){
		$where = array('nik' => $nik);
		$this->m_karyawan->hapus_data($where,'karyawan');
		redirect('karyawan/index');
	}
	function edit($nik){
		$where = array('nik' => $nik);
		$data['karyawan'] = $this->m_karyawan->edit_data($where,'karyawan')->result();
		$this->load->view('v-editkar', $data);
	}
	function update(){
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('notelp');
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$type = $this->input->post('type');	

		$data = array(
			'nama_karyawan' => $nama,
			'alamat_karyawan' => $alamat,
			'telp_karyawan' => $telpon,
			'username' => $user,
			'password' => $pass,
			'type' => $type
			);
		$where = array(
			'nik' => $nik	
			);
		$this->m_karyawan->update_data($where, $data,'karyawan');
		redirect('karyawan/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>