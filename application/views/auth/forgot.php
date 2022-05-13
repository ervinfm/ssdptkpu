<h6 class="font-weight-light">Silahkan Mengisi data dibawah ini!</h6>
<form action="<?= site_url('forgot') ?>" method="POST" class="pt-3">
    <?php if (@$row) { ?>
        <input type="hidden" name="id" value="<?= $row->id_user ?>">
        <div class="form-floating mb-3">
            <input type="email" value="<?= $row->email_user ?>" class="form-control" id="floatingInput" placeholder="Jhon@mail.com" aria-describedby="floatingInputHelp" disabled>
            <label for="floatingInput">Email Anda </label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="new_username" value="<?= $row->username_user ?>" class="form-control" id="floatingInput" placeholder="Jhon die" aria-describedby="floatingInputHelp" required>
            <label for="floatingInput">Username Anda</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="new_pass" class="form-control" id="floatingInput" placeholder=" ******** " aria-describedby="floatingInputHelp" required>
            <label for="floatingInput">Password Anda</label>
            <div id="floatingInputHelp" class="form-text">
                Anda dapat mengganti username dan/atau password akun anda
            </div>
        </div>
        <div class="mt-3 d-grid">
            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit" name="proses">Update Account</button>
        </div>
    <?php } else { ?>
        <div class="form-floating mb-3">
            <input type="email" name="email" value="<?= $this->session->flashdata('Email') ?>" class="form-control" id="floatingInput" placeholder="Jhon@mail.com" aria-describedby="floatingInputHelp" required>
            <label for="floatingInput">Email Anda </label>
            <div id="floatingInputHelp" class="form-text">
                Link Lupa Akun/Password akan dikirimkan ke email anda
            </div>
        </div>
        <div class="mt-3 d-grid">
            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit" name="forgot">Send Link Forgot To Email</button>
        </div>
    <?php } ?>

    <div class="text-center mt-4 font-weight-light">
        Sudah Memiliki Akun?
        <a href="<?= site_url() ?>" class="text-primary">Login</a>
    </div>
</form>