<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('admin/sistem/proses') ?>" method="POST" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <input type="hidden" name="id" value="<?= $sistem->id_sistem ?>">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="card-title">Konfigurasi Sistem</h4>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Sistem *</label>
                        <input type="text" name="name_sistem" value="<?= $sistem->nama_sistem ?>" class="form-control" id="exampleFormControlInput1" placeholder="ex. Portal Pemetaan DPT KPU Kota Yogyakarta" required>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3">
                        <label for="exampleFormControlInput2" class="form-label">Nama Lembaga *</label>
                        <input type="text" name="name_company" value="<?= $sistem->company_sistem ?>" class="form-control" id="exampleFormControlInput2" placeholder="ex. KPU Kota Yogyakarta" required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Email Sistem *</label>
                        <input type="email" name="email_sistem" value="<?= $sistem->email_sistem ?>" class="form-control" id="exampleFormControlInput3" placeholder="ex. info@kpu.go.id" required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Password Email Sistem *</label>
                            <div class="input-group">
                                <input type="password" name="pass_mail_sistem" value="<?= base64_decode($sistem->pass_email_sistem) ?>" class="form-control" id="basic-default-password12" placeholder="············" aria-describedby="basic-default-password2" required>
                                <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="formFile">Logo Sistem *</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="formFile">Admin Sistem *</label>
                        <select name="user_sistem" class="form-control" required>
                            <option value="">- pilih -</option>
                            <?php foreach (get_tbluser('level_user', 1)->result() as $key => $user) { ?>
                                <option value="<?= $user->id_user ?>" <?= $user->id_user == $sistem->id_user ? 'selected' : null ?>><?= $user->nama_user ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="10%">Fitur</th>
                                    <th width="15%">Pengajuan Pindah</th>
                                    <th width="15%">Statistik DPT</th>
                                    <th width="15%">Peta Sebaran DPT</th>
                                    <th width="15%">Email Info Login</th>
                                    <th width="15%">Registrasi </th>
                                    <th>Persentase Akses</th>
                                </tr>
                                <tr>
                                    <td>Akses</td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input name="f_pindah" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?= $sistem->fitur_pengajuan == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="flexSwitchCheckChecked"> <small><i>Status : <?= $sistem->fitur_pengajuan == 1 ? 'Enable' : 'Disable' ?></i></small> </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input name="f_statistik" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked2" <?= $sistem->fitur_sebaran == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="flexSwitchCheckChecked2"> <small><i>Status : <?= $sistem->fitur_sebaran == 1 ? 'Enable' : 'Disable' ?></i></small> </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input name="f_peta" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked3" <?= $sistem->fitur_statistik == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="flexSwitchCheckChecked3"> <small><i>Status : <?= $sistem->fitur_statistik == 1 ? 'Enable' : 'Disable' ?></i></small> </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input name="f_email" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked4" <?= $sistem->fitur_maillogin == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="flexSwitchCheckChecked4"> <small><i>Status : <?= $sistem->fitur_maillogin == 1 ? 'Enable' : 'Disable' ?></i></small> </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input name="f_register" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked5" <?= $sistem->fitur_registrasi == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="flexSwitchCheckChecked5"> <small><i>Status : <?= $sistem->fitur_registrasi == 1 ? 'Enable' : 'Disable' ?></i></small> </label>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $fitur_on = 0;
                                        if ($sistem->fitur_pengajuan == 1) {
                                            $fitur_on++;
                                        }
                                        if ($sistem->fitur_sebaran == 1) {
                                            $fitur_on++;
                                        }
                                        if ($sistem->fitur_statistik == 1) {
                                            $fitur_on++;
                                        }
                                        if ($sistem->fitur_maillogin == 1) {
                                            $fitur_on++;
                                        }
                                        if ($sistem->fitur_registrasi == 1) {
                                            $fitur_on++;
                                        }  ?>
                                        <?= $fitur_on ?> / 5 (<?= ($fitur_on / 5) * 100 ?>% Open)
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3 d-grid">
                        <button type="submit" name="sistem" class="btn btn-success float-end"> Perbaharui Sistem </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>