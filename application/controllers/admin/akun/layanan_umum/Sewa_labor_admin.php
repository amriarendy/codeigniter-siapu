<?php

class Sewa_labor_admin extends CI_Controller
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
		$data['title'] = "Pelayanan Sewa Laboratorium Komputer";

		$this->load->model('MainModel','sewa_labor_admin');
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
        $config['base_url'] = base_url('admin/akun/layanan_umum/sewa_labor_admin/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('sewa_labor');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_sewa_labor', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_sewa_labor'] = $this->sewa_labor_admin->get_data('sewa_labor', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();

	//	$data['tbl_sewa_labor'] = $this->pelayananModel->get_data('sewa_labor')->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_umum_view/sewa_labor/view_sewa_labor', $data);
		$this->load->view('admin/akun/templates_admin/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_sewa_labor' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_sewa_labor'] = $this->db->query("SELECT * FROM sewa_labor WHERE id_sewa_labor='$id'")->result();
		$data['title'] = "Pelayanan Sewa Laboratorium Komputer";
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_umum_view/sewa_labor/data_view_sewa_labor', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_sewa_labor');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_sewa_labor = $this->input->post('status_sewa_labor');
			$berkas_sewa_labor = $_FILES['berkas_sewa_labor']['name'];
			
			if ($berkas_sewa_labor) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_sewa_labor')) {
					$berkas_sewa_labor = $this->upload->data('file_name');
					$this->db->set('berkas_sewa_labor', $berkas_sewa_labor);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_sewa_labor' => $status_sewa_labor,
			);
			$file = array(
                'berkas_sewa_labor' => $berkas_sewa_labor,
            );
			$where = array(
				'id_sewa_labor' => $id
			);

			$this->pelayananModel->update_data('sewa_labor', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/layanan_umum/sewa_labor_admin');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_sewa_labor', 'Status', 'required');
		//$this->form_validation->set_rules('desc_sewa_labor', 'Deskripsi', 'required');
		//$this->form_validation->set_rules('file_lie', 'Berkas', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_sewa_labor' => $id);
		$this->pelayananModel->delete_data($where, 'sewa_labor');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/akun/layanan_umum/sewa_labor_admin');
	}
 }







