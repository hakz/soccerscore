<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrator extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_bola');
        $cek = $this->session->userdata('logged_in');
        if (empty($cek)) {
            header('location:' . site_url(''));
        }
    }

    public function index() {
        //tes update
        $data['ctrl']['page'] = 'blank';
        $data['ctrl']['navigation1'] = $data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
        $data['et']=sizeof($this->m_bola->extratime_list()) ;
        
        $this->load->view('admin/main', $data);
    }

    public function input($id_negara=1) {
        $data['ctrl']['team'] = '';
        $data['ctrl']['negara'] = '';
        $data['ctrl']['link'] = '';
        $data['ctrl']['page'] = 'input';
        $data['ctrl']['tipe'] = 'Input';
        $data['ctrl']['navigation1'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
    }
	
	 public function inputteam($id_negara=1) {
	 	
        $data['ctrl']['team'] = '';
        $data['ctrl']['negara'] = '';
        $data['ctrl']['link'] = '';
        $data['ctrl']['page'] = 'input';
        $data['ctrl']['tipe'] = 'Input';
		$data['ctrl']['negara']=$this->m_bola->negarabyid($id_negara);
		$data['status']='input';
        $data['ctrl']['navigation2'] = 'active';
        $data['ctrl']['navigation1'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
    }

    public function do_input($id_team=0) {
    	echo $this->input->post('negara');
		echo '</br>';
        echo $this->m_bola->get_id_negara($this->input->post('negara'));
        echo '</br>';
        echo $this->input->post('team');
        echo '</br>';
        echo $this->input->post('link');
        echo '</br>';
        echo $id_team;
		$data['et']=sizeof($this->m_bola->extratime_list()) ;
        $data['id_negara'] = $this->m_bola->get_id_negara($this->input->post('negara'));
        $data['team'] = $this->input->post('team');
        $data['link'] = $this->input->post('link');
        
		//print_r($data);exit();
        if ($this->input->post('tipe') == 'Input') {
            if ($this->m_bola->input_team($data)) {
                echo 'sukses input';
            } else
                echo 'gagal input';
            redirect('/administrator/list_team/', 'refresh');
        }

        if ($this->input->post('tipe') == 'Edit') {
        	$data['id_team'] = $this->uri->segment(3);
            if ($this->m_bola->edit_team($data)) {
                echo 'sukses edit';
            } else 
                echo 'gagal edit';
            redirect('/administrator/list_team/', 'refresh');
        }
    }

	public function do_input_negara() {
		
		$data['negara']=$this->input->post('negara');
       
            if ($this->m_bola->input_negara($data)) {
                echo 'sukses input';
            } else
                echo 'gagal input';
        redirect('/administrator/list_team/', 'refresh');
    }

    public function list_team($id_negara=1) {
        $order_by = $this->input->get('order');
        $data['ctrl']['page'] = 'list_team';
        $data['ctrl']['navigation2'] = 'active';
        $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
        $data['list_team'] = $this->m_bola->list_team($order_by, $id_negara);
		$data['list_negara'] = $this->m_bola->getnegara();
		$data['et']=sizeof($this->m_bola->extratime_list()) ;
		$data['id_negara'] = $id_negara;
		
        $this->load->view('admin/main', $data);
    }
	
	public function pilihlistteam()
	{
		$id_negara = $this->input->post('negara');
		redirect('/administrator/list_team/'.$id_negara, 'refresh');
	}

    public function edit_team($id_team = 0) {
        $dt = $this->m_bola->getteambyid($id_team);
		$data['status']='edit';
        $data['ctrl']['team'] = $dt->team;
        $data['ctrl']['negara'] = $dt->negara;
        $data['ctrl']['link'] = $dt->link;
        $data['ctrl']['page'] = 'input';
        $data['ctrl']['tipe'] = 'Edit';
        $data['ctrl']['navigation2'] = 'active';
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
        $this->load->view('admin/main', $data);
    }

    public function delete_team($id_team = 0) {
        if ($this->m_bola->delete_team($id_team)) {
        	if($this->m_bola->deletedom($id_team))
        	{
        		 redirect('/administrator/list_team/', 'refresh');
        	}
        } else
            echo 'gagal delete team';
    }

    public function extratimelist() 
    {
    	$edited=0;
        $order_by = $this->input->get('order');
        $data['ctrl']['navigation5'] = 'active';
        $data['ctrl']['page'] = 'extratimelist';
        $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation2'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
        $data['extratime'] = $this->m_bola->extratime_list($order_by,$edited);
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
    }
	
	public function extratimeedited()
	{
		$edited=1;
		$order_by = $this->input->get('order');
        $data['ctrl']['navigation5'] = 'active';
        $data['ctrl']['page'] = 'extratimeedited';
        $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation2'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
        $data['extratime'] = $this->m_bola->extratime_list($order_by,$edited);
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
	}

    public function barang($uri1 = 'movie', $itm = 0) 
    {
        //pagination config
        $jml_row = $this->db->get('barang');
        $config['base_url'] = base_url() . 'administrator/barang/' . $uri1;
        $config['total_rows'] = $jml_row->num_rows();
        $config['per_page'] = '10';
        $config['uri_segment'] = '4';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        //inisialisasi config
        $this->pagination->initialize($config);

        $page = 'barang-' . $uri1;
        $list_barang = $this->m_barang->list_barang($uri1, $config['per_page'], $itm);

        $data['ctrl']['list_barang'] = $list_barang;
        $data['ctrl']['page'] = $page;
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $data['ctrl']['navigation3'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = '';
        //$data['ctrl']['halaman'] = $this -> pagination -> create_links();
        $this->load->view('admin/main', $data);
    }

    public function tambah($uri1 = 'movie') {
        $page = 'tambah-' . $uri1;
        $list_quality = '';
        $list_negara = '';
        if ($uri1 == 'movie') {

            $list_quality = $this->m_barang->list_quality();
            $list_negara = $this->m_barang->list_negara();
        }
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $data['ctrl']['page'] = $page;
        $data['ctrl']['quality'] = $list_quality;
        $data['ctrl']['negara'] = $list_negara;
        $this->load->view('admin/main', $data);
    }

    public function do_tambah_barang($tipe = '') {

        //barang
        $ins_data['nama_barang'] = '';
        $ins_data['img_url'] = '';
        $ins_data['summary'] = '';
        $ins_data['id_tipe_barang'] = '';
        $ins_data['id_negara'] = '';
        $ins_data['id_quality'] = '';
        $ins_data['datetime_post'] = date('Y-m-d H:i:s');
        $ins_data['size'] = '';
        $ins_data['imdb_link'] = '';
        $ins_data['youtube_link'] = '';
        $ins_data['release_date'] = '';

        //labels
        $labels = $this->input->post('labels');
        $ins_label = explode(',', $labels);

        if ($tipe == 'movie') {
            $ins_data['nama_barang'] = $this->input->post('nama_barang');
            $ins_data['id_tipe_barang'] = '1';
            $ins_data['summary'] = $this->input->post('summary');
            $ins_data['id_negara'] = $this->input->post('id_negara');
            $ins_data['id_quality'] = $this->input->post('id_quality');
            $ins_data['size'] = $this->input->post('size');
            $ins_data['imdb_link'] = $this->input->post('imdb_link');
            $ins_data['youtube_link'] = $this->input->post('youtube_link');
            $ins_data['release_date'] = $this->input->post('release_date');
        }

        //uplod dulu
        $config['file_name'] = str_replace(' ', '-', trim($ins_data['nama_barang'] . ' ' . $ins_data['tahun'] . ' ' . $ins_data['id_tipe_barang'] . ' ' . $ins_data['id_quality']));
        $config['upload_path'] = './storage/barang';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $url_upload = '';
            $error = array('error' => $this->upload->display_errors());
        } else {
            $img_data = $this->upload->data();
            $img_ext = $img_data['file_ext'];
            $url_upload = './storage/barang/' . $config['file_name'] . $img_ext;
        }

        $ins_data['img_url'] = $url_upload;

        if ($this->m_barang->tambah_barang($ins_data, $ins_label)) {
            //echo 'sukses';
            redirect('/administrator/barang/' . $tipe, 'refresh');
        } else {

            redirect('/administrator/tamabah/' . $tipe, 'refresh');
        }
    }

    public function summary($page=0) {
    	$f=$this->input->get('f');
		if ($f==0){
			$f=2;
		}
        $data['listnegara'] = $this->m_bola->getnegara();
		$tipe='oe';
        $data['ctrl']['page'] = 'summary';
		$data['f'] = $f;
        $data['ctrl']['navigation4'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
        $data['summary'] = $this->m_bola->getallsummary($page,$tipe,$f);
        $data['tanggal'] = $this->m_bola->tanggalsummary($page);
        //$data['jumlahperulangan']=$this->getjumlahperulangan($data['summary']);
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
    }

    public function summaryou($page=0) {
    	$f=$this->input->get('f');
		if ($f==0){
			$f=2;
		}
        $data['ctrl']['page'] = 'summaryou';
        $tipe='ou';
		$data['f'] = $f;$data['f'] = $f;
        $data['ctrl']['navigation7'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation4'] = '';
        $data['summary'] = $this->m_bola->getallsummary($page,$tipe,$f);
        $data['tanggal'] = $this->m_bola->tanggalsummary($page);
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
    }

    public function rekap($id_negara=1) {
    	

        $data['ctrl']['page'] = 'rekap';
        $data['ctrl']['navigation3'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
		
		$data['list_negara'] = $this->m_bola->getnegara();
		//$data['id_negara'] = $id_negara;
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
		$order=$this->input->get('order');
		
		if(empty($order))
		{
			$order='id_team';
		}
	
        $data['teams'] = $this->m_bola->getdatateampernegara($id_negara , $order);
        $this->load->library('pagination');

        //$config['base_url'] = base_url('index.php/administrator/rekap/');
        //$config['total_rows'] = 200;
        //$config['per_page'] = 20;
        //$config['use_page_numbers'] = FALSE;
        //$this->pagination->initialize($config);
        //$data['halaman'] = $this->pagination->create_links();
        $data['halaman'] = '';
        $this->load->view('admin/main', $data);
    }

	public function pilihrekap()
	{
		$id_negara=$this->input->post('negara');
		redirect('/administrator/rekap/' . $id_negara, 'refresh');
	}

	public function inputnegara()
	{
		 $data['ctrl']['team'] = '';
        $data['ctrl']['negara'] = '';
        $data['ctrl']['link'] = '';
        $data['ctrl']['page'] = 'inputnegara';
        $data['ctrl']['navigation1'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation6'] = $data['ctrl']['navigation7'] = '';
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
	}


	public function pilihrekapou()
	{
		$id_negara=$this->input->post('negara');
		redirect('/administrator/rekapou/' . $id_negara, 'refresh');
	}

    public function rekapou($id_negara = 1) {
        $data['list_negara'] = $this->m_bola->getnegara();

        $data['ctrl']['page'] = 'rekapou';
        $data['ctrl']['navigation6'] = 'active';
        $data['ctrl']['navigation2'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation5'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation7'] = '';
		
		$order=$this->input->get('order');
		
		if(empty($order))
		{
			$order='id_team';
		}
        $data['teams'] = $this->m_bola->getdatateampernegara($id_negara, $order);
        $this->load->library('pagination');

        //$config['base_url'] = base_url('index.php/administrator/rekap/');
        //$config['total_rows'] = 200;
        //$config['per_page'] = 20; 
        // $this->pagination->initialize($config);
        // $data['halaman'] = $this->pagination->create_links();
        $data['halaman'] = '';
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
        $this->load->view('admin/main', $data);
    }

    public function hapus($id_tipe = '', $id_barang = '') {
        $tipe_barang = $this->m_barang->get_tipe_barang_by_id_tipe_barang($id_tipe);
        if ($this->m_barang->hapus_barang($id_tipe, $id_barang)) {
            redirect('/administrator/barang/' . $tipe_barang, 'refresh');
        } else
            redirect('/administrator/barang/' . $tipe_barang, 'refresh');
    }

    public function dograb() {
        //$url='http://id.soccerway.com/teams/england/manchester-city-football-club/676/matches/';
        $url = $this->input->get('link');
        $id_team = $this->input->get('id_team');
        $dom = $this->domScore($url, $id_team);
        $this->insertDom($dom);
        //echo '<pre>';
        //echo print_r($dom);
       	//echo '</pre>';
		//exit();
        redirect('/administrator/list_team/', 'refresh');
    }

    public function domScore($url = '', $id_team = 0) {

        $this->load->library('simple_html_dom');
        $html = file_get_html($url);
        $row = $html->find('tr[class=match]');

        $match = null;
        $i = 0;
        foreach ($row as $r) {
            $comp = $r->find('td[class=competition]');

            if ($comp[0]->plaintext != 'CLF') {
                $date = $r->find('td[class=full-date]');
                $score = $r->find('td[class=score-time score]');
                $time = $r->find('td[class=score-time status]');
                $comp = $r->find('td[class=competition]');
                $status = 1;
                if (!empty($score)) {
                    $score = $score[0]->plaintext;
                    $score_ex = explode('-', $score);
                    $score1 = trim($score_ex[0]);
                    $score2 = trim($score_ex[1]);
                } else {
                    $score = '';
                    $score1 = '';
                    $score2 = '';
                }
                if (!empty($time)) {
                    $status = 0;

                    $time = $time[0]->plaintext;
                } else {
                    $time = '';
                }

                $match[$i]['date'] = $this->dmytoymd(trim($date[0]->plaintext));
                $match[$i]['competition'] = trim($comp[0]->plaintext);
                $match[$i]['score1'] = preg_replace("/[^0-9]/", "", trim($score1));
                $match[$i]['score2'] = preg_replace("/[^0-9]/", "", trim($score2));
                $match[$i]['extratime'] = (strpos($score, 'E')) ? 1 : 0;
                ;
                $match[$i]['id_team'] = $id_team;
                $match[$i]['time'] = str_replace(' ', '', str_replace('-', '', trim($time)));
                $match[$i]['status_tanding'] = trim($status);
                $match[$i]['result'] = $this->result($match[$i]['score1'], $match[$i]['score2'], 1);
                $match[$i]['result2'] = $this->result($match[$i]['score1'], $match[$i]['score2'], 2);
                $i++;
            }
        }
        //echo '<pre>';
        //echo print_r($match);
        //echo '</pre>';exit();
        //insert dom
        return $match;
    }

	public function editteam($id_team=0)
	{
		 $data['et']=sizeof($this->m_bola->extratime_list()) ;
		$data['page']='edit_team';
		$this->load->view('main',$data);
	}

    public function insertDom($data) {

        $this->load->model('m_dom');
        foreach ($data as $m) {
            $isedited = $this->m_dom->cekedited($m);
			
            if ($this->m_dom->cekdataisexist($m['id_team'], $m['date']) && $isedited != 1) {
               $this->m_dom->updatedom($m);
            } else if($isedited != 1){
              $this->m_dom->insertdom($m);
            }
        }
		
    }

    public function dmytoymd($date = '') {
        $ex_date = explode('/', $date);
        $datebaru = '20' . $ex_date[2] . '-' . $ex_date[1] . '-' . $ex_date[0];
        return $datebaru;
    }

    public function result($score1 = '', $score2 = '', $tipe = 1) {
        if ($tipe == 1) {
            if (($score1 + $score2) % 2 == 0)
                return 'E';
            else
                return 'O';
        }else {
            if (($score1 + $score2) < 2.5)
                return 'U';
            else
                return 'O';
        }
    }

    public function syncronizrall($id_negara=0) {
        $team = $this->m_bola->list_team('id_team', $id_negara);
        foreach ($team as $key => $t) {
            $url = $t['link'];
            $id_team = $t['id_team'];
            $dom = $this->domScore($url, $id_team);
            $this->insertDom($dom);
        }
        redirect('/administrator/list_team/'.$id_negara, 'refresh');
    }

    public function edit_dom() {
        $result1 = $this->input->post('result1');
        $result2 = $this->input->post('result2');
        $id_dom = $this->input->post('id_dom');

        $data['result'] = $result1;
        $data['result2'] = $result2;
        $data['edited'] = 1;
        $this->m_bola->edit_dom($data, $id_dom);

        redirect('/administrator/extratimelist/', 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
