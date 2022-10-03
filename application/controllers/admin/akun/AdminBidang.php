<?php

class AdminBidang extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MainModel','AdminBidang');
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
		$data['title'] = "Data Admin";
		//$this->load->model('MainModel','AdminBidang');
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
        $config['base_url'] = base_url('admin/akun/AdminBidang/index');

        $this->db->from('admin');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['desc'] =$this->db->order_by('id_admin', 'DESC');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(5);
        $data['tbl_admin'] = $this->AdminBidang->get_admin('admin', $config['per_page'], $data['start'], $data['keyword'],$data['desc'])->result();

		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/data_folder/data_admin/view_admin', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}
	public function tambahData()
	{
		$data['title'] = "Tambah Data Admin";
		$data['tbl_admin'] = $this->pelayananModel->get_data('admin')->result();
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/data_folder/data_admin/insert_admin', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}
	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nama_admin = $this->input->post('nama_admin');
			$user_admin = $this->input->post('user_admin');
			$hak_akses = $this->input->post('hak_akses');
			$password_admin = md5($this->input->post('password_admin'));

			$data = array(
				'nama_admin' => $nama_admin,
				'user_admin' => $user_admin,
				'hak_akses' => $hak_akses,
				'password_admin' => $password_admin,
			);
			$this->pelayananModel->insert_data($data, 'admin');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambahkan!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/AdminBidang');
		}
	}

	//update data
	public function updateData($id)
	{
		$where = array('id_admin' => $id);
		$data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$id'")->result();
		$data['title'] = "Update Data Admin";
		$this->load->view('admin/akun/templates_admin/header', $data);
		$this->load->view('admin/akun/templates_admin/sidebar');
		$this->load->view('admin/akun/data_folder/data_admin/update_admin', $data);
		$this->load->view('admin/akun/templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->updateData($this->input->post('id_admin'));
		} else {
			$id = $this->input->post('id_admin');
			$nama_admin = $this->input->post('nama_admin');
			$user_admin = $this->input->post('user_admin');
			$hak_akses = $this->input->post('hak_akses');

			$data = array(
				'nama_admin' => $nama_admin,
				'user_admin' => $user_admin,
				'hak_akses' => $hak_akses,
			);
			$where = array(
				'id_admin' => $id
			);

			$this->pelayananModel->update_data('admin', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diupdate!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/akun/AdminBidang');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_admin', 'nama admin', 'required');
		$this->form_validation->set_rules('user_admin', 'username', 'required');
		//$this->form_validation->set_rules('password_admin', 'password', 'required');
		$this->form_validation->set_rules('hak_akses', 'Divisi', 'required');
	}
	public function gantiPassword($id)
    {
        $data['title'] = "Ganti Password Admin";
        $where = array('id' => $id);
        $data['tbl_admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$id'")->result();
        $this->load->view('admin/akun/templates_admin/header', $data);
        $this->load->view('admin/akun/templates_admin/sidebar');
        $this->load->view('admin/akun/data_folder/data_admin/changePwAdmin', $data);
        $this->load->view('admin/akun/templates_admin/footer');
    }

    public function gantiPasswordAksi()
    {
    	$id = $this->input->post('id');
        $passBaru = $this->input->post('passBaru');
        $passBaru = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = array('password_admin' => md5($passBaru));
            $id = array ('id_admin' => $id);
            $this->pelayananModel->update_data('admin', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Password Berhasil Di Ubah, Silahkan login Kembali</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('admin/akun/AdminBidang');
        } else {
            $data['title'] = "Ganti Password";
            $this->load->view('admin/akun/templates_admin/header', $data);
            $this->load->view('admin/akun/templates_admin/sidebar');
            $this->load->view('admin/akun/data_folder/data_admin/changePwAdmin', $data);
            $this->load->view('admin/akun/templates_admin/footer');
        }
    }

	public function deleteData($id)
	{
		$where = array('id_admin' => $id);
		$this->pelayananModel->delete_data($where, 'admin');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus!</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('admin/akun/AdminBidang');
	}
}
?>