<?php defined('BASEPATH') or exit('No direct script access allowed');

class Domisili extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/domisili_m');
    }

    public function index()
    {
        $data['row'] = $this->domisili_m->get_kecamatan();
        $this->template->load('admin/template', 'admin/domisili/index', $data);
    }

    public function tambah()
    {
        $this->template->load('admin/template', 'admin/domisili/form_kec');
    }

    public function update($id)
    {
        $data['row'] = $this->domisili_m->get_kecamatan($id)->row();
        $this->template->load('admin/template', 'admin/domisili/form_kec', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['tambah'])) {
            $this->domisili_m->tambah_kecamatan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Data Kecamatan Baru Berhasil Ditambahkan!');
                redirect('admin/domisili');
            } else {
                $this->session->set_flashdata('error', 'Data Kecamatan Baru Gagal Ditambahkan!, <br> Sistem Error! Pastikan tidak ada duplikasi data');
                redirect('admin/domisili/tambah');
            }
        } else if (isset($post['update'])) {
            $this->domisili_m->update_kecamatan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Data Kecamatan Berhasil Diperbaharui!');
                redirect('admin/domisili');
            } else {
                $this->session->set_flashdata('error', 'Data Kecamatan Gagal Diperbaharui!, <br> Sistem Error! Pastikan tidak ada duplikasi data');
                redirect('admin/domisili/update/' . $post['id']);
            }
        } else {
            redirect('admin/domisili');
        }
    }

    function delete($id)
    {
        $this->domisili_m->delete_kecamatan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Data Kecamatan Baru Berhasil Dihapus!');
            redirect('admin/domisili');
        } else {
            $this->session->set_flashdata('error', 'Data Kecamatan Baru Gagal Dihapus!, <br> Sistem Error!');
            redirect('admin/domisili');
        }
    }

    public function kelurahan()
    {
        $data['row'] = $this->domisili_m->get_kelurahan();
        $this->template->load('admin/template', 'admin/domisili/kelurahan', $data);
    }

    public function tambah_data()
    {
        $this->template->load('admin/template', 'admin/domisili/form_kel');
    }

    public function update_data($id)
    {
        $data['row'] = $this->domisili_m->get_kelurahan($id)->row();
        $this->template->load('admin/template', 'admin/domisili/form_kel', $data);
    }

    function proses_data()
    {
        $post = $this->input->post(null, true);
        if (isset($post['tambah_data'])) {
            $this->domisili_m->tambah_kelurahan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Data Kelurahan Baru Berhasil Ditambahkan!');
                redirect('admin/domisili/kelurahan');
            } else {
                $this->session->set_flashdata('error', 'Data Kelurahan Baru Gagal Ditambahkan!, <br> Sistem Error! Pastikan tidak ada duplikasi data');
                redirect('admin/domisili/tambah_data');
            }
        } else if (isset($post['update_data'])) {
            $this->domisili_m->update_kelurahan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Data Kelurahan Berhasil Diperbaharui!');
                redirect('admin/domisili/kelurahan');
            } else {
                $this->session->set_flashdata('error', 'Data Kelurahan Gagal Diperbaharui!, <br> Sistem Error! Pastikan tidak ada duplikasi data');
                redirect('admin/domisili/update_data/' . $post['id']);
            }
        } else {
            redirect('admin/domisili/kelurahan');
        }
    }

    function delete_data($id)
    {
        $this->domisili_m->delete_kelurahan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Data Kelurahan Baru Berhasil Dihapus!');
            redirect('admin/domisili/kelurahan');
        } else {
            $this->session->set_flashdata('error', 'Data Kelurahan Baru Gagal Dihapus!, <br> Sistem Error!');
            redirect('admin/domisili/kelurahan');
        }
    }
}
