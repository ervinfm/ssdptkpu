<div class="col-sm-12 mt-2">
    <div class="card mb-4">
        <div class="row">
            <div class="col-sm-10">
                <h5 class="card-header">Profile Details</h5>
            </div>
            <div class="col-sm-2 mt-4">
                <?php if (profil()->level_user == 2) { ?>
                    <a href="<?= site_url('dashboard') ?>" class="btn btn-md btn-dark float-end me-3"><i class="bx bx-home"></i> Beranda</a>
                <?php } ?>
            </div>
        </div>
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="<?= base_url() ?>assets/images/users/<?= profil()->image_user == null ? 'default.png' : profil()->image_user ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                    <form action="<?= site_url('profil/proses') ?>" method="post" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" name="id" value="<?= profil()->id_user ?>">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block"><i class="bx bx-images"></i></span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" name="image" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                        </label>

                        <button type="submit" name="images" class="btn btn-outline-primary account-image-reset mb-4 mr-5">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan Perubahan</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </form>
                    <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 2000KB</p>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <form action="<?= site_url('profil/proses') ?>" method="POST">
                <input type="hidden" name="id" value="<?= profil()->id_user ?>">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="firstName" class="form-label">ID Pengguna *</label>
                        <input class="form-control" type="text" id="firstName" name="firstName" value="<?= profil()->id_user ?>" autofocus="" disabled>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="lastName" class="form-label">Nama Pengguna *</label>
                        <input class="form-control" type="text" name="p_nama" id="lastName" value="<?= profil()->nama_user ?>" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="email" class="form-label">E-mail *</label>
                        <input class="form-control" type="email" id="email" name="p_email" value="<?= profil()->email_user ?>" placeholder="john.doe@example.com" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Username *</label>
                        <input type="text" class="form-control" id="organization" name="p_username" value="<?= profil()->username_user ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Password</label>
                        <input type="password" class="form-control" id="address" name="p_pass" placeholder="kosongkan jika tidak diubah ...">
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" name="profil" class="btn btn-primary me-2">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <!-- /Account -->
    </div>
</div>