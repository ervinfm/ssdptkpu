<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="card-title text-primary">Hasil Pemetaan Data Pemilih Tetap Kota Yogyakarta (Metode K-Means Clustering)</h4>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= site_url('admin/clustering/reset/' . $row->id_clustering) ?>" onclick="return confirm('Yakin Menghapus data Pemetaan ?, Kemungkinan Hasil akan Berbeda dari pemetaan sebelumnya!')" class="btn btn-danger float-end"><i class="bx bx-x-circle"></i> Reset Hasil </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="3"><strong>A. Deskripsi Clustering</strong></td>
                            </tr>
                            <tr>
                                <td>ID Proses</td>
                                <td>:</td>
                                <td><?= $row->id_clustering ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Data Klaster</td>
                                <td>:</td>
                                <td><?= $row->ndata_clustering ?> DPT</td>
                            </tr>
                            <tr>
                                <td>Jumlah Kecamatan</td>
                                <td>:</td>
                                <td><?= $row->nkec_clustering ?> Kecamatan</td>
                            </tr>
                            <tr>
                                <td>Jumlah Kecamatan</td>
                                <td>:</td>
                                <td><?= $row->nkel_clustering ?> Kelurahan</td>
                            </tr>
                            <tr>
                                <td>Tanggal Proses</td>
                                <td>:</td>
                                <td><?= tgl_indo(date('Y-m-d', strtotime($row->created_clustering))) . ' ' . date('H:i', strtotime($row->created_clustering)) . ' WIB' ?></td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $row->status_clustering == 0 ? '<span class="badge bg-danger">Perlu Konfirmasi</span>' : '<span class="badge bg-success">Selesai</span>' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="6"><strong>B. Hasil Clustering (Tiap Kecamatan)</strong></td>
                            </tr>
                            <tr>
                                <td>No</td>
                                <td>Kecamatan</td>
                                <td>Cluster 1</td>
                                <td>Cluster 2</td>
                                <td>Cluster 3</td>
                                <td>Total</td>
                            </tr>

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
                            <?php } ?>

                        </table>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>C. Rincian Hasil Clustering</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="accordion mt-3" id="accordionExample">
                                        <div class="row">
                                            <?php foreach (get_kecamatan()->result() as $key => $kecamatan) { ?>
                                                <div class="col-sm-6 mt-2">
                                                    <div class="card accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#aaa<?= $kecamatan->id_kecamatan ?>" aria-expanded="false" aria-controls="accordionOne">
                                                                KECAMATAN <?= $kecamatan->nama_kecamatan . ' (' . $kecamatan->id_kecamatan . ')' ?>
                                                            </button>
                                                        </h2>

                                                        <div id="aaa<?= $kecamatan->id_kecamatan ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                                            <div class="accordion-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>Kelurahan</td>
                                                                            <td>Cluster 1</td>
                                                                            <td>Cluster 2</td>
                                                                            <td>Cluster 3</td>
                                                                            <td>Total</td>
                                                                        </tr>
                                                                        <?php foreach (get_kelurahan_by_kecamatan($kecamatan->id_kecamatan)->result() as $key => $kelu) {
                                                                            $data = get_clust_bynamekel($kelu->nama_kelurahan)->row(); ?>
                                                                            <tr>
                                                                                <td><?= $kelu->nama_kelurahan ?></td>
                                                                                <td><?= $data->ncluster1_hasil ?> DPT</td>
                                                                                <td><?= $data->ncluster2_hasil ?> DPT</td>
                                                                                <td><?= $data->ncluster3_hasil ?> DPT</td>
                                                                                <td><?= $data->ncluster1_hasil + $data->ncluster2_hasil + $data->ncluster3_hasil ?> DPT</td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <form action="<?= site_url('admin/clustering/processing') ?>" method="post">
                    <div class="col-sm-12 mt-3 d-grid gap-2">
                        <input type="hidden" name="id" value="<?= $row->id_clustering ?>">
                        <button type="submit" name="conf" class="btn btn-success"><i class="bx bx-check-circle"></i> Konfirmasi Hasil Pemetaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>