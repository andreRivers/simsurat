<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratTugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('SuratTugas_Models');
		$this->load->library('ciqrcode');
    }

    public function newSuratTugas()
	{
		$data['title'] = 'New Surat Tugas';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan'] = $this->db->get('app_pimpinan')->result_array();
        
		$this->form_validation->set_rules('no_surat_masuk', 'Nomor Surat', 'required');

		if ($this->form_validation->run() ==  false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('suratTugas/new', $data);
			$this->load->view('layout/footer');
		} else {

			$id_permohonan = $this->input->post('id_permohonan');
                      
            $result = array();
            foreach ($_POST['nama'] as $key => $val) {
               $result[] = array(             
                  'nama' => $_POST['nama'][$key],
                  'jabatan' => $_POST['jabatan'][$key],
                  'id_permohonan' => $id_permohonan      
               );      
            }      
			$this->db->insert_batch('app_namabertugas',$result);
			$email_pimpinan = $this->input->post('email_pimpinan');
            $no_surat_masuk = $this->input->post('no_surat_masuk');
            $tgl_surat_masuk = $this->input->post('tgl_surat_masuk');
            $no_surat_keluar = $this->input->post('no_surat_keluar');
			$balasan_surat = $this->input->post('balasan_surat');
            $perihal = $this->input->post('perihal');
            $menghadiri = $this->input->post('menghadiri');
            $tanggal = $this->input->post('tanggal');
            $pukul = $this->input->post('pukul');
            $tempat = $this->input->post('tempat');
			$now = date("Y-m-d");
            $date_created = $now;
			$status = 1;
			$notif = 0;
			$nomor_surat = $no_surat_keluar;
			$qrcode = uniqid();
			$dir = FCPATH . 'assets/suratTugas/qrcode/';
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			$params['data'] = $nomor_surat;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = $dir . $qrcode . '.png';
			$this->ciqrcode->generate($params);
			
			$simpan =[
				'id_permohonan' => $id_permohonan,
				'email_pimpinan' => $email_pimpinan,
				'no_surat_masuk' => $no_surat_masuk,
				'tgl_surat_masuk' => $tgl_surat_masuk,
				'no_surat_keluar' => $no_surat_keluar,
				'balasan_surat' => $balasan_surat,
				'perihal' => $perihal,
				'menghadiri' => $menghadiri,
				'tanggal' => $tanggal,
				'pukul' => $pukul,
				'tempat' => $tempat,
				'date_created' => $date_created,
				'status' => $status,
				'notif' => $notif,
				'qrcode' => $qrcode
			];
			$this->db->insert('app_surattugas', $simpan);
	
            $this->session->set_flashdata('flash_a', 'Success');
			redirect('suratTugas/view30');
		}
    }
    
    public function view30()
	{
		$data['title'] = 'LIST SURAT TUGAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->SuratTugas_Models->view30();
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('suratTugas/view30', $data);
			$this->load->view('layout/footer');
		
	}

	public function nView($id)
	{
		$data['title'] = 'LIST SURAT TUGAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->SuratTugas_Models->nView($id);
		$data['hapus'] = $this->SuratTugas_Models->nHapusView($id);
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('suratTugas/view30', $data);
			$this->load->view('layout/footer');
		
	}


	public function viewall()
	{
		$data['title'] = 'LIST ALL SURAT TUGAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->Sppd_Models->viewall();
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('sppd/viewall', $data);
			$this->load->view('layout/footer');
		
	}

	public function viewPimpinan()
	{
		$data['title'] = 'LIST SURAT TUGAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->SuratTugas_Models->viewPimpinan();
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('suratTugas/viewPimpinan', $data);
			$this->load->view('layout/footer');
		
	}
	
	public function edit($id)
	{
		$data['title'] = 'EDIT SURAT TUGAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pimpinan'] = $this->db->get('app_pimpinan')->result_array();
		$data['data'] = $this->Sppd_Models->edit($id);
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('sppd/edit', $data);
			$this->load->view('layout/footer');
		
    }
    
    public function delete($id)
	{
		$this->SuratTugas_Models->delete($id);
		$this->session->set_flashdata('flash_a', 'Delete');
		redirect('sppd/view30');
    }
    

    public function cetak($id_permohonan)
	{
		$data['title'] = 'Cetak Surat Tugas';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->SuratTugas_Models->cetak($id_permohonan);
		$data['tugas'] = $this->db->get_where('app_namabertugas', ['id_permohonan' => $id_permohonan])->result_array();
			$this->load->view('suratTugas/arab');	
			$this->load->view('suratTugas/cetak', $data);	
		
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

	// PIMPINAN VERIVIKASI

	public function setuju($id)
    {
		$status = 2;
		$notif = 1;
		$now = date("Y-m-d");
        $date_aproved = $$now;
        
		$this->db->set('status',$status);
		$this->db->set('notif',$notif);
		$this->db->set('date_aproved',$date_aproved);
		$this->db->where('id', $id);
		$this->db->update('app_surattugas');

        $this->session->set_flashdata('flash_a', 'Success');
        redirect('suratTugas/viewPimpinan');
    }
	

	public function tolak($id)
    {
		$status = 3;
		$notif = 1;
        $now = date("Y-m-d");
        $date_aproved = $$now;
        
		$this->db->set('status',$status);
		$this->db->set('notif',$notif);
		$this->db->set('date_aproved',$date_aproved);
		$this->db->where('id', $id);
		$this->db->update('app_surattugas');

        $this->session->set_flashdata('flash_a', 'Success');
        redirect('suratTugas/view30');
    }
	

	public function editGo()
	{
		$data['title'] = 'New SPPD';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan'] = $this->db->get('app_pimpinan')->result_array();
        
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');

		    $id = $this->input->post('id');
			$no_surat = $this->input->post('no_surat');
			$id_pejabat = $this->input->post('id_pejabat');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $pangkat_pegawai = $this->input->post('pangkat_pegawai');
            $jabatan_pegawai = $this->input->post('jabatan_pegawai');
            $tingkat_pd = $this->input->post('tingkat_pd');
            $nama_pegawai2 = $this->input->post('nama_pegawai2');
            $pangkat_pegawai2 = $this->input->post('pangkat_pegawai2');
            $jabatan_pegawai2 = $this->input->post('jabatan_pegawai2');
            $tingkat_pd2 = $this->input->post('tingkat_pd2');
            $tujuan_pd = $this->input->post('tujuan_pd');
            $alat_angkutan = $this->input->post('alat_angkutan');
            $lama_perjalanan = $this->input->post('lama_perjalanan');
            $tgl_berangkat = $this->input->post('tgl_berangkat');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $berangkat_kota = $this->input->post('berangkat_kota');
            $tujuan_kota = $this->input->post('tujuan_kota');
            $status = 1;
			$nomor_surat = $no_surat;
			$qrcode = uniqid();
			$dir = FCPATH . 'assets/sppd/qrcode/';
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			$params['data'] = $nomor_surat;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = $dir . $qrcode . '.png';
			$this->ciqrcode->generate($params);

			$this->db->set('no_surat', $no_surat);
			$this->db->set('id_pejabat', $id_pejabat);
			$this->db->set('nama_pegawai', $nama_pegawai);
			$this->db->set('pangkat_pegawai', $pangkat_pegawai);
			$this->db->set('jabatan_pegawai', $jabatan_pegawai);
			$this->db->set('tingkat_pd', $tingkat_pd);
			$this->db->set('nama_pegawai2', $nama_pegawai2);
			$this->db->set('pangkat_pegawai2', $pangkat_pegawai2);
			$this->db->set('jabatan_pegawai2', $jabatan_pegawai2);
			$this->db->set('tingkat_pd2', $tingkat_pd2);
			$this->db->set('tujuan_pd', $tujuan_pd);
			$this->db->set('alat_angkutan', $alat_angkutan);
			$this->db->set('lama_perjalanan', $lama_perjalanan);
			$this->db->set('tgl_berangkat', $tgl_berangkat);
			$this->db->set('tgl_kembali', $tgl_kembali);
			$this->db->set('berangkat_kota', $berangkat_kota);
			$this->db->set('tujuan_kota', $tujuan_kota);
			$this->db->set('status', $status);
			$this->db->set('qrcode', $qrcode);
			$this->db->where('id', $id);
			$this->db->update('app_sppd');

            $this->session->set_flashdata('flash_a', 'Success');
			redirect('sppd/view30');

	}
	
	public function detail($id_permohonan)
	{
		$data['title'] = 'DETAIL SURAT TUGAS';
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tugas'] = $this->db->get_where('app_namabertugas', ['id_permohonan' => $id_permohonan])->result_array();
		$data['data'] = $this->SuratTugas_Models->detail($id_permohonan);
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('suratTugas/detail', $data);
			$this->load->view('layout/footer');
		
	}
	

}
    


