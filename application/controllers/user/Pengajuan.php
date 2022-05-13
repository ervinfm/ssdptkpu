<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('user/pengajuan_m');
    }

    public function index()
    {
        blocked_access(sistem()->fitur_pengajuan, 'dashboard');
        $this->template->load('user/template', 'user/pengajuan/index');
    }

    public function history()
    {
        $pemilih = get_pemilih_atribut('id_user', profil()->id_user)->row();
        $data['row'] = $this->pengajuan_m->get_history($pemilih->id_pemilih);
        $this->template->load('user/template', 'user/pengajuan/history', $data);
    }

    function get_kel()
    {
        $id_kec = $this->input->post('id', TRUE);
        $data = $this->pengajuan_m->get_kel($id_kec)->result();
        echo json_encode($data);
    }

    function batal($id)
    {
        $this->pengajuan_m->batal($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Pengajuan Pindah DPT Berhasil Dibatalkan!');
            redirect('pengajuan');
        } else {
            $this->session->set_flashdata('error', 'Pengajuan Pindah DPT Gagal Dibatalkan, <br> Sistem Error!');
            redirect('pengajuan');
        }
    }

    function ulang($id)
    {
        $this->pengajuan_m->ulang($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Pengajuan Pindah DPT Berhasil Diselesaikan!');
            redirect('pengajuan');
        } else {
            $this->session->set_flashdata('error', 'Pengajuan Pindah DPT Gagal Diselesaikan, <br> Sistem Error!');
            redirect('pengajuan');
        }
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['f_pengajuan'])) {
            $post['kec'] = get_kecamatan($post['f_kec'])->row()->nama_kecamatan;
            $post['kel'] = get_kelurahan($post['f_kel'])->row()->nama_kelurahan;
            $this->pengajuan_m->tambah($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pengajuan Pindah DPT Berhasil Diusulkan!<br> Silahkan tunggu, Pengajuan akan di proses oleh Petugas KPU!');
                redirect('pengajuan');
            } else {
                $this->session->set_flashdata('error', 'Pengajuan Pindah DPT Gagal Diusulkan, <br> Sistem Error!');
                redirect('pengajuan');
            }
        } else {
            redirect('pengajuan');
        }
    }
}
