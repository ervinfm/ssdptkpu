<?php
$listkec = $cls1 = $cls2 = $cls3 = $ncall = "";
$nc1 = $nc2 = $nc3 = 0;
foreach (get_kecamatan()->result() as $key => $kecamatan) {
    $temp1 = $temp2 = $temp3 = null;
    $temp_nama = $kecamatan->nama_kecamatan;
    $listkec .= "'$temp_nama'" . ", ";

    $clu1 = $clu2 = $clu3 = 0;
    foreach (get_kelurahan_by_kecamatan($kecamatan->id_kecamatan)->result() as $key => $Temp) {
        $dkel = get_clust_bynamekel($Temp->nama_kelurahan)->row();
        $temp1 = $temp1 + $dkel->ncluster1_hasil;
        $temp2 = $temp2 + $dkel->ncluster2_hasil;
        $temp3 = $temp3 + $dkel->ncluster3_hasil;
    }
    $cls1 .= "'$temp1'" . ", ";
    $cls2 .= "'$temp2'" . ", ";
    $cls3 .= "'$temp3'" . ", ";

    $nc1 = $nc1 + $temp1;
    $nc2 = $nc2 + $temp2;
    $nc3 = $nc3 + $temp3;
}
$ncall .= "'$nc1'" . ", " . "'$nc2'" . ", " . "'$nc3'";
?>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="card-title text-primary">Detail Hasil Pemetaan Data DPT KPU Kota Yogyakarta</h4>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= site_url('admin/hasil') ?>" class="btn btn-info float-end"><i class="bx bx-grid"></i> Data Hasil </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="row">
                        <div class="col-sm-3 mt-0">
                            <div class="mb-3 mt-2">
                                <a href="" class="btn btn-dark"><i class="bx bx-printer"></i> Cetak Hasil Pemetaan dan Analisis</a>
                            </div>
                            <div class="demo-inline-spacing">
                                <ul class="list-group">
                                    <a href="?cat=" class="list-group-item list-group-item-action <?= @$_GET['cat'] == '' ? 'active' : null ?>">
                                        <i class="bx bx-bookmark-plus me-2"></i>
                                        Deskripsi Pemetaan
                                    </a>
                                    <a href="?cat=kecamatan" class="list-group-item list-group-item-action <?= @$_GET['cat'] == 'kecamatan' ? 'active' : null ?>">
                                        <i class="bx bx-building-house me-2"></i>
                                        Pemetaan Kecamatan
                                    </a>
                                    <a href="?cat=kelurahan" class="list-group-item list-group-item-action <?= @$_GET['cat'] == 'kelurahan' ? 'active' : null ?>">
                                        <i class="bx bx-building me-2"></i>
                                        Pemetaan Kelurahan
                                    </a>
                                    <a href="?cat=dpt" class="list-group-item list-group-item-action <?= @$_GET['cat'] == 'dpt' ? 'active' : null ?>">
                                        <i class="bx bx-purchase-tag-alt me-2"></i>
                                        Clustering DPT
                                    </a>
                                    <a href="?cat=chart" class="list-group-item list-group-item-action <?= @$_GET['cat'] == 'chart' ? 'active' : null ?>">
                                        <i class='bx bx-bar-chart me-2'></i>
                                        Statistik Perbandingan
                                    </a>
                                </ul>
                            </div>

                        </div>
                        <div class="col-sm-9 mt-2">
                            <?php if (@$_GET['cat'] == null) { ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="25%">ID Proses Clustering</td>
                                            <td width="5%">:</td>
                                            <td><?= $row->id_clustering ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pemetaan</td>
                                            <td>:</td>
                                            <td><?= tgl_indo(date('Y-m-d', strtotime($row->created_clustering))) . ' ' . date('H:i', strtotime($row->created_clustering)) . ' WIB' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Data</td>
                                            <td>:</td>
                                            <td><?= $row->ndata_clustering ?> Data DPT</td>
                                        </tr>
                                        <tr>
                                            <td>Total Kecamatan</td>
                                            <td>:</td>
                                            <td><?= $row->nkec_clustering ?> Kecamatan</td>
                                        </tr>
                                        <tr>
                                            <td>Total Kelurahan</td>
                                            <td>:</td>
                                            <td><?= $row->nkel_clustering ?> Kelurahan</td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Akurasi Pemetaan</td>
                                            <td>:</td>
                                            <td><?= $row->akurasi_clustering ?> %</td>
                                        </tr> -->
                                        <tr>
                                            <td>Status Proses</td>
                                            <td>:</td>
                                            <td><?= $row->status_clustering == 0 ? '<span class="badge bg-danger">Perlu Konfirmasi</span>' : '<span class="badge bg-success">Selesai</span>' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Cluster</td>
                                            <td>:</td>
                                            <td>
                                                <li class=""><span class="badge bg-success">Cluster 1</span> : Kelompok Usia Muda (17-21 Tahun)</li>
                                                <li class="mt-2"><span class="badge bg-warning">Cluster 2</span> : Kelompok Usia Dewasa (22-60 Tahun) </li>
                                                <li class="mt-2"><span class="badge bg-danger">Cluster 3</span> : Kelompok Usia Lansia (>60 Tahun)</li>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['cat'] == 'kecamatan') { ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Kecamatan</th>
                                                <th class="text-center">Cluster 1 <br>(17-21 Tahun)</th>
                                                <th class="text-center">Cluster 2 <br>(22-60 Tahun) </th>
                                                <th class="text-center">Cluster 3 <br>(>60 Tahun)</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach (get_kecamatan()->result() as $key => $kecamatan) {
                                                $clu1 = $clu2 = $clu3 = 0;
                                                foreach (get_kelurahan_by_kecamatan($kecamatan->id_kecamatan)->result() as $key => $Temp) {
                                                    $dkel = get_clust_bynamekel($Temp->nama_kelurahan)->row();
                                                    $clu1 = $clu1 + $dkel->ncluster1_hasil;
                                                    $clu2 = $clu2 + $dkel->ncluster2_hasil;
                                                    $clu3 = $clu3 + $dkel->ncluster3_hasil;
                                                } ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $kecamatan->nama_kecamatan ?></td>
                                                    <td><?= $clu1 ?> DPT</td>
                                                    <td><?= $clu2 ?> DPT</td>
                                                    <td><?= $clu3 ?> DPT</td>
                                                    <td><?= $clu1 + $clu2 + $clu3 ?> DPT</td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['cat'] == 'kelurahan') { ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th class="text-center">Cluster 1 <br>(17-21 Tahun)</th>
                                                <th class="text-center">Cluster 2 <br>(22-60 Tahun) </th>
                                                <th class="text-center">Cluster 3 <br>(>60 Tahun)</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach (get_kecamatan()->result() as $key => $kecamatan) {
                                                $clu1 = $clu2 = $clu3 = 0;
                                                foreach (get_kelurahan_by_kecamatan($kecamatan->id_kecamatan)->result() as $key => $Temp) {
                                                    $dkel = get_clust_bynamekel($Temp->nama_kelurahan)->row(); ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $kecamatan->nama_kecamatan ?></td>
                                                        <td><?= $Temp->nama_kelurahan ?></td>
                                                        <td><?= $dkel->ncluster1_hasil ?> DPT</td>
                                                        <td><?= $dkel->ncluster2_hasil ?> DPT</td>
                                                        <td><?= $dkel->ncluster3_hasil ?> DPT</td>
                                                        <td><?= $dkel->ncluster1_hasil + $dkel->ncluster2_hasil + $dkel->ncluster3_hasil ?> DPT</td>
                                                    </tr>
                                                <?php } ?>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['cat'] == 'dpt') { ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>ID</th>
                                                <th>Nama Pemilih</th>
                                                <th>Umur</th>
                                                <th>Cluster</th>
                                                <th>Kelurahan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach (get_claster_detailall($row->id_clustering)->result() as $key => $dpt) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= get_pemilih($dpt->id_pemilih)->row()->nik_pemilih ?></td>
                                                    <td><?= get_pemilih($dpt->id_pemilih)->row()->nama_pemilih ?></td>
                                                    <td><?= $dpt->umur_pemilih ?> Tahun</td>
                                                    <td><?= $dpt->jenis_cluster == 1 ? '<span class="badge bg-success">Cluster 1</span>' : ($dpt->jenis_cluster == 2 ? '<span class="badge bg-warning">Cluster 2</span>' : '<span class="badge bg-danger">Cluster 3</span>')  ?></td>
                                                    <td><?= $dpt->kelurahan_pemilih  ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else if (@$_GET['cat'] == 'chart') { ?>
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item">
                                            <a href="?cat=chart" class="nav-link <?= @$_GET['type'] == null ? 'active' : null ?>">
                                                <i class="tf-icons bx bx-pulse"></i> Populasi Kecamatan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="?cat=chart&type=perbandingan" class="nav-link <?= @$_GET['type'] == 'perbandingan' ? 'active' : null ?>">
                                                <i class="tf-icons bx bx-pie-chart-alt"></i> Perbandingan Cluster
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="?cat=chart&type=persentase" class="nav-link <?= @$_GET['type'] == 'persentase' ? 'active' : null ?>">
                                                <i class="tf-icons bx bx-grid"></i> Persentase Cluster
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade <?= @$_GET['type'] == '' ? 'active show' : null ?> ">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <canvas id="myChart" width="600" height="400"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?= @$_GET['type'] == 'perbandingan' ? 'active show' : null ?> ">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <canvas id="myChart1" width="100px"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?= @$_GET['type'] == 'persentase' ? 'active show' : null ?> ">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span class="badge bg-primary">Diagram Persentase</span>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <canvas id="myChart2" width="600" height="400"></canvas>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <hr>
                                                    <span class="badge bg-primary">Tabel Persentase</span>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped " id="datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%">No</th>
                                                                    <th>Kecamatan</th>
                                                                    <th>Cluster 1</th>
                                                                    <th>Cluster 2</th>
                                                                    <th>Cluster 3</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                $gpc1 = $gpc2 = $gpc3 = null;
                                                                foreach (get_kecamatan()->result() as $key => $camat) {
                                                                    $clues1 = $clues2 = $clues3 = $perc1 = $perc2 = $perc3 = 0;
                                                                    foreach (get_kelurahan_by_kecamatan($camat->id_kecamatan)->result() as $key => $Tempe) {
                                                                        $dkel = get_clust_bynamekel($Tempe->nama_kelurahan)->row();
                                                                        $clues1 = $clues1 + $dkel->ncluster1_hasil;
                                                                        $clues2 = $clues2 + $dkel->ncluster2_hasil;
                                                                        $clues3 = $clues3 + $dkel->ncluster3_hasil;
                                                                    }
                                                                    $perc1 =  round(($clues1 / $nc1) * 100, 2);
                                                                    $perc2 =  round(($clues2 / $nc2) * 100, 2);
                                                                    $perc3 =  round(($clues3 / $nc3) * 100, 2);
                                                                    $gpc1 .= "'$perc1'" . ", ";
                                                                    $gpc2 .= "'$perc2'" . ", ";
                                                                    $gpc3 .= "'$perc3'" . ", ";
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no++ ?></td>
                                                                        <td><?= $camat->nama_kecamatan ?></td>
                                                                        <td><?= $perc1 ?> %</td>
                                                                        <td><?= $perc2 ?> %</td>
                                                                        <td><?= $perc3 ?> %</td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js" integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
<?php if (@$_GET['type'] == '') { ?>
    <script>
        var barChartData = {
            labels: [<?= $listkec ?>],

            datasets: [{
                    label: "DPT Muda (17-21 Tahun)",
                    backgroundColor: '#7ed6df',
                    borderColor: '#7ed6df',
                    borderWidth: 1,
                    data: [<?= $cls1 ?>]
                },
                {
                    label: "DPT Dewasa (22-60 Tahun)",
                    backgroundColor: "#f9ca24",
                    borderColor: "#f9ca24",
                    borderWidth: 1,
                    data: [<?= $cls2 ?>]
                },
                {
                    label: "DPT Lansia (>60 Tahun)",
                    backgroundColor: "#c0392b",
                    borderColor: "#c0392b",
                    borderWidth: 1,
                    data: [<?= $cls3 ?>]
                },

            ]
        };

        var chartOptions = {
            responsive: true,
            legend: {
                position: "top"
            },
            title: {
                display: true,
                text: "Chart.js Bar Chart"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            indexAxis: 'y',
        }

        var ctx = document.getElementById("myChart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: "bar",
            data: barChartData,
            options: chartOptions
        });
    </script>
<?php } else if (@$_GET['type'] == 'perbandingan') { ?>
    <script>
        var chartOptions = {
            responsive: true,
            legend: {
                position: "top"
            },
            title: {
                display: true,
                text: "Chart.js Pie Chart"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },


        }

        const ctx = document.getElementById('myChart1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Kelompok Muda', 'Kelompok Dewasa', 'Kelompok Lansia'],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $ncall ?>],
                    backgroundColor: [
                        '#7ed6df',
                        '#f9ca24',
                        '#c0392b',

                    ],
                    borderColor: [
                        '#7ed6df',
                        '#f9ca24',
                        '#c0392b',

                    ],
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });
    </script>
<?php } else if (@$_GET['type'] == 'persentase') { ?>
    <script>
        var ctx = document.getElementById("myChart2").getContext("2d");
        var data = {
            labels: [<?= $listkec ?>],
            datasets: [{
                    label: "DPT Muda (17-21 Tahun)",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?= $gpc1 ?>]
                },
                {
                    label: "DPT Dewasa (22-60 Tahun)",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#2A516E",
                    borderColor: "#2A516E",
                    pointHoverBackgroundColor: "#2A516E",
                    pointHoverBorderColor: "#2A516E",
                    data: [<?= $gpc2 ?>]
                },
                {
                    label: "DPT Lansia (>60 Tahun)",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#F07124",
                    borderColor: "#F07124",
                    pointHoverBackgroundColor: "#F07124",
                    pointHoverBorderColor: "#F07124",
                    data: [<?= $gpc3 ?>]
                },
            ]
        };

        var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                legend: {
                    display: true
                },
                barValueSpacing: 20,
                // indexAxis: 'y',
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
        });
    </script>
<?php } ?>