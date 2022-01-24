<?php 

/**
* 
*/
class Pemilik extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pemilik');
		$this->load->helper('url');
	}

	function index(){
		$data['pemilik'] = $this->m_pemilik->tampil_data()->result();
		$this->load->view('v-tampilpem',$data);
	}

	function tambah(){
		$data['kode'] = $this->m_pemilik->kode_otomatis();
		$this->load->view('v-inputpem',$data);
	}
	function tambah_aksi(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('telpon');

		$data = array(
			'kode_pemilik' => $kode,
			'nama_pemilik' => $nama,
			'alamat_pemilik' => $alamat,
			'telp_pemilik' => $telpon,
			);
		$this->m_pemilik->input_data($data,'pemilik');
		redirect('pemilik/index');
	}

	function hapus($kode_pemilik){
		$where = array('kode_pemilik' => $kode_pemilik);
		$this->m_pemilik->hapus_data($where,'pemilik');
		redirect('pemilik/index');
	}
	function edit($kode_pemilik){
		$where = array('kode_pemilik' => $kode_pemilik);
		$data['pemilik'] = $this->m_pemilik->edit_data($where,'pemilik')->result();
		$this->load->view('v-editpem', $data);
	}
	function update(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('telpon');	

		$data = array(
			'nama_pemilik' => $nama,
			'alamat_pemilik' => $alamat,
			'telp_pemilik' => $telpon
			);
		$where = array(
			'kode_pemilik' => $kode	
			);
		$this->m_pemilik->update_data($where, $data,'pemilik');
		redirect('pemilik/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>