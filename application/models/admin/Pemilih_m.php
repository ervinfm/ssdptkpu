<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_m extends CI_Model
{

    // Pemilih
    function get_pemilih($id = null)
    {
        $this->db->from('tbl_pemilih');
        if ($id != null) {
            $this->db->where('id_pemilih', $id);
        } else {
            $this->db->order_by('nama_pemilih', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert_dataset_batch($data)
    {
        return $this->db->insert_batch('tbl_pemilih', $data);
    }

    function update_pemilih($post)
    {
        $params = [
            'nik_pemilih' => $post['p_nik'],
            'nama_pemilih' => $post['p_nama'],
            'lahir_pemilih' => $post['p_tempat'],
            'tgl_lahir_pemilih' => $post['p_tgl'],
            'perkawinan_pemilih' => $post['p_kawin'],
            'gender_pemilih' => $post['p_gender'],
            'difable_pemilih' => $post['p_difable'],
            'alamat_pemilih' => $post['p_alamat'],
            'domisili_pemilih' => $post['p_domisili'],
            'kecamatan_pemilih' => $post['p_kecamatan'],
            'kelurahan_pemilih' => $post['p_kelurahan'],
            'rw_pemilih' => $post['p_rw'],
            'rt_pemilih' => $post['p_rt'],
            'id_tps' => $post['p_tps']
        ];
        $this->db->where('id_pemilih', $post['id']);
        $this->db->update('tbl_pemilih', $params);
    }

    function delete_pemilih($id)
    {
        $this->db->where('id_pemilih', $id);
        $this->db->delete('tbl_pemilih');
    }
}
