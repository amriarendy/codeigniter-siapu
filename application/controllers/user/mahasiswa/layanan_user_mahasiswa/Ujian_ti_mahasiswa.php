<?php

class Ujian_ti_mahasiswa extends CI_Controller
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
		$data['title'] = "Halaman Ujian TI Mahasiswa";
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

		$this->load->model('MainModel','ujian_ti_mahasiswa');
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
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/mahasiswa/layanan_user_mahasiswa/ujian_ti_mahasiswa/index';

        $this->db->from('ujian_ti');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','ujian_ti_mahasiswa');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_ujian_ti'] = $this->ujian_ti_mahasiswa->gets_data('ujian_ti', $data['start'], $id)->result();
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar', $data);
		$this->load->view('user/mahasiswa/ujian_ti/view_ujian_ti', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/footer');
	}

	public function dataView($id)
	{
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['tbl_ujian_ti'] = $this->db->query("SELECT * FROM ujian_ti WHERE id_ujian_ti='$id'")->result();
		$data['title'] = "Halaman Ujian TI Mahasisa";
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar');
		$this->load->view('user/mahasiswa/ujian_ti/data_view_ujian_ti', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/footer');
	}

	public function tambahData()
	{
		$id=$this->session->userdata('id');
		$data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
		$data['title'] = "Tambah Halaman PD DIKTI";
		$this->load->view('user/mahasiswa/templates_mahasiswa/header', $data);
		$this->load->view('user/mahasiswa/templates_mahasiswa/sidebar');
		$this->load->view('user/mahasiswa/ujian_ti/insert_ujian_ti', $data);
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
			$time_stamp_ujian_ti = $this->input->post('time_stamp_ujian_ti');
			$title_ujian_ti = $this->input->post('title_ujian_ti');
			$status_ujian_ti = $this->input->post('status_ujian_ti');
			$desc_ujian_ti = $this->input->post('desc_ujian_ti');
			
			$file_ujian_ti = $_FILES['file_ujian_ti']['name'];

			if ($file_ujian_ti = '') {
			} else {
				$config['upload_path'] = './assets/file/berkas_user/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_ujian_ti')) {
					echo "Photo Gagal Di Upload!";
				} else {
					$file_ujian_ti = $this->upload->data('file_name');
				}
			 }

			$data = array(
				'user_id' => $user_id,
				'name_user' => $name_user,
				'time_stamp_ujian_ti' => $time_stamp_ujian_ti,
				'status_ujian_ti' => $status_ujian_ti,
				'title_ujian_ti' => $title_ujian_ti,
				'desc_ujian_ti' => $desc_ujian_ti,
				'file_ujian_ti' => $file_ujian_ti,
			);
			
			$this->pelayananModel->insert_data($data, 'ujian_ti');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('user/mahasiswa/layanan_user_mahasiswa/ujian_ti_mahasiswa');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('desc_ujian_ti', 'Deskripsi', 'required');
	}
	public function deleteData($id)
	{
		if(!isset($id)) show_404(); 
		$data=array(); 
		$pm = $this->pelayananModel;
		if($id >= 0){
		 	$data['ujian_ti'] = $pm->delete_ujian_ti($id);
		  }
		if(count($data['ujian_ti']) > 0){
			foreach($data['ujian_ti'] as $row){
		    	if(!empty($row['file_ujian_ti']['berkas_ujian_ti'])){
			      echo $row['file_ujian_ti']['berkas_ujian_ti'];
			      terserah();
		    $filename1 = array_map('unlink', glob(FCPATH."assets/file/berkas_user/".explode(".", $row['file_ujian_ti'])[0].".*"));
		    $filename2 = array_map('unlink', glob(FCPATH."assets/file/berkas_admin/".explode(".", $row['berkas_ujian_ti'])[0].".*")); 
		  	} 
		} 
	}
		$where = array('id_ujian_ti' => $id);
		$this->pelayananModel->delete_data($where, 'ujian_ti');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('user/mahasiswa/layanan_user_mahasiswa/ujian_ti_mahasiswa');
	}
}
