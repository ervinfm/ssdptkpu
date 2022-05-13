<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/hasil_m');
    }

    public function index()
    {
        $data['row'] = $this->hasil_m->get_all_cluster();
        $this->template->load('admin/template', 'admin/hasil/index', $data);
    }

    public function detail($id)
    {
        $data['row'] = $this->hasil_m->get_all_cluster($id)->row();
        $this->template->load('admin/template', 'admin/hasil/detail', $data);
    }
}
