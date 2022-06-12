<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mt-2">
                        <span class="h4 m-0 p-0">Riwayat Permohonan Pindah DPT Baru</span>
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-md btn-dark float-end me-1"><i class="bx bx-home"></i> Beranda</a>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">ID/NIK</th>
                                    <th>Tujuan Pindah</th>
                                    <th>Status Pindah</th>
                                    <th>Tanggal</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $data->nik_pemilih ?></td>
                                        <td><?= 'TPS ' . $data->id_tps . ' (RT ' . $data->rt_pindah . '/RW ' . $data->rw_pindah . ', Kel. ' . $data->kelurahan_pindah . ', Kec. ' . $data->kecamatan_pindah . ' Kota Yogakarta' ?></td>
                                        <td>
                                            <?php
                                            if ($data->status_pindah == 0) {
                                                echo '<span class="badge bg-warning">diProses</span>';
                                            } else if ($data->status_pindah == 1) {
                                                echo '<span class="badge bg-success">Diterima</span>';
                                            } else if ($data->status_pindah == 2) {
                                                echo '<span class="badge bg-danger">Ditolak</span>';
                                            } else if ($data->status_pindah == 3) {
                                                echo '<span class="badge bg-primary">Selesai</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($data->created_pindah))) . ' ' . date('H:i', strtotime($data->created_pindah)) . ' WIB' ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#more<?= $key ?>"><i class="bx bx-info-circle"></i></a>
                                            <div class="modal fade" id="more<?= $key ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">Rincian Pengajuan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <td width="20%">No. Pengajuan</td>
                                                                                <td width="5%">:</td>
                                                                                <td><?= $data->id_pindah ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>ID/NIK</td>
                                                                                <td>:</td>
                                                                                <td><?= $data->nik_pemilih ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tujuan</td>
                                                                                <td>:</td>
                                                                                <td><?= 'TPS ' . $data->id_tps . ' (RT ' . $data->rt_pindah . '/RW ' . $data->rw_pindah . ', Kel. ' . $data->kelurahan_pindah . ', Kec. ' . $data->kecamatan_pindah . ' Kota Yogakarta' ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Status</td>
                                                                                <td>:</td>
                                                                                <td><?= $data->status_pindah == 0 ? '<span class="badge bg-warning">diProses</span>' : ($data->status_pindah == 1 ? '<span class="badge bg-success">Diterima</span>' : '<span class="badge bg-danger">Ditolak</span>') ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tanggal</td>
                                                                                <td>:</td>
                                                                                <td><?= tgl_indo(date('Y-m-d', strtotime($data->created_pindah))) . ' ' . date('H:i', strtotime($data->created_pindah)) . ' WIB' ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Catatan</td>
                                                                                <td>:</td>
                                                                                <td>
                                                                                    <h5 class="">Catatan Petugas : </h5>
                                                                                    <p>
                                                                                        <?php if ($data->note_pindah == '' || $data->note_pindah == null || $data->note_pindah == '-') {
                                                                                            echo "<i>Tidak ada Catatan yang diberikan oleh Petugas KPU Kota Yogyakarta!</i>";
                                                                                        } else {
                                                                                            echo $data->note_pindah;
                                                                                        }
                                                                                        ?>
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
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