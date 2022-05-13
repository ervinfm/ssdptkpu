<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="card-title"><?= ucfirst($this->uri->segment(3)) ?> Akun Pengguna Sistem</h4>
                </div>
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <a href="<?= site_url('admin/account') ?>" class="btn btn-info float-end"><i class="bx bx-grid"></i> Data Pengguna </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <form action="<?= site_url('admin/account/proses') ?>" method="post">
                        <input type="hidden" name="id" value="<?= @$row->id_user ?>">
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Nama Pengguna *</label>
                            <div class="col-md-10">
                                <input class="form-control" name="u_name" type="text" value="<?= @$row->nama_user ?>" placeholder="nama pengguna ..." id="html5-text-input" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Email Pengguna *</label>
                            <div class="col-md-10">
                                <input class="form-control" name="u_email" type="email" value="<?= @$row->email_user ?>" placeholder="Email pengguna ..." id="html5-text-input" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Username Pengguna *</label>
                            <div class="col-md-10">
                                <input class="form-control" name="u_user" type="text" value="<?= @$row->username_user ?>" placeholder="Username pengguna ..." id="html5-text-input" required>
                            </div>
                        </div>
                        <?php if ($this->uri->segment(3) == 'tambah') { ?>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Password Pengguna *</i></small></label>
                                <div class="col-md-10">
                                    <div class="form-password-toggle">
                                        <div class="input-group">
                                            <input type="password" name="u_pass" class="form-control" id="basic-default-password12" placeholder="password pengguna ..." aria-describedby="basic-default-password2" required />
                                            <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Password Pengguna <small><i>(Kosongkan jika tak diubah)</i></small></label>
                                <div class="col-md-10">
                                    <div class="form-password-toggle">
                                        <div class="input-group">
                                            <input type="password" name="u_pass" class="form-control" id="basic-default-password12" placeholder="password pengguna ..." aria-describedby="basic-default-password2" />
                                            <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Level Pengguna *</label>
                            <div class="col-md-4">
                                <select name="u_level" class="form-control" id="html5-text-input" required>
                                    <option value="">- pilih level -</option>
                                    <option value="1" <?= @$row->level_user == 1 ? 'selected' : null ?>>Aministrator</option>
                                    <option value="2" <?= @$row->level_user == 2 ? 'selected' : null ?>>Pengguna/DPT</option>
                                </select>
                            </div>
                            <label for="html5-text-input" class="col-md-2 col-form-label">Status Pengguna *</label>
                            <div class="col-md-4">
                                <select name="u_status" class="form-control" id="html5-text-input" required>
                                    <option value="">- pilih status -</option>
                                    <option value="1" <?= @$row->status_user == 1 ? 'selected' : null ?>>Aktif</option>
                                    <option value="0" <?= @$row->status_user == 0 ? 'selected' : null ?>>Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                        <?php if ($this->uri->segment(3) == 'tambah') { ?>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">NIK/ID DPT Pengguna </label>
                                <div class="col-md-10">
                                    <select name="nik_pemilih" class="form-control" id="html5-text-input">
                                        <option value="">- pilih DPT -</option>
                                        <?php foreach (get_pemilih()->result() as $key => $dpt) { ?>
                                            <option value="<?= $dpt->nik_pemilih ?>"><?= '[' . $dpt->nik_pemilih . '] - ' . $dpt->nama_pemilih ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-sm-12 mt-3 d-grid gap-2">
                            <button type="submit" name="<?= $this->uri->segment(3) ?>" class="btn btn-block btn-success"><i class="icon-layers"></i> <?= ucfirst($this->uri->segment(3)) ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>