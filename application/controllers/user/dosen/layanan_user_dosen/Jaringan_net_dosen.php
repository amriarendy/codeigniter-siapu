<?php

class Jaringan_net_dosen extends CI_Controller
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
		$data['title'] = "Pelayanan Perbaikan Jaringan Internet";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','jaringan_net_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/jaringan_net_dosen/index';

        $this->db->from('jaringan_net');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','jaringan_net_dosen');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_jaringan_net'] = $this->jaringan_net_dosen->gets_data('jaringan_net',$data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/jaringan_net/view_jaringan_net', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['title'] = "Pelayanan Perbaikan Jaringan Internet";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_jaringan_net'] = $this->db->query("SELECT * FROM jaringan_net WHERE id_jaringan_net='$id'")->result();
		$data['title'] = "Pelayanan Perbaikan Jaringan Internet";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/jaringan_net/data_view_jaringan_net', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Pengajuan jaringan_net";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/jaringan_net/insert_jaringan_net', $data);
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
			$time_stamp_jaringan_net = $this->input->post('time_stamp_jaringan_net');
			$title_jaringan_net = $this->input->post('title_jaringan_net');
			$status_jaringan_net = $this->input->post('status_jaringan_net');
			$desc_jaringan_net = $this->input->post('desc_jaringan_net');
			
			$file_jaringan_net = $_FILES['file_jaringan_net']['name'];

			if ($file_jaringan_net = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_jaringan_net')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_jaringan_net = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_jaringan_net' => $time_stamp_jaringan_net,
				'status_jaringan_net' => $status_jaringan_net,
				'title_jaringan_net' => $title_jaringan_net,
				'desc_jaringan_net' => $desc_jaringan_net,
				'file_jaringan_net' => $file_jaringan_net,
			);
			$this->pelayananModel->insert_data($data, 'jaringan_net');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/jaringan_net_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_jaringan_net', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_jaringan_net' => $id);
		$this->pelayananModel->delete_data($where, 'jaringan_net');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/jaringan_net_dosen');
	
	}

}
