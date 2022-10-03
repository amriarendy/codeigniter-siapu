<?php

class Dos_dikti_dosen extends CI_Controller
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
		$data['title'] = "Halaman PD Dikti Dosen";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','dos_dikti_dosen');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/dos_dikti_dosen/index';

        $this->db->from('dos_dikti');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','dos_dikti_dosen');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_dos_dikti'] = $this->dos_dikti_dosen->gets_data('dos_dikti',$data['start'], $id)->result();
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar', $data);
		$this->load->view('user/dosen/dos_dikti/view_dos_dikti', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_dos_dikti'] = $this->db->query("SELECT * FROM dos_dikti WHERE id_dos_dikti='$id'")->result();
		$data['title'] = "Halaman PD Dikti Dosen";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/dos_dikti/data_view_dos_dikti', $data);
		$this->load->view('user/dosen/templates_dosen/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Halaman PD DIKTI";
		$this->load->view('user/dosen/templates_dosen/header', $data);
		$this->load->view('user/dosen/templates_dosen/sidebar');
		$this->load->view('user/dosen/dos_dikti/insert_dos_dikti', $data);
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
			$time_stamp_dos_dikti = $this->input->post('time_stamp_dos_dikti');
			$title_dos_dikti = $this->input->post('title_dos_dikti');
			$status_dos_dikti = $this->input->post('status_dos_dikti');
			$desc_dos_dikti = $this->input->post('desc_dos_dikti');
			
			$file_dos_dikti = $_FILES['file_dos_dikti']['name'];

			if ($file_dos_dikti = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_dos_dikti')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_dos_dikti = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_dos_dikti' => $time_stamp_dos_dikti,
				'status_dos_dikti' => $status_dos_dikti,
				'title_dos_dikti' => $title_dos_dikti,
				'desc_dos_dikti' => $desc_dos_dikti,
				'file_dos_dikti' => $file_dos_dikti,
			);
			$this->pelayananModel->insert_data($data, 'dos_dikti');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/dosen/layanan_user_dosen/dos_dikti_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_dos_dikti', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		$where = array('id_dos_dikti' => $id);
		$this->pelayananModel->delete_data($where, 'dos_dikti');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/dosen/layanan_user_dosen/dos_dikti_dosen');
	
	}

}
