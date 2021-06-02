<?php
class User_models extends CI_Model
{

    function view_user()
    {
        $hasil = $this->db->query("SELECT * FROM app_user");
        return $hasil;
    }

    public function delete_user($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('app_user', ['id' => $id]);
    }

    function edit_user($id, $nama, $no_hp, $email, $role_id)
    {
        $hasil = $this->db->query("UPDATE app_user SET nama='$nama', no_hp='$no_hp', email='$email' , role_id='$role_id'  WHERE id='$id'");
    }
}
