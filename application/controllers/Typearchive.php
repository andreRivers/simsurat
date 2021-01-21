<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Typearchive extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Type_models');
    }
    public function index()
    {
        $data['title'] = 'type archive';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['archive'] = $this->db->get('app_archive')->result_array();
        $data['data'] = $this->Type_models->view_type();

        $this->form_validation->set_rules('jenis_archive', 'Jenis Archive', 'required');
        if ($this->form_validation->run() ==  false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/navbar', $data);;
            $this->load->view('typearchive/index', $data);
            $this->load->view('typearchive/modal', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'jenis_archive' => htmlspecialchars($this->input->post('jenis_archive', true)),
                'date_created' => time()
            ];
            $this->db->insert('app_jenis_archive', $data);
            $this->session->set_flashdata('flash_a', 'Success');
            redirect('typearchive');
        }
    }


    public function delete($id_jenis)
    {
        $this->Type_models->delete_type($id_jenis);
        $this->session->set_flashdata('flash_a', 'Delete');
        redirect('typearchive');
    }

    public function edit()
    {
        $id_jenis = $this->input->post('id_jenis');
        $jenis_archive = $this->input->post('jenis_archive');
        $this->Type_models->edit_type($id_jenis, $jenis_archive);
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('typearchive');
    }
}
