<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->dbATK = $this->load->database('db2', TRUE);
	

    }
	public function index()
    {
		
		$DB1 = $this->load->database('default', TRUE);
		$DB2 = $this->load->database('db2', TRUE);

		
		$data['title'] = 'MASTER ATK';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['atk'] = $this->dbATK->query('SELECT * FROM sementara WHERE status=1')->result_array();

	
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('permohonan/atk', $data);
        $this->load->view('layout/footer');
	}
	
	public function setuju($id_sementara)
    {
		$now = date("Y-m-d");
		$tgl_disetujui = $now;
        $status = 3;

        $this->dbATK->set('tgl_disetujui', $tgl_disetujui);
        $this->dbATK->set('status', $status);
        $this->dbATK->where('id_sementara', $id_sementara);
		$this->dbATK->update('sementara');
		
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('atk');
	}
	
	

	public function tolak($id_sementara)
    {
		$now = date("Y-m-d");
		$tgl_disetujui = $now;
        $status = 4;

        $this->dbATK->set('tgl_disetujui', $tgl_disetujui);
        $this->dbATK->set('status', $status);
        $this->dbATK->where('id_sementara', $id_sementara);
		$this->dbATK->update('sementara');
		
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('atk');
	}

	public function all()
    {
		$idArr = $this->input->post('checked_id');
		$now = date("Y-m-d");
		$tgl_disetujui = $now;
		foreach($idArr as $id){

        $this->dbATK->set('tgl_disetujui', $tgl_disetujui);
        $this->dbATK->set('status', 3);
        $this->dbATK->where('id_sementara', $id);
		$this->dbATK->update('sementara');
	}
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('atk');
	}
	
	

}
 