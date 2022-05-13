<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
                    <h4 class="card-title"><?= $this->uri->segment(3) == 'tambah_data' ? 'Tambah' : 'Update'  ?> Data Kelurahan Kota Yogyakarta</h4>
                </div>
                <div class="col-sm-3 mb-1">
                    <a href="<?= site_url('admin/domisili/kelurahan') ?>" class="btn btn-info float-end"><i class="bx bx-grid"></i> Data Kelurahan</a>
                </div>
                <div class="col-sm-12 mt-3">
                    <form action="<?= site_url('admin/domisili/proses_data') ?>" method="post">
                        <input type="hidden" name="id" value="<?= @$row->id_kelurahan ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kelompok Kecamatan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-directions"></i></span>
                                    <select name="kec_kel" id="basic-icon-default-company3" class="form-control" required>
                                        <option value="">- PILIH KECAMATAN -</option>
                                        <?php foreach (get_kecamatan()->result() as $key => $panewon) { ?>
                                            <option value="<?= $panewon->id_kecamatan ?>" <?= $panewon->id_kecamatan == @$row->id_kecamatan ? 'selected' : null  ?>>[<?= $panewon->id_kecamatan ?>] - <?= $panewon->nama_kecamatan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">ID Registrasi Kelurahan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" name="id_kel" value="<?= @$row->id_kelurahan ?>" id="basic-icon-default-company" class="form-control" placeholder="3471010001" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company2">Nama Kelurahan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-map-alt"></i></span>
                                    <input type="text" name="nama_kel" value="<?= @$row->nama_kelurahan ?>" id="basic-icon-default-company2" class="form-control" placeholder="WARUNGBOTO" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-success"><i class="bx bx-edit"></i><?= $this->uri->segment(3) == 'tambah_data' ? 'Tambah' : 'Update'  ?> Kelurahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>