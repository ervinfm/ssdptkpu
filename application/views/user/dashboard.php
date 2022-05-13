<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang <?= profil()->nama_user ?>! 🎉</h5>
                                <p class="mb-4">
                                    Pada aplikasi Portal Pemilih yang diselenggarakan oleh KPU Kota Yogyakarta...
                                </p>
                                <a href="<?= site_url('pengajuan') ?>" class="btn btn-sm btn-outline-primary">Lihat Status</a>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?= base_url() ?>assets/templates/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="card-title text-primary">Data Pemilih Kamu <?= profil()->nama_user ?> </h5>
                            </div>
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td width="30%">ID/NIK </td>
                                            <td width="5%">:</td>
                                            <td><?= get_pemilih_atribut('id_user', profil()->id_user)->row()->nik_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Lengkap </td>
                                            <td>:</td>
                                            <td><?= get_pemilih_atribut('id_user', profil()->id_user)->row()->nama_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan </td>
                                            <td>:</td>
                                            <td><?= get_pemilih_atribut('id_user', profil()->id_user)->row()->kecamatan_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelurahan </td>
                                            <td>:</td>
                                            <td><?= get_pemilih_atribut('id_user', profil()->id_user)->row()->kelurahan_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>RT/RW </td>
                                            <td>:</td>
                                            <td><?= get_pemilih_atribut('id_user', profil()->id_user)->row()->rt_pemilih . '/' . get_pemilih_atribut('id_user', profil()->id_user)->row()->rw_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. TPS </td>
                                            <td>:</td>
                                            <td><?= get_pemilih_atribut('id_user', profil()->id_user)->row()->id_tps ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12 mt-2">
                <div class="alert alert-dark mb-0" role="alert">Fitur Utama Portal DPT KPU Yogyakarta</div>
            </div>
            <div class="col-sm-6 mt-4">
                <a href="<?= site_url('pengajuan') ?>">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td class="text-center" width="30%">
                                        <div class=" avatar flex-shrink-0 me-3">
                                            <i class="bx bx-map-pin" style="font-size: 50px;"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <h4 class="card-title text-white mt-2">Pindah Kepemilihan</h4>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 mt-4">
                <a href="<?= site_url('data') ?>">
                    <div class="card bg-dark text-white mb-3">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td class="text-center" width="30%">
                                        <div class=" avatar flex-shrink-0 me-3">
                                            <i class="bx bx-grid" style="font-size: 50px;"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <h4 class="card-title text-white mt-2">Cek Data Kepemilihan</h4>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 mt-2">
                <a href="<?= site_url('statistik') ?>">
                    <div class="card bg-warning text-white mb-3">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td class="text-center" width="30%">
                                        <div class=" avatar flex-shrink-0 me-3">
                                            <i class="bx bx-trending-up" style="font-size: 50px;"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <h4 class="card-title text-white mt-2">Informasi Statistik Pemilih</h4>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 mt-2">
                <a href="<?= site_url('peta') ?>">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td class="text-center" width="30%">
                                        <div class=" avatar flex-shrink-0 me-3">
                                            <i class="bx bx-map-alt" style="font-size: 50px;"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <h4 class="card-title text-white mt-2">Peta Sebaran Pemilih</h4>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>