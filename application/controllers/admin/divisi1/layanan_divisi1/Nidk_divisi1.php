<?php

class Nidk_divisi1 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '2') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Pelayanan NIDK";

		$this->load->model('MainModel','nidk_divisi1');
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
        $config['base_url'] = base_url('admin/divisi1/layanan_divisi1/nidk_divisi1/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('nidk');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_nidk', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_nidk'] = $this->nidk_divisi1->get_data('nidk', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();
		$this->load->view('admin/divisi_view_1/templates_divisi1/header', $data);
		$this->load->view('admin/divisi_view_1/templates_divisi1/sidebar');
		$this->load->view('admin/divisi_view_1/nidk/view_nidk', $data);
		$this->load->view('admin/divisi_view_1/templates_divisi1/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_nidk' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_nidk'] = $this->db->query("SELECT * FROM nidk WHERE id_nidk='$id'")->result();
		$data['title'] = "Pelayanan NIDK";
		$this->load->view('admin/divisi_view_1/templates_divisi1/header', $data);
		$this->load->view('admin/divisi_view_1/templates_divisi1/sidebar');
		$this->load->view('admin/divisi_view_1/nidk/data_view_nidk', $data);
		$this->load->view('admin/divisi_view_1/templates_divisi1/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_nidk');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_nidk = $this->input->post('status_nidk');
			$berkas_nidk = $_FILES['berkas_nidk']['name'];
			
			if ($berkas_nidk) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_nidk')) {
					$berkas_nidk = $this->upload->data('file_name');
					$this->db->set('berkas_nidk', $berkas_nidk);
				} else {
					echo $this->upload->display_errors();
				}
			}
		
			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_nidk' => $status_nidk,
			);
			$file = array(
                'berkas_nidk' => $berkas_nidk,
            );
			$where = array(
				'id_nidk' => $id
			);

			$this->pelayananModel->update_data('nidk', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/divisi1/layanan_divisi1/nidk_divisi1');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_nidk', 'Status', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_nidk' => $id);
		$this->pelayananModel->delete_data($where, 'nidk');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/divisi1/layanan_divisi1/nidk_divisi1');
	}
 }







