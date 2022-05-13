<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="card-title"><?= ucfirst($this->uri->segment(3)) ?> Daftar Pemilih Tetap (DPT)</h4>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-10 mb-2">
                            <a href="<?= site_url('admin/pemilih') ?>" class="btn btn-info"><i class="bx bx-grid"></i> Data Pemilih </a>
                        </div>
                        <?php if ($this->uri->segment(3) == 'tambah') {
                            if (@$_GET['memberlock'] != 'on') { ?>
                                <div class="col-sm-2 mb-2">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="hidden" name="autogenerate" value="<?= @$_GET['autogenerate'] ?>">
                                            <input type="number" name="member" value="<?= @$_GET['member'] ?>" class="form-control" placeholder="Jumlah Pemilih Baru ?" min="1" max="10" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-primary" type="submit" name="add" value="yes" id="button-addon2">Button</button>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                            <div class="col-sm-12 mt-2">
                                <form action="<?= site_url('admin/pemilih/proses') ?>" method="post">
                                    <?php for ($i = 1; $i <= @$_GET['member']; $i++) {  ?>
                                        <div class="group">
                                            <div class="mb-2 mt-2 row">
                                                <?php if ($i > 1) { ?>
                                                    <div class="col-sm-12 mt-2">
                                                        <hr>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-sm-12">
                                                    <span class="badge bg-dark">Tambah Pemilih Ke <?= $i ?></span>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">ID/NIK Pemilih *</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="number" name="p_nik[]" id="html5-text-input" value="<?= @$_GET['autogenerate'] == 'on' ? random_string('numeric', 6) : null ?>" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Nama Pemilih *</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="p_nama[]" id="html5-text-input" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Tempat Lahir Pemilih *</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="p_tempat[]" id="html5-text-input" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Tanggal Lahir Pemilih *</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="date" name="p_tgl[]" id="html5-text-input" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Jenis Kelamin Pemilih *</label>
                                                <div class="col-md-4">
                                                    <select name="p_gender[]" class="form-control" id="html5-text-input" required>
                                                        <option value="">- pilih jenis kelamin -</option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="0">Perempuan</option>
                                                    </select>
                                                </div>
                                                <label for="html5-text-input" class="col-md-2 col-form-label">Status Perkawinan *</label>
                                                <div class="col-md-3">
                                                    <select name="p_kawin[]" class="form-control" id="html5-text-input" required>
                                                        <option value="">- pilih status perkawinan -</option>
                                                        <option value="0">Belum Kawin</option>
                                                        <option value="1">Kawin</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Berkebutuhan Khusus (Difable) *</label>
                                                <div class="col-md-4">
                                                    <select name="p_difable[]" class="form-control" id="html5-text-input" required>
                                                        <option value="">- pilih keterbutuhan khusus -</option>
                                                        <option value="1">Keterbutuhan Khusus (Difable)</option>
                                                        <option value="0">Tidak</option>
                                                    </select>
                                                </div>
                                                <label for="html5-text-input" class="col-md-2 col-form-label">Status Kependudukan *</label>
                                                <div class="col-md-3">
                                                    <select name="p_domisili[]" class="form-control" id="html5-text-input" required>
                                                        <option value="">- pilih status domisili -</option>
                                                        <option value="1">Penduduk Kota Yogyakarta</option>
                                                        <option value="0">Penduduk Luar Kota Yogyakarta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Kecamatan Pemilih *</label>
                                                <div class="col-md-4">
                                                    <select name="p_kecamatan[]" id="kecamatan" class="form-control" id="html5-text-input" required>
                                                        <option value="">- pilih kecamatan -</option>
                                                        <?php foreach (get_kecamatan()->result() as $key => $kecamatan) { ?>
                                                            <option value="<?= $kecamatan->nama_kecamatan ?>"><?= $kecamatan->nama_kecamatan ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label for="html5-text-input" class="col-md-2 col-form-label">Kelurahan Pemilih *</label>
                                                <div class="col-md-3">
                                                    <select name="p_kelurahan[]" id="kecamatan" class="form-control" id="html5-text-input" required>
                                                        <option value="">- pilih kelurahan -</option>
                                                        <?php foreach (get_kelurahan()->result() as $key => $kelurahan) { ?>
                                                            <option value="<?= $kelurahan->nama_kelurahan ?>"><?= $kelurahan->nama_kelurahan ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">RW Pemilih *</label>
                                                <div class="col-md-2">
                                                    <input class="form-control" type="number" min="1" max="1000" name="p_rw[]" id="html5-text-input" required>
                                                </div>
                                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"> RT Pemilih *</label>
                                                <div class="col-md-2">
                                                    <input class="form-control" type="number" min="1" max="1000" name="p_rt[]" id="html5-text-input" required>
                                                </div>
                                                <label for="html5-text-input" class="col-md-1 col-form-label">No. TPS *</label>
                                                <div class="col-md-2">
                                                    <input class="form-control" type="number" min="1" max="1000" name="p_tps[]" id="html5-text-input" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Alamat Pemilih *</label>
                                                <div class="col-md-9">
                                                    <textarea name="p_alamat[]" class="form-control" rows="3" id="html5-text-input" required></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-12 mt-3 d-grid gap-2">
                                        <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-block btn-success"><i class="icon-layers"></i> <?= ucfirst($this->uri->segment(3)) ?></button>
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div class="col-sm-12 mt-2">
                                <form action="<?= site_url('admin/pemilih/proses') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= @$row->id_pemilih ?>">
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">ID/NIK Pemilih *</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="number" name="p_nik" value="<?= @$row->nik_pemilih ?>" id="html5-text-input">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Nama Pemilih *</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="p_nama" value="<?= @$row->nama_pemilih ?>" id="html5-text-input">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Tempat Lahir Pemilih *</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="p_tempat" value="<?= @$row->lahir_pemilih ?>" id="html5-text-input">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Tanggal Lahir Pemilih *</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="p_tgl" value="<?= @$row->tgl_lahir_pemilih ?>" id="html5-text-input">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Jenis Kelamin Pemilih *</label>
                                        <div class="col-md-3">
                                            <select name="p_gender" class="form-control" id="html5-text-input" required>
                                                <option value="">- pilih jenis kelamin -</option>
                                                <option value="1" <?= @$row->gender_pemilih == 1 ? 'selected' : null ?>>Laki-laki</option>
                                                <option value="0" <?= @$row->gender_pemilih == 0 ? 'selected' : null ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Status Perkawinan Pemilih *</label>
                                        <div class="col-md-3">
                                            <select name="p_kawin" class="form-control" id="html5-text-input" required>
                                                <option value="">- pilih status perkawinan -</option>
                                                <option value="0" <?= @$row->perkawinan_pemilih == 0 ? 'selected' : null ?>>Belum Kawin</option>
                                                <option value="1" <?= @$row->perkawinan_pemilih == 1 ? 'selected' : null ?>>Kawin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Berkebutuhan Khusus (Difable) *</label>
                                        <div class="col-md-3">
                                            <select name="p_difable" class="form-control" id="html5-text-input" required>
                                                <option value="">- pilih keterbutuhan khusus -</option>
                                                <option value="1" <?= @$row->difable_pemilih == 1 ? 'selected' : null ?>>Keterbutuhan Khusus (Difable)</option>
                                                <option value="0" <?= @$row->difable_pemilih == 0 ? 'selected' : null ?>>Tidak</option>
                                            </select>
                                        </div>
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Status Kependudukan *</label>
                                        <div class="col-md-3">
                                            <select name="p_domisili" class="form-control" id="html5-text-input" required>
                                                <option value="">- pilih status domisili -</option>
                                                <option value="1" <?= @$row->domisili_pemilih == 1 ? 'selected' : null ?>>Penduduk Kota Yogyakarta</option>
                                                <option value="0" <?= @$row->domisili_pemilih == 0 ? 'selected' : null ?>>Penduduk Luar Kota Yogyakarta</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kecamatan Pemilih *</label>
                                        <div class="col-md-3">
                                            <select name="p_kecamatan" id="kecamatan" class="form-control" id="html5-text-input" required>
                                                <option value="">- pilih kecamatan -</option>
                                                <?php foreach (get_kecamatan()->result() as $key => $kecamatan) { ?>
                                                    <option value="<?= $kecamatan->nama_kecamatan ?>" <?= strtoupper(@$row->kecamatan_pemilih) == strtoupper($kecamatan->nama_kecamatan) ? 'selected' : null ?>><?= $kecamatan->nama_kecamatan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kelurahan Pemilih *</label>
                                        <div class="col-md-3">
                                            <select name="p_kelurahan" id="kecamatan" class="form-control" id="html5-text-input" required>
                                                <option value="">- pilih kelurahan -</option>
                                                <?php foreach (get_kelurahan()->result() as $key => $kelurahan) { ?>
                                                    <option value="<?= $kelurahan->nama_kelurahan ?>" <?= $kelurahan->nama_kelurahan == @$row->kelurahan_pemilih ? 'selected' : null ?>><?= $kelurahan->nama_kelurahan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">RW Pemilih *</label>
                                        <div class="col-md-2">
                                            <input class="form-control" type="number" value="<?= @$row->rw_pemilih ?>" min="1" max="1000" name="p_rw" id="html5-text-input" required>
                                        </div>
                                        <label for="html5-text-input" class="col-md-2 col-form-label text-center"> RT Pemilih *</label>
                                        <div class="col-md-2">
                                            <input class="form-control" type="number" value="<?= @$row->rt_pemilih ?>" min="1" max="1000" name="p_rt" id="html5-text-input" required>
                                        </div>
                                        <label for="html5-text-input" class="col-md-1 col-form-label">No. TPS *</label>
                                        <div class="col-md-2">
                                            <input class="form-control" type="number" value="<?= @$row->id_tps ?>" min="1" max="1000" name="p_tps" id="html5-text-input" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Alamat Pemilih *</label>
                                        <div class="col-md-9">
                                            <textarea name="p_alamat" class="form-control" rows="3" id="html5-text-input" required><?= @$row->alamat_pemilih ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3 d-grid gap-2">
                                        <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-block btn-success"><i class="icon-layers"></i> <?= ucfirst($this->uri->segment(3)) ?></button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kecamatan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= site_url('admin/pemilih/get_kelurahan_by_kecamatan') ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value="0">' + '- pilih kelurahan/desa' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option>' + data[i].nama_kelurahan + '</option>';
                    }
                    $('.kelurahan').html(html);
                }
            });
        });
    });
</script> -->