<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Phpml\Clustering\KMeans;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ConfusionMatrix;
use Phpml\CrossValidation\StratifiedRandomSplit;

class Clustering extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
        $this->load->model('admin/clustering_m');
    }

    public function index()
    {
        if ($this->clustering_m->get_dcluster()->num_rows() > 0) {
            $cluster = $this->clustering_m->get_dcluster()->row();
            $this->session->set_flashdata('warning', 'Mohon untuk Konfirmasi Hasil Clustering untuk kembali melakukan proses clustering!');
            redirect('admin/clustering/hasil/' . $cluster->id_clustering);
        } else {
            $data = [
                'row' => $this->clustering_m->get_data(),
                'kec' => $this->clustering_m->get_kecamatan_bydata(),
                'kel' => $this->clustering_m->get_kelurahan_bydata(),
                'history' => $this->clustering_m->get_all_cluster()
            ];
            $this->template->load('admin/template', 'admin/clustering/index', $data);
        }
    }

    public function processing()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['process'])) {
            // Main Program 
            $id_clustering = random_string('alnum', 30);
            $ndpt = $this->clustering_m->get_data()->num_rows();
            $nkel = $this->clustering_m->get_kelurahan_bydata()->num_rows();
            $nkec = $this->clustering_m->get_kecamatan_bydata()->num_rows();
            $this->clustering_m->insert_proses($id_clustering, $ndpt, $nkec, $nkel);

            foreach ($this->clustering_m->get_kelurahan()->result() as $key => $kelurahan) {
                // echo "Kelurahan : " . $kelurahan->nama_kelurahan . '<br>';
                $kmeans = new KMeans(3);
                foreach ($this->clustering_m->get_data_bykel($kelurahan->nama_kelurahan)->result() as $keys => $data) {
                    $data_cluster[$data->id_pemilih] = [get_umur($data->tgl_lahir_pemilih)];
                }

                // Model K-Means
                $clustered = $kmeans->cluster($data_cluster);

                $claster1 = $clustered[0];
                $claster2 = $clustered[1];
                $claster3 = $clustered[2];
                $valc1 = $valc2 = $valc3 = [];
                foreach ($claster1 as $key => $dc1) {
                    foreach ($dc1 as $key => $val1) {
                        array_push($valc1, $val1);
                    }
                }

                foreach ($claster2 as $key => $dc2) {
                    foreach ($dc2 as $key => $val2) {
                        array_push($valc2, $val2);
                    }
                }

                foreach ($claster3 as $key => $dc3) {
                    foreach ($dc3 as $key => $val3) {
                        array_push($valc3, $val3);
                    }
                }

                get_user_by_rangeage($id_clustering, $kelurahan->nama_kelurahan, min($valc1), max($valc1), min($valc2), max($valc2), min($valc3), max($valc3));
                $final = [
                    'id_cluster' => $id_clustering,
                    'nama_kel' => $kelurahan->nama_kelurahan
                ];

                $this->clustering_m->set_clustering($final);
            }
            $data_silhouette = $this->accurasi();
            set_akurasi($id_clustering, $data_silhouette['percent'], $data_silhouette['score']);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Data Daftar Pemilih Tetap Berhasil dilakukan Pemetaan dan Clustering!');
                redirect('admin/clustering/hasil/' . $id_clustering);
            } else {
                $this->session->set_flashdata('error', 'Data Daftar Pemilih Tetap Gagal dilakukan Pemetaan dan Clustering!, <br> Sistem Error!');
                redirect('admin/clustering/reset/' . $id_clustering);
            }
        } else if (isset($post['conf'])) {
            $this->clustering_m->confirm_clustering($post['id']);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Konfirmasi Hasil Pemetaan data dengan Clustering Berhasil!');
                redirect('admin/clustering');
            } else {
                $this->session->set_flashdata('error', 'Konfirmasi Hasil Pemetaan data dengan Clustering Gagal!, <br> Sistem Error!');
                redirect('admin/clustering');
            }
        } else {
            redirect('admin/clustering');
        }
    }

    function accurasi()
    {
        $samples = $this->clustering_m->get_data()->result();
        $points = get_2dDataDPT();
        $space = new KMeans\Space(2);
        foreach ($points as $i => $coordinates) {
            $space->addPoint($coordinates);
        }
        $clusters = $space->cluster(3);
        $akurasi_distance = $params['percent'] = $params['score'] =   0;
        foreach ($clusters as $num => $cluster) {
            $coordinates = $cluster->getCoordinates();
            // printf(
            //     "Cluster %s [%d,%d]: %d points\n",
            //     $num,
            //     $coordinates[0],
            //     $coordinates[1],
            //     // $coordinates[2],
            //     count($cluster)
            // );
            $akurasi_distance += $coordinates[1];
            $params['percent'] .= round($coordinates[0], 2) . ',';
            $params['score'] .= count($cluster) . ',';
        }
        return $params;
    }

    public function hasil($id)
    {
        $data['row'] = $this->clustering_m->get_clustering($id)->row();
        $this->template->load('admin/template', 'admin/clustering/hasil', $data);
    }

    function reset($id)
    {
        $this->clustering_m->reset_clustering($id);
        $this->clustering_m->reset_clustering_detail($id);
        $this->clustering_m->reset_clustering_hasil($id);
        redirect('admin/clustering');
    }
}
