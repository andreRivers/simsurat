<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArchiveNew extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('ArchiveNew_Models');
		$this->load->library('ciqrcode');
	}
	public function view()
	{
		$data['title'] = 'Archive ';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->ArchiveNew_Models->view_archive_user();
		$data['jenis_archive'] = $this->db->get('app_jenis_archive')->result_array();
		$this->form_validation->set_rules('no_surat', 'no_surat', 'required');
		$this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required');
		$this->form_validation->set_rules('hal', 'hal', 'required');
		$this->form_validation->set_rules('jenis_archive', 'Tingkat Kepentingan', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

		if ($this->form_validation->run() ==  false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('archiveNew/view', $data);
			$this->load->view('archiveNew/modal_archiveNew', $data);
			$this->load->view('layout/footer');
		} else {

			$no_surat = $this->input->post('no_surat');
			$email = $this->input->post('email');
			$sql = $this->db->query("SELECT * FROM  app_archive_new WHERE no_surat='$no_surat' AND email='$email'");
			$cek_no = $sql->num_rows();
			if ($cek_no > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>GAGAL!</strong> Nomor Surat sebelumnya Sudah Digunakan, Coba Kembali !
			  </div>');
			    redirect('archiveNew/view');
			} else {
			$no_surat = $this->input->post('no_surat');
			$kode_surat = $this->input->post('kode_surat');
			$email = $this->input->post('email');
			$scan = "default.jpg";
			$hal = $this->input->post('hal');
			$jenis_archive = $this->input->post('jenis_archive');
			$tujuan = $this->input->post('tujuan');
			$unit_created = $this->input->post('unit_created');
			$kirim = 1;
			$now = date("Y-m-d");
			$date_created = $now;
			$nomor_surat = $no_surat . $kode_surat;
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

			$this->ArchiveNew_Models->save_archive($no_surat, $kode_surat, $hal, $jenis_archive, $tujuan, $unit_created, $kirim, $date_created, $qrcode,  $email, $nomor_surat, $scan);
			$this->session->set_flashdata('flash_a', 'Success');
			redirect('archiveNew/view');
		}
}
	}


	public function delete($id)
	{
		$this->ArchiveNew_Models->delete_archive($id);
		$this->session->set_flashdata('flash_a', 'Delete');
		redirect('archiveNew/view');
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$kode_surat = $this->input->post('kode_surat');
		$hal = $this->input->post('hal');
		$jenis_archive = $this->input->post('jenis_archive');
		$tujuan = $this->input->post('tujuan');
		$this->ArchiveNew_Models->edit_archive($id, $kode_surat, $hal, $jenis_archive, $tujuan);
		$this->session->set_flashdata('flash_a', 'Success');
		redirect('archiveNew/view');
	}

	public function upload()
	{
		$data['data'] = $this->ArchiveNew_Models->view_archive();
		$data['arsip'] = $this->db->get('app_archive_new')->result_array();
		$id = $this->input->post('id');
		$upload_image = $_FILES['scan']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['max_size']      = '4096';
			$config['upload_path'] = 'upload/';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('scan')) {
				$old_image = $data['app_archive_new']['scan'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'upload/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->ArchiveNew_Models->upload_archive($id, $new_image);
		$this->session->set_flashdata('flash_a', 'Success');
		redirect('archiveNew/view');
	}

	public function cetak($id)
	{
		$data['title'] = 'Cetak ';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		ob_start();
		$data['arsip'] = $this->ArchiveNew_Models->getArsipById($id);
		$this->load->view('archiveNew/cetak', $data);
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
		$data['title'] = 'Archive';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['archive'] = $this->db->get('app_archive')->result_array();
		$data['data'] = $this->ArchiveNew_Models->view_archive();
		$data['jenis_archive'] = $this->db->get('app_jenis_archive')->result_array();
		$this->form_validation->set_rules('no_surat', 'no_surat', 'trim|required');
		$this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required');
		$this->form_validation->set_rules('hal', 'hal', 'required');
		$this->form_validation->set_rules('jenis_archive', 'Tingkat Kepentingan', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

		if ($this->form_validation->run() ==  false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('archiveNew/report', $data);
			$this->load->view('archiveNew/modal_archiveNew', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id');
			$no_surat = $this->input->post('no_surat');
			$kode_surat = $this->input->post('kode_surat');
			$email = $this->input->post('email');
			$scan = "default.jpg";
			$hal = $this->input->post('hal');
			$jenis_archive = $this->input->post('jenis_archive');
			$tujuan = $this->input->post('tujuan');
			$unit_created = $this->input->post('unit_created');
			$now = date("Y-m-d");
			$date_created = $now;
			$nomor_surat = $no_surat . $kode_surat;
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

			$this->ArchiveNew_Models->save_archive($id, $no_surat, $kode_surat, $hal, $jenis_archive, $tujuan, $unit_created, $date_created, $qrcode,  $email, $nomor_surat, $scan);
			$this->session->set_flashdata('flash_a', 'Success');
			redirect('archiveNew/view');
		}
	}

	public function uploadBerkas()
	{
		$data['title'] = 'Archive';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
		$data['data'] = $this->ArchiveNew_Models->view_archive_upload($id);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('archive/upload', $data);
		$this->load->view('archiveNew/modalUpload', $data);
		$this->load->view('layout/footer');
	}

	public function upload2()
	{
		$data['data'] = $this->Archive_Models->view_archive();
		$data['arsip'] = $this->db->get('app_archive_new')->result_array();
		$id = $this->input->post('id');
		$upload_image = $_FILES['scan']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['max_size']      = '4096';
			$config['upload_path'] = 'upload/';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('scan')) {
				$old_image = $data['app_archive_new']['scan'];
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
		redirect('archiveNew/uploadBerkas');
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
