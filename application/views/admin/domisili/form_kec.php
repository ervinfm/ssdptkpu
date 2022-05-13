<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
                    <h4 class="card-title"><?= ucfirst($this->uri->segment(3)) ?> Data Kecamatan Kota Yogyakarta</h4>
                </div>
                <div class="col-sm-3 mb-1">
                    <a href="<?= site_url('admin/domisili') ?>" class="btn btn-info float-end"><i class="bx bx-grid"></i> Data Kecamatan</a>
                </div>
                <div class="col-sm-12 mt-3">
                    <form action="<?= site_url('admin/domisili/proses') ?>" method="post">
                        <input type="hidden" name="id" value="<?= @$row->id_kecamatan ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">ID Registrasi Kecamatan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" name="id_kec" value="<?= @$row->id_kecamatan ?>" id="basic-icon-default-company" class="form-control" placeholder="347010" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company2">Nama Kecamatan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-map-alt"></i></span>
                                    <input type="text" name="nama_kec" value="<?= @$row->nama_kecamatan ?>" id="basic-icon-default-company2" class="form-control" placeholder="UMBULHARJO" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company2">Kordinat Longitude</label>
                            <div class="col-sm-4">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-map-alt"></i></span>
                                    <input type="text" name="long_kec" value="<?= @$row->longitude_maps ?>" id="basic-icon-default-company2" class="form-control" placeholder="110.35409889448195" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" required>
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company2">Korodinat Latitude</label>
                            <div class="col-sm-4">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-map-alt"></i></span>
                                    <input type="text" name="lat_kec" value="<?= @$row->latitude_maps ?>" id="basic-icon-default-company2" class="form-control" placeholder="-7.784259901754039" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-success"><i class="bx bx-edit"></i><?= ucfirst($this->uri->segment(3)) ?> Kecamatan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>