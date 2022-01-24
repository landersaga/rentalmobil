<?php 

/**
* 
*/
class m_karyawan extends CI_Model{
	function tampil_data(){
		$this->db->from('karyawan');
		$query =  $this->db->get();
		return $query->result();
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
	function kode_otomatis(){
		$this->db->select('RIGHT(karyawan.nik,3) as kode',FALSE);
		$this->db->order_by('nik','DESC');
		$this->db->limit(1);
		$query = $this->db->get('karyawan');
		
		if ($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0",STR_PAD_LEFT);
		$kodejadi = "N".$kodemax;
		return $kodejadi;
	}
}

 ?>