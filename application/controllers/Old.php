<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Old extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Old_Models');
	}
	public function view()
	{
		$data['title'] = 'Arsip Lama';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['archive'] = $this->db->get('app_archive')->result_array();
		$data['data'] = $this->Old_Models->view_Old();

		$this->form_validation->set_rules('hal_surat', 'Hal Surat', 'required');
		$this->form_validation->set_rules('tahun', 'tahun', 'required');
	
		if ($this->form_validation->run() ==  false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('old/view', $data);
			$this->load->view('old/modal_archive', $data);
			$this->load->view('layout/footer');
		} else {
			$email = $this->input->post('email');
			$hal_surat = $this->input->post('hal_surat');
			$tahun = $this->input->post('tahun');
			$now = date("Y-m-d H:i:s");
			$date_created = $now;

			$upload_image = $_FILES['file']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'pdf|jpg|png|jpeg';
				$config['max_size']      = '20480';
				$config['upload_path'] = 'arsip/';
				$config['encrypt_name'] = TRUE;
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('file')) {
					$old_image = $data['app_arsip_lama']['file'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'arsip/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('file', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
                'email' => $email,
                'hal_surat' => $this->input->post('hal_surat'),
                'tahun' => $this->input->post('tahun'),
				'date_created' => $date_created,
				'file' => $new_image
				
			];
			$this->db->insert('app_arsip_lama', $data);
			$this->session->set_flashdata('flash_a', 'Success');
			redirect('old/view');
		}
	}
	
	public function viewBaris()
	{
		$data['title'] = 'Arsip Lama';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['archive'] = $this->db->get('app_archive')->result_array();
		$tahun = $this->input->post('tahun');
		$baris = $this->input->post('baris');
		$data['data'] = $this->Old_Models->view_baris($tahun,$baris);

		
		$this->form_validation->set_rules('hal_surat', 'Hal Surat', 'required');
		$this->form_validation->set_rules('tahun', 'tahun', 'required');
	
		if ($this->form_validation->run() ==  false) {

			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('old/viewBaris', $data);
			$this->load->view('old/modal_archive', $data);
			$this->load->view('layout/footer');
		} else {
			$email = $this->input->post('email');
			$hal_surat = $this->input->post('hal_surat');
			$tahun = $this->input->post('tahun');
			$now = date("Y-m-d H:i:s");
			$date_created = $now;

			$upload_image = $_FILES['file']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'pdf|jpg|png|jpeg';
				$config['max_size']      = '20480';
				$config['upload_path'] = 'arsip/';
				$config['encrypt_name'] = TRUE;
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('file')) {
					$old_image = $data['app_arsip_lama']['file'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'arsip/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('file', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
                'email' => $email,
                'hal_surat' => $this->input->post('hal_surat'),
                'tahun' => $this->input->post('tahun'),
				'date_created' => $date_created,
				'file' => $new_image
				
			];
			$this->db->insert('app_arsip_lama', $data);
			$this->session->set_flashdata('flash_a', 'Success');
			redirect('old/view');
		}
	}

	public function semuaData()
	{
		$data['title'] = 'Semua Arsip 2015-2019';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['archive'] = $this->db->get('app_archive')->result_array();
		$data['data'] = $this->Old_Models->view_Old_all();

			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('old/semuaData', $data);
			$this->load->view('layout/footer');
	
	}

	public function pencarian()
	{
		$data['title'] = 'Telusuri Surat 2015-2019';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('old/pencarian');
		$this->load->view('layout/footer');
	}

	public function lihatPencarian()
    {
		$data['title'] = 'Telusuri Surat 2015-2019';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$keyword = $this->input->post('keyword');
		$data['data'] = $this->Old_Models->view_pencarian($keyword);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('old/lihatPencarian', $data);
		$this->load->view('layout/footer');
	}


	public function delete($id)
	{
		$this->Old_Models->delete_old($id);
		$this->session->set_flashdata('flash_a', 'Delete');
		redirect('old/view');
	}

	public function ubahArsip()
	{
		$data['title'] = 'Arsip Lama';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->Old_Models->view_Old();

		$id = $this->input->post('id');
			$hal_surat = $this->input->post('hal_surat');
			$tahun = $this->input->post('tahun');
			$upload_image = $_FILES['file']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'pdf|jpg|png|jpeg';
				$config['max_size']      = '20480';
				$config['upload_path'] = 'arsip/';
				$config['encrypt_name'] = TRUE;
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('file')) {
					$old_image = $data['app_arsip_lama']['file'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'arsip/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('file', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('hal_surat', $hal_surat);
			$this->db->set('tahun', $tahun);
			$this->db->where('id', $id);
			$this->db->update('app_arsip_lama');
			$this->session->set_flashdata('flash_a', 'Success');
			redirect('old/view');
	}

	public function upload()
	{
		$data['data'] = $this->Old_Models->view_old();
		$data['arsip'] = $this->db->get('app_old')->result_array();
		$id = $this->input->post('id');
		$upload_image = $_FILES['scan']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['max_size']      = '4096';
			$config['upload_path'] = 'upload/';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('scan')) {
				$old_image = $data['app_archive']['scan'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'upload/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->Old_Models->upload_old($id, $new_image);
		$this->session->set_flashdata('flash_a', 'Success');
		redirect('old/view');
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

	public function report()
	{
		$data['title'] = 'Old Archive';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['archive'] = $this->db->get('app_archive')->result_array();
		$data['data'] = $this->Old_Models->view_old();
		$data['jenis_archive'] = $this->db->get('app_jenis_archive')->result_array();
		$this->form_validation->set_rules('id', 'id', 'trim|required|is_unique[app_archive.id]', [
			'is_unique' => 'Maaf No Surat Sudah Ada!'
		]);
		$this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required');
		$this->form_validation->set_rules('hal', 'hal', 'required');
		$this->form_validation->set_rules('jenis_archive', 'Tingkat Kepentingan', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

		if ($this->form_validation->run() ==  false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('old/report', $data);
			$this->load->view('old/modal_archive', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id');
			$kode_surat = $this->input->post('kode_surat');
			$email = $this->input->post('email');
			$scan = "default.jpg";
			$hal = $this->input->post('hal');
			$jenis_archive = $this->input->post('jenis_archive');
			$tujuan = $this->input->post('tujuan');
			$unit_created = $this->input->post('unit_created');
			$now = date("Y-m-d");
			$date_created = $now;
			$nomor_surat = $id . $kode_surat;
			$qrcode = uniqid();
			$dir = FCPATH . 'assets/img/qrcode/';
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			$params['data'] = $nomor_surat;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = $dir . $qrcode . '.png';
			$this->ciqrcode->generate($params);

			$this->Archive_Models->save_archive($id, $kode_surat, $hal, $jenis_archive, $tujuan, $unit_created, $date_created, $qrcode,  $email, $nomor_surat, $scan);
			$this->session->set_flashdata('flash_a', 'Success');
			redirect('archive/view');
		}
	}

	public function uploadBerkas()
	{
		$data['title'] = 'Archive';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
		$data['data'] = $this->Archive_Models->view_archive_upload($id);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('archive/upload', $data);
		$this->load->view('archive/modalUpload', $data);
		$this->load->view('layout/footer');
	}

	public function upload2()
	{
		$data['data'] = $this->Archive_Models->view_archive();
		$data['arsip'] = $this->db->get('app_archive')->result_array();
		$id = $this->input->post('id');
		$upload_image = $_FILES['scan']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['max_size']      = '4096';
			$config['upload_path'] = 'upload/';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('scan')) {
				$old_image = $data['app_archive']['scan'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'upload/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->Archive_Models->upload_archive($id, $new_image);
		$this->session->set_flashdata('flash_a', 'Success');
		redirect('archive/uploadBerkas');
	}
	public function edit2()
	{
		$id = $this->input->post('id');
		$kode_surat = $this->input->post('kode_surat');
		$hal = $this->input->post('hal');
		$jenis_archive = $this->input->post('jenis_archive');
		$tujuan = $this->input->post('tujuan');
		$this->Archive_Models->edit_archive($id, $kode_surat, $hal, $jenis_archive, $tujuan);
		$this->session->set_flashdata('flash_a', 'Success');
		redirect('archive/uploadBerkas');
	}
}
