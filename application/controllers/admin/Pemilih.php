<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Pemilih extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/pemilih_m');
    }

    public function index()
    {
        $data['row'] = $this->pemilih_m->get_pemilih();
        $this->template->load('admin/template', 'admin/pemilih/index', $data);
    }

    function get_kelurahan_by_kecamatan()
    {
        $id_kecamatan = $this->input->post('id');
        $data = get_kelurahan_by_kecamatan($id_kecamatan)->result();
        echo json_encode($data);
    }

    public function tambah()
    {
        $this->template->load('admin/template', 'admin/pemilih/form');
    }

    public function update($id)
    {
        $data['row'] = $this->pemilih_m->get_pemilih($id)->row();
        $this->template->load('admin/template', 'admin/pemilih/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['upload'])) {
            $file_mimes = array('application/vnd.ms-excel', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
                $arr_file = explode('.', $_FILES['upload_file']['tmp_name']);
                $extension = end($arr_file);
                if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                $error_upload = 0;
                for ($i = 1; $i < count($sheetData); $i++) {
                    if ($sheetData[$i]['0'] != null) {
                        $data = [
                            'id_pemilih' => random_string('alnum', 30),
                            'nik_pemilih' => $sheetData[$i]['0'],
                            'nama_pemilih' => $sheetData[$i]['1'],
                            'lahir_pemilih' => $sheetData[$i]['2'],
                            'tgl_lahir_pemilih' => date('Y-m-d', strtotime($sheetData[$i]['3'])),
                            'perkawinan_pemilih' => ($sheetData[$i]['4'] == 'B' ? '0' : '1'),
                            'gender_pemilih' => ($sheetData[$i]['5'] == 'L' ? '1' : '0'),
                            'rt_pemilih' => $sheetData[$i]['6'],
                            'rw_pemilih' => $sheetData[$i]['7'],
                            'difable_pemilih' => $sheetData[$i]['8'],
                            'id_tps' => $sheetData[$i]['9'],
                            'kelurahan_pemilih' => $sheetData[$i]['10'],
                            'kecamatan_pemilih' => $sheetData[$i]['11'],
                            'alamat_pemilih' => ucwords('RT ' . $sheetData[$i]['6'] . '/ RW' . $sheetData[$i]['7'] . ', Kelurahan ' . $sheetData[$i]['10'] . ',' . $sheetData[$i]['11'] . ' Kota Yogyakarta, DIY'),
                            'domisili_pemilih' => 1,
                        ];
                        $this->db->insert('tbl_pemilih', $data);
                    } else {
                        $error_upload++;
                    }
                }
                if ($this->db->affected_rows() > 0) {
                    if ($error_upload > 0) {
                        $this->session->set_flashdata('warning', 'Dataset Berhasil di Unggah! <br> Namun ada beberapa data yang tidak lolos preprocessing data!');
                        redirect('admin/pemilih');
                    } else {
                        $this->session->set_flashdata('succes', 'Dataset Berhasil di Unggah!');
                        redirect('admin/pemilih');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Dataset Gagal di Unggah, <br> Silahkan Periksa dataset anda!');
                    redirect('admin/pemilih');
                }
            } else {
                $this->session->set_flashdata('error', 'Dataset Gagal di Unggah, <br> Silahkan Periksa dataset anda!');
                redirect('admin/pemilih');
            }
        } else if (isset($post['tambah'])) {
            $nik = $post['p_nik'];
            $nama = $post['p_nama'];
            $lahir = $post['p_tempat'];
            $tgl_lahir = $post['p_tgl'];
            $perkawinan = $post['p_kawin'];
            $gender = $post['p_gender'];
            $difable = $post['p_difable'];
            $alamat = $post['p_alamat'];
            $domisili = $post['p_domisili'];
            $kecamatan = $post['p_kecamatan'];
            $kelurahan = $post['p_kelurahan'];
            $rw = $post['p_rw'];
            $rt = $post['p_rt'];
            $tps = $post['p_tps'];

            $data = array();
            $index = 0;
            foreach ($nik as $datanik) {
                array_push($data, array(
                    'nik_pemilih' => $datanik,
                    'nama_pemilih' => $nama[$index],
                    'lahir_pemilih' => $lahir[$index],
                    'tgl_lahir_pemilih' => $tgl_lahir[$index],
                    'perkawinan_pemilih' => $perkawinan[$index],
                    'gender_pemilih' => $gender[$index],
                    'difable_pemilih' => $difable[$index],
                    'alamat_pemilih' => $alamat[$index],
                    'domisili_pemilih' => $domisili[$index],
                    'kecamatan_pemilih' => $kecamatan[$index],
                    'kelurahan_pemilih' => $kelurahan[$index],
                    'rw_pemilih' => $rw[$index],
                    'rt_pemilih' => $rt[$index],
                    'id_tps' => $tps[$index]
                ));
                $index++;
            }

            $this->pemilih_m->insert_dataset_batch($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Dataset Berhasil di Tambah!');
                redirect('admin/pemilih');
            } else {
                $this->session->set_flashdata('error', 'Dataset Gagal di Tambah, <br> Silahkan Periksa kembali data anda!');
                redirect('admin/pemilih');
            }
        } else if (isset($post['update'])) {
            $this->pemilih_m->update_pemilih($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Dataset Berhasil di Diperbaharui!');
                redirect('admin/pemilih');
            } else {
                $this->session->set_flashdata('error', 'Dataset Gagal di Diperbaharui, <br> Silahkan Periksa kembali data anda!');
                redirect('admin/pemilih/update/' . $post['id']);
            }
        }
    }

    function delete($id)
    {
        $this->pemilih_m->delete_pemilih($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Dataset Berhasil di Dihapus!');
            redirect('admin/pemilih');
        } else {
            $this->session->set_flashdata('error', 'Dataset Gagal di Dihapus, <br> Silahkan Periksa kembali data anda!');
            redirect('admin/pemilih');
        }
    }
}
