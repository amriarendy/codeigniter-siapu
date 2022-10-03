<?php

class Homdos_in_dosen extends CI_Controller
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
		$data['title'] = "Pelayanan Home Base Dosen Internal";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','homdos_in_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/homdos_in_dosen/index';

        $this->db->from('homdos_in');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','homdos_in_dosen');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_homdos_in'] = $this->homdos_in_dosen->gets_data('homdos_in',$data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/homdos_in/view_homdos_in', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Pelayanan Home Base Dosen Internal";
		$data['tbl_homdos_in'] = $this->db->query("SELECT * FROM homdos_in WHERE id_homdos_in='$id'")->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/homdos_in/data_view_homdos_in', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Pengajuan homdos_in";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/homdos_in/insert_homdos_in', $data);
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
			$time_stamp_homdos_in = $this->input->post('time_stamp_homdos_in');
			$title_homdos_in = $this->input->post('title_homdos_in');
			$status_homdos_in = $this->input->post('status_homdos_in');
			$desc_homdos_in = $this->input->post('desc_homdos_in');
			
			$file_homdos_in = $_FILES['file_homdos_in']['name'];

			if ($file_homdos_in = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_homdos_in')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_homdos_in = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_homdos_in' => $time_stamp_homdos_in,
				'status_homdos_in' => $status_homdos_in,
				'title_homdos_in' => $title_homdos_in,
				'desc_homdos_in' => $desc_homdos_in,
				'file_homdos_in' => $file_homdos_in,
			);
			$this->pelayananModel->insert_data($data, 'homdos_in');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/homdos_in_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_homdos_in', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_homdos_in' => $id);
		$this->pelayananModel->delete_data($where, 'homdos_in');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/homdos_in_dosen');
	}
}
