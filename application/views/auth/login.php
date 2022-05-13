<h6 class="font-weight-light">Silahkan Login untuk Mengakses!</h6>
<form action="<?= site_url('proses_auth') ?>" method="POST" class="pt-3">
    <div class="form-floating mb-3">
        <input type="text" name="username" value="<?= $this->session->flashdata('Username') ?>" class="form-control" id="floatingInput" placeholder="Jhon Dei" aria-describedby="floatingInputHelp" required>
        <label for="floatingInput">Username </label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" value="<?= $this->session->flashdata('Password') ?>" class="form-control" id="floatingInput" placeholder="******" aria-describedby="floatingInputHelp" required>
        <label for="floatingInput">Password </label>
        <div id="floatingInputHelp" class="form-text">
            Kami tidak akan pernah membagikan detail Anda dengan orang lain.
        </div>
    </div>

    <div class="mt-3 d-grid">
        <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit" name="login">SIGN IN</button>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
            <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input"> Tetap Login
            </label>
        </div>
        <a href="<?= site_url('forgot') ?>" class="auth-link text-black">Lupa password?</a>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Belum Memiliki Akun?
        <a href="<?= site_url('registrasi') ?>" class="text-primary">Registrasi</a>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Kembali ke Halaman Utama?
        <a href="<?= site_url('') ?>" class="text-primary">Klik Disini</a>
    </div>
</form>