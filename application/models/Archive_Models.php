<?php
class Archive_Models extends CI_Model
{

	function view_archive()
	{
		$hasil = $this->db->query("SELECT * FROM app_archive order by id DESC");
		return $hasil;
	}

	function view_archive_upload($no_surat)
	{
		$hasil = $this->db->query("SELECT * FROM app_archive where no_surat='$no_surat' ");
		return $hasil;
	}


	function view_archive_user()
	{
		$email = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$tes = $email['role_id'];
		$tesi = $email['email'];
		if ($tes == '2') {
			$hasil = $this->db->query("SELECT * FROM app_archive order by id DESC LIMIT 100");
			return $hasil;
		} else {
			$hasil = $this->db->query("SELECT * FROM app_archive where email = '$tesi' order by id DESC  LIMIT 30");
			return $hasil;
		}
	}


	function view_archive_user_all()
	{
		$email = $this->session->userdata('email');
		$hasil = $this->db->query("SELECT * FROM app_archive where email='$email' order by id DESC");
		return $hasil;
	}

	function save_archive($no_surat, $kode_surat, $hal, $jenis_archive, $tujuan, $unit_created, $date_created, $qrcode, $email, $nomor_surat, $scan, $year)
	{
		$hasil = $this->db->query("INSERT INTO app_archive (no_surat, kode_surat, hal, jenis_archive, tujuan, unit_created, date_created,qrcode, email, nomor_surat, scan, year) VALUES ('$no_surat','$kode_surat', '$hal', '$jenis_archive', '$tujuan', '$unit_created', '$date_created', '$qrcode', '$email','$nomor_surat' ,'$scan','$year')");
	}

	public function delete_archive($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('app_archive', ['id' => $id]);
	}


	function edit_archive($id, $kode_surat, $hal, $jenis_archive, $tujuan)
	{
		$hasil = $this->db->query("UPDATE app_archive SET kode_surat='$kode_surat', hal='$hal', jenis_archive='$jenis_archive', tujuan='$tujuan'  WHERE id='$id'");
	}

	function upload_archive($id, $new_image)
	{
		$hasil = $this->db->query("UPDATE app_archive SET scan='$new_image' WHERE id='$id'");
	}


	public function getArsipById($id)

	{

		return $this->db->query("SELECT * from app_archive  where id='$id'")->row_array();
	}

	function view_archive_keyword($keyword)
	{
		$hasil = $this->db->query("SELECT * FROM app_archive where (no_surat LIKE '%$keyword%' OR kode_surat LIKE '%$keyword%' OR hal LIKE '%$keyword%' OR tujuan LIKE '%$keyword%' OR date_created LIKE '%$keyword%')");
		return $hasil;
	}
}
