<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
		$this->load->model('M_mahasiswa');

		$data = array(
			'mahasiswa' => $this->M_mahasiswa->get_data()
		);

		$this->load->view('data_mahasiswa', $data);
	}

	public function tambah()
	{
		$this->load->view('tambah_mahasiswa');
	}

	public function simpan()
	{
		$this->load->model('M_mahasiswa');

		$data = array(
			'nim' => $this->input->post('nim'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'alamat' => $this->input->post('alamat')
		);

		$mhs = $this->M_mahasiswa->simpan($data);

		if($mhs){
			echo "Data Berhasil Disimpan!";
		}else{
			echo "Data Gagal Disimpan!";
		}

	}

	public function edit($id)
	{
		$this->load->model('M_mahasiswa');

		$data = array(
			'mahasiswa' => $this->M_mahasiswa->edit_data($id)
		);
		

		$this->load->view('edit_mahasiswa', $data);
	}

	public function update()
	{
		$this->load->model('M_mahasiswa');

		$id['id'] = $this->input->post("id");

		$data = array(
			'nim' => $this->input->post('nim'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'alamat' => $this->input->post('alamat')
		);

		$mhs = $this->M_mahasiswa->update_mahasiswa($data, $id);

		if($mhs){
			echo "Data Berhasil Diupdate!";
		}else{
			echo "Data Gagal diupdate!";
		}
	}

	public function hapus($id)
	{
		$this->load->model('M_mahasiswa');

		$id_mhs['id'] = $id;

		$mhs = $this->M_mahasiswa->hapus_mahasiswa($id_mhs);

		if($mhs){
			echo "Data Berhasil Dihapus!";
		}else{
			echo "Data Gagal Dihapus!";
		}
	}
}
