<?php
class Disposisi_Models extends CI_Model
{

    function viewKeluar()
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where email='$email' order by id DESC ");
        return $hasil;
    }

    function viewMasuk()
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where penerima LIKE '%$email%'");
        return $hasil;
    }

    function nViewMasuk($id_surat)
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where penerima LIKE '%$email%' AND id_surat='$id_surat'");
        return $hasil;
    }

    function nHapusViewMasuk($id)
    {
        $notif = 0;
        $hasil1 = $this->db->query("UPDATE app_notif_suratMasuk SET notif='$notif' where id='$id'");
        return $hasil1;
    }

    function viewMasukPimpinan()
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where pimpinan='$email' AND sts=2 ");
        return $hasil;
    }

    function viewDisposisi()
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where penerima LIKE '%$email%' AND sts=3");
        return $hasil;
    }

    function nViewDisposisi($id_surat)
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where penerima LIKE '%$email%' AND id_surat='$id_surat' AND sts=3");
        return $hasil;
    }

    function nHapusViewDisposisi($id)
    {
        $email = $this->session->userdata('email');
        $notif = 0;
        $hasil1 = $this->db->query("UPDATE app_notif_disposisi SET notif='$notif' where  id='$id'");
        return $hasil1;
    }

    function viewDisposisiUser()
    {
        $email = $this->session->userdata('email');
        $hasil = $this->db->query("SELECT * FROM app_disposisi where email='$email' AND sts=3");
        return $hasil;
    }
}
