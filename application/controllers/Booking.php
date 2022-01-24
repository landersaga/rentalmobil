<?php 

/**
* 
*/
class Booking extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_booking');
		$this->load->model('m_sopir');
		$this->load->model('m_karyawan');
		$this->load->model('m_pelanggan');
		$this->load->model('m_kendaraan');
		$this->load->helper('url');
	}

	function index(){
		$data['kode'] = $this->m_booking->kode_otomatis();
		$data['transaksi'] = $this->m_booking->tampil_data();
		$data['sopir'] = $this->m_sopir->tampil_data();
		$data['pelanggan'] = $this->m_pelanggan->tampil_data();
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$data['kendaraan'] = $this->m_kendaraan->tampil_data();
		$this->load->view('v-inputbook',$data);
	}
	function tambah(){
		$data['sopir'] = $this->m_sopir->tampil_data();
		$data['pelanggan'] = $this->m_pelanggan->tampil_data();
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$data['kendaraan'] = $this->m_kendaraan->tampil_data();
		$this->load->view('v-inputbook',$data);
	}
	function tambah_aksi(){
		$notrans = $this->input->post('notrans');
		$idsop = $this->input->post('idsop');
		$nik = $this->input->post('nik');
		$noktp = $this->input->post('noktp');
		$noplat = $this->input->post('noplat');
		$tglpes = $this->input->post('tanggalpesan');
		$tglpinjren = $this->input->post('tanggalpinjamren');

		$data = array(
			'no_transaksi' => $notrans,
			'id_sopir' => $idsop,
			'nik' => $nik,
			'no_ktp' => $noktp,
			'no_plat' => $noplat,
			'tgl_pesan' => $tglpes,
			'tgl_pinjamrencana' => $tglpinjren
			);
		$this->m_booking->input_data($data,'transaksi');
		redirect('booking/index');
	}
	function updatestatus(){
		$query = $this->db->query('UPDATE');
	}
}

 ?>