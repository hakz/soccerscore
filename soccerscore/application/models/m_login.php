<?php

class m_login extends CI_Model{
    
    function getLogin($p){
        $p = md5(mysql_real_escape_string($p));
        $q_cek_login = $this->db->get_where('user', array('password' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qcd) {
                    $sess_data['logged_in'] = 'FuckMeNowImLoginYourSystem';
                    $sess_data['username'] = $qcd->username;
                    $this->session->set_userdata($sess_data);
                }
              header('location:' . site_url('administrator'));
            }
        } else{
            header('location:' . site_url());
        }
    }
}
