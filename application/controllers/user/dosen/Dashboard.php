<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
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
		// query yang mengambil dan menampilkan ke halaman dasboard
		$data['title'] = "Halaman Pelayanan Dosen";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/dashboard', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		// query yang mengambil dan menampilkan ke halaman dasboard
		$where = array('id' => $id);
		$data['tbl_user'] = $this->db->get_where('user', ['id' => $id])->result();
		$data['title'] = "Halaman Edit Biodata";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/dataview_dosen', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}
	
	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView($this->input->post('id'));
		} else {
			$id = $this->input->post('id');
			$name_user = $this->input->post('name_user');
			$telp = $this->input->post('telp');
			$nidn = $this->input->post('nidn');
			$nip = $this->input->post('nip');
			$jenis_dosen = $this->input->post('jenis_dosen');
			$unit_kerja = $this->input->post('unit_kerja');
			$no_ktp = $this->input->post('no_ktp');
			$alamat = $this->input->post('alamat');
			$pekerjaan = $this->input->post('pekerjaan');
			$instansi = $this->input->post('instansi');
			$tgl_lahir = $this->input->post('tgl_lahir');
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
				'telp' => $telp,
				'nidn' => $nidn,
				'nip' => $nip,
				'jenis_dosen' => $jenis_dosen,
				'unit_kerja' => $unit_kerja,
				'no_ktp' => $no_ktp,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'instansi' => $instansi,
				'tgl_lahir' => $tgl_lahir,
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
			redirect('user/dosen/dashboard');
		}
	}
	
	public function _rules()
	{
		 $this->form_validation->set_rules('name_user', 'Nama User', 'required');
		 $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
		 $this->form_validation->set_rules('telp', 'No Handphone', 'required');
		 $this->form_validation->set_rules('nidn', 'No NIDN', 'required');
		 $this->form_validation->set_rules('nip', 'No NIP', 'required');
		 $this->form_validation->set_rules('alamat', 'Alamat', 'required');
		 $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		 $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');
		 $this->form_validation->set_rules('jenis_dosen', 'Jenis Dosen', 'required');
		 $this->form_validation->set_rules('instansi', 'instansi', 'required');
	}
 }
