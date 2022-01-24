<?php 

/**
* 
*/
class Sopir extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_sopir');
		$this->load->helper('url');
	}

	function index(){
		$data['sopir'] = $this->m_sopir->tampil_data();
		$this->load->view('v-tampilsop',$data);
	}

	function tambah(){
		$data['kode'] = $this->m_sopir->kode_otomatis();
		$this->load->view('v-inputsop',$data);
	}
	function tambah_aksi(){
		$id = $this->input->post('idsop');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('notelp');
		$nosim = $this->input->post('nosim');
		$tarif = $this->input->post('tarif');
		$status = $this->input->post('status');

		$data = array(
			'id_sopir' => $id,
			'nama_sopir' => $nama,
			'alamat_sopir' => $alamat,
			'telp_sopir' => $telpon,
			'no_sim' => $nosim,
			'tarif_perjam' => $tarif,
			'status' => $status
			);
		$this->m_sopir->input_data($data,'sopir');
		redirect('sopir/index');
	}

	function hapus($id){
		$where = array('id_sopir' => $id);
		$this->m_sopir->hapus_data($where,'sopir');
		redirect('sopir/index');
	}
	function edit($id){
		$where = array('id_sopir' => $id);
		$data['sopir'] = $this->m_sopir->edit_data($where,'sopir')->result();
		$this->load->view('v-editsop', $data);
	}
	function update(){
		$id = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('notelp');
		$nosim = $this->input->post('nosim');
		$tarif = $this->input->post('tarif');
		$status = $this->input->post('status');	

		$data = array(
			'nama_sopir' => $nama,
			'alamat_sopir' => $alamat,
			'telp_sopir' => $telpon,
			'no_sim' => $nosim,
			'tarif_perjam' => $tarif,
			'status' => $status
			);
		$where = array(
			'id_sopir' => $id	
			);
		$this->m_sopir->update_data($where, $data,'sopir');
		redirect('sopir/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>