<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="card-title text-primary">Pemetaan Data Pemilih Tetap Kota Yogyakarta</h4>
                        </div>
                        <div class="col-sm-2">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#history" class="btn btn-info float-end"><i class="bx bx-history"></i> Riwayat </a>
                        </div>
                    </div>
                </div>
                <?php if (get_all_pemilih()->num_rows() >= 3) { ?>
                    <div class="col-sm-12 mt-3">
                        <div class="alert alert-info alert-dismissible" role="alert">
                            Pemetaan Data Daftar Pemilih Tetap (DPT) KPU Kota Yogyakarta Menggunakan Teknik Data Mining K-Means Clustering, Cluster data dikelompokkan menjadi 3 yaitu : <br>1. Cluster Muda (< 17 Tahun) <br> 2. Cluster Dewasa (< 47 Tahun) <br> 3. Cluster Lansia (< 70 Tahun) <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="col-sm-4 offset-sm-1 mt-1 mb-4">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td colspan="3" align="center"><strong>Deskripsi Umum Data</strong></td>
                                </tr>
                                <tr>
                                    <td>Total Kecamatan</td>
                                    <td>:</td>
                                    <td><?= @$kec->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Total Kelurahan</td>
                                    <td>:</td>
                                    <td><?= @$kel->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Total DPT</td>
                                    <td>:</td>
                                    <td><?= @$row->num_rows() ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-1 mb-4">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td colspan="3" align="center"><strong>Deskripsi Pemetaan</strong></td>
                                </tr>

                                <tr>
                                    <td>Teknik Clustering</td>
                                    <td>:</td>
                                    <td>K-Means Clustering</td>
                                </tr>
                                <tr>
                                    <td>Kelompok Cluster (usia)</td>
                                    <td>:</td>
                                    <td>3 Class</td>
                                </tr>
                                <tr>
                                    <td>Goal Cluster</td>
                                    <td>:</td>
                                    <td>Jumlah Tiap Cluster per Kecamatan</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <form action="<?= site_url('admin/clustering/processing') ?>" method="post">
                            <button name="process" class="btn btn-success btn-xl "><i class="bx bx-analyse"></i> Mulai Pemetaan DPT</button>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-12 mt-4">
                        <div class="alert alert-danger" role="alert"><strong>Data DPT tidak ada</strong>, silahkan tambahkan data DPT minimal 3 data dpt!</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="history" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Riwayat Pemetaan Dengan K-Means Clustering</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Jumlah Data</td>
                                    <td>Jumlah Kec</td>
                                    <td>Jumlah Kel</td>
                                    <td>Status</td>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($history->result() as $key => $his) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($his->created_clustering))) ?></td>
                                        <td><?= $his->ndata_clustering ?></td>
                                        <td><?= $his->nkec_clustering ?></td>
                                        <td><?= $his->nkel_clustering ?></td>
                                        <td><?= $his->status_clustering == 1 ? '<span class="badge bg-success">Selesai</span>' : '<span class="badge bg-danger">Konfirmasi</span>' ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>