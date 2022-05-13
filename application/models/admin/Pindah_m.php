<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pindah_m extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('tbl_pindah');
        if ($id != null) {
            $this->db->where('id_pindah', $id);
        } else {
            $this->db->order_by('created_pindah', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function update_acc($post)
    {
        $params = [
            'kecamatan_pemilih' => $post['p_kecamatan'],
            'kelurahan_pemilih' => $post['p_kelurahan'],
            'rw_pemilih' => $post['p_rw'],
            'rt_pemilih' => $post['p_rt'],
            'id_tps' => $post['p_tps']
        ];
        $this->db->where('id_pemilih', $post['id_pemilih']);
        $this->db->update('tbl_pemilih', $params);
    }

    function update_status_pindah($id, $key, $note = null)
    {
        $params['status_pindah'] = $key;
        if ($note != null) {
            $params['note_pindah'] = $note;
        }
        $this->db->where('id_pindah', $id);
        $this->db->update('tbl_pindah', $params);
    }
}
