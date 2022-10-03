<?php

class LayananEmailInstitusi_dosen extends CI_Controller
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
		$data['title'] = "Pelayanan Layanan Email Institusi";
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$id'")->result();

		$this->load->model('MainModel','layanan_email_institusi_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/LayananEmailInstitusi_dosen/index';

        $this->db->from('layanan_email_institusi');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        //$config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','LayananEmailInstitusi_dosen');
        $sess['session'] = $this->session->userdata('id');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_lei'] = $this->LayananEmailInstitusi_dosen->gets_data('layanan_email_institusi', $data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/layanan_email_institusi/view_layanan_email_institusi', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['lay_email'] = $this->db->query("SELECT * FROM layanan_email_institusi WHERE id_lei='$id'")->result();
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Pelayanan Layanan Email Institusi";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/layanan_email_institusi/data_view_layanan_email_institusi', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Layanan Email Institusi";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/layanan_email_institusi/insert_layanan_email_institusi', $data);
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
			$time_stamp_lei = $this->input->post('time_stamp_lei');
			$status_lei = $this->input->post('status_lei');
			$title_lei = $this->input->post('title_lei');
			$desc_lei = $this->input->post('desc_lei');
			
			$file_lei = $_FILES['file_lei']['name'];

			if ($file_lei = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_lei')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_lei = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_lei' => $time_stamp_lei,
				'status_lei' => $status_lei,
				'title_lei' => $title_lei,
				'desc_lei' => $desc_lei,
				'file_lei' => $file_lei,
			);
			$this->pelayananModel->insert_data($data, 'layanan_email_institusi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/LayananEmailInstitusi_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_lei', 'Deskripsi', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_lei' => $id);
		$this->pelayananModel->delete_data($where, 'layanan_email_institusi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/LayananEmailInstitusi_dosen');
	}
}
