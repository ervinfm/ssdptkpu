<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sistem_m extends CI_Model
{

    function get_sistem()
    {
        $this->db->from('tbl_sistem');
        $query = $this->db->get();
        return $query;
    }

    function update($post)
    {
        $params = [
            'id_user' => $post['user_sistem'],
            'nama_sistem' => $post['name_sistem'],
            'company_sistem' => $post['name_company'],
            'email_sistem' => $post['email_sistem'],
            'pass_email_sistem' => base64_encode($post['pass_mail_sistem']),
            'logo_sistem' => $post['image'],
            'fitur_pengajuan' => $post['f_pindah'],
            'fitur_sebaran' => $post['f_statistik'],
            'fitur_statistik' => $post['f_peta'],
            'fitur_maillogin' => $post['f_email'],
            'fitur_registrasi' => $post['f_register']
        ];
        $this->db->where('id_sistem', $post['id']);
        $this->db->update('tbl_sistem', $params);
    }
}
