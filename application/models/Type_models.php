<?php
class Type_models extends CI_Model
{

    function view_type()
    {
        $hasil = $this->db->query("SELECT * FROM app_jenis_archive");
        return $hasil;
    }

    public function delete_type($id_jenis)
    {
        // $this->db->where('id', $id);
        $this->db->delete('app_jenis_archive', ['id_jenis' => $id_jenis]);
    }

    function edit_type($id_jenis, $jenis_archive)
    {
        $hasil = $this->db->query("UPDATE app_jenis_archive SET jenis_archive='$jenis_archive' WHERE id_jenis='$id_jenis'");
    }
}
