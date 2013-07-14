<?php

class m_dom extends CI_Model {
	function insertdom($data = '') {
		$this -> db -> trans_start();
		$this -> db -> insert('dom', $data);
		$this -> db -> trans_complete();

		return ($this -> db -> trans_status()) ? 1 : 0;
	}
	
	function updatedom($data = '') {
		$this -> db -> trans_start();
		$this->db->where('id_team', $data['id_team']);
		$this->db->where('date', $data['date']);
		$this->db->update('dom', $data); 
		$this -> db -> trans_complete();

		return $this -> db -> trans_status();
	}
	
	function cekdataisexist($id_team='', $date='')
	{
		$this->db->where('id_team', $id_team);
		$this->db->where('date', $date);
		return  ($this->db->get('dom')->num_rows()>0) ? TRUE : FALSE ;
	}
	
	
}
?>