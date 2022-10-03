<?php
class MainModel extends CI_Model
{
	public function get_data($table, $limit,  $start, $keyword = null)
	{
		//$this->db->query("SELECT * FROM layanan_email_institusi WHERE user_id=$id_session")->result();
		if ($keyword) 
		{
			$this->db->like('name_user', $keyword);
			$this->db->or_like('name_admin', $keyword);
		}
		//return $this->db->get_where($table, array('user_id' => $where), $start);			
		return $this->db->get($table, $limit, $start);
	}

	public function get_admin($table, $limit,  $start, $keyword = null)
	{
		//$this->db->query("SELECT * FROM layanan_email_institusi WHERE user_id=$id_session")->result();
		if ($keyword) 
		{
			$this->db->like('user_admin', $keyword);
			$this->db->or_like('nama_admin', $keyword);
			$this->db->or_like('divisi_admin', $keyword);
		}			
		return $this->db->get($table, $limit, $start);
	}
	public function get_user($table, $limit,  $start, $keyword = null)
	{
		//$this->db->query("SELECT * FROM layanan_email_institusi WHERE user_id=$id_session")->result();
		if ($keyword) 
		{
			$this->db->like('name_user', $keyword);
			$this->db->or_like('id', $keyword);
			$this->db->or_like('username', $keyword);
			$this->db->or_like('telp', $keyword);
			$this->db->or_like('nidn', $keyword);
			$this->db->or_like('nip', $keyword);
			$this->db->or_like('jenis_dosen', $keyword);
			$this->db->or_like('unit_kerja', $keyword);
			$this->db->or_like('nim', $keyword);
			$this->db->or_like('prodi', $keyword);
			$this->db->or_like('semester', $keyword);
			$this->db->or_like('ktm', $keyword);
			$this->db->or_like('no_ktp', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('pekerjaan', $keyword);
			$this->db->or_like('instansi', $keyword);
		}			
		return $this->db->get($table, $limit, $start);
	}
	public function updateData($id)
	{
		$where = array('id_admin' => $id);
		return $this->db->query("SELECT * FROM admin WHERE id_admin='$id'")->result();
	}
	public function gets_data($table, $start, $where)
	{
		return $this->db->get_where($table, array('user_id' => $where), $start);
	}
}
