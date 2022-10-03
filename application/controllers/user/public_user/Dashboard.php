<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('hak_layanan') != '3') {
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
		$data['title'] = "Halaman Pelayanan public_user";
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$id_session=$this->session->userdata('id');
		$this->load->view('user/public_user/templates_public/header', $data);
		$this->load->view('user/public_user/templates_public/sidebar', $data);
		$this->load->view('user/public_user/dashboard', $data);
		$this->load->view('user/public_user/templates_public/footer');
	}
	public function dataView($id)
	{
		// query yang mengambil dan menampilkan ke halaman dasboard
		$where = array('id' => $id);
		$data['tbl_user'] = $this->db->get_where('user', ['id' => $id])->result();
		$data['title'] = "Halaman Edit Biodata";
		$this->load->view('user/public_user/templates_public/header', $data);
		$this->load->view('user/public_user/templates_public/sidebar', $data);
		$this->load->view('user/public_user/dataview_public', $data);
		$this->load->view('user/public_user/templates_public/footer');
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
			$no_ktp = $this->input->post('no_ktp');
			$alamat = $this->input->post('alamat');
			$pekerjaan = $this->input->post('pekerjaan');
			$instansi = $this->input->post('instansi');
			$tgl_lahir = $this->input->post('tgl_lahir');
			
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
		
			$data = array(
				'name_user' => $name_user,
				'telp' => $telp,
				'no_ktp' => $no_ktp,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'instansi' => $instansi,
				'tgl_lahir' => $tgl_lahir
			);
			$file = array(
                'image' => $image,
                'berkas' => $berkas,
            );
			$where = array(
				'id' => $id
			);

			$this->pelayananModel->update_data('user', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('user/public_user/dashboard');
		}
	}
	
	public function _rules()
	{
		$this->form_validation->set_rules('name_user', 'Nama User', 'required');
		$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
		$this->form_validation->set_rules('telp', 'No Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
	}
	
 }
