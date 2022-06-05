<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    function auth($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['username']);
        $query = $this->db->get();
        return $query;
    }

    function auth_pass($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['username']);
        $this->db->where('password_user', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    function update_profil($post)
    {
        $params = [
            'email_user' => $post['p_email'],
            'nama_user' => $post['p_nama'],
            'username_user' => $post['p_username'],

        ];
        if ($post['p_pass'] != null) {
            $params['password_user'] = sha1($post['p_pass']);
        }

        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function sign_up($post)
    {
        $params = [
            'id_user' => $post['id'],
            'id_fakultas' => $post['s_fakultas'],
            'id_prodi' => $post['s_prodi'],
            'email_user' => $post['s_email'],
            'nama_user' => $post['s_name'],
            'nim_user' => $post['s_nim'],
            'username_user' => $post['s_username'],
            'password_user' => sha1($post['s_password']),
            'level_user' => 2,
            'status_user' => 0,
        ];
        $this->db->insert('tbl_user', $params);
    }

    function activate($id)
    {
        $params = [
            'status_user' => 1,
        ];

        $this->db->where('id_user', $id);
        $this->db->update('tbl_user', $params);
    }

    function tambah_user($post)
    {
        $params = [
            'id_user' => $post['id'],
            'email_user' => $post['email'],
            'nama_user' => $post['nama'],
            'username_user' => $post['uname'],
            'password_user' => $post['pass'],
            'level_user' => 2,
            'status_user' => 0,
        ];
        $this->db->insert('tbl_user', $params);
    }

    function get_pemilih_unregistred($atribut, $key)
    {
        $this->db->from('tbl_pemilih');
        $this->db->where($atribut, $key);
        // $this->db->where('id_user', null);
        $query = $this->db->get();
        return $query;
    }

    function get_user_bymail($mail)
    {
        $this->db->from('tbl_user');
        $this->db->where('email_user', $mail);
        $query = $this->db->get();
        return $query;
    }

    function get_user_byid($id)
    {
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query;
    }

    function update_forgot($post)
    {
        $params = [
            'username_user' => $post['new_username'],
            'password_user' => sha1($post['new_pass']),
        ];

        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function update_img_user($post)
    {
        $params['image_user'] = $post['image'];
        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }
}
