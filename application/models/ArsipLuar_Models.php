<?php
class ArsipLuar_Models extends CI_Model
{

	function view()
	{
		$hasil = $this->db->query("SELECT * FROM app_arsip_lain order by id DESC  LIMIT 30");
		return $hasil;
	}

	function view_baris($tahun,$baris)
	{
		$hasil = $this->db->query("SELECT * FROM app_arsip_lain where tahun='$tahun' order by id DESC LIMIT $baris");
		return $hasil;
	}


	function view_Old_all()
	{
		$hasil = $this->db->query("SELECT * FROM app_arsip_lain order by id DESC");
		return $hasil;
	}


	function view_pencarian($keyword)
	{
		$hasil = $this->db->query("SELECT * FROM app_arsip_lain where (hal_surat LIKE '%$keyword%' OR tahun LIKE '%$keyword%' OR instansi LIKE '%$keyword%' OR isi_ringkas LIKE '%$keyword%')");
		return $hasil;
	}

	function save_old($email, $hal_surat, $tahun, $new_image, $date_created)
	{
		$hasil = $this->db->query("INSERT INTO app_arsip_lain (email, hal_surat, tahun, file, date_created) VALUES ('$email','$hal_surat', '$tahun', '$new_image', '$date_created')");
	}

	public function delete_old($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('app_arsip_lain', ['id' => $id]);
	}
}
