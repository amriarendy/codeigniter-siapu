<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUser extends CI_Controller
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
            $this->load->view('user/userLogin');
            $this->load->view('user/templates_user/auth_footer');
        } else {
            // validasinya succes biar methodnya tidak terlalu panjang jadi dibuatkan method private
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->select('*')->from('user a')->join('ujian_ti b', 'b.user_id=a.id', 'left')->join('nidn c', 'c.user_id=a.id', 'left')->where('a.username',$username)->get()->row_array();
        
        //Jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'hak_layanan' => $user['hak_layanan'],
                        'id' => $user['id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['hak_layanan'] == 1) {
                        redirect('user/dosen/Dashboard');
                    } elseif ($user['hak_layanan'] == 2) {
                        redirect('user/mahasiswa/Dashboard');
                    } else {
                    	redirect('user/public_user/Dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">
                    Password Salah!</div>');
                    redirect('AuthUser');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">
                Email Anda Belum Aktif. Tunggu Admin Mengaktifkan</div>');
                redirect('AuthUser');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">
            Email Anda Belum Terdaftar</div>');
            redirect('AuthUser');
        }
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
                $this->load->view('user/templates_user/auth_header');
                $this->load->view('user/userRegistrasi');
                $this->load->view('user/templates_user/auth_footer');
            } else {

                $data = [
                    'name_user' => htmlspecialchars($this->input->post('name_user', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'image' => 'default.png',
                    'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                    'hak_layanan' => htmlspecialchars($this->input->post('hak_layanan', true)),
                    'date_created' => time()
                ];
                $this->db->insert('user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Selamat Akun Anda Terdaftar, Silahkan Login :)</div>');
                redirect('AuthUser');
            }
        }

    public function regisDosen()
    {
        $this->form_validation->set_rules('telp', 'Nomor Handphone', 'required|trim');
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
        $this->form_validation->set_rules('jenis_dosen', 'Jenis Dosen', 'required|trim');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('name_user', 'Nama tidak boleh kosong', 'required|trim');
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
                'is_active' => '1',
                'cek_actived' => '1',
                'hak_layanan' => '1'

             ];
            $file = array(
                'image' => $image,
                'berkas' => $berkas,
            );

            $this->db->insert('user', $data, $file);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert" align="center">
            Selamat Akun Anda Terdaftar</div>');
            redirect('AuthUser');
        }
    }
    public function regisMahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('telp', 'Nomor Handphone', 'required|trim');
        $this->form_validation->set_rules('ktm', 'Nomor KTM', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('name_user', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Email', 'required|trim|valid_email|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'is_unique' => 'Email Sudah Pernah Digunakan!',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates_user/auth_header');
            $this->load->view('user/mahasiswaRegistrasi');
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
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'prodi' => htmlspecialchars($this->input->post('prodi', true)),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'semester' => htmlspecialchars($this->input->post('semester', true)),
                'ktm' => htmlspecialchars($this->input->post('ktm', true)),
                'is_active' => '1',
                'cek_actived' => '1',
                'hak_layanan' => '2'

             ];
            $file_image = array(
                'image' => $image,
            );
            $file_berkas = array(
                'berkas' => $berkas,
            );

            $this->db->insert('user', $data, $file_berkas, $file_image);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert" align="center">
            Selamat Akun Anda Terdaftar</div>');
            redirect('AuthUser');
        }
    }
    public function regisPublic()
    {
        $this->form_validation->set_rules('telp', 'Handphone', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('name_user', 'Name', 'required|trim');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('username', 'Email', 'required|trim|valid_email|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'is_unique' => 'Email Sudah Pernah Digunakan!',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates_user/auth_header');
            $this->load->view('user/publicRegistrasi');
            $this->load->view('user/templates_user/auth_footer');
        } else {
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

            $data = [
                'name_user' => htmlspecialchars($this->input->post('name_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'instansi' => htmlspecialchars($this->input->post('instansi', true)),
                'is_active' => '1',
                'cek_actived' => '1',
                'hak_layanan' => '3'

             ];
            $file_image = array(
                'image' => $image,
            );

            $this->db->insert('user', $data, $file_berkas, $file_image);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert" align="center">
            Selamat Akun Anda Terdaftar</div>');
            redirect('AuthUser');
        }
    }
    
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('AuthUser');
		}
	
}
