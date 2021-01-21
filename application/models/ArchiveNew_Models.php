<?php
class ArchiveNew_Models extends CI_Model
{

	function view_archive()
	{
		$email = $this->session->userdata('email');
		$hasil = $this->db->query("SELECT * FROM app_archive_new where email='$email' order by id DESC ");
		return $hasil;
	}

	function view_archive_upload($id)
	{
		$hasil = $this->db->query("SELECT * FROM app_archive_new where id='$id' ");
		return $hasil;
	}


	function view_archive_user()
	{
		$email = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$tes = $email['role_id'];
		$tesi = $email['email'];
		if ($tes == '2') {
			$hasil = $this->db->query("SELECT * FROM app_archive_new order by id DESC  LIMIT 30");
			return $hasil;
		} else {
			$hasil = $this->db->query("SELECT * FROM app_archive_new where email = '$tesi' order by id DESC ");
			return $hasil;
		}
	}

	function save_archive($no_surat, $kode_surat, $hal, $jenis_archive, $tujuan, $unit_created, $kirim, $date_created, $qrcode, $email, $nomor_surat, $scan)
	{
		$hasil = $this->db->query("INSERT INTO app_archive_new (no_surat, kode_surat, hal, jenis_archive, tujuan, unit_created, kirim, date_created,qrcode, email, nomor_surat, scan) VALUES ('$no_surat','$kode_surat', '$hal', '$jenis_archive', '$tujuan', '$unit_created', '$kirim', '$date_created', '$qrcode', '$email','$nomor_surat' ,'$scan')");
	}

	public function delete_archive($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('app_archive_new', ['id' => $id]);
	}


	function edit_archive($id, $kode_surat, $hal, $jenis_archive, $tujuan)
	{
		$hasil = $this->db->query("UPDATE app_archive_new SET kode_surat='$kode_surat', hal='$hal', jenis_archive='$jenis_archive', tujuan='$tujuan'  WHERE id='$id'");
	}

	function upload_archive($id, $new_image)
	{
		$hasil = $this->db->query("UPDATE app_archive_new SET scan='$new_image' WHERE id='$id'");
	}


	public function getArsipById($id)

	{

		return $this->db->query("SELECT * from app_archive_new  where id='$id'")->row_array();
	}

	function view_archive_admin($email)
	{

		$hasil = $this->db->query("SELECT * FROM app_archive_new where email='$email'");
		return $hasil;
	}
}
