<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mt-2">
                        <span class="h4 m-0 p-0">Informasi Statistik Kepemilihan</span>
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-md btn-dark float-end me-1"><i class="bx bx-home"></i> Beranda</a>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <canvas id="myChart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik -->
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
                label: "Kelompok DPT Muda",
                backgroundColor: '#7ed6df',
                borderColor: '#7ed6df',
                borderWidth: 1,
                data: [<?= $cls1 ?>]
            },
            {
                label: "Kelompok DPT Dewasa",
                backgroundColor: "#f9ca24",
                borderColor: "#f9ca24",
                borderWidth: 1,
                data: [<?= $cls2 ?>]
            },
            {
                label: "Kelompok DPT Lansia",
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