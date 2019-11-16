<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Lihat Data";
		$this->load->model('m_manag');
		$data['mobil'] = $this->m_manag->getAllMobil();
		$data['cek_mobil'] = $this->db->get('tb_mobil')->num_rows();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('view_data', $data);
		$this->load->view('templates/footer');
	}
}
