<?php

class Main_ojs_dosen extends CI_Controller
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
		$data['title'] = "Pelayanan Maintainance OJS/Website";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$this->load->model('MainModel','main_ojs_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/main_ojs_dosen/index';

        $this->db->from('main_ojs');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','main_ojs_dosen');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_main_ojs'] = $this->main_ojs_dosen->gets_data('main_ojs',$data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/main_ojs/view_main_ojs', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['title'] = "Pelayanan Maintainance OJS/Website";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_main_ojs'] = $this->db->query("SELECT * FROM main_ojs WHERE id_main_ojs='$id'")->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/main_ojs/data_view_main_ojs', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Pengajuan main_ojs";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/main_ojs/insert_main_ojs', $data);
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
			$time_stamp_main_ojs = $this->input->post('time_stamp_main_ojs');
			$title_main_ojs = $this->input->post('title_main_ojs');
			$status_main_ojs = $this->input->post('status_main_ojs');
			$desc_main_ojs = $this->input->post('desc_main_ojs');
			
			$file_main_ojs = $_FILES['file_main_ojs']['name'];

			if ($file_main_ojs = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_main_ojs')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_main_ojs = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_main_ojs' => $time_stamp_main_ojs,
				'status_main_ojs' => $status_main_ojs,
				'title_main_ojs' => $title_main_ojs,
				'desc_main_ojs' => $desc_main_ojs,
				'file_main_ojs' => $file_main_ojs,
			);
			$this->pelayananModel->insert_data($data, 'main_ojs');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/main_ojs_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_main_ojs', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_main_ojs' => $id);
		$this->pelayananModel->delete_data($where, 'main_ojs');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/main_ojs_dosen');
	
	}

}
