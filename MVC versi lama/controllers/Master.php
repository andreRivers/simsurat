<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('ArchiveNew_Models');
		$this->load->library('ciqrcode');
    }

    public function arsip()
    {
        $data['title'] = 'MASTER';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['unit'] = $this->db->get('app_user')->result_array();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('master/arsip', $data);
        $this->load->view('layout/footer');
    }

    public function view()
    {
        $data['title'] = 'MASTER';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['unit'] = $this->db->get('app_user')->result_array();
		$email = $this->input->post('email');
		$data['data'] = $this->ArchiveNew_Models->view_archive_admin($email);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('master/arsipNew', $data);
        $this->load->view('layout/footer');
	}
	
	public static function format($date)
	{
		$str = explode('-', $date);
		$bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);
		return $str['2'] . " " . $bulan[$str[1]] . " " . $str[0];
	}


    
}
