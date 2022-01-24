<?php 

/**
* 
*/
class Kendaraan extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_kendaraan');
		$this->load->model('m_pemilik');
		$this->load->helper('url');
	}

	function index(){
		$data['pemilik'] = $this->m_pemilik->tampil_data();
		$data['kendaraan'] = $this->m_kendaraan->tampil_data();
		$this->load->view('v-tampilken',$data);
	}

	function tambah(){
		$data['pemilik'] = $this->m_pemilik->tampil_data()->result();
		$this->load->view('v-inputken',$data);
	}
	function tambah_aksi(){
		$noplat = $this->input->post('noplat');
		$kode = $this->input->post('kode');
		$tahun = $this->input->post('tahun');
		$tarif = $this->input->post('tarif');
		$status = $this->input->post('status');

		$data = array(
			'no_plat' => $noplat,
			'kode_pemilik' => $kode,
			'tahun' => $tahun,
			'tarif' => $tarif,
			'status_rental' => $status
			);
		$this->m_kendaraan->input_data($data,'kendaraan');
		redirect('kendaraan/index');
	}

	function hapus($noplat){
		$where = array('no_plat' => $noplat);
		$this->m_kendaraan->hapus_data($where,'kendaraan');
		redirect('kendaraan/index');
	}
	function edit($noplat){
		$where = array('no_plat' => $noplat);
		$data['kendaraan'] = $this->m_kendaraan->edit_data($where,'kendaraan')->result();
		$this->load->view('v-editken', $data);
	}
	function update(){
		$noplat = $this->input->post('noplat');
		$kode = $this->input->post('kode');
		$tahun = $this->input->post('tahun');
		$tarif = $this->input->post('tarif');
		$status = $this->input->post('status');

		$data = array(
			'kode_pemilik' => $kode,
			'tahun' => $tahun,
			'tarif' => $tarif,
			'status_rental' => $status
			);
		$where = array(
			'no_plat' => $noplat	
			);
		$this->m_kendaraan->update_data($where, $data,'kendaraan');
		redirect('kendaraan/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>