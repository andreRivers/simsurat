<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermanagement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('user_models');
    }
    public function index()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['archive'] = $this->db->get('app_archive')->result_array();
        $data['data'] = $this->user_models->view_user();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[app_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/navbar', $data);;
            $this->load->view('usermanagement/index', $data);
            $this->load->view('usermanagement/modal', $data);
            $this->load->view('layout/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'email' => htmlspecialchars($email),
                'image' => 'avatar5.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('app_user', $data);
            $this->session->set_flashdata('flash_a', 'Success');
            redirect('usermanagement');
        }
    }


    public function delete($id)
    {
        $this->user_models->delete_user($id);
        $this->session->set_flashdata('flash_a', 'Delete');
        redirect('usermanagement');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $this->user_models->edit_user($id, $nama, $no_hp, $email, $role_id);
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('usermanagement');
    }
}
