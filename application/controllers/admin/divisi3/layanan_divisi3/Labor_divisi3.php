<?php

class Labor_divisi3 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '4') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Anda Belum Login!</strong>
					<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
					</div>');
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Halaman Ruang Laboratorium";
		$this->load->model('MainModel','labor_divisi3');
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
        $config['base_url'] = base_url('admin/divisi3/layanan_divisi3/labor_divisi3/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('labor');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_labor', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_labor'] = $this->labor_divisi3->get_data('labor', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();
	//	$data['tbl_labor'] = $this->pelayananModel->get_data('labor')->result();
		$this->load->view('admin/divisi_view_3/templates_divisi3/header', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/sidebar');
		$this->load->view('admin/divisi_view_3/labor/view_labor', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_labor' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_labor'] = $this->db->query("SELECT * FROM labor WHERE id_labor='$id'")->result();
		$data['title'] = "Halaman Ruang Laboratorium";
		$this->load->view('admin/divisi_view_3/templates_divisi3/header', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/sidebar');
		$this->load->view('admin/divisi_view_3/labor/data_view_labor', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_labor');
			$divisi3_id = $this->input->post('divisi3_id');
			$name_divisi3 = $this->input->post('name_divisi3');
			$status_labor = $this->input->post('status_labor');
			$berkas_labor = $_FILES['berkas_labor']['name'];
			
			if ($berkas_labor) {
				$config['upload_path'] = './assets/file/berkas_divisi3/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_labor')) {
					$berkas_labor = $this->upload->data('file_name');
					$this->db->set('berkas_labor', $berkas_labor);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'divisi3_id' => $divisi3_id,
				'name_divisi3' => $name_divisi3,
				'status_labor' => $status_labor,
			);
			$file = array(
                'berkas_labor' => $berkas_labor,
            );
			$where = array(
				'id_labor' => $id
			);

			$this->pelayananModel->update_data('labor', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/diviisi3/layanan_divisi3/labor_divisi3');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_labor', 'Status', 'required');
		//$this->form_validation->set_rules('desc_labor', 'Deskripsi', 'required');
		//$this->form_validation->set_rules('file_lie', 'Berkas', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_labor' => $id);
		$this->pelayananModel->delete_data($where, 'labor');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('divisi3/diviisi3/layanan_divisi3/labor_divisi3');
	}
 }







