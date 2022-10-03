<?php

class Dashboard extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '4') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('Welcome');
		}
	}
	public function index()
	{
		// query yang mengambil dan menampilkan ke halaman dasboard
		$data['title'] = "Divisi Layanan TI & Administrasi Umum";
		$this->load->view('admin/divisi_view_3/templates_divisi3/header', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/sidebar');
		$this->load->view('admin/divisi_view_3/dashboard', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/footer');
	}
}
?>