<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekUser extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('user/templates_user/auth_header');
            $this->load->view('view_cek/logincek');
            $this->load->view('user/templates_user/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //Jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['cek_actived'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'hak_layanan' => $user['hak_layanan'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['hak_layanan'] == 1) {
                        redirect('cek_aktived/CekDosen');
                    } elseif ($user['hak_layanan'] == 2) {
                        redirect('cek_aktived/CekMahasiswa');
                    } else {
                        redirect('cek_aktived/CekPublic');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">
                    Password Salah!</div>');
                    redirect('CekUser');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" align="center">
                Akun Anda Sudah Aktif, Silahkan Login...</div>');
                redirect('CekUser');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">
            Email Anda Belum Terdaftar</div>');
            redirect('CekUser');
        }
    }

    public function Edit()
    {
        $this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
        $this->form_validation->set_rules('jenis_dosen', 'Jenis Dosen', 'required|trim');
        $this->form_validation->set_rules('instansi', 'instansi', 'required|trim');
        $this->form_validation->set_rules('name_user', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Email', 'required|trim|valid_email|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'is_unique' => 'Email Sudah Pernah Digunakan!',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates_user/auth_header');
            $this->load->view('user/dosenRegistrasi');
            $this->load->view('user/templates_user/auth_footer');
        } else {
            $berkas = $_FILES['berkas']['name'];
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = './assets/file/photo_user/';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $this->db->set('image', $image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            if ($berkas) {
                $config['upload_path'] = './assets/file/berkas_user/';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('berkas')) {
                    $berkas = $this->upload->data('file_name');
                    $this->db->set('berkas', $berkas);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'name_user' => htmlspecialchars($this->input->post('name_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'nidn' => htmlspecialchars($this->input->post('nidn', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'unit_kerja' => htmlspecialchars($this->input->post('unit_kerja', true)),
                'jenis_dosen' => htmlspecialchars($this->input->post('jenis_dosen', true)),
                'instansi' => htmlspecialchars($this->input->post('instansi', true)),
                'hak_layanan' => '1'

             ];
            $file = array(
                'image' => $image,
                'berkas' => $berkas,
            );

            $this->db->insert('user', $data, $file);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert" align="center">
            Selamat Akun Anda Terdaftar</div>');
            redirect('CekUser');
        }
    }
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('CekUser');
		}
	
}
