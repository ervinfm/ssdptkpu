<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
                    <h4 class="card-title">Data Domisili/Wilayah KPU Kota Yogyakarta</h4>
                </div>
                <div class="col-sm-3 mb-1">
                    <a href="#" class="btn btn-sm btn-rounded btn-secondary float-end ">Kelurahan/Desa</a>
                    <a href="<?= site_url('admin/domisili') ?>" class="btn btn-sm btn-rounded btn-dark float-end me-2">Kecamatan</a>
                </div>
                <div class="col-sm-12 mt-2">
                    <a href="<?= site_url('admin/domisili/tambah_data') ?>" class="btn btn-success"><i class="bx bx-plus-circle"></i> Tambah Kelurahan</a>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No.</th>
                                    <th width="15%"> ID Kelurahan </th>
                                    <th>Nama Kelurahan</th>
                                    <th width="20%">Kelompok Kecamatan</th>
                                    <th width="15%">Tanggal Terdaftar</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row->result() as $key => $kel) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $kel->id_kelurahan ?></td>
                                        <td>Kelurahan <?= $kel->nama_kelurahan ?></td>
                                        <td><?= get_kecamatan($kel->id_kecamatan)->row()->nama_kecamatan ?></td>
                                        <td><?= tgl_indo(date('Y-m-d', strtotime($kel->created_kelurahan))) ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/domisili/update_data/' . $kel->id_kelurahan) ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                            <a href="<?= site_url('admin/domisili/delete_data/' . $kel->id_kelurahan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus data Kelurahan ?')"><i class="bx bx-trash"></i></a>
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