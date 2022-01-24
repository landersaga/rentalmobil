<?php 

/**
* 
*/
class Pelanggan extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->helper('url');
	}

	function index(){
		$data['pelanggan'] = $this->m_pelanggan->tampil_data();
		$this->load->view('v-tampilpel',$data);
	}

	function tambah(){
		$data['kode'] = $this->m_pelanggan->kode_otomatis();
		$this->load->view('v-inputpel',$data);
	}
	function tambah_aksi(){
		$nktp = $this->input->post('nktp');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('telp');

		$data = array(
			'no_ktp' => $nktp,
			'nama_pelanggan' => $nama,
			'alamat_pelanggan' => $alamat,
			'telp_pelanggan' => $telpon,
			);
		$this->m_pelanggan->input_data($data,'pelanggan');
		redirect('pelanggan/index');
	}

	function hapus($nktp){
		$where = array('no_ktp' => $nktp);
		$this->m_pelanggan->hapus_data($where,'pelanggan');
		redirect('pelanggan/index');
	}
	function edit($nktp){
		$where = array('no_ktp' => $nktp);
		$data['pelanggan'] = $this->m_pelanggan->edit_data($where,'pelanggan')->result();
		$this->load->view('v-editpel', $data);
	}
	function update(){
		$nktp = $this->input->post('nktp');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('telp');	

		$data = array(
			'nama_pelanggan' => $nama,
			'alamat_pelanggan' => $alamat,
			'telp_pelanggan' => $telpon
			);
		$where = array(
			'no_ktp' => $nktp	
			);
		$this->m_pelanggan->update_data($where, $data,'pelanggan');
		redirect('pelanggan/index');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>