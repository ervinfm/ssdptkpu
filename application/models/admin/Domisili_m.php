<?php defined('BASEPATH') or exit('No direct script access allowed');

class Domisili_m extends CI_Model
{

    function get_kecamatan($id = null)
    {
        $this->db->from('tb_kecamatan');
        if ($id != null) {
            $this->db->where('id_kecamatan', $id);
        } else {
            $this->db->order_by('id_kecamatan', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function tambah_kecamatan($post)
    {
        $params = [
            'id_kecamatan' => $post['id_kec'],
            'nama_kecamatan' => $post['nama_kec'],
            'longitude_maps' => $post['long_kec'],
            'latitude_maps' => $post['lat_kec'],
        ];
        $this->db->insert('tb_kecamatan', $params);
    }

    function update_kecamatan($post)
    {
        $params = [
            'id_kecamatan' => $post['id_kec'],
            'nama_kecamatan' => $post['nama_kec'],
            'longitude_maps' => $post['long_kec'],
            'latitude_maps' => $post['lat_kec'],
        ];
        $this->db->where('id_kecamatan', $post['id']);
        $this->db->update('tb_kecamatan', $params);
    }

    function delete_kecamatan($id)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->delete('tb_kecamatan');
    }

    function get_kelurahan($id = null, $id_kec = null)
    {
        $this->db->from('tb_kelurahan');
        if ($id_kec != null) {
            $this->db->where('id_kecamatan', $id);
        }
        if ($id != null) {
            $this->db->where('id_kelurahan', $id);
        } else {
            $this->db->order_by('id_kelurahan', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function tambah_kelurahan($post)
    {
        $params = [
            'id_kecamatan' => $post['kec_kel'],
            'id_kelurahan' => $post['id_kel'],
            'nama_kelurahan' => $post['nama_kel']
        ];
        $this->db->insert('tb_kelurahan', $params);
    }

    function update_kelurahan($post)
    {
        $params = [
            'id_kecamatan' => $post['kec_kel'],
            'id_kelurahan' => $post['id_kel'],
            'nama_kelurahan' => $post['nama_kel']
        ];
        $this->db->where('id_kelurahan', $post['id']);
        $this->db->update('tb_kelurahan', $params);
    }

    function delete_kelurahan($id)
    {
        $this->db->where('id_kelurahan', $id);
        $this->db->delete('tb_kelurahan');
    }
}
