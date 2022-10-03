<?php

class Homdos_ex_admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Halaman Homebase Dosen External";

		$this->load->model('MainModel','homdos_ex_admin');
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
        $config['base_url'] = base_url('admin/akun/layanan_dosen_controllers_admin/homdos_ex_admin/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('homdos_ex');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_homdos_ex', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_homdos_ex'] = $this->homdos_ex_admin->get_data('homdos_ex', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_dosen_view/homdos_ex/view_homdos_ex', $data);
		$this->load->view('admin/akun/templates_admin/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_homdos_ex' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_homdos_ex'] = $this->db->query("SELECT * FROM homdos_ex WHERE id_homdos_ex='$id'")->result();
		$data['title'] = "Halaman Homebase Dosen External";
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_dosen_view/homdos_ex/data_view_homdos_ex', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_homdos_ex');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_homdos_ex = $this->input->post('status_homdos_ex');
			$berkas_homdos_ex = $_FILES['berkas_homdos_ex']['name'];
			
			if ($berkas_homdos_ex) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_homdos_ex')) {
					$berkas_homdos_ex = $this->upload->data('file_name');
					$this->db->set('berkas_homdos_ex', $berkas_homdos_ex);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_homdos_ex' => $status_homdos_ex,
			);
			$file = array(
                'berkas_homdos_ex' => $berkas_homdos_ex,
            );
			$where = array(
				'id_homdos_ex' => $id
			);

			$this->pelayananModel->update_data('homdos_ex', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/layanan_dosen_controllers_admin/homdos_ex_admin');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_homdos_ex', 'Status', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_homdos_ex' => $id);
		$this->pelayananModel->delete_data($where, 'homdos_ex');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/akun/layanan_dosen_controllers_admin/homdos_ex_admin');
	}
 }







