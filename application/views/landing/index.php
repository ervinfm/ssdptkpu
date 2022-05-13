<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Pemetaan Data Pemilih Tetap KPU Kota Yogyakarta</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/LineIcons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/nivo-lightbox.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/asset/timeline.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anybody&display=swap" rel="stylesheet">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
        .titel1 {
            font-size: 24px;
            font-family: 'Anybody', cursive;
        }

        .titel2 {
            font-size: 14px;
            font-family: 'Anybody', cursive;
        }

        .fotitle {
            font-size: 20px;
        }
    </style>

</head>

<body>
    <?php $this->view('messages') ?>
    <!-- Header Section Start -->
    <header id="home" class="hero-area">
        <div class="overlay">
            <span></span>
            <span></span>
        </div>
        <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
            <div class="container">
                <a href="<?= site_url('') ?>" class="navbar-brand">
                    <table>
                        <tr>
                            <td>
                                <img src="<?= base_url() ?>assets/images/logo.png" alt="logo" style="width:50px">
                            </td>
                            <td>
                                <h6 class="m-0 p-0 ml-2 titel1">Komisi Pemilihan Umum</h6>
                                <h6 class="m-0 p-0 ml-2 titel2">Kota Yogyakarta</h6>
                            </td>
                        </tr>
                    </table>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link page-scroll active" href="#home">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll " href="#statistik">Statistik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#dpt">Cek DPT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#pindah">Pindah Dapil</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-singin" href="<?= site_url('auth') ?>"><i class="lni lni-lock-alt"></i> Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row space-100">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="contents">
                        <h2 class="head-title">Sistem Informasi Statistik dan Geografis</h2>
                        <p>Pemetaan Daftar Pemilih Tetap Berdasarkan Usia Pemilih di Wilayah Kota Yogyakarta</p>
                        <div class="header-button">
                            <a href="#dpt" rel="nofollow" class="btn btn-border-filled page-scroll">Cek DPT Anda</a>
                            <a href="#statistik" rel="nofollow" class="btn btn-border page-scroll">Sebaran DPT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-xs-12 p-0">
                    <div class="intro-img text-center">
                        <img src="<?= base_url() ?>assets/images/logo.png" alt="logo" style="width: 90%;">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


    <!-- Cool Fetatures Section Start -->
    <section id="statistik" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-text section-header text-center">
                        <div>
                            <h2 class="section-title">Informasi Statistik DPT KPU Kota Yogyakarta</h2>
                            <div class="desc-text">
                                <p>Dalam Pengelompokkan Data Pemilih Tetap berdasarkan usia pada masing-masing kecamatan di kota yogyakarta dengan melibatkan metode <i>Artificial Inteligent</i> atau Kecerdasan Buatan </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <canvas id="myChart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
    </section>
    <!-- Cool Fetatures Section End -->

    <!-- Cool Fetatures Section Start -->
    <section id="dpt" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-text section-header text-center">
                        <div>
                            <h2 class="section-title">Pencarian Data Pemilih Tetap</h2>
                            <div class="desc-text">
                                <p>Dalam Pengelompokkan Data Pemilih Tetap berdasarkan usia pada masing-masing kecamatan di kota yogyakarta dengan melibatkan metode <i>Artificial Inteligent</i> atau Kecerdasan Buatan </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <form action="" method="post">
                        <label for="cekdpt">Nama Lengkap Anda * <small><i> (Nama Lengkap Sesuai Ejaan pada KTP) </i></small></label>
                        <div class="input-group mb-3">
                            <input type="text" name="key" value="<?= @$this->session->flashdata('Key') ?>" id="cekdpt" class="form-control" placeholder="Recipient's Fullname" aria-label="Recipient's Fullname" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" name="dpt" type="submit">Cek Data</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if (@$row) { ?>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body" style="color:black">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h6 style="font-size:20px">Informasi Data Pemilih Tetap Anda</h6>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Mohon Perhatian!</strong> Apabila terdapat kesalahan dalam DPT anda, Segera melaporkan kepada petugas KPU Kota Yogyakarta.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td colspan="3"><strong>A. Data Personal Anda</strong></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">ID/NIK</td>
                                                    <td width="5%">:</td>
                                                    <td><?= $row->nik_pemilih ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td>:</td>
                                                    <td><?= strtoupper($row->nama_pemilih) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td><?= $row->lahir_pemilih . ', ' . tgl_indo($row->tgl_lahir_pemilih) . ' (' . get_umur($row->tgl_lahir_pemilih) . ' Tahun )' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>:</td>
                                                    <td><?= $row->gender_pemilih == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Status Pemilih</td>
                                                    <td>:</td>
                                                    <td><span class="badge badge-success">TERVERIFIKASI</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><strong>B. Data Domisili Anda</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Kota/Kabupaten</td>
                                                    <td>:</td>
                                                    <td><?= strtoupper('Yogyakarta') ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kecamatan</td>
                                                    <td>:</td>
                                                    <td><?= strtoupper($row->kecamatan_pemilih) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelurahan</td>
                                                    <td>:</td>
                                                    <td><?= strtoupper($row->kelurahan_pemilih) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>RT/RW</td>
                                                    <td>:</td>
                                                    <td><?= 'RT ' . strtoupper($row->rt_pemilih) . ' / RW' . strtoupper($row->rw_pemilih) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No TPS</td>
                                                    <td>:</td>
                                                    <td>00<?= strtoupper($row->id_tps) ?></td>
                                                </tr>
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
    </section>
    <!-- Cool Fetatures Section End -->

    <!-- Cool Fetatures Section Start -->
    <section id="pindah" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-text section-header text-center">
                        <div>
                            <h2 class="section-title">Informasi Pindah Daerah Pilih (DAPIL)</h2>
                            <div class="desc-text">
                                <p>Deskripsi dan Mekanisme Permohonan Pindah Daerah Pilih Kepada Petugas KPU Kota Yogyakarta </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="main-timeline">
                        <a href="<?= site_url('registrasi') ?>" class="timeline" data-aos="fade-up">
                            <div class="timeline-icon"><i class="fa fa-user-lock"></i></div>
                            <div class="timeline-content">
                                <span class="title h3 ml-4">Registrasi Akun</span>
                                <ol>
                                    <li>
                                        Untuk yang belum memiliki akun, silahkan melakukan pendaftaran akun baru dengan klik tombol login di pojok kanan atas kemudian klik registrasi, apabila anda kesulitan silahkan klik tulisan ini untuk langsung diarahkan.
                                    </li>
                                    <li>
                                        Kemudian Cari Identitas Anda, informasi yang dapat anda berikan berupa NIK/ID jika anda Ketahui atau Nama Lengkap Anda Sesuai dengan KTP.
                                    </li>
                                    <li>
                                        Jika data anda ditemukan, Silahkan untuk mengisi Alamat Email Aktif (untuk Link Aktivasi), Username dan Password
                                    </li>
                                    <li>
                                        Silahkan Periksa Email Anda dan Lakukan Aktivasi Akun anda untuk dapat mengakses fitur Pindah Dapil.
                                    </li>
                                </ol>
                            </div>
                        </a>
                        <a href="#" class="timeline" data-aos="fade-up">
                            <div class="timeline-icon"><i class="fa fa-edit"></i></div>
                            <div class="timeline-content">
                                <span class="title ml-4">Permohonan Pindah Dapil</span>
                                <ol class="description" style="font-size: 14px;color:black">
                                    <li>
                                        Jika anda sudah memiliki akun dan telah aktivasi, silahkan login dengan username dan password anda.
                                    </li>
                                    <li>
                                        Di halaman Beranda anda, Terdapat 4 menu pilihan pilih <strong>Pindah Kepemilihan</strong> kemudian isikan data sesuai daerah pilih baru
                                    </li>
                                    <li>
                                        Setelah Pengajuan, Silahkan tunggu Pengajuan anda. Pengajuan akan ditinjau terlebih dahulu oleh petugas KPU Kota Yogyakarta.
                                    </li>
                                    <li>
                                        Hasil pengajuan berupa <strong>Pengajuan disetujui dan Ditolak dengan Catatan</strong>, kemudian pilih selesai untuk verifikasi.
                                    </li>
                                </ol>
                            </div>
                        </a>

                        <a href="#" class="timeline" data-aos="fade-up">
                            <div class="timeline-icon"><i class="fa fa-medkit"></i></div>
                            <div class="timeline-content">
                                <span class="title ml-4">Verifikasi Pindah Dapil</span>
                                <ol class="description" style="font-size: 14px;color:black">
                                    <li>
                                        Jika anda sudah melakukan permohonan pindah Daerah Pilih, Petugas akan mengirimkan respon diterima atau ditolak
                                    </li>
                                    <li>
                                        Apabila pengajuan ditolak, silahkan mambaca memo penolakan dan anda dapat mengajukan permohonan ulang.
                                    </li>
                                    <li>
                                        Apabila pengajuan diterima, silahkan klik selesai untuk verifikasi pindah dapil.
                                    </li>
                                    <li>
                                        Verifikasi dibutuhkan untuk memindahkan data anda pada sistem dan proses selesai.
                                    </li>
                                </ol>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cool Fetatures Section End -->

    <!-- Footer Section Start -->
    <footer>
        <!-- Footer Area Start -->
        <section id="footer-Content">
            <div class="container">
                <!-- Start Row -->
                <div class="row">

                    <!-- Start Col -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mb-12 mt-2">
                        <img src="<?= base_url() ?>assets/images/logo.png" alt="logo" style="width: 100px;">
                        <h4 class="text-white mt-3 fotitle">Komisi Pemilihan Umum Kota Yogyakarta</h4>
                        <p class="text-white">Jl. Magelang No.41, Kricak, Kec. Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55242</p>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12 mt-2">
                        <div class="widget">
                            <h3 class="block-title">Fitur</h3>
                            <ul class="menu">
                                <li><a href="#home">- Beranda</a></li>
                                <li><a href="#statistik">- Statistik</a></li>
                                <li><a href="#dpt">- Cek Dpt</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Start Col -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-mb-12 mt-2">
                        <div class="widget">
                            <h3 class="block-title">Subscribe Kami</h3>
                            <p>Dapatkan informasi terbaru dari kami melalui email anda...</p>
                            <div class="subscribe-area">
                                <input type="email" class="form-control" placeholder="Enter Email">
                                <span><i class="lni-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- Copyright Start  -->

            <div class="copyright">
                <div class="container">
                    <!-- Star Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="site-info text-center">
                                <p>Crafted by <a href="https://mabesgroup.org/" target="_blank" rel="nofollow">Mabes Industries Group</a></p>
                            </div>

                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- Copyright End -->
        </section>
        <!-- Footer area End -->

    </footer>
    <!-- Footer Section End -->


    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="<?= base_url() ?>assets/landing/js/jquery-min.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/owl.carousel.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/jquery.nav.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/scrolling-nav.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/nivo-lightbox.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/form-validator.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/contact-form-script.js"></script>
    <script src="<?= base_url() ?>assets/landing/js/main.js"></script>


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

</body>

</html>