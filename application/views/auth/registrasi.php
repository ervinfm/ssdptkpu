<h6 class="font-weight-light">Silahkan Daftarkan Akun Pengguna!</h6>
<div class="row">
    <?php if (@$row) { ?>
        <div class="col-sm-10 offset-sm-1">
            <div class="card bg-dark ">
                <div class="card-body text-white">
                    <table width="100%">
                        <tr>
                            <td width="25%" rowspan="2">
                                <div class="avatar flex-shrink-0 text-white">
                                    <i class="bx bx-user bx-sm bx-border-circle"></i>
                                </div>
                            </td>
                            <td><span class="text-white h5 m-0 p-0"><?= substr(@$row->nama_pemilih, 0, 12) ?></span></td>
                        </tr>
                        <tr>
                            <td><span class="text-white h6 m-0 p-0"><?= @$row->nik_pemilih ?></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <form action="<?= site_url('registrasi/proses') ?>" method="POST" class="pt-3">
                <input type="hidden" name="id" value="<?= @$row->nik_pemilih ?>">
                <input type="hidden" name="nama" value="<?= @$row->nama_pemilih ?>">
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" name="u_email" value="<?= @$this->session->flashdata('Email') ?>" class="form-control" id="floatingInput" placeholder="Jhon@mail.com" aria-describedby="floatingInputHelp" required>
                        <label for="floatingInput">Alamat Email</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="u_user" value="<?= @$this->session->flashdata('Username') ?>" class="form-control" id="floatingInput" placeholder="Jhon123" aria-describedby="floatingInputHelp" required>
                        <label for="floatingInput">Username Baru</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="u_pass" value="<?= @$this->session->flashdata('Password') ?>" class="form-control" id="floatingInput" placeholder="Jhon123" aria-describedby="floatingInputHelp" required>
                        <label for="floatingInput">Password Baru</label>
                    </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary d-grid w-100">Daftar</button>
            </form>
        </div>
        <div class="col-sm-12 mt-3">
            <p class="text-center">
                <span>Bukan Data Anda?</span>
                <a href="<?= site_url('registrasi') ?>">
                    <span>Ulangi Pencarian</span>
                </a>
            </p>
        </div>
    <?php } else { ?>
        <div class="col-sm-12">
            <form action="<?= site_url('registrasi') ?>" method="POST">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nameBasic" class="form-label">Cek NIK/ID/NAMA terdaftar *</label>
                        <div class="input-group">
                            <input type="text" name="key" value="<?= @$this->session->flashdata('Key') ?>" class="form-control" placeholder="nik/id/nama" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <button class="btn btn-outline-primary" type="submit" name="cari" value="on" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
    <div class="col-sm-12 mt-1">
        <p class="text-center">
            <span>Sudah Punya Akun?</span>
            <a href="<?= site_url() ?>">
                <span>Login Disini</span>
            </a>
        </p>
    </div>
</div>