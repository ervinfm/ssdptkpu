<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mt-2">
                        <span class="h4 m-0 p-0">Data Daftar Pemilih Tetap Kamu</span>
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-md btn-dark float-end me-1"><i class="bx bx-home"></i> Beranda</a>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3"><strong>A. Data Pemilih Tetap</strong></td>
                                </tr>
                                <tr>
                                    <td width="25%">ID/NIK</td>
                                    <td width="3%">:</td>
                                    <td><?= $row->nik_pemilih ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td><?= $row->nama_pemilih ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat/Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $row->lahir_pemilih . ', ' . tgl_indo(date('Y-m-d', strtotime($row->tgl_lahir_pemilih)), FALSE) . ' (' . get_umur(date('Y-m-d', strtotime($row->tgl_lahir_pemilih))) . ' Tahun)' ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $row->gender_pemilih == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
                                </tr>
                                <tr>
                                    <td>Berkebutuhan Khusus </td>
                                    <td>:</td>
                                    <td><?= $row->difable_pemilih == 0 ? '<span class="badge bg-success">Negatif</span>' : '<span class="badge bg-danger">Positif</span>' ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $row->alamat_pemilih ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3"><strong>B. Data Domisili dan TPS</strong></td>
                                </tr>
                                <tr>
                                    <td width="25%">Nama Kecamatan</td>
                                    <td width="3%">:</td>
                                    <td>Kecamatan <?= $row->kecamatan_pemilih ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Kelurahan</td>
                                    <td>:</td>
                                    <td>Kelurahan <?= $row->kelurahan_pemilih ?></td>
                                </tr>
                                <tr>
                                    <td>RT/RW</td>
                                    <td>:</td>
                                    <td>RT <?= $row->rt_pemilih . '/ RW ' . $row->rw_pemilih ?></td>
                                </tr>
                                <tr>
                                    <td>No. TPS</td>
                                    <td>:</td>
                                    <td><?= $row->id_tps ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?= $row->id_tps != null ? '<span class="badge bg-success"><i class="bx bx-check-double" ></i>Terverifikasi</span>' : '<span class="badge bg-danger"><i class="bx bx-x-circle"></i>Belum Verifikasi</span>' ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>