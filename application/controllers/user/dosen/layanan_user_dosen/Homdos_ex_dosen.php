<?php

class Homdos_ex_dosen extends CI_Controller
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
		$data['title'] = "Pelayanan Homebase Dosen External";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','homdos_ex_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/homdos_ex_dosen/index';

        $this->db->from('homdos_ex');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','homdos_ex_dosen');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_homdos_ex'] = $this->homdos_ex_dosen->gets_data('homdos_ex',$data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/homdos_ex/view_homdos_ex', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_homdos_ex'] = $this->db->query("SELECT * FROM homdos_ex WHERE id_homdos_ex='$id'")->result();
		$data['title'] = "Pelayanan Homebase Dosen External";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/homdos_ex/data_view_homdos_ex', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Pengajuan homdos_ex";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/homdos_ex/insert_homdos_ex', $data);
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
			$time_stamp_homdos_ex = $this->input->post('time_stamp_homdos_ex');
			$title_homdos_ex = $this->input->post('title_homdos_ex');
			$status_homdos_ex = $this->input->post('status_homdos_ex');
			$desc_homdos_ex = $this->input->post('desc_homdos_ex');
			
			$file_homdos_ex = $_FILES['file_homdos_ex']['name'];

			if ($file_homdos_ex = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_homdos_ex')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_homdos_ex = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_homdos_ex' => $time_stamp_homdos_ex,
				'status_homdos_ex' => $status_homdos_ex,
				'title_homdos_ex' => $title_homdos_ex,
				'desc_homdos_ex' => $desc_homdos_ex,
				'file_homdos_ex' => $file_homdos_ex,
			);
			$this->pelayananModel->insert_data($data, 'homdos_ex');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/homdos_ex_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_homdos_ex', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_homdos_ex' => $id);
		$this->pelayananModel->delete_data($where, 'homdos_ex');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/homdos_ex_dosen');
	
	}

}
