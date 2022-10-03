<?php

class Nidn_dosen extends CI_Controller
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
		$data['title'] = "Pelayanan NIDN";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','nidn_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/nidn_dosen/index';

        $this->db->from('nidn');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        //$config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','nidn_dosen');
        $id=$this->session->userdata('id');

        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_nidn'] = $this->nidn_dosen->gets_data('nidn', $data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/nidn/view_nidn', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['lay_email'] = $this->db->query("SELECT * FROM nidn WHERE id_nidn='$id'")->result();
		$data['title'] = "Pelayanan NIDN";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/nidn/data_view_nidn', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Pengajuan NIDN";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/nidn/insert_nidn', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}
	public function tambahDataAksi()
	{	
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$user_id = $this->input->post('user_id');
			$name_user = $this->input->post('name_user');
			$time_stamp_nidn = $this->input->post('time_stamp_nidn');
			$title_nidn = $this->input->post('title_nidn');
			$status_nidn = $this->input->post('status_nidn');
			$desc_nidn = $this->input->post('desc_nidn');
			
			$file_nidn = $_FILES['file_nidn']['name'];

			if ($file_nidn = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_nidn')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_nidn = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_nidn' => $time_stamp_nidn,
				'status_nidn' => $status_nidn,
				'title_nidn' => $title_nidn,
				'desc_nidn' => $desc_nidn,
				'file_nidn' => $file_nidn,
			);
			$this->pelayananModel->insert_data($data, 'nidn');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/nidn_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_nidn', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_nidn' => $id);
		$this->pelayananModel->delete_data($where, 'nidn');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/nidn_dosen');
	}
}
