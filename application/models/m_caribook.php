<?php 

/**
* 
*/
class m_caribook extends CI_Model{
	function tampil_data(){
		return $this->db->get('sopir');
	}
}

 ?>