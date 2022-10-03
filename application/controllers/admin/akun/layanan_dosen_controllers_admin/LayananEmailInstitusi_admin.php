<?php

class LayananEmailInstitusi_admin extends CI_Controller
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
		$data['title'] ="Layanan Email Institusi";
		$this->load->model('MainModel','LayananEmailInstitusi_admin');
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
        $config['base_url'] = base_url('admin/akun/layanan_dosen_controllers_admin/LayananEmailInstitusi_admin/index');

        $this->db->from('layanan_email_institusi');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $pg['pg'] = $this->load->model('MainModel','LayananEmailInstitusi_admin');
        $data['desc'] =$this->db->order_by('id_lei', 'DESC');
       
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);

        $data['asc'] =  $this->db->query("SELECT * FROM layanan_email_institusi ORDER BY id_lei DESC")->result();
        $data['lay_email'] = $this->LayananEmailInstitusi_admin->get_data('layanan_email_institusi',$config['per_page'], $data['start'], $data['keyword'], $data['desc'])->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_dosen_view/layanan_email_institusi/view_layanan_email_institusi', $data);
		$this->load->view('admin/akun/templates_admin/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_lei' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['lay_email'] = $this->db->query("SELECT * FROM layanan_email_institusi WHERE id_lei='$id'")->result();
		$data['title'] = "Layanan Email Institusi";
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_dosen_view/layanan_email_institusi/data_view_layanan_email_institusi', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_lei');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_lei = $this->input->post('status_lei');
			$berkas_lei = $_FILES['berkas_lei']['name'];
			
			if ($berkas_lei) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_lei')) {
					$berkas_lei = $this->upload->data('file_name');
					$this->db->set('berkas_lei', $berkas_lei);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_lei' => $status_lei,
			);
			$file = array(
                'berkas_lei' => $berkas_ujian_ti,
            );
			$where = array(
				'id_lei' => $id
			);

			$this->pelayananModel->update_data('layanan_email_institusi', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/layanan_dosen_controllers_admin/LayananEmailInstitusi_admin');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_lei', 'Status', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_lei' => $id);
		$this->pelayananModel->delete_data($where, 'layanan_email_institusi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/akun/layanan_dosen_controllers_admin/LayananEmailInstitusi_admin');
	}
}







