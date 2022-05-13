<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/account_m');
    }

    public function index()
    {
        $data['row'] = $this->account_m->get();
        $this->template->load('admin/template', 'admin/account/index', $data);
    }

    public function tambah()
    {
        $this->template->load('admin/template', 'admin/account/form');
    }

    public function update($id)
    {
        $data['row'] = $this->account_m->get($id)->row();
        $this->template->load('admin/template', 'admin/account/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['tambah'])) {
            if (cek_user('email_user', $post['u_email'])->num_rows() == 0) {
                if (cek_user('username_user', $post['u_user'])->num_rows() == 0) {
                    $post['id_usr'] = random_string('alnum', 25);
                    $this->account_m->insert($post);
                    if ($this->db->affected_rows() > 0) {
                        if ($post['id_usr'] != null) {
                            set_dpt_user($post['nik_pemilih'], $post['id_usr']);
                        }
                        $this->session->set_flashdata('succes', 'Data Pengguna Baru Berhasil di Ditambahkan! <br> Username : ' . $post['u_user'] . '<br> Password : ' . $post['u_pass']);
                        redirect('admin/account');
                    } else {
                        $this->session->set_flashdata('error', 'Data Pengguna Baru Gagal di Ditambahkan, <br> Sistem Error!');
                        redirect('admin/account');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Data Pengguna Baru Gagal Ditambahkan, <br> Username Sudah Digunakan!');
                    redirect('admin/account/tambah');
                }
            } else {
                $this->session->set_flashdata('error', 'Data Pengguna Baru Gagal Ditambahkan, <br> Email Sudah Digunakan!');
                redirect('admin/account/tambah');
            }
        } else if (isset($post['update'])) {
            $this->account_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Data Pengguna Baru Berhasil di Diperbaharui!');
                redirect('admin/account');
            } else {
                $this->session->set_flashdata('error', 'Data Pengguna Baru Gagal di Diperbaharui, <br> Sistem Error!');
                redirect('admin/account/update/' . $post['id']);
            }
        }
    }

    function delete($id)
    {
        $this->account_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Data Pengguna Baru Berhasil di Dihapus!');
            redirect('admin/account');
        } else {
            $this->session->set_flashdata('error', 'Data Pengguna Baru Gagal di Dihapus, <br> Sistem Error!');
            redirect('admin/account');
        }
    }
}
