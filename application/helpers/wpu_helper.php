<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
