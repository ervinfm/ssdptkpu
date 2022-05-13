<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="card-title">Pengajuan Pindah DPT</h4>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%" id="datatable">
                            <thead>
                                <tr>
                                    <th width="5%"> No </th>
                                    <th width="10%">Status</th>
                                    <th width="10%">ID/NIK</th>
                                    <th>Nama Pemilih</th>
                                    <th width="15%">Tanggal </th>
                                    <th width="10%">Rincian</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row->result() as $key => $pindah) {
                                    $person = get_pemilih($pindah->id_pemilih)->row(); ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <?php if ($pindah->status_pindah == 0) { ?>
                                                <a href="" class="btn btn-sm btn-warning">Mengunggu</a>
                                            <?php } else if ($pindah->status_pindah == 1) { ?>
                                                <a href="" class="btn btn-sm btn-success">Disetujui</a>
                                            <?php } else if ($pindah->status_pindah == 2) { ?>
                                                <a href="" class="btn btn-sm btn-danger">Ditolak</a>
                                            <?php } else if ($pindah->status_pindah == 3) { ?>
                                                <a href="" class="btn btn-sm btn-dark">Selesai</a>
                                            <?php } ?>
                                        </td>
                                        <td><?= $person->nik_pemilih ?></td>
                                        <td><?= $person->nama_pemilih ?></td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($person->created_pemilih))) . ' ' . date('H:i', strtotime($person->created_pemilih)) ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#a<?= $key ?>"><i class="bx bx-detail"></i> Info</a>
                                            <div class="modal fade" id="a<?= $key ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">Detail Pengajuan Pindah DPT</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td width="25%">ID/NIK</td>
                                                                                <td width="5%">:</td>
                                                                                <td><?= $person->nik_pemilih ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Nama Pemilih</td>
                                                                                <td>:</td>
                                                                                <td><?= $person->nama_pemilih ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 mt-3">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td colspan="3"><strong>A. DPT Awal</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Kecamatan</td>
                                                                                <td>:</td>
                                                                                <td><?= $person->kecamatan_pemilih ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Kelurahan</td>
                                                                                <td>:</td>
                                                                                <td><?= $person->kelurahan_pemilih ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>RT/RW</td>
                                                                                <td>:</td>
                                                                                <td><?= $person->rt_pemilih . '/' . $person->rw_pemilih ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>No. TPS</td>
                                                                                <td>:</td>
                                                                                <td><?= $person->id_tps ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2 mt-3 text-center">
                                                                    <a href="" class="btn btn-sm btn-danger" style="margin-top: 100px;"><i class="bx bx-right-arrow-circle bx-md"></i></a>
                                                                </div>
                                                                <div class="col-sm-5 mt-3">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td colspan="3"><strong>B. DPT Tujuan</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Kecamatan</td>
                                                                                <td>:</td>
                                                                                <td><?= $pindah->kecamatan_pindah ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Kelurahan</td>
                                                                                <td>:</td>
                                                                                <td><?= $pindah->kelurahan_pindah ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>RT/RW</td>
                                                                                <td>:</td>
                                                                                <td><?= $pindah->rt_pindah . '/' . $pindah->rw_pindah ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>No. TPS</td>
                                                                                <td>:</td>
                                                                                <td><?= $pindah->id_tps ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php if ($pindah->status_pindah == 2) { ?>
                                                                    <div class="col-sm-12 mt-5 ">
                                                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                                                            <?= $pindah->note_pindah == '' ? 'Tidak ada Note...' : ($pindah->note_pindah == '-' ? 'Tidak ada Note...' : $pindah->note_pindah) ?>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
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
                                        <td>
                                            <?php if ($pindah->status_pindah == 0) { ?>
                                                <a href="<?= site_url('admin/pindah/accept/' . $pindah->id_pindah) ?>" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi Persetujuan Pindah DPT Pemilih ?')"><i class="bx bx-check-circle"></i></a>
                                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basic<?= $key ?>"><i class="bx bx-x-circle"></i></a>
                                                <div class="modal fade" id="basic<?= $key ?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= site_url('admin/pindah/reject') ?>" method="get">
                                                                <input type="hidden" name="id" value="<?= $pindah->id_pindah ?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Pengjuan Pindah DPT Ditolak</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-2">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">Catatan Penolakan Pengajuan *</label>
                                                                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger">Tolak Pengajuan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <a href="#" onclick="return alert('Proses pindah sudah disetujui/ditolak!')" class="btn btn-secondary btn-sm"><i class="bx bx-lock-alt"></i></a>
                                            <?php } ?>
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