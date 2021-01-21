<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'VALIDASI ';
        $this->load->view('cek/index', $data);
    }
    public function view()
    {
        $data['title'] = 'BUKTI';
        $this->load->view('cek/view', $data);
    }
}
