<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role =$ci->session->userdata('role');
        if ($role != "Admin"){
            redirect('profil');
        }
    }
}
function is_logged_in2()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('role');
        if ($role != "User"){
            redirect('mahasiswa');
        }
    }
}