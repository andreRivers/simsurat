<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ValidasiNew extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Validasi Berkas';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('validasiNew/index', $data);
        $this->load->view('layout/footerNew');
    }
    public function cek()
    {
        $data['title'] = 'Validasi Berkas';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('validasiNew/cek', $data);
        $this->load->view('layout/footerNew');
    }
}
