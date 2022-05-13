<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sistem extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/sistem_m');
    }

    public function index()
    {
        $data['sistem'] = $this->sistem_m->get_sistem()->row();
        $this->template->load('admin/template', 'admin/sistem/index', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['sistem'])) {
            if ($post['f_pindah'] == 'on') {
                $post['f_pindah'] = 1;
            } else {
                $post['f_pindah'] = 0;
            }
            if ($post['f_statistik'] == 'on') {
                $post['f_statistik'] = 1;
            } else {
                $post['f_statistik'] = 0;
            }
            if ($post['f_peta'] == 'on') {
                $post['f_peta'] = 1;
            } else {
                $post['f_peta'] = 0;
            }
            if ($post['f_email'] == 'on') {
                $post['f_email'] = 1;
            } else {
                $post['f_email'] = 0;
            }
            if ($post['f_register'] == 'on') {
                $post['f_register'] = 1;
            } else {
                $post['f_register'] = 0;
            }
            $data = $this->sistem_m->get_sistem()->row();
            $config['upload_path']    = './assets/images';
            $config['allowed_types']  = 'jpg|png|jpeg|webp';
            $config['max_size']       = 10000;
            $config['file_name']       = random_string('alnum', 25);
            $this->load->library('upload', $config);
            $gambar = $this->upload->do_upload('image');
            if ($gambar == true) {
                if (profil()->image_user != null) {
                    $target_file = './assets/images/' . $data->logo_sistem;
                    unlink($target_file);
                    $post['image'] = $this->upload->data('file_name');
                } else if (profil()->image_user == null) {
                    $post['image'] = $this->upload->data('file_name');
                }
            } else {
                $post['image'] = $data->logo_sistem;
            }
            $this->sistem_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pengaturan Sistem Berhasil Diperbaharui!');
                redirect('admin/sistem');
            } else {
                $this->session->set_flashdata('error', 'Pengaturan Sistem Gagal Diperbaharui, <br> Sistem Error!');
                redirect('admin/sistem');
            }
        }
    }
}
