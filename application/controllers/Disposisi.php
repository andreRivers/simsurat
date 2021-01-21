<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Disposisi_Models');
        $this->load->library('ciqrcode');
    }
    public function kirim()
    {
        $id = $this->input->post('id');
        $kirim = 0;
        $now = date("Y-m-d");
        $kepada =  implode(",", $this->input->post('penerima'));
        $penerima = $this->input->post('penerima');
        $id_surat = $this->input->post('id');
        $notifikasi = 1;
        $data = [
            'id_surat' => $this->input->post('id'),
            'email' => $this->input->post('email'),
            'nomor_surat' => $this->input->post('nomor_surat'),
            'hal' => $this->input->post('hal'),
            'jenis_archive' => $this->input->post('jenis_archive'),
            'scan' => $this->input->post('scan'),
            'sts' => 1,
            'penerima' => $kepada,
            'catatan' => $this->input->post('catatan'),
            'date_created' => $now
        ];
        $this->db->insert('app_disposisi', $data);

        $this->db->set('kirim', $kirim);
        $this->db->where('id', $id);
        $this->db->update('app_archive_new');

        $notif = array();
        $count = count((is_countable($penerima) ? $penerima : []));
        for ($i = 0; $i < $count; $i++) {
            $notif[] = array(
                'id_surat' => $id_surat,
                'penerima' => $penerima[$i],
                'notif' => $notifikasi,
                'date_created' => $now
            );
        }
        $this->db->insert_batch('app_notif_suratMasuk', $notif);

        $this->session->set_flashdata('flash_a', 'Success!');
        redirect('disposisi/viewKeluar');
    }

    public function viewKeluar()
    {
        $data['title'] = 'Surat Keluar ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->viewKeluar();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewKeluar', $data);
        $this->load->view('disposisi/modal', $data);
        $this->load->view('layout/footer');
    }


    public function viewMasuk()
    {
        $data['title'] = 'Surat Masuk ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->viewMasuk();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewMasuk', $data);
        $this->load->view('disposisi/modal', $data);
        $this->load->view('layout/footer');
    }

    public function nViewMasuk($id, $id_surat)
    {
        $data['title'] = 'Surat Masuk ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->nViewMasuk($id_surat);
        $data['hapus'] = $this->Disposisi_Models->nHapusViewMasuk($id);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewMasuk', $data);
        $this->load->view('disposisi/modal', $data);
        $this->load->view('layout/footer');
    }

    public function viewDisposisi()
    {
        $data['title'] = 'Disposisi Surat ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->viewDisposisi();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewDisposisi', $data);
        $this->load->view('layout/footer');
    }

    public function nViewDisposisi($id, $id_surat)
    {
        $data['title'] = 'Disposisi Surat ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->nViewDisposisi($id_surat);
        $data['hapus'] = $this->Disposisi_Models->nHapusViewDisposisi($id);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewDisposisi', $data);
        $this->load->view('layout/footer');
    }

    public function viewDisposisiUser()
    {
        $data['title'] = 'Disposisi Surat ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->viewDisposisiUser();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewDisposisi', $data);
        $this->load->view('layout/footer');
    }



    public function viewMasukPimpinan()
    {
        $data['title'] = 'Surat Masuk ';
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Disposisi_Models->viewMasukPimpinan();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('disposisi/viewMasuk', $data);
        $this->load->view('disposisi/modal', $data);
        $this->load->view('layout/footer');
    }


    public function tolakSurat()
    {
        $id = $this->input->post('id');
        $ket = $this->input->post('keterangan');
        $sts = 4;

        $this->db->set('ket', $ket);
        $this->db->set('sts', $sts);
        $this->db->where('id', $id);
        $this->db->update('app_disposisi');
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('disposisi/viewMasuk');
    }

    public function prosesSurat()
    {
        $id = $this->input->post('id');
        $pimpinan = $this->input->post('pimpinan');
        $sts = 2;

        $this->db->set('pimpinan', $pimpinan);
        $this->db->set('sts', $sts);
        $this->db->where('id', $id);
        $this->db->update('app_disposisi');
        $this->session->set_flashdata('flash_a', 'Success');
        redirect('disposisi/viewMasuk');
    }

    public function disposisiSurat()
    {
        $id_surat = $this->input->post('id_surat');
        $now = date("Y-m-d");
        $penerima = "baum@umsu.ac.id";
        $notifikasi = 1;
        $id = $this->input->post('id');
        $ket = $this->input->post('keterangan');
		$disposisi =  implode(",", $this->input->post('disposisi'));
		$kepada =  implode(",", $this->input->post('penerima'));
        $penerima = $this->input->post('penerima');
        $sts = 3;

        $this->db->set('ket', $ket);
        $this->db->set('disposisi', $disposisi);
        $this->db->set('sts', $sts);
        $this->db->where('id', $id);
		$this->db->update('app_disposisi');
		
		$notif = array();
        $count = count((is_countable($penerima) ? $penerima : []));
        for ($i = 0; $i < $count; $i++) {
            $notif[] = array(
                'id_surat' => $id_surat,
                'penerima' => $penerima[$i],
                'notif' => $notifikasi,
                'date_created' => $now
            );
        }
        $this->db->insert_batch('app_notif_disposisi', $notif);

       $this->session->set_flashdata('flash_a', 'Success');
        redirect('disposisi/viewMasukPimpinan');
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
