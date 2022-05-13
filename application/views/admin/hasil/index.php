<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="card-title text-primary">Hasil Pemetaan Data DPT KPU Kota Yogyakarta</h4>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Data</th>
                                    <th>Jumlah Kecamatan</th>
                                    <th>Jumlah Kelurahan</th>
                                    <th>Akurasi</th>
                                    <th>Status</th>
                                    <th width="5%">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($data->created_clustering))) ?></td>
                                        <td><?= $data->ndata_clustering ?> Data</td>
                                        <td><?= $data->nkec_clustering ?> Kecamatan</td>
                                        <td><?= $data->nkel_clustering ?> Kecamatan</td>
                                        <td><?= round($data->akurasi_clustering, 2) ?> %</td>
                                        <td><?= $data->status_clustering == 0 ? '<span class="badge bg-danger">Perlu Konfirmasi</span>' : '<span class="badge bg-success">Selesai</span>' ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/hasil/detail/' . $data->id_clustering) ?>" class="btn btn-icon btn-info">
                                                <span class="tf-icons bx bx-info-circle"></span>
                                            </a>
                                        </td>
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