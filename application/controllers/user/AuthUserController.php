<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUserController extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$data['title']	= "Form Login";
			$this->load->view('user/templates_user/header', $data);
			$this->load->view('user/userLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			 $cek = $this->pelayananModel->cek_login_user($username, $password);

			 if ($cek == FALSE) 
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Username atau password salah!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
				 	redirect('AuthUser');
			} else {
				$this->session->set_userdata('hak_layanan',$cek->hak_layanan);
				$this->session->set_userdata('name_user',$cek->name_user);
				$this->session->set_userdata('image',$cek->image);
				$this->session->set_userdata('id',$cek->id);
			 	switch ($cek->hak_layanan) {
	  		 		case 1	: 	redirect('user/dosen/dashboard');
			 					break;
			 		case 2	: 	redirect('user/mahasiswa/dashboard');
			 					break;
			 		case 3	: 	redirect('user/public_user/dashboard');
			 					break;
			 		default : 	break;
			}
		}
	}
}
	 	public function _rules()
		{
			$this->form_validation->set_rules('username','Email','required');
			$this->form_validation->set_rules('password','password','required');
		}

		 public function registration()
    {
        $this->form_validation->set_rules('name_user', 'Name', 'required|trim');
        $this->form_validation->set_rules('hak_layanan', 'status', 'required|trim');
        $this->form_validation->set_rules('username', 'Email', 'required|trim|valid_email|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'is_unique' => 'Email Sudah Pernah Digunakan!',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // untuk membuat sebuah title di auth_header
            // $data['title'] = 'WPU User Registration';
            $this->load->view('user/templates_user/auth_header');
            $this->load->view('user/userRegistrasi');
            $this->load->view('user/templates_user/auth_footer');
        } else {

            $data = [
                'name_user' => htmlspecialchars($this->input->post('name_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.png',
                'password' => md5($this->input->post('password1'),),
                'hak_layanan' => htmlspecialchars($this->input->post('hak_layanan', true)),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Selamat Akun Anda Terdaftar, Silahkan Login :)</div>');
            redirect('AuthUser');
        }
    }
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('AuthUser');
		}
}
