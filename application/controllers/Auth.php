<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function index()
    {
        $data['title'] = "Login";

        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password tidak boleh kosong!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $query = $this->m_auth->cekUser();

            if ($query) {
                if (password_verify($this->input->post('password'), $query['password'])) {
                    $data = [
                        'name' => $query['name'],
                        'status' => 'login'
                    ];

                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', 'Ups, Password anda salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Ups, Email anda salah!');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        $data['title'] = "Register";

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|is_unique[tb_user.email]', ['is_unique' => 'email ini telah digunakan']);
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('password2', 'Password', 'required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'is_active' => 1,
                'date_create' => date('Y-m-d')
            ];

            // $this->_sendEmail();

            $insert = $this->m_auth->addUser($data);

            if ($insert) {
                $this->session->set_flashdata('pesan', 'Berhasil registrasi');
                redirect('auth');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal registrasi');
            }
        }
    }

    private function _sendEmail()
    {
        $confiq = [
            'protocol' => 'SMTP',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'jujujojo757@gmail.com',
            'smtp_pass' => 'admanilham',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $confiq);

        //kirim email
        $this->email->from('jujujojo757@gmail.com', 'Rizki');
        $this->email->to('laughzsec@gmil.com');
        $this->email->subject('Test');
        $this->email->message('Coba coba');


        $this->email->send();
    }

    public function logout()
    {
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('name');
        redirect('auth');
    }
}
