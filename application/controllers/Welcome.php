<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$data['title']	= "Form Login";
			$this->load->view('admin/akun/templates_admin/header', $data);
			$this->load->view('admin/formLogin');
		} else {
			$user_admin = $this->input->post('user_admin');
			$password_admin = $this->input->post('password_admin');

			 $cek = $this->pelayananModel->cek_login($user_admin, $password_admin);

			 if ($cek == FALSE) 
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Username atau password salah!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
				 	redirect('Welcome');
			} else {
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('nama_admin',$cek->nama_admin);
				$this->session->set_userdata('photo_admin',$cek->photo_admin);
				$this->session->set_userdata('id_admin',$cek->id_admin);
			 	switch ($cek->hak_akses) {
	  		 		case 1	: 	redirect('admin/akun/Dashboard');
			 					break;
			 		case 2	: 	redirect('admin/divisi1/Dashboard');
			 					break;
			 		case 3	: 	redirect('admin/divisi2/Dashboard');
			 					break;
			 		case 4	: 	redirect('admin/divisi3/Dashboard');
			 					break;
			 		default : 	break;
			}
		}
	}
}
	 	public function _rules()
		{
			$this->form_validation->set_rules('user_admin','Username Admin','required');
			$this->form_validation->set_rules('password_admin','Password Admin','required');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('Welcome');
		}
}
