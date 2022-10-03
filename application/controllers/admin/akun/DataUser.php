<?php

class DataUser extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '1') {
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
		$data['title'] = "Data User";
		$this->load->model('MainModel','Dosen');
        // load library
        $this->load->library('pagination');
        // Code Data Keyword PEncarian
        if ($this->input->post('submit')) 
        {
            $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
         }else{
             $data['keyword']=$this->session->userdata('keyword');
        }
        //config
        $config['base_url'] = base_url('admin/akun/DataUser/index');

        $this->db->from('user');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(5);
        $data['tbl_user'] = $this->Dosen->get_user('user', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/data_folder/data_user/view_user', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}
	public function tambahData()
	{
		$data['title'] = "Tambah Data User";
		$data['tbl_user'] = $this->pelayananModel->get_data('user')->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/data_folder/data_user/insert_user', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}
	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$id = $thsi->input->post('id');
			$name_user = $this->input->post('name_user');
			$name_user = $this->input->post('name_user');
			$username = $this->input->post('username');
			$telp = $this->input->post('telp');
			$hak_layanan = $this->input->post('hak_layanan');
			$password = md5($this->input->post('password'));
			$nidn = $this->input->post('nidn');
			$nip = $this->input->post('nip');
			$jenis_dosen = $this->input->post('jenis_dosen');
			$unit_kerja = $this->input->post('unit_kerja');
			$nim = $this->input->post('nim');
			$prodi = $this->input->post('prodi');
			$semester = $this->input->post('semester');
			$ktm = $this->input->post('ktm');
			$no_ktp = $this->input->post('no_ktp');
			$alamat = $this->input->post('alamat');
			$pekerjaan = $this->input->post('pekerjaan');
			$instansi = $this->input->post('instansi');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$is_active = $this->input->post('is_active');
			$cek_actived = $this->input->post('cek_actived');
			$notice = $this->input->post('notice');
			$image = $_FILES['image']['name'];
			$berkas = $_FILES['berkas']['name'];
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
			$data = array(
				'name_user' => $name_user,
				'username' => $username,
				'hak_layanan' => $hak_layanan,
				'image' => 'default.png',
				'telp' => $telp,
				'password' => $password,
				'nidn' => $nidn,
				'nip' => $nip,
				'jenis_dosen' => $jenis_dosen,
				'unit_kerja' => $unit_kerja,
				'nim' => $nim,
				'prodi' => $prodi,
				'semester' => $semester,
				'ktm' => $ktm,
				'no_ktp' => $no_ktp,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'instansi' => $instansi,
				'tgl_lahir' => $tgl_lahir,
				'is_active' => $is_active,
				'cek_actived' => $cek_actived,
				'notice' => $notice,
			);
			$where = array(
				'id' => $id
			);
			$file = array(
				'image' => $image,
				'berkas' => $berkas
			);
			$this->pelayananModel->insert_data('user', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/DataUser');
		}
	}

	//update data
	public function updateData($id)
	{
		$where = array('id' => $id);
		$data['tbl_user'] = $this->db->query("SELECT * FROM user WHERE id='$id'")->result();
		$data['title'] = "Update Data User";
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/data_folder/data_user/update_user', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}
	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateData($this->input->post('id'));
		} else {
			$id = $this->input->post('id');
			$name_user = $this->input->post('name_user');
			$username = $this->input->post('username');
			$telp = $this->input->post('telp');
			$hak_layanan = $this->input->post('hak_layanan');
			$nidn = $this->input->post('nidn');
			$nip = $this->input->post('nip');
			$jenis_dosen = $this->input->post('jenis_dosen');
			$unit_kerja = $this->input->post('unit_kerja');
			$nim = $this->input->post('nim');
			$prodi = $this->input->post('prodi');
			$semester = $this->input->post('semester');
			$ktm = $this->input->post('ktm');
			$no_ktp = $this->input->post('no_ktp');
			$alamat = $this->input->post('alamat');
			$pekerjaan = $this->input->post('pekerjaan');
			$instansi = $this->input->post('instansi');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$is_active = $this->input->post('is_active');
			$cek_actived = $this->input->post('cek_actived');
			$notice = $this->input->post('notice');
			$image = $_FILES['image']['name'];
			$berkas = $_FILES['berkas']['name'];
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

			$data = array(
				'name_user' => $name_user,
				'username' => $username,
				'hak_layanan' => $hak_layanan,
				'telp' => $telp,
				'nidn' => $nidn,
				'nip' => $nip,
				'jenis_dosen' => $jenis_dosen,
				'unit_kerja' => $unit_kerja,
				'nim' => $nim,
				'prodi' => $prodi,
				'semester' => $semester,
				'ktm' => $ktm,
				'no_ktp' => $no_ktp,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'instansi' => $instansi,
				'tgl_lahir' => $tgl_lahir,
				'is_active' => $is_active,
				'cek_actived' => $cek_actived,
				'notice' => $notice,
			);
			$file = array(
                'image' => $image,
                'berkas' => $berkas,
            );
			$where = array(
				'id' => $id
			);

			$this->pelayananModel->update_data('user', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/DataUser');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('name_user', 'nama', 'required');
		$this->form_validation->set_rules('username', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
		$this->form_validation->set_rules('telp', 'No Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	}

    public function gantiPassword($id)
    {
        $data['title'] = "Ganti Password User";
        $where = array('id' => $id);
        $data['tbl_user'] = $this->db->query("SELECT * FROM user WHERE id='$id'")->result();
        $this->load->view('admin/akun/templates_admin/header', $data);
        $this->load->view('admin/akun/templates_admin/sidebar');
        $this->load->view('admin/akun/data_folder/data_user/changePw', $data);
        $this->load->view('admin/akun/templates_admin/footer');
    }

    public function gantiPasswordAksi()
    {
    	$id = $this->input->post('id');
        $passBaru = $this->input->post('passBaru');
        $passBaru = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => password_hash($passBaru, PASSWORD_DEFAULT));
            $id = array ('id' => $id);
            $this->pelayananModel->update_data('user', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Password Berhasil Di Ubah, Silahkan login Kembali</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('admin/akun/DataUser');
        } else {
            $data['title'] = "Ganti Password";
            $this->load->view('admin/akun/templates_admin/header', $data);
            $this->load->view('admin/akun/templates_admin/sidebar');
            $this->load->view('admin/akun/data_folder/data_user/changePw', $data);
            $this->load->view('admin/akun/templates_admin/footer');
        }
    }


	public function deleteData($id)
	{
		$where = array('id' => $id);
		$this->pelayananModel->delete_data($where, 'user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/akun/DataUser');
	}
}
?>