<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="card-title text-primary">Dataset Daftar Pemilih Tetap (DPT)</h4>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 mt-1 mb-1">
                            <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#unggah"><i class="bx bx-upload"></i> Unggah </a>
                            <div class="modal fade" id="unggah" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Unggah Dataset DPT </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= site_url('admin/pemilih/proses') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                                            Format File sebagai berikut :
                                                            <ul>
                                                                <li>application/vnd.ms-excel</li>
                                                                <li>application/excel</li>
                                                                <li>application/vnd.msexcel</li>
                                                                <li>application/vnd.openxmlformats-officedocument.spreadsheetml.sheet</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="formFile" class="form-label">Unggah Dataset</label>
                                                        <input class="form-control" type="file" name="upload_file" id="formFile" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="upload" class="btn btn-primary">Unggah Dataset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-1 mb-1">
                            <a href="#" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus-circle"></i> Tambah </a>
                            <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Pemilih Baru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <form action="<?= site_url('admin/pemilih/tambah') ?>" method="get">
                                                        <div class="form-check form-switch mb-2">
                                                            <input class="form-check-input" type="checkbox" name="autogenerate" id="flexSwitchCheckChecked">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">Generate Otomatis ID/NIK</label>
                                                        </div>
                                                        <div class="form-check form-switch mb-2">
                                                            <input class="form-check-input" type="checkbox" name="memberlock" id="flexSwitchCheckChecked">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">Kunci Update Jumlah Tambah Data</label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="number" name="member" value="<?= @$_GET['member'] ?>" class="form-control" placeholder="Jumlah Pemilih Baru ?" min="1" max="10" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                                            <button class="btn btn-outline-primary" type="submit" name="add" value="yes" id="button-addon2">Mulai</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th width="5%"> No </th>
                                            <th width="10%">ID/NIK</th>
                                            <th>Nama</th>
                                            <th width="10%">Umur</th>
                                            <th width="15%">Jenis Kelamin</th>
                                            <th width="10%">Domisili</th>
                                            <th width="10%">Detail</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($row->result() as $key => $data) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $data->nik_pemilih ?></td>
                                                <td><?= $data->nama_pemilih ?></td>
                                                <td><?= get_umur($data->tgl_lahir_pemilih) . ' Tahun' ?></td>
                                                <td><?= $data->gender_pemilih == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                                                <td><?= $data->domisili_pemilih == 0 ? '<span class="badge bg-danger">Luar Domisli</span>' : '<span class="badge bg-success">Domisili</span>' ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#mod<?= $key ?>" style="color:#FFF">
                                                        <i class="bx bx-info-circle"></i>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="mod<?= $key ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Detail Data Pemilih</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <h5>A. Data Pemilih</h5>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-bordered">
                                                                                    <tr>
                                                                                        <td width="25%">NIK</td>
                                                                                        <td width="5%">:</td>
                                                                                        <td><?= $data->nik_pemilih ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Nama </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->nama_pemilih ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>TTL </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->lahir_pemilih . ',' . date('d-m-Y', strtotime($data->tgl_lahir_pemilih)) . ' (' .  get_umur($data->tgl_lahir_pemilih) . ' Tahun)' ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Jenis Kelamin </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->gender_pemilih == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Status Perkawinan </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->perkawinan_pemilih == 1 ? 'Kawin' : 'Belum' ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Difable </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->difable_pemilih == 1 ? 'Iya' : 'Tidak' ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Domisili </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->domisili_pemilih == 0 ? 'Luar Domisili' : 'Domisili' ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Alamat </td>
                                                                                        <td>:</td>
                                                                                        <td><?= $data->alamat_pemilih ?> </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 mt-3">
                                                                            <h5>B. Data TPS Pemilih</h5>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <table class="table table-bordered">
                                                                                <tr>
                                                                                    <td width="25%">No. TPS</td>
                                                                                    <td width="5%">:</td>
                                                                                    <td><?= $data->id_tps ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>RT/RW</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $data->rt_pemilih . '/' . $data->rw_pemilih ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelurahan</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $data->kelurahan_pemilih ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kecamatan</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $data->kecamatan_pemilih ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url('admin/pemilih/update/' . $data->id_pemilih) ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                                    <a href="<?= site_url('admin/pemilih/delete/' . $data->id_pemilih) ?>" onclick="return confirm('Yakin Menghapus Data Pemilih ?')" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
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
    </div>
</div>