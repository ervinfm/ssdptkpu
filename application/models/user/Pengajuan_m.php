<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{

    function get_history($id_pemilih)
    {
        $this->db->from('tbl_pindah');
        $this->db->join('tbl_pemilih', 'tbl_pindah.id_pemilih = tbl_pemilih.id_pemilih');
        $this->db->where('tbl_pindah.id_pemilih', $id_pemilih);
        $this->db->order_by('tbl_pindah.created_pindah', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    function get_kel($id_kecamatan = null)
    {
        $this->db->from('tb_kelurahan');
        $this->db->where('id_kecamatan', $id_kecamatan);
        $this->db->order_by('nama_kelurahan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function tambah($post)
    {
        $params = [
            'id_pemilih' => $post['id_pemilih'],
            'kecamatan_pindah' => $post['kel'],
            'kelurahan_pindah' => $post['kec'],
            'rw_pindah' => $post['f_rw'],
            'rt_pindah' => $post['f_rt'],
            'id_tps' => $post['f_tps'],
            'status_pindah' => 0,
            'note_pindah' => '',
        ];
        $this->db->insert('tbl_pindah', $params);
    }

    function batal($id)
    {
        $this->db->where('id_pindah', $id);
        $this->db->delete('tbl_pindah');
    }

    function ulang($id)
    {
        $params['status_pindah'] = 3;
        $this->db->where('id_pindah', $id);
        $this->db->update('tbl_pindah', $params);
    }
}
