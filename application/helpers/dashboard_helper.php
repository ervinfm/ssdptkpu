<?php

function get_dpt_dash()
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    $ci->db->order_by('created_pemilih', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function get_dptpindah_dash()
{
    $ci = &get_instance();
    $ci->db->from('tbl_pindah');
    $ci->db->order_by('created_pindah', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function get_cluster_data()
{
    $ci = &get_instance();
    $ci->db->from('tbl_clustering');
    $ci->db->order_by('created_clustering', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function get_last_accurasi_data()
{
    $ci = &get_instance();
    return get_cluster_data()->row()->akurasi_clustering;
}
