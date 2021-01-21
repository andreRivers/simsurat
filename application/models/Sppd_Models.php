<?php
class Sppd_Models extends CI_Model
{

	function view30()
	{
			$hasil = $this->db->query("SELECT * FROM app_sppd LEFT JOIN app_pimpinan ON app_sppd.email_pimpinan = app_pimpinan.email  LIMIT 30");
			return $hasil;
	}

	function nView($id)
	{
			$hasil = $this->db->query("SELECT * FROM app_sppd LEFT JOIN app_pimpinan ON app_sppd.email_pimpinan = app_pimpinan.email where app_sppd.id='$id'  LIMIT 30");
			return $hasil;
	}

	function nHapusViewSppd($id)
	{
			$hasil = $this->db->query("UPDATE app_sppd SET notif=0 where id='$id'");
			return $hasil;
	}

	function viewall()
	{
			$hasil = $this->db->query("SELECT * FROM app_sppd LEFT JOIN app_pimpinan ON app_sppd.email_pimpinan = app_pimpinan.email");
			return $hasil;
	}
	
	function edit($id)
	{
			return $this->db->query("SELECT * FROM app_sppd LEFT JOIN app_pimpinan ON app_sppd.email_pimpinan = app_pimpinan.email where app_sppd.id='$id'")->row_array();
	}
    
    function cetak($id)
	{
			return $this->db->query("SELECT * FROM app_sppd LEFT JOIN app_pimpinan ON app_sppd.email_pimpinan = app_pimpinan.email where app_sppd.id='$id'")->row_array();
	}

	function save($no_surat, $email_pimpinan, $nama_pegawai, $pangkat_pegawai, $jabatan_pegawai, $tingkat_pd, $nama_pegawai2, $pangkat_pegawai2, $jabatan_pegawai2, $tingkat_pd2, $tujuan_pd, $alat_angkutan , $lama_perjalanan , $tgl_berangkat , $tgl_kembali , $berangkat_kota , $tujuan_kota, $status, $date_created, $qrcode)
	{
		$hasil = $this->db->query("INSERT INTO app_sppd(no_surat, email_pimpinan, nama_pegawai, pangkat_pegawai, jabatan_pegawai, tingkat_pd, nama_pegawai2, pangkat_pegawai2, jabatan_pegawai2 ,tingkat_pd2 ,tujuan_pd ,alat_angkutan ,lama_perjalanan ,tgl_berangkat ,tgl_kembali ,berangkat_kota ,tujuan_kota ,status ,date_created ,qrcode) VALUES ('$no_surat', '$email_pimpinan', '$nama_pegawai', '$pangkat_pegawai', '$jabatan_pegawai', '$tingkat_pd', '$nama_pegawai2', '$pangkat_pegawai2', '$jabatan_pegawai2', '$tingkat_pd2', '$tujuan_pd', '$alat_angkutan' , '$lama_perjalanan' , '$tgl_berangkat' , '$tgl_kembali' , '$berangkat_kota' , '$tujuan_kota', '$status', '$date_created', '$qrcode')");
	}

	public function delete($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('app_sppd', ['id' => $id]);
	}
	
	function viewPimpinan()
	{
			$email = $this->session->userdata('email');
			$hasil = $this->db->query("SELECT * FROM app_sppd LEFT JOIN app_pimpinan ON app_sppd.email_pimpinan = app_pimpinan.email where app_sppd.status=1 AND app_sppd.email_pimpinan='$email'");
			return $hasil;
		
    }
}
