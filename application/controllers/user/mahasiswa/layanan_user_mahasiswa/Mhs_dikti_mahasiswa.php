<?php

class mhs_dikti_mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('hak_layanan') != '2') {
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
		$data['title'] = "Halaman PD DIKTI Mahasiswa";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','mhs_dikti_mahasiswa');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa/index';

        $this->db->from('mhs_dikti');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','mhs_dikti_mahasiswa');
        $id=$this->session->userdata('id');
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_mhs_dikti'] = $this->mhs_dikti_mahasiswa->gets_data('mhs_dikti', $data['start'], $id)->result();
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar', $data);
		$this->load->view('user/mahasiswa/mhs_dikti/view_mhs_dikti', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_mhs_dikti'] = $this->db->query("SELECT * FROM mhs_dikti WHERE id_mhs_dikti='$id'")->result();
		$data['title'] = "Halaman PD DIKTI Mahasisa";
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar');
		$this->load->view('user/mahasiswa/mhs_dikti/data_view_mhs_dikti', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Halaman PD DIKTI";
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar');
		$this->load->view('user/mahasiswa/mhs_dikti/insert_mhs_dikti', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/footer');
	}
	public function tambahDataAksi()
	{	
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$user_id = $this->input->post('user_id');
			$name_user = $this->input->post('name_user');
			$time_stamp_mhs_dikti = $this->input->post('time_stamp_mhs_dikti');
			$title_mhs_dikti = $this->input->post('title_mhs_dikti');
			$status_mhs_dikti = $this->input->post('status_mhs_dikti');
			$desc_mhs_dikti = $this->input->post('desc_mhs_dikti');
			
			$file_mhs_dikti = $_FILES['file_mhs_dikti']['name'];

			if ($file_mhs_dikti = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_mhs_dikti')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_mhs_dikti = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_mhs_dikti' => $time_stamp_mhs_dikti,
				'status_mhs_dikti' => $status_mhs_dikti,
				'title_mhs_dikti' => $title_mhs_dikti,
				'desc_mhs_dikti' => $desc_mhs_dikti,
				'file_mhs_dikti' => $file_mhs_dikti,
			);
			$this->pelayananModel->insert_data($data, 'mhs_dikti');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_mhs_dikti', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_mhs_dikti' => $id);
		$this->pelayananModel->delete_data($where, 'mhs_dikti');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa');
	}
}
