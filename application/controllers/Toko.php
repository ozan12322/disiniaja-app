<?php 

	class Toko extends CI_Controller {
		public function index(){
			$data['barang'] = $this->Model_barang->tampil_data()->result();

			$this->load->view('templates/header_toko');
			$this->load->view('templates/sidebar_toko');
			$this->load->view('toko/index', $data);
			$this->load->view('templates/footer_toko');

		}
	}