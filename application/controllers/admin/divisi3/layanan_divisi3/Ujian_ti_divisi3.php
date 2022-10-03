<?php

class Ujian_ti_divisi3 extends CI_Controller
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
		$data['title'] = "Pelayanan Ujian TI";
		$this->load->model('MainModel','ujian_ti_divisi3');
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
        $config['base_url'] = base_url('admin/divisi3/layanan_divisi3/ujian_ti_divisi3/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('ujian_ti');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_ujian_ti', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_ujian_ti'] = $this->ujian_ti_divisi3->get_data('ujian_ti', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();
	//	$data['tbl_ujian_ti'] = $this->pelayananModel->get_data('ujian_ti')->result();
		$this->load->view('admin/divisi_view_3/templates_divisi3/header', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/sidebar');
		$this->load->view('admin/divisi_view_3/ujian_ti/view_ujian_ti', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_ujian_ti' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_ujian_ti'] = $this->db->query("SELECT * FROM ujian_ti WHERE id_ujian_ti='$id'")->result();
		$data['title'] = "Pelayanan Ujian TI";
		$this->load->view('admin/divisi_view_3/templates_divisi3/header', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/sidebar');
		$this->load->view('admin/divisi_view_3/ujian_ti/data_view_ujian_ti', $data);
		$this->load->view('admin/divisi_view_3/templates_divisi3/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_ujian_ti');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_ujian_ti = $this->input->post('status_ujian_ti');
			$berkas_ujian_ti = $_FILES['berkas_ujian_ti']['name'];
			
			if ($berkas_ujian_ti) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_ujian_ti')) {
					$berkas_ujian_ti = $this->upload->data('file_name');
					$this->db->set('berkas_ujian_ti', $berkas_ujian_ti);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_ujian_ti' => $status_ujian_ti,
			);
			$file = array(
                'berkas_ujian_ti' => $berkas_ujian_ti,
            );
			$where = array(
				'id_ujian_ti' => $id
			);

			$this->pelayananModel->update_data('ujian_ti', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/divisi3/layanan_divisi3/ujian_ti_divisi3');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_ujian_ti', 'Status', 'required');
		//$this->form_validation->set_rules('desc_ujian_ti', 'Deskripsi', 'required');
		//$this->form_validation->set_rules('file_lie', 'Berkas', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_ujian_ti' => $id);
		$this->pelayananModel->delete_data($where, 'ujian_ti');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/divisi3/layanan_divisi3/ujian_ti_divisi3');
	}
 }







