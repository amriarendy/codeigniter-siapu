<?php

class Dom_web_divisi2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Pelayanan Pengajuan Domain Website";
		$this->load->model('MainModel','dom_web_divisi2');
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
        $config['base_url'] = base_url('admin/divisi2/layanan_divisi2/dom_web_divisi2/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('dom_web');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_dom_web', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_dom_web'] = $this->dom_web_divisi2->get_data('dom_web', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();
		$this->load->view('admin/divisi_view_2/templates_divisi2/header', $data);
		$this->load->view('admin/divisi_view_2/templates_divisi2/sidebar');
		$this->load->view('admin/divisi_view_2/dom_web/view_dom_web', $data);
		$this->load->view('admin/divisi_view_2/templates_divisi2/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_dom_web' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_dom_web'] = $this->db->query("SELECT * FROM dom_web WHERE id_dom_web='$id'")->result();
		$data['title'] = "Pelayanan Pengajuan Domain Website";
		$this->load->view('admin/divisi_view_2/templates_divisi2/header', $data);
		$this->load->view('admin/divisi_view_2/templates_divisi2/sidebar');
		$this->load->view('admin/divisi_view_2/dom_web/data_view_dom_web', $data);
		$this->load->view('admin/divisi_view_2/templates_divisi2/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_dom_web');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_dom_web = $this->input->post('status_dom_web');
			$berkas_dom_web = $_FILES['berkas_dom_web']['name'];
			
			if ($berkas_dom_web) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_dom_web')) {
					$berkas_dom_web = $this->upload->data('file_name');
					$this->db->set('berkas_dom_web', $berkas_dom_web);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_dom_web' => $status_dom_web,
			);
			$file = array(
                'berkas_dom_web' => $berkas_dom_web,
            );
			$where = array(
				'id_dom_web' => $id
			);

			$this->pelayananModel->update_data('dom_web', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/divisi2/layanan_divisi2/dom_web_divisi2');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_dom_web', 'Status', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_dom_web' => $id);
		$this->pelayananModel->delete_data($where, 'dom_web');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/divisi2/layanan_divisi2/dom_web_divisi2');
	}
 }







