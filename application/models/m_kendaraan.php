<?php 

/**
* 
*/
class m_kendaraan extends CI_Model{
	function tampil_data(){
		$this->db->from('kendaraan');
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
}

 ?>