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
	
	function cekedited($data = '') {
		$this->db->where('id_team', $data['id_team']);
		$this->db->where('date', $data['date']);
		$this->db->where('edited', 1);
		$res=$this->db->get('dom'); 
		if ($res->num_rows()>0) {
			return 1;
		}else return 0;
	}
	
	function cekdataisexist($id_team='', $date='')
	{
		$this->db->where('id_team', $id_team);
		$this->db->where('date', $date);
		return  ($this->db->get('dom')->num_rows()>0) ? TRUE : FALSE ;
	}
	
	
}
?>