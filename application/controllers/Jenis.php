<?php 

/**
* 
*/
class Jenis extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_jenis');
		$this->load->helper('url');
	}

	function index(){
		$data['jenis_service'] = $this->m_jenis->tampil_data()->result();
		$this->load->view('v-tampiljenis',$data);
	}

	function tambah(){
		$data['kode'] = $this->m_jenis->kode_otomatis();
		$this->load->view('v-inputjenis',$data);
	}
	function tambah_aksi(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');

		$data = array(
			'id_jenis' => $id,
			'nama_jenis' => $nama,
			);
		$this->m_jenis->input_data($data,'jenis_service');
		redirect('jenis/index');
	}

	function hapus($id){
		$where = array('id_jenis' => $id);
		$this->m_jenis->hapus_data($where,'jenis_service');
		redirect('jenis/index');
	}
	function edit($id){
		$where = array('id_jenis' => $id);
		$data['jenis_service'] = $this->m_jenis->edit_data($where,'jenis_service')->result();
		$this->load->view('v-editjenis', $data);
	}
	function update($id){
		$kode = $this->input->post('id_jenis');
		$nama = $this->input->post('nama_jenis');	

		$data = array(
			'nama_jenis' => $nama,
			);
		$where = array(
			'id_jenis' => $id,	
			);
		$this->m_jenis->update_data($where, $data,'jenis_service');
		redirect('jenis/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>