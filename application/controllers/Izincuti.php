<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Izincuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->dbCUT = $this->load->database('db4', TRUE);
	

    }
	public function index()
    {
		
		$DB1 = $this->load->database('default', TRUE);
		$DB4 = $this->load->database('db4', TRUE);

		
		$data['title'] = 'MASTER IZIN CUTI';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cuti'] = $this->dbCUT->query('SELECT * FROM permohonan LEFT JOIN user ON user.email = permohonan.email LEFT JOIN user_detail ON user_detail.email = permohonan.email WHERE permohonan.sts=2')->result_array();

	
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('permohonan/izincuti', $data);
        $this->load->view('layout/footer');
	}

	public function setuju($id_cuti)
    {
		$now = date("Y-m-d");
		$tglSetujui = $now;
        $sts = 3;

        $this->dbCUT->set('tglSetujui', $tglSetujui);
        $this->dbCUT->set('sts', $sts);
        $this->dbCUT->where('id_cuti', $id_cuti);
		$this->dbCUT->update('permohonan');
		
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('izincuti');
	}
	
	

	public function tolak($id_cuti)
    {
		$now = date("Y-m-d");
		$tglSetujui = $now;
        $sts = 4;

        $this->dbCUT->set('tglSetujui', $tglSetujui);
        $this->dbCUT->set('sts', $sts);
        $this->dbCUT->where('id_cuti', $id_cuti);
		$this->dbCUT->update('permohonan');
		
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('izincuti');
	}
}
