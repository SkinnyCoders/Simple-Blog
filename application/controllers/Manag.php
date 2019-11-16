<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manag extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== "login") {
			redirect(auth);
		}
		$this->load->library('form_validation');
		$this->load->model('m_manag');
	}

	public function index()
	{
		$data['title'] = "management data";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('view_manag');
	}

	public function view_merek()
	{
		$data['title'] = "management data";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('manag/add-merek');
		$this->load->view('templates/footer');
	}

	public function tambah_mobil()
	{
		$data['title'] = "management data";

		$this->form_validation->set_rules('mobil', 'Mobil', 'required|max_length[10]');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$data['merek'] = $this->m_manag->getAllMerek();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('manag/add', $data);
			$this->load->view('templates/footer');
		} else {

			$cekMobil = $this->m_manag->cekMobil();
			if ($cekMobil > 0) {
				$this->session->set_flashdata('notif', 'Data Sudah Ada!');
				redirect('manag/tambah_mobil');
			} else {
				$data = [
					'merek_id' => $this->input->post('merek', true),
					'nama' => $this->input->post('mobil', true),
					'tahun' => $this->input->post('tahun', true),
					'harga' => $this->input->post('harga', true)
				];

				$insert = $this->m_manag->addMobil($data);
				if ($insert) {
					$this->session->set_flashdata('notif_success', 'Data Berhasil Disimpan!');
					redirect('manag/tambah_mobil');
				} else {
					$this->session->set_flashdata('notif', 'Data Gagal disimpan!');
					redirect('manag/tambah_mobil');
				}
			}
		}
	}

	public function tambah_merek()
	{
		$this->form_validation->set_rules('merek', 'Merek', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->view_merek();
		} else {
			$result = $this->m_manag->cek();

			if ($result > 0) {
				$this->session->set_flashdata('notif', 'Data Sudah Ada!');
				$this->view_merek();
			} else {
				$data = [
					'merek' => $this->input->post('merek', true)
				];

				$result = $this->m_manag->add_merek($data);

				if ($result) {
					$this->session->set_flashdata('notif_success', 'Data Berhasil Disimpan!');
					$this->view_merek();
				} else {
					$this->session->set_flashdata('notif', 'Gagal');
					$this->view_merek();
				}
			}
		}
	}

	public function delete($id)
	{
		$result = $this->m_manag->deleteMobil($id);
		if ($result) {
			$this->session->set_flashdata('notif_success', 'Berhasil Dihapus');
			redirect('data');
		} else {
			$this->session->set_flashdata('notif', 'Gagal Dihapus');
			redirect('data');
		}
	}

	public function update($id)
	{
		$data['title'] = "Update data";

		$this->form_validation->set_rules('mobil', 'Mobil', 'required|max_length[10]');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$data['mobil'] = $this->db->get_where('tb_mobil', ['id' => $id])->row_array();
			$data['merek'] = $this->m_manag->getAllMerek();
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('manag/update-mobil', $data);
			$this->load->view('templates/footer');
		} else {
			$cek = $this->m_manag->cekMobil();
			if ($cek > 0) {
				$this->session->set_flashdata('notif', 'Data Sudah Ada!');
				redirect('manag/update');
			} else {
				$data = [
					'id' => $id,
					'merek_id' => $this->input->post('merek', true),
					'nama' => $this->input->post('mobil', true),
					'tahun' => $this->input->post('tahun', true),
					'harga' => $this->input->post('harga', true)
				];
				$update = $this->m_manag->updateMobil($data);
				if ($update) {
					$this->session->set_flashdata('notif_success', 'Data Berhasil Diubah!');
					redirect('data');
				} else {
					$this->session->set_flashdata('notif', 'Data Gagal Diubah!');
					redirect('data');
				}
			}
		}
	}
}
