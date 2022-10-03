<?php

class Dom_web_dosen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('hak_layanan') != '1') {
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
        $data['title'] = "Pelayanan Domain Webisite";
        $data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();

        $this->load->model('MainModel','dom_web_dosen');
        // load library
        $this->load->library('pagination');
        if ($this->input->post('submit')) 
        {
            $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
         }else{
             $data['keyword']=$this->session->userdata('keyword');
        }
        //config
        $config['base_url'] = 'http://localhost/siap.ptipd.com/user/dosen/layanan_user_dosen/dom_web_dosen/index';

        $this->db->from('dom_web');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $model['get_data'] = $this->load->model('MainModel','dom_web_dosen');
        $id=$this->session->userdata('id');
        
        // initialize
        $this->pagination->initialize($config);     
        $data['start'] = $this->uri->segment(6);
        $data['tbl_dom_web'] = $this->dom_web_dosen->gets_data('dom_web', $data['start'], $id)->result();
        $this->load->view('user/dosen/templates_dosen/header', $data);
        $this->load->view('user/dosen/templates_dosen/sidebar', $data);
        $this->load->view('user/dosen/dom_web/view_dom_web', $data);
        $this->load->view('user/dosen/templates_dosen/footer');
    }

    public function dataView($id)
    {
        $data['title'] = "Pelayanan Domain Webisite";
        $data['tbl_dom_web'] = $this->db->query("SELECT * FROM dom_web WHERE id_dom_web='$id'")->result();
        $this->load->view('user/dosen/templates_dosen/header', $data);
        $this->load->view('user/dosen/templates_dosen/sidebar');
        $this->load->view('user/dosen/dom_web/data_view_dom_web', $data);
        $this->load->view('user/dosen/templates_dosen/footer');
    }

    public function tambahData()
    {
        $id=$this->session->userdata('id');
        $data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
        $data['title'] = "Tambah Pengajuan dom_web";
        $this->load->view('user/dosen/templates_dosen/header', $data);
        $this->load->view('user/dosen/templates_dosen/sidebar');
        $this->load->view('user/dosen/dom_web/insert_dom_web', $data);
        $this->load->view('user/dosen/templates_dosen/footer');
    }
    public function tambahDataAksi()
    {   
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $user_id = $this->input->post('user_id');
            $name_user = $this->input->post('name_user');
            $time_stamp_dom_web = $this->input->post('time_stamp_dom_web');
            $title_dom_web = $this->input->post('title_dom_web');
            $status_dom_web = $this->input->post('status_dom_web');
            $desc_dom_web = $this->input->post('desc_dom_web');
            
            $file_dom_web = $_FILES['file_dom_web']['name'];

            if ($file_dom_web = '') {
            } else {
                $config['upload_path'] = './assets/file/berkas_user/';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf|docx|xlsx';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file_dom_web')) {
                    echo "Photo Gagal Di Upload!";
                } else {
                    $file_dom_web = $this->upload->data('file_name');
                }
             }

            $data = array(
                'user_id' => $user_id,
                'name_user' => $name_user,
                'time_stamp_dom_web' => $time_stamp_dom_web,
                'status_dom_web' => $status_dom_web,
                'title_dom_web' => $title_dom_web,
                'desc_dom_web' => $desc_dom_web,
                'file_dom_web' => $file_dom_web,
            );
            $this->pelayananModel->insert_data($data, 'dom_web');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Data Berhasil Ditambahkan!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

            redirect('user/dosen/layanan_user_dosen/dom_web_dosen');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('desc_dom_web', 'Deskripsi', 'required');
    }
    public function deleteData($id)
    {
        $where = array('id_dom_web' => $id);
        $this->pelayananModel->delete_data($where, 'dom_web');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Data Berhasil Dihapus!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('user/dosen/layanan_user_dosen/dom_web_dosen');
    
    }
}
