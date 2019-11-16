<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_manag');
    }

    public function index()
    {
        $dateNow = date('d F Y');
        $data['title'] = "Blog";
        $data['blog'] = $this->m_manag->getAllBlog();
        $data['date'] = $this->ristanto->translateMonth($dateNow);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('blog/blog', $data);
        $this->load->view('templates/footer');
    }

    public function detail($link)
    {
        $data['blog'] = $this->m_manag->getLink($link);
        $data['title'] = $data['blog']['judul'];
        $data['secret'] = $this->encryption->encrypt($link);

        $convertTanggal = DateTime::createFromFormat('Y-m-d', $data['blog']['tanggal'])->format('d F Y');
        $data['tanggal'] = $this->ristanto->translateMonth($convertTanggal);

        if ($data['blog'] != NULL) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('blog/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('blog', 'Halaman Tidak ditemukan');
            redirect('blog');
        }
    }


}
