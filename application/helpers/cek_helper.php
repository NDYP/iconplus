<?php
function login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('username');
    if (!$user_session) {
        redirect('login/index');
    }
}
function admin()
{
    $ci = &get_instance();
    $user_session = ($ci->session->userdata('akses') == 'Admin');
    if (!$user_session) {
        redirect($_SERVER['HTTP_REFERER']);
    }
}
function aktivasi()
{
    $ci = &get_instance();
    $user_session = ($ci->session->userdata('akses') == 'Aktivasi Retail');
    if (!$user_session) {
        redirect($_SERVER['HTTP_REFERER']);
    }
}
function asset()
{
    $ci = &get_instance();
    $user_session = ($ci->session->userdata('akses') == 'Asset Retail');
    if (!$user_session) {
        redirect($_SERVER['HTTP_REFERER']);
    }
}
function har()
{
    $ci = &get_instance();
    $user_session = ($ci->session->userdata('akses') == 'HAR');
    if (!$user_session) {
        redirect($_SERVER['HTTP_REFERER']);
    }
}
function sales()
{
    $ci = &get_instance();
    $user_session = ($ci->session->userdata('akses') == 'Sales');
    if (!$user_session) {
        redirect('potensi/index');
    }
}