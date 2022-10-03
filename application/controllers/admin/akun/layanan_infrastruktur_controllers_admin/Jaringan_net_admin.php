<?php

class Jaringan_net_admin extends CI_Controller
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
		$data['title'] = "Pelayanan Perbaikan Jaringan Internet";

		$this->load->model('MainModel','jaringan_net_admin');
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
        $config['base_url'] = base_url('admin/akun/layanan_infrastruktur_controllers_admin/jaringan_net_admin/index');

        $this->db->like('name_user', $data['keyword']);
        $this->db->or_like('name_admin', $data['keyword']);
        $this->db->from('jaringan_net');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_jaringan_net', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_jaringan_net'] = $this->jaringan_net_admin->get_data('jaringan_net', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();

	//	$data['tbl_jaringan_net'] = $this->pelayananModel->get_data('jaringan_net')->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_infrastruktur_view/jaringan_net/view_jaringan_net', $data);
		$this->load->view('admin/akun/templates_admin/footer');
 	}
 
	public function dataView($id)
	{
		$id_session=$this->session->userdata('id_admin');
		$where = array('id_jaringan_net' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin=$id_session")->result();
		$data['tbl_jaringan_net'] = $this->db->query("SELECT * FROM jaringan_net WHERE id_jaringan_net='$id'")->result();
		$data['title'] = "Pelayanan Perbaikan Jaringan Internet";
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/layanan_infrastruktur_view/jaringan_net/data_view_jaringan_net', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->dataView();
		} else {
			$id = $this->input->post('id_jaringan_net');
			$admin_id = $this->input->post('admin_id');
			$name_admin = $this->input->post('name_admin');
			$status_jaringan_net = $this->input->post('status_jaringan_net');
			$berkas_jaringan_net = $_FILES['berkas_jaringan_net']['name'];
			
			if ($berkas_jaringan_net) {
				$config['upload_path'] = './assets/file/berkas_admin/';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('berkas_jaringan_net')) {
					$berkas_jaringan_net = $this->upload->data('file_name');
					$this->db->set('berkas_jaringan_net', $berkas_jaringan_net);
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = array(
				'admin_id' => $admin_id,
				'name_admin' => $name_admin,
				'status_jaringan_net' => $status_jaringan_net,
			);
			$file = array(
                'berkas_jaringan_net' => $berkas_jaringan_net,
            );
			$where = array(
				'id_jaringan_net' => $id
			);

			$this->pelayananModel->update_data('jaringan_net', $data, $where, $file);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/layanan_infrastruktur_controllers_admin/jaringan_net_admin');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('status_jaringan_net', 'Status', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_jaringan_net' => $id);
		$this->pelayananModel->delete_data($where, 'jaringan_net');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/akun/layanan_infrastruktur_controllers_admin/jaringan_net_admin');
	}
 }







