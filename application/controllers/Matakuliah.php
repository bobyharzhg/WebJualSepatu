<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Matakuliah_model');
	}

	public function index()
	{
		$data['judul'] = "Halaman Matakuliah";
		$data['matakuliah'] = $this->Matakuliah_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("matakuliah/vw_matakuliah", $data);
		$this->load->view("layout/footer");
	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Matakuliah";

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required', [
			'required' => 'Nama Matakuliah Wajib di isi'
		]);
		$this->form_validation->set_rules('semester', 'Semester', 'required', [
			'required' => 'Semester Wajib di isi'
		]);
		$this->form_validation->set_rules('bidang',  'Bidang', 'required', [
			'required' => 'Bidang Wajib di isi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("matakuliah/vw_tambah_matakuliah", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'semester' => $this->input->post('semester'),
				'bidang' => $this->input->post('bidang'),
			];
			$this->Matakuliah_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Matakuliah Berhasil Ditambah!</div>');
			redirect('Matakuliah');
		}
	}
	public function hapus($id)
	{
		$this->Matakuliah_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Matakuliah tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Matakuliah Berhasil Dihapus!</div>');
		}
		redirect('Matakuliah');
	}

	function edit($id)
	{
		$data['judul'] = "Halaman Edit Matakuliah";
		$data['matakuliah'] = $this->Matakuliah_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required', [
			'required' => 'Nama Matakuliah Wajib di isi'
		]);
		$this->form_validation->set_rules('semester', 'Semester', 'required', [
			'required' => 'Semester Wajib di isi'
		]);
		$this->form_validation->set_rules('bidang',  'Bidang', 'required', [
			'required' => 'Bidang Wajib di isi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("matakuliah/vw_ubah_matakuliah", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'semester' => $this->input->post('semester'),
				'bidang' => $this->input->post('bidang'),
				'id' => $this->input->post('id')
			];
			$this->Matakuliah_model->update($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Matakuliah Berhasil Diubah!</div>');
			redirect('Matakuliah');
		}
	}
}
