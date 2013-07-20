<?php

class m_bola extends CI_Model {

    function input_team($data = '') {
        if (!$this->cek_team_is_exist($data['team'])) {
            $this->db->trans_start();
            $this->db->insert('team', $data);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else
            return false;
    }

    function get_id_negara($nama_negara = '') {
        $this->db->where('negara', $nama_negara);
        $res = $this->db->get('negara');
        if ($res->num_rows() > 0) {
            $res = $res->result_array();
            return $res[0]['id_negara'];
        } else {
            $data['negara'] = $nama_negara;
            $this->insert_negara($data);
            $this->db->where('negara', $nama_negara);
            $res2 = $this->db->get('negara');
            $res2 = $res2->result_array();
            return $res2[0]['id_negara'];
        }
    }

    function cek_team_is_exist($nama_team = '') {
        $this->db->where('team', $nama_team);
        $res = $this->db->get('team');
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert_negara($data) {
        $this->db->trans_start();
        $this->db->insert('negara', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function list_team($order_by = 'id_team') {
        if ($order_by == '') {
            $order_by = 'id_team';
        }
        $this->db->select('*');
        $this->db->join('negara', 'team.id_negara=negara.id_negara');
        $this->db->order_by($order_by, 'asc');
        return $this->db->get('team')->result_array();
    }

    function extratime_list($order_by = 'id_team') {
        if ($order_by = '') {
            $order_by = 'id_team';
        }
        $this->db->select('*');
        $this->db->join('negara', 'team.id_negara=negara.id_negara');
        $this->db->join('dom', 'team.id_team=dom.id_team');
        return $this->db->get_where('team', array('extratime' => 1))->result_array();
    }

    function delete_team($id_team) {
        $this->db->trans_start();
        $this->db->delete('team', array('id_team' => $id_team));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function getnegara() {
        return $this->db->get('negara')->result_array();
    }

    function getteambynegara($id_negara = 0) {
        $this->db->where('id_negara', $id_negara);
        return $this->db->get('team')->result_array();
    }

    function getdatateampernegara($id_negara = 0) {
        $listteam = $this->getteambynegara($id_negara);
        $data = null;
        $i = 0;
        foreach ($listteam as $team) {
            $data[$i]['id_team'] = $team['id_team'];
            $data[$i]['team'] = $team['team'];
            $data[$i]['rekap'] = array_reverse($this->rekapteam($team['id_team']));
            $i++;
        }
        return $data;
    }

    function rekapteam($id_team = '') {
        $this->db->where('id_team', $id_team);
        $this->db->where('status_tanding', '1');
        $this->db->order_by('date', 'desc');
        $this->db->limit(15);
        return $this->db->get('dom')->result_array();
    }

    function getsummary() {
        //1. get hari ini
        //1. get hari ini+1
        //1. get hari ini+2
        $date = '2013-09-13';
        $sum[0] = $this->getsummarybydate(date('Y-m-d', strtotime('+0 day', strtotime($date))));
        $sum[1] = $this->getsummarybydate(date('Y-m-d', strtotime('+1 day', strtotime($date))));
        $sum[2] = $this->getsummarybydate(date('Y-m-d', strtotime('+2 day', strtotime($date))));
        $sum[3] = $this->getsummarybydate(date('Y-m-d', strtotime('+3 day', strtotime($date))));
        $sum[4] = $this->getsummarybydate(date('Y-m-d', strtotime('+4 day', strtotime($date))));
        $sum[5] = $this->getsummarybydate(date('Y-m-d', strtotime('+5 day', strtotime($date))));
        $sum[6] = $this->getsummarybydate(date('Y-m-d', strtotime('+6 day', strtotime($date))));

        $data;
        //echo '<pre>';
        $i = 0;
        $id_negara_last = 0;

        foreach ($sum as $key_day => $s) {
            foreach ($s as $key => $t) {
                if ($t['id_negara'] == $id_negara_last) {
                    
                } else {
                    $data[$i]['id_negara'] = $t['id_negara'];
                    $data[$i]['negara'] = $t['negara'];
                }
            }
        }
        return $data;
    }

    function getsummarybydate($date = '') {

        $this->db->where('date', $date);
        $this->db->where('status_tanding', 0);
        $this->db->join('team', 'dom.id_team=team.id_team');
        $this->db->join('negara', 'team.id_negara=negara.id_negara');
        $res = $this->db->get('dom');
        return $res->result_array();
    }

}

?>