<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard_admin extends CI_Controller {
		public function __construct(){
			parent::__construct();
			is_logged_in();
           $this->load->library('form_validation');
			// if(!$this->session->userdata('email')){
			// 	redirect('auth');
			// }
		}

		public function index(){
			$data['title'] = "Dashboard";
			$data['user'] = $this->db->get_where('user', ['email' => 
			$this->session->userdata('email')])->row_array();
			$data['barang'] = $this->Model_barang->tampil_data()->result();	
			$this->load->view('templates_admin/header_admin');
			$this->load->view('templates_admin/sidebar_admin', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('templates_admin/footer_admin');
		}

    



}