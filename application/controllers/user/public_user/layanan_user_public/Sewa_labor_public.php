<?php

class Sewa_labor_public extends CI_Controller
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
		$data['title'] = "Halaman Sewa Labor";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','sewa_labor_public');
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
        //$config['base_url'] = 'http://localhost/siap.ptipd.com/user/public_user/layanan_user_public/sewa_labor_public/index';

        $this->db->from('sewa_labor');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','sewa_labor_public');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_sewa_labor'] = $this->sewa_labor_public->gets_data('sewa_labor', $data['start'], $id)->result();
		$this->load->view('user/public_user/templates_public/header', $data);
		$this->load->view('user/public_user/templates_public/sidebar', $data);
		$this->load->view('user/public_user/sewa_labor/view_sewa_labor', $data);
		$this->load->view('user/public_user/templates_public/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_sewa_labor'] = $this->db->query("SELECT * FROM sewa_labor WHERE id_sewa_labor='$id'")->result();
		$data['title'] = "Halaman Sewa Labor";
		$this->load->view('user/public_user/templates_public/header', $data);
		$this->load->view('user/public_user/templates_public/sidebar');
		$this->load->view('user/public_user/sewa_labor/data_view_sewa_labor', $data);
		$this->load->view('user/public_user/templates_public/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Halaman PD DIKTI";
		$this->load->view('user/public_user/templates_public/header', $data);
		$this->load->view('user/public_user/templates_public/sidebar');
		$this->load->view('user/public_user/sewa_labor/insert_sewa_labor', $data);
		$this->load->view('user/public_user/templates_public/footer');
	}
	public function tambahDataAksi()
	{	
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$user_id = $this->input->post('user_id');
			$name_user = $this->input->post('name_user');
			$time_stamp_sewa_labor = $this->input->post('time_stamp_sewa_labor');
			$title_sewa_labor = $this->input->post('title_sewa_labor');
			$status_sewa_labor = $this->input->post('status_sewa_labor');
			$desc_sewa_labor = $this->input->post('desc_sewa_labor');
			
			$file_sewa_labor = $_FILES['file_sewa_labor']['name'];

			if ($file_sewa_labor = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_sewa_labor')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_sewa_labor = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_sewa_labor' => $time_stamp_sewa_labor,
				'status_sewa_labor' => $status_sewa_labor,
				'title_sewa_labor' => $title_sewa_labor,
				'desc_sewa_labor' => $desc_sewa_labor,
				'file_sewa_labor' => $file_sewa_labor,
			);
			$this->pelayananModel->insert_data($data, 'sewa_labor');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/public_user/layanan_user_public/sewa_labor_public');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_sewa_labor', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_sewa_labor' => $id);
		$this->pelayananModel->delete_data($where, 'sewa_labor');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/public_user/layanan_user_public/sewa_labor_public');
	
	}

}
