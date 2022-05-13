<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
                    <h4 class="card-title">Data Domisili/Wilayah KPU Kota Yogyakarta</h4>
                </div>
                <div class="col-sm-3 mb-1">
                    <a href="<?= site_url('admin/domisili/kelurahan') ?>" class="btn btn-sm btn-rounded btn-dark float-end ">Kelurahan/Desa</a>
                    <a href="#" class="btn btn-sm btn-rounded btn-secondary float-end me-2">Kecamatan</a>
                </div>
                <div class="col-sm-12 mt-2">
                    <a href="<?= site_url('admin/domisili/tambah') ?>" class="btn btn-success"><i class="bx bx-plus-circle"></i> Tambah Kecamatan</a>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No.</th>
                                    <th width="15%"> ID Kecamatan </th>
                                    <th>Nama Kecamatan</th>
                                    <th width="15%">Jumlah Kelurahan</th>
                                    <th width="20%">Latitude|Longitude</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row->result() as $key => $kec) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $kec->id_kecamatan ?></td>
                                        <td>Kecamatan <?= $kec->nama_kecamatan ?></td>
                                        <td><?= get_kelurahan_by_kecamatan($kec->id_kecamatan)->num_rows() ?> Kelurahan</td>
                                        <td><?= substr($kec->latitude_maps, 0, 10) . '... | ' . substr($kec->longitude_maps, 0, 10) ?>...</td>
                                        <td>
                                            <a href="<?= site_url('admin/domisili/update/' . $kec->id_kecamatan) ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                            <a href="<?= site_url('admin/domisili/delete/' . $kec->id_kecamatan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus data Kecamatan ?')"><i class="bx bx-trash"></i></a>
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