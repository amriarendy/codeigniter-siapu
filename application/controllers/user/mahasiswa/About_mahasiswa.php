<?php

class about_mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('hak_layanan') != '2') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('AuthUser');
		}
	}
	public function index()
	{
		// query yang mengambil dan menampilkan ke halaman dasboard
		$data['title'] = "Halaman About";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar', $data);
		$this->load->view('user/mahasiswa/about_mahasiswa', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/footer');
	}
	
 }
