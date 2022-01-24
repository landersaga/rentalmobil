<?php 

/**
* 
*/
class m_booking extends CI_Model{
	function tampil_data(){
		return $this->db->get('transaksi');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function tampil_kondisi(){
		$query = ("SELECT * FROM sopir where status='Available'");
	}
	function kode_otomatis(){
		$this->db->select('RIGHT(transaksi.no_transaksi,2) as kode',FALSE);
		$this->db->order_by('no_transaksi','DESC');
		$this->db->limit(1);
		$query = $this->db->get('transaksi');
		
		if ($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kodemax = str_pad($kode, 2, "0",STR_PAD_LEFT);
		$kodejadi = "TRANS".$kodemax;
		return $kodejadi;
	}
}

 ?>