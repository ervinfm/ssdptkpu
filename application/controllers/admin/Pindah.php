<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pindah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/pindah_m');
    }

    public function index()
    {
        $data['row'] = $this->pindah_m->get();
        $this->template->load('admin/template', 'admin/pindah/index', $data);
    }

    function accept($id)
    {
        $row = $this->pindah_m->get($id)->row();
        $datas = [
            'id_pindah' => $row->id_pindah,
            'id_pemilih' => $row->id_pemilih,
            'p_kecamatan' => $row->kecamatan_pindah,
            'p_kelurahan' => $row->kelurahan_pindah,
            'p_rw' => $row->rw_pindah,
            'p_rt' => $row->rt_pindah,
            'p_tps' => $row->id_tps,
        ];
        $this->pindah_m->update_acc($datas);
        $this->pindah_m->update_status_pindah($row->id_pindah, 1);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Pengajuan Pindah DPT Berhasil Diterima!');
            redirect('admin/pindah');
        } else {
            $this->session->set_flashdata('error', 'Pengajuan Pindah DPT Gagal Diterima, <br> Sistem Error!');
            redirect('admin/pindah');
        }
    }

    function reject()
    {
        $this->pindah_m->update_status_pindah($_GET['id'], 2, $_GET['note']);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Pengajuan Pindah DPT Berhasil Ditolak!');
            redirect('admin/pindah');
        } else {
            $this->session->set_flashdata('error', 'Pengajuan Pindah DPT Gagal Ditolak, <br> Sistem Error!');
            redirect('admin/pindah');
        }
    }
}
