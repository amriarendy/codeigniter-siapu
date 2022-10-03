<?php

class Dashboard extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '3') {
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
		$data['title'] = "Divisi Infrastruktur & Jaringan";
		$this->load->view('admin/divisi_view_2/templates_divisi2/header', $data);
		$this->load->view('admin/divisi_view_2/templates_divisi2/sidebar');
		$this->load->view('admin/divisi_view_2/dashboard', $data);
		$this->load->view('admin/divisi_view_2/templates_divisi2/footer');
	}
}
?>