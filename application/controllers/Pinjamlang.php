<?php 

/**
* 
*/
class Pinjamlang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pinjamlang');
		$this->load->model('m_sopir');
		$this->load->model('m_karyawan');
		$this->load->model('m_pelanggan');
		$this->load->model('m_kendaraan');
		$this->load->helper('url');
	}

	function index(){
		$data['transaksi'] = $this->m_pinjamlang->tampil_data();
		$data['sopir'] = $this->m_sopir->tampil_data();
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$data['pelanggan'] = $this->m_pelanggan->tampil_data();
		$data['kendaraan'] = $this->m_kendaraan->tampil_data();
		$data['kode'] = $this->m_pinjamlang->kode_otomatis();
		$this->load->view('v-pinjamlangsung',$data);
	}
	function tambah(){
		$data['sopir'] = $this->m_sopir->tampil_data();
		$data['pelanggan'] = $this->m_pelanggan->tampil_data();
		$data['karyawan'] = $this->m_karyawan->tampil_data();
		$data['kendaraan'] = $this->m_kendaraan->tampil_data();
		$this->load->view('v-pinjamlangsung',$data);
	}
	function tambah_aksi(){
		$notrans = $this->input->post('notrans');
		$idsop = $this->input->post('idsop');
		$nik = $this->input->post('nik');
		$noktp = $this->input->post('noktp');
		$noplat = $this->input->post('noplat');
		$tglpes = $this->input->post('tanggalpesan');
		$tglpinjren = $this->input->post('tanggalpinjamren');
		$tglpinjam = $this->input->post('tglpinjam');
		$jampinjam = $this->input->post('jampinjam');
		$tglkembaliren = $this->input->post('tanggalkembaliren');
		$jamkembaliren = $this->input->post('jamkembaliren');

		$data = array(
			'no_transaksi' => $notrans,
			'id_sopir' => $idsop,
			'nik' => $nik,
			'no_ktp' => $noktp,
			'no_plat' => $noplat,
			'tgl_pesan' => $tglpes,
			'tgl_pinjamrencana' => $tglpinjren,
			'tgl_pinjam' => $tglpinjam,
			'jam_pinjam' => $jampinjam,
			'tglkembali_rencana' => $tglkembaliren,
			'jamkembali_rencana' => $jamkembaliren

			);
		$this->m_pinjamlang->input_data($data,'transaksi');
		redirect('Pinjamlang/index');
	}
	function updatestatus(){
		$query = $this->db->query('UPDATE');
	}
	function out(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

 ?>