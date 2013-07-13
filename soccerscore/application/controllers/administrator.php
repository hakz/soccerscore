<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('m_barang');
		$this -> load -> model('m_bola');

	}

	public function index() {
		$data['ctrl']['page'] = 'blank';
		$data['ctrl']['navigation1'] = $data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = '';
		$this -> load -> view('admin/main', $data);
	}

	public function input() {
		$data['ctrl']['page'] = 'input';
		$data['ctrl']['navigation1'] = 'active';
		$data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = '';

		$this -> load -> view('admin/main', $data);
	}

	public function do_input() {
		echo $this -> m_bola -> get_id_negara($this -> input -> post('negara'));
		echo '</br>';
		echo $this -> input -> post('team');
		echo '</br>';
		echo $this -> input -> post('link');
		//get id negara

		$data['id_negara'] = $this -> m_bola -> get_id_negara($this -> input -> post('negara'));
		$data['team'] = $this -> input -> post('team');
		$data['link'] = $this -> input -> post('link');

		if ($this -> m_bola -> input_team($data)) {
			echo 'sukses input';
		} else
			echo 'gagal input';
		redirect('/administrator/list_team/', 'refresh');
	}

	public function list_team() {
		$data['ctrl']['page'] = 'list_team';
		$data['ctrl']['navigation2'] = 'active';
		$data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = '';
		$data['list_team'] = $this -> m_bola -> list_team();
		$this -> load -> view('admin/main', $data);
	}

	public function delete_team($id_team = 0) {
		if ($this -> m_bola -> delete_team($id_team)) {
			redirect('/administrator/list_team/', 'refresh');
		} else
			echo 'gagal delete team';

	}

	public function barang($uri1 = 'movie', $itm = 0) {
		//pagination config
		$jml_row = $this -> db -> get('barang');
		$config['base_url'] = base_url() . 'administrator/barang/' . $uri1;
		$config['total_rows'] = $jml_row -> num_rows();
		$config['per_page'] = '10';
		$config['uri_segment'] = '4';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';
		//inisialisasi config
		$this -> pagination -> initialize($config);

		$page = 'barang-' . $uri1;
		$list_barang = $this -> m_barang -> list_barang($uri1, $config['per_page'], $itm);

		$data['ctrl']['list_barang'] = $list_barang;
		$data['ctrl']['page'] = $page;

		$data['ctrl']['navigation3'] = 'active';
		$data['ctrl']['navigation2'] = $data['ctrl']['navigation1'] = $data['ctrl']['navigation4'] = '';
		//$data['ctrl']['halaman'] = $this -> pagination -> create_links();
		$this -> load -> view('admin/main', $data);
	}

	public function tambah($uri1 = 'movie') {
		$page = 'tambah-' . $uri1;
		$list_quality = '';
		$list_negara = '';
		if ($uri1 == 'movie') {

			$list_quality = $this -> m_barang -> list_quality();
			$list_negara = $this -> m_barang -> list_negara();
		}
		$data['ctrl']['page'] = $page;
		$data['ctrl']['quality'] = $list_quality;
		$data['ctrl']['negara'] = $list_negara;
		$this -> load -> view('admin/main', $data);
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
		$labels = $this -> input -> post('labels');
		$ins_label = explode(',', $labels);

		if ($tipe == 'movie') {
			$ins_data['nama_barang'] = $this -> input -> post('nama_barang');
			$ins_data['id_tipe_barang'] = '1';
			$ins_data['summary'] = $this -> input -> post('summary');
			$ins_data['id_negara'] = $this -> input -> post('id_negara');
			$ins_data['id_quality'] = $this -> input -> post('id_quality');
			$ins_data['size'] = $this -> input -> post('size');
			$ins_data['imdb_link'] = $this -> input -> post('imdb_link');
			$ins_data['youtube_link'] = $this -> input -> post('youtube_link');
			$ins_data['release_date'] = $this -> input -> post('release_date');
		}

		//uplod dulu
		$config['file_name'] = str_replace(' ', '-', trim($ins_data['nama_barang'] . ' ' . $ins_data['tahun'] . ' ' . $ins_data['id_tipe_barang'] . ' ' . $ins_data['id_quality']));
		$config['upload_path'] = './storage/barang';
		$config['allowed_types'] = 'gif|jpg|png';

		$this -> load -> library('upload', $config);

		if (!$this -> upload -> do_upload()) {
			$url_upload = '';
			$error = array('error' => $this -> upload -> display_errors());
		} else {
			$img_data = $this -> upload -> data();
			$img_ext = $img_data['file_ext'];
			$url_upload = './storage/barang/' . $config['file_name'] . $img_ext;
		}

		$ins_data['img_url'] = $url_upload;

		if ($this -> m_barang -> tambah_barang($ins_data, $ins_label)) {
			//echo 'sukses';
			redirect('/administrator/barang/' . $tipe, 'refresh');
		} else {

			redirect('/administrator/tamabah/' . $tipe, 'refresh');
		}
	}

	public function order($uri1 = 'waiting') {
		$page = 'order-' . $uri1;

		$data['ctrl']['page'] = $page;
		$data['ctrl']['navigation2'] = 'active';
		$data['ctrl']['navigation1'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation4'] = '';
		$this -> load -> view('admin/main', $data);
	}

	public function summary() {
		$data['ctrl']['page'] = 'summary';
		$data['ctrl']['navigation4'] = 'active';
		$data['ctrl']['navigation2'] = $data['ctrl']['navigation3'] = $data['ctrl']['navigation1'] = '';
		$this -> load -> view('admin/main', $data);
	}
        
        public function rekap(){
                $data['ctrl']['page'] = 'rekap';
		$data['ctrl']['navigation3'] = 'active';
		$data['ctrl']['navigation2'] = $data['ctrl']['navigation4'] = $data['ctrl']['navigation1'] = '';
		$this -> load -> view('admin/main', $data);
        }

        public function hapus($id_tipe = '', $id_barang = '') {
		$tipe_barang = $this -> m_barang -> get_tipe_barang_by_id_tipe_barang($id_tipe);
		if ($this -> m_barang -> hapus_barang($id_tipe, $id_barang)) {
			redirect('/administrator/barang/' . $tipe_barang, 'refresh');
		} else
			redirect('/administrator/barang/' . $tipe_barang, 'refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
