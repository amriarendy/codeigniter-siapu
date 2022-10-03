<?php
class CekDosen extends CI_Controller
{
	public function index()
	{
		// query yang mengambil dan menampilkan ke halaman dasboard
		$data['title'] = "Halaman Cek Akun User";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$this->load->view('user/templates_user/auth_header');
		$this->load->view('view_cek/cek_dosen/list_dosen', $data);
		$this->load->view('user/templates_user/auth_footer');
	}
	public function updateDosen($id)
	{
		$data['title'] = "Halaman Ubah Data User";
		$data['tbl_user'] = $this->db->get_where('user', ['id' => $id])->result();
		$this->load->view('user/templates_user/auth_header');
		$this->load->view('view_cek/cek_dosen/update_dosen', $data);
		$this->load->view('user/templates_user/auth_footer');
	}
	public function updateDosenAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateDosen($this->input->post('id'));
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
				'username' => $username,
				'hak_layanan' => $hak_layanan,
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
				'berkas' => $berkas,
				'image' => $image,
			);
			$where = array(
				'id' => $id
			);
			$this->pelayananModel->update_data('user',$data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('cek_aktived/CekDosen');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('name_user', 'nama', 'required');
		$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
		$this->form_validation->set_rules('telp', 'No Handphone', 'required');
		$this->form_validation->set_rules('nidn', 'No NIDN', 'required');
		$this->form_validation->set_rules('nip', 'No NIP', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');
		$this->form_validation->set_rules('jenis_dosen', 'Jenis Dosen', 'required');
		$this->form_validation->set_rules('instansi', 'Instansi', 'required');
	}
}