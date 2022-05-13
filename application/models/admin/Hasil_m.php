<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_m extends CI_Model
{

    function get_all_cluster($id = null)
    {
        $this->db->from('tbl_clustering');
        if ($id != null) {
            $this->db->where('id_clustering', $id);
        } else {
            $this->db->where('id_user', $this->session->userdata('user_id'));
            $this->db->order_by('created_clustering', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_detail_cluster($id)
    {
        $this->db->from('tbl_clustering');
        $this->db->where('id_user', $this->session->userdata('user_id'));
        $this->db->order_by('created_clustering', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
