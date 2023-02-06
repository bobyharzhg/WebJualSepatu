<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sepatu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Sepatu_model');
	}
	public function index()
	{
		$data['judul'] = "Halaman Sepatu";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sepatu'] = $this->Sepatu_model->get();
		$this->load->view('layout/header', $data);
		$this->load->view('sepatu/vw_sepatu', $data);
		$this->load->view('layout/footer', $data);
	}
	public function tambah()
	{
		$data['judul'] = "Halaman Tambah Data Sepatu";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sepatu'] = $this->Sepatu_model->get();

		$this->form_validation->set_rules('nama', 'Nama Sepatu', 'required', ['required' => 'Nama Sepatu Wajib di isi']);
		$this->form_validation->set_rules('stok', 'Stok', 'required', ['required' => 'Stok Wajib di isi', 'integer' => 'Stok harus Angka']);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => 'Harga Wajib di isi', 'integer' => 'Harga harus Angka']);
		$this->form_validation->set_rules('ukuran', 'Ukuran', 'required', ['required' => 'Ukuran Wajib di isi', 'integer' => 'Ukuran harus Angka']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', ['required' => 'Keterangan Wajib di isi']);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('sepatu/vw_tambah_sepatu', $data);
			$this->load->view('layout/footer', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'ukuran' => $this->input->post('ukuran'),
				'keterangan' => $this->input->post('keterangan'),
			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/sepatu/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Sepatu_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success"
			role="alert">Data Sepatu Berhasil Ditambah!</div>');
			redirect('Sepatu');
		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman Edit Sepatu";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sepatu'] = $this->Sepatu_model->getById($id);

		$this->form_validation->set_rules('nama', 'Nama Sepatu', 'required', ['required' => 'Nama Sepatu Wajib di isi']);
		$this->form_validation->set_rules('stok', 'Stok', 'required', ['required' => 'Stok Wajib di isi', 'integer' => 'Stok harus Angka']);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => 'Harga Wajib di isi', 'integer' => 'Harga harus Angka']);
		$this->form_validation->set_rules('ukuran', 'Ukuran', 'required', ['required' => 'Ukuran Wajib di isi', 'integer' => 'Ukuran harus Angka']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', ['required' => 'Keterangan Wajib di isi']);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('sepatu/vw_ubah_sepatu', $data);
			$this->load->view('layout/footer', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'ukuran' => $this->input->post('ukuran'),
				'keterangan' => $this->input->post('keterangan'),
			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/sepatu/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_image = $data['sepatu']['gambar'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/sepatu/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			$this->Sepatu_model->update(['id' => $id], $data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success"
			role="alert">Data Sepatu Berhasil Diubah!</div>');
			redirect('Sepatu');
		}
	}
	public function hapus($id)
	{
		$this->Sepatu_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>
			Data Sepatu tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>
			Data Sepatu Berhasil Dihapus!</div>');
		}
		redirect('Sepatu');
	}
}
