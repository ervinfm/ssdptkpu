<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account_m extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        } else {
            $this->db->order_by('nama_user', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_user' => $post['id_usr'],
            'email_user' => $post['u_email'],
            'nama_user' => $post['u_name'],
            'username_user' => $post['u_user'],
            'password_user' => sha1($post['u_pass']),
            'level_user' => $post['u_level'],
            'status_user' => $post['u_status'],
            'image_user' => null,
            'last_login_user' => null,
        ];
        $this->db->insert('tbl_user', $params);
    }

    function update($post)
    {
        $params = [
            'email_user' => $post['u_email'],
            'nama_user' => $post['u_name'],
            'username_user' => $post['u_user'],
            'level_user' => $post['u_level'],
            'status_user' => $post['u_status'],
        ];
        if ($post['u_pass'] != null) {
            $params['password_user'] = sha1($post['u_pass']);
        }
        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
}
