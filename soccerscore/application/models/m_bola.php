<?php

class m_bola extends CI_Model {

	function input_team($data = '') {
		if (!$this -> cek_team_is_exist($data['team'])) {
			$this -> db -> trans_start();
			$this -> db -> insert('team', $data);
			$this -> db -> trans_complete();
			return $this -> db -> trans_status();
		} else
			return false;
	}

	function get_id_negara($nama_negara = '') {
		$this -> db -> where('negara', $nama_negara);
		$res = $this -> db -> get('negara');
		if ($res -> num_rows() > 0) {
			$res = $res -> result_array();
			return $res[0]['id_negara'];
		} else {
			$data['negara'] = $nama_negara;
			$this -> insert_negara($data);
			$this -> db -> where('negara', $nama_negara);
			$res2 = $this -> db -> get('negara');
			$res2 = $res2 -> result_array();
			return $res2[0]['id_negara'];
		}
	}

	function cek_team_is_exist($nama_team = '') {
		$this -> db -> where('team', $nama_team);
		$res = $this -> db -> get('team');
		if ($res -> num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function insert_negara($data) {
		$this -> db -> trans_start();
		$this -> db -> insert('negara', $data);
		$this -> db -> trans_complete();
		return $this -> db -> trans_status();
	}
	
	function list_team()
	{
		$this->db->select('*');
		$this->db->join('negara','team.id_negara=negara.id_negara');
		return $this->db->get('team')->result_array();
	}

	function delete_team($id_team)
	{
		$this -> db -> trans_start();
		$this->db->delete('team', array('id_team' => $id_team)); 
		$this -> db -> trans_complete();
		return $this -> db -> trans_status();
	}
}
?>