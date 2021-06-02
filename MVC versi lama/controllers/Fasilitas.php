<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->dbFAS = $this->load->database('db3', TRUE);
	

    }
	public function index()
    {
		
		$DB1 = $this->load->database('default', TRUE);
		$DB3 = $this->load->database('db3', TRUE);

		
		$data['title'] = 'MASTER FASILITAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['fasilitas'] = $this->dbFAS->query('SELECT * FROM abs_permohonan LEFT JOIN abs_fasilitas ON abs_fasilitas.id_fas = abs_permohonan.id_fas WHERE abs_permohonan.status=1')->result_array();

	
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('permohonan/fasilitas', $data);
        $this->load->view('layout/footer');
	}
	
	public function setuju($id_booking)
    {
		$now = date("Y-m-d");
		$tgl_disetujui = $now;
        $status = 2;

        $this->dbFAS->set('tgl_disetujui', $tgl_disetujui);
        $this->dbFAS->set('status', $status);
        $this->dbFAS->where('id_booking', $id_booking);
		$this->dbFAS->update('abs_permohonan');
		
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('fasilitas');
	}
	
	

	public function tolak($id_booking)
    {
		$now = date("Y-m-d");
		$tgl_disetujui = $now;
        $status = 3;

        $this->dbFAS->set('tgl_disetujui', $tgl_disetujui);
        $this->dbFAS->set('status', $status);
        $this->dbFAS->where('id_booking', $id_booking);
		$this->dbFAS->update('abs_permohonan');
		
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('fasilitas');
	}

	public function all()
    {
		$idArr = $this->input->post('checked_id');
		$now = date("Y-m-d");
		$tgl_disetujui = $now;
		foreach($idArr as $id){

        $this->dbFAS->set('tgl_disetujui', $tgl_disetujui);
        $this->dbFAS->set('status', 3);
        $this->dbFAS->where('id_booking', $id);
		$this->dbFAS->update('abs_permohonan');
	}
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('fasilitas');
	}
	
	

}
 