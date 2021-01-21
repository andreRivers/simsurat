<?php
class SuratTugas_Models extends CI_Model
{

	function view30()
	{
			$hasil = $this->db->query("SELECT * FROM app_surattugas  LIMIT 30");
			return $hasil;
	}

	function nView($id)
	{
			$hasil = $this->db->query("SELECT * FROM app_surattugas WHERE id='$id' LIMIT 30");
			return $hasil;
	}

	function nHapusView($id)
	{
			$hasil = $this->db->query("UPDATE app_surattugas SET notif=0 WHERE id='$id' LIMIT 30");
			return $hasil;
	}


	function viewPimpinan()
	{
			$email = $this->session->userdata('email');
			$hasil = $this->db->query("SELECT * FROM app_surattugas where status=1  AND email_pimpinan='$email' LIMIT 30");
			return $hasil;
	}

	function viewall()
	{
			$hasil = $this->db->query("SELECT * FROM app_surattugas LEFT JOIN app_pimpinan ON app_sppd.id_pejabat = app_pimpinan.id_pejabat order by app_sppd.id DESC");
			return $hasil;
	}
	
	function detail($id_permohonan)
	{
			return $this->db->query("SELECT * FROM app_surattugas where id_permohonan='$id_permohonan'")->row_array();
	}
    
    function cetak($id_permohonan)
	{
			return $this->db->query("SELECT * FROM app_surattugas where id_permohonan='$id_permohonan'")->row_array();
	}

	function save($id_permohanan, $no_surat_masuk, $tgl_surat_masuk, $no_surat_keluar, $balasan_surat, $perihal, $menghadiri, $tanggal, $pukul, $tempat, $date_created, $status, $qrcode)
	{
		$hasil = $this->db->query("INSERT INTO app_surattugas(id_permohonan, no_surat_masuk,tgl_surat_masuk,no_surat_keluar,balasan_surat,perihal,menghadiri,tanggal,pukul,tempat,date_created,status,qrcode) VALUES ('$id_permohonan','$no_surat_masuk','$tgl_surat_masuk','$no_surat_keluar','$balasan_surat','$perihal','$menghadiri','$tanggal','$pukul','$tempat','$date_created','$status','$qrcode')");
    }

	public function delete($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('app_sppd', ['id' => $id]);
	}
	
	

    public function save_batch($data){
        return $this->db->insert_batch('app_namaBertugas', $data);
	  }
	  
}
