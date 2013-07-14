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
	
	function getnegara()
	{
		return $this->db->get('negara')->result_array();
	}
	
	function getteambynegara($id_negara=0)
	{
		$this->db->where('id_negara',$id_negara);
		return $this->db->get('team')->result_array();
	}
	
	function getdatateampernegara($id_negara=0)
	{
		$listteam=$this->getteambynegara($id_negara);
		$data=null;
		$i=0;
		foreach($listteam as $team)
		{
			$data[$i]['id_team']=$team['id_team'];
			$data[$i]['team']=$team['team'];
			$data[$i]['rekap']=array_reverse($this->rekapteam($team['id_team']));
			$i++;
		}
		return $data;
	}
	function rekapteam($id_team='')
	{
		$this->db->where('id_team',$id_team);
		$this->db->where('status_tanding', '1');
		$this->db->order_by('date', 'desc');
		$this->db->limit(7);
		return $this->db->get('dom')->result_array();
	}
}
?>