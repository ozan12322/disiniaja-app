<?php 

	class Toko extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model_barang');
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data['judul'] = 'One Archery Shop';
			$data['barang'] = $this->Model_barang->tampil_data()->result();

			$this->load->view('templates/header_toko', $data);
			$this->load->view('templates/sidebar_toko');
			$this->load->view('toko/index', $data);
			$this->load->view('templates/footer_toko');

		}
		public function tambah_ke_keranjang($id)
		{
			$barang = $this->Model_barang->find($id);

			$data = array(
				'id' => $barang->id_brg,
				'qty' => 1,
				'price' => $barang->harga,
				'name' => $barang->nama_brg
			);

			$this->cart->insert($data);
			redirect('toko');
		}

		public function hapus_cart(){
			$this->cart->destroy();
			redirect('toko/index');
		}

		public function check_out(){

			$this->load->view('templates/header_checkout');
			$this->load->view('templates/sidebar_toko');
			$this->load->view('toko/checkout');
			$this->load->view('templates/footer_checkout');
		}

	}