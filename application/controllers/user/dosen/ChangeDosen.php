<?php
class ChangeDosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['title'] = "Ganti Password";
        $data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
        $this->load->view('user/dosen/templates_dosen/header', $data);
        $this->load->view('user/dosen/templates_dosen/sidebar');
        $this->load->view('user/dosen/changeDos', $data);
        $this->load->view('user/dosen/templates_dosen/footer');
    }
    public function gantiPasswordAksi()
    {
        $passBaru = $this->input->post('passBaru');
        $passBaru = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => password_hash($passBaru, PASSWORD_DEFAULT));
            $id = array('id' => $this->session->userdata('id'));
            $this->pelayananModel->update_data('user', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Password Berhasil Di Ubah, Silahkan login Kembali</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('AuthUser');
        } else {
            $data['title'] = "Ganti Password";
            $data['tbl_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result();
            $this->load->view('user/dosen/templates_dosen/header', $data);
            $this->load->view('user/dosen/templates_dosen/sidebar');
            $this->load->view('user/dosen/changeDos', $data);
            $this->load->view('user/dosen/templates_dosen/footer');
        }
    }
}
