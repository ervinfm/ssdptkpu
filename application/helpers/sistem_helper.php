<?php

function login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') == NULL) {
        $ci->session->set_flashdata('login', 'Silahkan Login untuk mengakses sistem!');
        redirect('auth');
    }
}

function cek_level()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') == 1) {
        redirect('admin/dashboard');
    } else if ($ci->session->userdata('level') == 2) {
        redirect('dashboard');
    } else {
        redirect('auth/logout');
    }
}

function already_login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') != NULL) {
        $ci->session->set_flashdata('warning', 'Anda masih Login dalam sistem, <br>Silahkan Logout untuk keluar sistem!');
        cek_level();
    }
}

function admin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') != 1) {
        redirect('dashboard');
    }
}

function profil()
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where('id_user', $ci->session->userdata('user_id'));
    $query = $ci->db->get();
    return $query->row();
}

function sistem()
{
    $ci = &get_instance();
    $ci->db->from('tbl_sistem');
    $query = $ci->db->get();
    return $query->row();
}

function blocked_access($type, $url)
{
    $ci = &get_instance();
    if ($type == 0) {
        $ci->session->set_flashdata('warning', 'Fitur Ini Dinonaktifkan oleh Petugas KPU! <br> Silahkan Hubungi Petugas KPU Kota Yogyakarta!');
        redirect($url);
    }
}

function smtp_email($post)
{ # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?] 
    $ci = &get_instance();
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'mabes.develover@gmail.com',
        'smtp_pass'   => 'zhduihhjrkszuxjd',
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];

    // Load library email dan konfigurasinya
    $ci->load->library('email', $config);

    // Email dan nama pengirim
    $ci->email->from('no-reply@mabesgroup.com', 'Mabes Industries Bot');

    // Email penerima
    $ci->email->to($post['destination']); // Ganti dengan email tujuan

    // Subject email
    $ci->email->subject($post['subject']);

    // Isi email
    $ci->email->message($post['massage']);

    // Tampilkan pesan sukses atau error
    if ($ci->email->send()) {
        return 1;
    } else {
        return 0;
    }
}

function email_login()
{
    $ci = &get_instance();

    $post = [
        'destination' => $ci->session->userdata('email'),
        'subject' => 'Informasi Login ' . sistem()->nama_sistem,
        'massage' => '
            Hai ' . $ci->session->userdata('nama') . '<br><br>
            Informasi Login menggunakan Akun anda pada : <br>
            Tanggal/Jam : ' . tgl_indo(date('Y-m-d')) . ' / ' . date('H:i:s') . '<br>
            Perangkat : ' . $ci->agent->platform() . ' <br>
            Browser : ' . $ci->agent->browser() . ' <br><br>

            jika upaya login bukan dari anda maka segera mengamankan akun anda... <br><br><br>

            KPU Kota Yogyakarta
        '
    ];
    if (sistem()->fitur_maillogin == 1) {
        smtp_email($post);
    }
}

function tgl_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function get_user($val, $cat)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    if ($cat == 1) {
        $ci->db->where('email_user', $val);
    } else if ($cat == 2) {
        $ci->db->where('username_user', $val);
    }
    $query = $ci->db->get();
    return $query;
}

function get_tbluser($atribut, $val)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where($atribut, $val);
    $query = $ci->db->get();
    return $query;
}

