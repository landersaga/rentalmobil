<?php 

/**
* 
*/
class Merk extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_merk');
		$this->load->helper('url');
	}

	function index(){
		$data['merk'] = $this->m_merk->tampil_data()->result();
		$this->load->view('v-tampilmerk',$data);
	}

	function tambah(){
		$data['kode'] = $this->m_merk->kode_otomatis();
		$this->load->view('v-inputmerk',$data);
	}
	function tambah_aksi(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$data = array(
			'kode_merk' => $kode,
			'nama_merk' => $nama,
			);
		$this->m_merk->input_data($data,'merk');
		redirect('merk/index');
	}

	function hapus($kode){
		$where = array('kode_merk' => $kode);
		$this->m_merk->hapus_data($where,'merk');
		redirect('merk/index');
	}
	function edit($kode){
		$where = array('kode_merk' => $kode);
		$data['merk'] = $this->m_merk->edit_data($where,'merk')->result();
		$this->load->view('v-editmerk', $data);
	}
	function update(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');	

		$data = array(
			'nama_merk' => $nama,
			);
		$where = array(
			'kode_merk' => $kode	
			);
		$this->m_merk->update_data($where, $data,'merk');
		redirect('merk/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>