<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->order_by('id', 'DESC');

		return $this->db->get();
	}
	public function simpan($data)
	{
		return $this->db->insert('tb_mahasiswa', $data);
	}

	public function edit_data($id)
	{
		return $this->db->where('id', $id)->get('tb_mahasiswa')->row();
	}

	public function update_mahasiswa($data, $id)
	{
		return $this->db->update('tb_mahasiswa', $data, $id);
	}

	public function hapus_mahasiswa($id_mhs)
	{
		return $this->db->delete('tb_mahasiswa', $id_mhs);
	}
}