function get_user_detail($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    if ($id != null) {
        $ci->db->where('id_user', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function insert_user_log($activity)
{
    $ci = &get_instance();
    $params = [
        'id_user' => $ci->session->userdata('user_id'),
        'target_user_log' => $activity,
        'device_user_log' => $ci->agent->platform() . ' | ' . $ci->agent->browser() . ' | ' . $ci->input->ip_address(),
    ];
    // $ci->db->insert('tbl_user_log', $params);
}

function get_user_log($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user_log');
    if ($id != null) {
        $ci->db->where('id_user', $id);
    }
    $ci->db->order_by('created_user_log', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function ramah_tamah()
{
    //ambil jam dan menit
    $jam = date('H:i');

    //atur salam menggunakan IF
    if ($jam > '05:30' && $jam < '10:00') {
        $salam = 'Pagi';
    } elseif ($jam >= '10:01' && $jam < '15:00') {
        $salam = 'Siang';
    } elseif ($jam >= '15:01' && $jam < '18:00') {
        $salam = 'Sore';
    } else {
        $salam = 'Malam';
    }
    return $salam;
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agus',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function icon_matbul()
{
    //ambil jam dan menit
    $jam = date('H:i');

    //atur salam menggunakan IF
    if ($jam > '06:00' && $jam < '17:00') {
        $salam = 1;
    } else {
        $salam = 2;
    }
    return $salam;
}

function konversi_tanggal_timestamp($datas)
{
    $date_filter = substr($datas, 0, 9);
    $parts = explode('/', $date_filter);
    $new_format = $parts[2] . '-' . $parts[0] . '-' . $parts[1];
    return $new_format;
}

function get_umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0");
    }
    $y = $today->diff($birthDate)->y;
    return $y;
}

function get_tps_detail($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_tps');
    $ci->db->join('tbl_kelurahan', 'tbl_tps.id_kelurahan = tbl_kelurahan.id_kelurahan');
    $ci->db->join('tbl_kecamatan', 'tbl_kelurahan.id_kecamatan = tbl_kecamatan.id_kecamatan');
    if ($id != null) {
        $ci->db->where('tbl_tps.id_tps', $id);
    }
    $query = $ci->db->get();
    return $query->row();
}

function get_kecamatan($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_kecamatan');
    if ($id != null) {
        $ci->db->where('id_kecamatan', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function get_kelurahan_by_kecamatan($id_kecamatan)
{
    $ci = &get_instance();
    $ci->db->from('tb_kelurahan');
    $ci->db->where('id_kecamatan', $id_kecamatan);
    $query = $ci->db->get();
    return $query;
}

function get_kelurahan($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_kelurahan');
    if ($id != null) {
        $ci->db->where('id_kelurahan', $id);
    } else {
        $ci->db->order_by('nama_kelurahan', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function cek_user($atribut, $key)
{
    $ci = &get_instance();
    $ci->db->from('tbl_user');
    $ci->db->where($atribut, $key);
    $query = $ci->db->get();
    return $query;
}


function get_all_pemilih($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    if ($id != null) {
        $ci->db->where('id_pemilih', $id);
    } else {
        $ci->db->order_by('nama_pemilih', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_pemilih($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    if ($id != null) {
        $ci->db->where('id_pemilih', $id);
    } else {
        $ci->db->where('id_user', null);
        $ci->db->order_by('nama_pemilih', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function get_pemilih_atribut($atribut, $key)
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    $ci->db->where($atribut, $key);
    $query = $ci->db->get();
    return $query;
}


function set_dpt_user($nik, $id_user)
{
    $ci = &get_instance();
    $qdpt = get_pemilih_atribut('nik_pemilih', $nik);
    if ($qdpt->num_rows() > 0) {
        $dpt = $qdpt->row();
        $params['id_user'] = $id_user;
        $ci->db->where('id_pemilih', $dpt->id_pemilih);
        $ci->db->update('tbl_pemilih', $params);
    } else {
        return 0;
    }
}

function get_pindah()
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    $ci->db->order_by('created_pindah', 'DESC');
    $query = $ci->db->get();
    return $query;
}

function get_pindah_idpemilih($id, $status = false)
{
    $ci = &get_instance();
    $ci->db->from('tbl_pindah');
    $ci->db->where('id_pemilih', $id);
    if ($status == TRUE) {
        $ci->db->where('status_pindah', 0);
        $ci->db->or_where('status_pindah', 1);
        $ci->db->or_where('status_pindah', 2);
    }
    $query = $ci->db->get();
    return $query;
}


// part of clustering

function set_cluster_detail($id_cluster, $id_dpt, $kelu, $umur, $cluster)
{
    $ci = &get_instance();
    $params = [
        'id_clustering' => $id_cluster,
        'id_pemilih' => $id_dpt,
        'kelurahan_pemilih' => $kelu,
        'umur_pemilih' => $umur,
        'jenis_cluster' => $cluster
    ];
    $ci->db->insert('tbl_clustering_detail', $params);
}

function rank_cluster_byminmax($min1, $max1, $min2, $max2, $min3, $max3, $umur)
{
    $class1 = $class2 = $class3 = $classm1 = $classm2 = $classm3 = $cluster = null;
    if ($min1 < $min2 && $min1 < $min3) {
        $class1 = $min1;
        $classm1 = $max1;
        if ($min2 < $min3) {
            $class2 = $min2;
            $classm2 = $max2;
            $class3 = $min3;
            $classm3 = $max3;
        } else {
            $class2 = $min3;
            $classm2 = $max3;
            $class3 = $min2;
            $classm3 = $max2;
        }
    } else if ($min2 < $min1 && $min2 < $min3) {
        $class1 = $min2;
        $classm1 = $max2;
        if ($min1 < $min3) {
            $class2 = $min1;
            $classm2 = $max1;
            $class3 = $min3;
            $classm3 = $max3;
        } else {
            $class2 = $min3;
            $classm2 = $max3;
            $class3 = $min1;
            $classm3 = $max1;
        }
    } else if ($min3 < $min1 && $min3 < $min2) {
        $class1 = $min3;
        $classm1 = $max3;
        if ($min1 < $min2) {
            $class2 = $min1;
            $classm2 = $max1;
            $class3 = $min2;
            $classm3 = $max2;
        } else {
            $class2 = $min2;
            $classm2 = $max2;
            $class3 = $min1;
            $classm3 = $max1;
        }
    }

    if ($umur >= $class1 && $umur <= $classm1) {
        $cluster = 1;
    } else if ($umur >= $class2 && $umur <= $classm2) {
        $cluster = 2;
    } else if ($umur >= $class3 && $umur <= $classm3) {
        $cluster = 3;
    }

    return $cluster;
}

function get_user_by_rangeage($id_cluster, $kelurahan, $min1, $max1, $min2, $max2, $min3, $max3)
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    $ci->db->where('kelurahan_pemilih', $kelurahan);
    $query = $ci->db->get();

    foreach ($query->result() as $key => $dpt) {
        $umur = get_umur($dpt->tgl_lahir_pemilih);
        $cluster = rank_cluster_byminmax($min1, $max1, $min2, $max2, $min3, $max3, $umur);
        set_cluster_detail($id_cluster, $dpt->id_pemilih, $kelurahan, $umur, $cluster);
    }
}


function get_claster_inkelurahan($kelurahan, $claster)
{
    $ci = &get_instance();
    $ci->db->from('tbl_clustering_detail');
    $ci->db->where('kelurahan_pemilih', $kelurahan);
    $ci->db->where('jenis_cluster', $claster);
    $query = $ci->db->get();
    return $query;
}

function get_claster_detailall($id_proses = null)
{
    $ci = &get_instance();
    $ci->db->from('tbl_clustering_detail');
    if ($id_proses != null) {
        $ci->db->where('id_clustering', $id_proses);
    }
    $query = $ci->db->get();
    return $query;
}

function get_clust_bynamekel($namekel)
{
    $ci = &get_instance();
    $ci->db->from('tbl_clustering_hasil');
    $ci->db->where('nama_kelurahan', $namekel);
    $query = $ci->db->get();
    return $query;
}

function get_2dDataDPT()
{
    $datas = get_pemilih();
    $temp = array();
    foreach ($datas->result() as $key => $data) {
        array_push($temp, get_umur($data->tgl_lahir_pemilih));
    }

    $data_cluster = array();
    for ($i = 0; $i < count($temp) - 1; $i++) {
        $tem = array(
            $temp[$i], $temp[$i + 1]
        );
        array_push($data_cluster, $tem);
    }
    return $data_cluster;
}

function set_akurasi($id, $val)
{
    $ci = &get_instance();
    $params = [
        'akurasi_clustering' => $val
    ];
    $ci->db->where('id_clustering', $id);
    $ci->db->update('tbl_clustering', $params);
}

// Landing Function
function get_dpt_byname($key)
{
    $ci = &get_instance();
    $ci->db->from('tbl_pemilih');
    $ci->db->where('nama_pemilih', $key);
    $query = $ci->db->get();
    return $query;
}
