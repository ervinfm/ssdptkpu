<?php defined('BASEPATH') or exit('No direct script access allowed');

class Clustering_m extends CI_Model
{

    function get_dcluster()
    {
        $this->db->from('tbl_clustering');
        $this->db->where('id_user', $this->session->userdata('user_id'));
        $this->db->where('status_clustering', 0);
        $this->db->order_by('created_clustering', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    function get_all_cluster()
    {
        $this->db->from('tbl_clustering');
        $this->db->where('id_user', $this->session->userdata('user_id'));
        $this->db->order_by('created_clustering', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    function get_data($id = null)
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

    function get_kecamatan_bydata()
    {
        $this->db->from('tbl_pemilih');
        $this->db->group_by('kecamatan_pemilih');
        $this->db->order_by('kecamatan_pemilih', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_kelurahan_bydata()
    {
        $this->db->from('tbl_pemilih');
        $this->db->group_by('kelurahan_pemilih');
        $this->db->order_by('kelurahan_pemilih', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_kelurahan($id = null)
    {
        $this->db->from('tb_kelurahan');
        if ($id != null) {
            $this->db->where('id_kelurahan', $id);
        } else {
            $this->db->order_by('id_kelurahan', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_data_bykel($nama_kel)
    {
        $this->db->from('tbl_pemilih');
        $this->db->where('kelurahan_pemilih', $nama_kel);
        $this->db->order_by('nama_pemilih', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function insert_proses($id, $dpt, $kec, $kel)
    {
        $params = [
            'id_clustering' => $id,
            'ndata_clustering' => $dpt,
            'nkec_clustering' => $kec,
            'nkel_clustering' => $kel,
            'status_clustering' => 0,
            'id_user' => $this->session->userdata('user_id'),
        ];
        $this->db->insert('tbl_clustering', $params);
    }

    function get_clustering($id)
    {
        $this->db->from('tbl_clustering');
        $this->db->where('id_clustering', $id);
        $this->db->where('id_user', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query;
    }

    function set_clustering($post)
    {
        $params = [
            'id_clustering_hasil' => random_string('alnum', 25),
            'id_clustering' => $post['id_cluster'],
            'nama_kelurahan' => $post['nama_kel'],
            'ncluster1_hasil' => get_claster_inkelurahan($post['nama_kel'], 1)->num_rows(),
            'ncluster2_hasil' => get_claster_inkelurahan($post['nama_kel'], 2)->num_rows(),
            'ncluster3_hasil' => get_claster_inkelurahan($post['nama_kel'], 3)->num_rows(),
        ];
        $this->db->insert('tbl_clustering_hasil', $params);
    }

    function reset_clustering($id_clustering)
    {
        $this->db->where('id_clustering', $id_clustering);
        $this->db->delete('tbl_clustering');
    }

    function reset_clustering_detail($id_clustering)
    {
        $this->db->where('id_clustering', $id_clustering);
        $this->db->delete('tbl_clustering_detail');
    }

    function reset_clustering_hasil($id_clustering)
    {
        $this->db->where('id_clustering', $id_clustering);
        $this->db->delete('tbl_clustering_hasil');
    }

    function confirm_clustering($id_clustering)
    {
        $params['status_clustering'] = 1;
        $this->db->where('id_clustering', $id_clustering);
        $this->db->update('tbl_clustering', $params);
    }
}
