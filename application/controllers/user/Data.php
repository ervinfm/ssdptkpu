<?php defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        $data['row'] = get_pemilih_atribut('id_user', $this->session->userdata('user_id'))->row();
        $this->template->load('user/template', 'user/data/index', $data);
    }
}
