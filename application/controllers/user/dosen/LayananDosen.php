<?php
class layananDosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_layanan') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('AuthUser');
		}
	}
    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('user/templates_dosen/header', $data);
        $this->load->view('user/templates_dosen/sidebar');
        $this->load->view('user/dosen/layanan_dosen', $data);
        $this->load->view('user/templates_dosen/footer');
    }
}