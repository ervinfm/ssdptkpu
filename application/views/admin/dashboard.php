<div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang <?= profil()->nama_user ?>! 🎉</h5>
                        <p class="mb-4">Sistem Informasi Pemetaan Daftar Pemilih Tetap KPU Kota Yogyakarta...</p>
                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">Mulai Pengelompokkan ?</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="<?= base_url() ?>assets/templates/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- <img src="<?= base_url() ?>assets/templates/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded"> -->
                                <button type="button" class="btn btn-icon btn-outline-success">
                                    <span class="tf-icons bx bx-user-voice bx-sm bx-flashing "></span>
                                </button>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total DPT</span>
                        <h3 class="card-title mb-2"><?= get_dpt_dash()->num_rows() ?> <small> Org</small></h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= date('d/m/Y', strtotime(@get_dpt_dash()->row()->created_pemilih == FALSE ? date('d/m/Y') : get_dpt_dash()->row()->created_pemilih)) ?></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- <img src="<?= base_url() ?>assets/templates/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded"> -->
                                <button type="button" class="btn btn-icon btn-outline-info">
                                    <span class="tf-icons bx bx-transfer bx-sm bx-flashing "></span>
                                </button>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">DPT Pindah</span>
                        <h3 class="card-title text-nowrap mb-2"><?= get_dptpindah_dash()->num_rows() ?> <small> Org</small></h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= date('d/m/Y', strtotime(@get_dptpindah_dash()->row()->created_pindah == FALSE ? date('d/m/Y') : get_dptpindah_dash()->row()->created_pindah)) ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Analisis Pemetaan</h5>
                        <canvas id="myChart" width="600" height="400"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ Total Revenue -->
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- <img src="<?= base_url() ?>assets/templates/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded"> -->
                                <button type="button" class="btn btn-icon btn-outline-danger">
                                    <span class="tf-icons bx bx-analyse bx-sm bx-flashing "></span>
                                </button>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Clustering</span>
                        <h3 class="card-title text-nowrap mb-2"><?= get_cluster_data()->num_rows() ?> <small> Process</small></h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +100%</small>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <!-- <img src="<?= base_url() ?>assets/templates/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded"> -->
                                <button type="button" class="btn btn-icon btn-outline-primary">
                                    <span class="tf-icons bx bx-bar-chart bx-sm bx-flashing "></span>
                                </button>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Akurasi</span>
                        <h3 class="card-title mb-2"><?= round(get_last_accurasi_data(), 2) ?> %</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +3.14%</small>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Akurasi Pemetaan</h5>
                            <small class="text-muted">Perhitungan Metode Confusion Matrix</small>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2"><?= round(get_last_accurasi_data(), 2) ?> %</h2>
                                <span>Accuracy</span>
                            </div>
                            <div id="orderStatisticsChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js" integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
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