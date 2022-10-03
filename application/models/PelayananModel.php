<?php

/**
 * 
 */
class PelayananModel extends CI_model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}
	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function update_data($table,$data,$where){
		$this->db->update($table, $data, $where);
	}
	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function cek_login()
	{
		$user_admin = set_value('user_admin');
		$password_admin = set_value('password_admin');

		$result	= $this->db->where('user_admin', $user_admin)
						->where('password_admin',md5($password_admin))
						->limit(1)
						->get('admin');
						
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return	FALSE;
		}
	}
	public function cek_login_user()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result	= $this->db->where('username', $username)
						->where('password',md5($password))
						->limit(1)
						->get('user');
						
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return	FALSE;
		}
	}

	//Delete Pelayanan File
	public function delete_dos_dikti($id){
        $array = array('id_dos_dikti'=>$id);
        $this->db->select('file_dos_dikti');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('dos_dikti')->result_array();
    }
    public function delete_homdos_ex($id){
        $array = array('id_homdos_ex'=>$id);
        $this->db->select('file_homdos_ex');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('homdos_ex')->result_array();
    }
    public function delete_homdos_in($id){
        $array = array('id_homdos_in'=>$id);
        $this->db->select('file_homdos_in');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('homdos_in')->result_array();
    }
    public function delete_labor($id){
        $array = array('id_labor'=>$id);
        $this->db->select('file_labor');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('labor')->result_array();
    }
    public function delete_layanan_email_institusi($id){
        $array = array('id_layanan_email_institusi'=>$id);
        $this->db->select('file_layanan_email_institusi');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('layanan_email_institusi')->result_array();
    }
    public function delete_nidk($id){
        $array = array('id_nidk'=>$id);
        $this->db->select('file_nidk');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('nidk')->result_array();
    }
    public function delete_nidn($id){
        $array = array('id_nidn'=>$id);
        $this->db->select('file_nidn');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('nidn')->result_array();
    }
    public function delete_nup($id){
        $array = array('id_nup'=>$id);
        $this->db->select('file_nup');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('nup')->result_array();
    }
    public function delete_dom_ojs($id){
        $array = array('id_dom_ojs'=>$id);
        $this->db->select('file_dom_ojs');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('dom_ojs')->result_array();
    }
    public function delete_dom_web($id){
        $array = array('id_dom_web'=>$id);
        $this->db->select('file_dom_web');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('dom_web')->result_array();
    }
    public function delete_jaringan_net($id){
        $array = array('id_jaringan_net'=>$id);
        $this->db->select('file_jaringan_net');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('jaringan_net')->result_array();
    }
    public function delete_main_ojs($id){
        $array = array('id_main_ojs'=>$id);
        $this->db->select('file_main_ojs');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('main_ojs')->result_array();
    }
    public function delete_sewa_labor($id){
        $array = array('id_sewa_labor'=>$id);
        $this->db->select('file_sewa_labor');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('sewa_labor')->result_array();
    }
    public function delete_mhs_dikti($id){
        $array = array('id_mhs_dikti'=>$id);
        $this->db->select('file_mhs_dikti');
        $this->db->select('berkas_dos_dikti');
        $this->db->where($array);
        return $this->db->get('mhs_dikti')->result_array();
    }
    public function delete_ujian_ti($id){
        $array = array('id_ujian_ti'=>$id);
        $this->db->select('file_ujian_ti');
        $this->db->select('berkas_ujian_ti');
        $this->db->where($array);
        return $this->db->get('ujian_ti')->result_array();
    }
}
?>