<?php 

/**
* 
*/
class Type extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_type');
		$this->load->helper('url');
	}

	function index(){
		$data['type'] = $this->m_type->tampil_data()->result();
		$this->load->view('v-tampiltype',$data);
	}

	function tambah(){
		$this->load->view('v-inputtype');
	}
	function tambah_aksi(){
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$data = array(
			'id_type' => $id,
			'kode_merk' => $kode,
			'nama_type' => $nama,
			);
		$this->m_type->input_data($data,'type');
		redirect('type/index');
	}

	function hapus($id){
		$where = array('id_type' => $id);
		$this->m_type->hapus_data($where,'type');
		redirect('type/index');
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
		$telpon = $this->input->post('telp');	

		$data = array(
			'nama_karyawan' => $nama,
			'alamat_karyawan' => $alamat,
			'telp_karyawan' => $telpon
			);
		$where = array(
			'nik' => $nik	
			);
		$this->m_karyawan->update_data($where, $data,'karyawan');
		redirect('karyawan/index');
	}
}

 ?>