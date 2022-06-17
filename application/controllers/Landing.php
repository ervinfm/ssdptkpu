<?php defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $post = $this->input->post(null, true);
        if (isset($post['dpt'])) {
            if (get_dpt_byname($post['key'])->num_rows() > 0) {
                $data['row'] = get_dpt_byname($post['key'])->row();
                $this->load->view('landing/index', $data);
            } else {
                $this->session->set_flashdata('error', 'Nama [' . $post['key'] . '] tidak terdaftar pada Database!<br> Pastikan nama lengkap ditulis sesuai KTP Republik Indonesia');
                $this->session->set_flashdata('Key', $post['key']);
                redirect('#dpt');
            }
        } else {
            $this->load->view('landing/index');
        }
    }

    function email()
    {
        $post = [
            'destination' => 'ervinfm14@gmail.com',
            'subject' => 'Email Test',
            'massage' =>  'Test aja email'
        ];
        $conf = smtp_mailer($post);
        if ($conf == 1) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }
}
