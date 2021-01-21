<?php
class Old_Models extends CI_Model
{

	function view_Old()
	{
		$hasil = $this->db->query("SELECT * FROM app_old order by id DESC  LIMIT 30");
		return $hasil;
	}

	function view_archive_upload($id)
	{
		$hasil = $this->db->query("SELECT * FROM app_old where id='$id' ");
		return $hasil;
	}



	function save_old($no_surat, $hasil, $hal, $jenis_archive, $tujuan, $unit_created, $date_created, $email, $scan)
	{
		$hasil = $this->db->query("INSERT INTO app_old(no_surat, kode_surat, hal, jenis_archive, tujuan, unit_created, date_created, email, scan) VALUES ('$no_surat','$hasil', '$hal', '$jenis_archive', '$tujuan', '$unit_created', '$date_created', '$email' ,'$scan')");
	}

	public function delete_old($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('app_old', ['id' => $id]);
	}


	function edit_old($id, $no_surat, $kode_surat, $hal, $jenis_archive, $tujuan)
	{
		$hasil = $this->db->query("UPDATE app_old SET no_surat='$no_surat', kode_surat='$kode_surat', hal='$hal', jenis_archive='$jenis_archive', tujuan='$tujuan'  WHERE id='$id'");
	}

	function upload_old($id, $new_image)
	{
		$hasil = $this->db->query("UPDATE app_old SET scan='$new_image' WHERE id='$id'");
	}


	public function getArsipById($id)

	{

		return $this->db->query("SELECT * from app_old  where id='$id'")->row_array();
	}
}
