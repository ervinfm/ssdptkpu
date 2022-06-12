<?php
$pemilih = get_pemilih_atribut('id_user', profil()->id_user)->row();
$row_pindah = get_pindah_idpemilih($pemilih->id_pemilih, TRUE);
@$pindah = $row_pindah->row();
?>


<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 mt-2">
                    <span class="h4 m-0 p-0">Permohonan Pindah DPT Baru</span>
                    <a href="<?= site_url('dashboard') ?>" class="btn btn-md btn-dark float-end me-1"><i class="bx bx-home"></i> Beranda</a>
                </div>

                <div class="col-sm-6 mt-3">
                    <div class="demo-inline-spacing">
                        <div class="list-group list-group-horizontal-md text-md-center">
                            <?php if ($row_pindah->num_rows() == 0) { ?>
                                <a class="list-group-item list-group-item-action bg-dark <?= $row_pindah->num_rows() == 0 ? 'active' : '' ?>"><i class="bx bx-add-to-queue"></i> Pengajuan Pindah</a>
                                <a class="list-group-item list-group-item-action bg-dark"><i class="bx bx-buildings"></i> Proses KPU</a>
                                <a class="list-group-item list-group-item-action bg-dark "><i class="bx bx-notepad"></i> Hasil Pengajuan</a>
                            <?php } else if ($row_pindah->num_rows() > 0) { ?>
                                <a class="list-group-item list-group-item-action bg-dark <?= @$pindah->status_pindah == 3 ? 'active' : '' ?>"><i class="bx bx-add-to-queue"></i> Pengajuan Pindah</a>
                                <a class="list-group-item list-group-item-action bg-dark <?= @$pindah->status_pindah == 0 ? 'active' : '' ?>"><i class="bx bx-buildings"></i> Proses KPU</a>
                                <a class="list-group-item list-group-item-action bg-dark <?= @$pindah->status_pindah == 1 ? 'active' : (@$pindah->status_pindah == 2 ? 'active' : '') ?>"><i class="bx bx-notepad"></i> Hasil Pengajuan</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <a href="<?= site_url('pengajuan/history') ?>" class="btn btn-md btn-info float-end me-1"><i class="bx bx-history"></i> Riwayat</a>
                </div>
                <?php if ($row_pindah->num_rows() == 0 || @$pindah->status_pindah == 3) { ?>
                    <div class="col-sm-12 mt-3">
                        <div class="row">
                            <div class="col-sm-8 mt-2">
                                <form action="<?= site_url('pengajuan/proses') ?>" method="POST">
                                    <input type="hidden" name="f_kec_asal" value="<?= $pemilih->kecamatan_pemilih ?>">
                                    <input type="hidden" name="f_kel_asal" value="<?= $pemilih->kelurahan_pemilih ?>">
                                    <input type="hidden" name="f_rw_asal" value="<?= $pemilih->rw_pemilih ?>">
                                    <input type="hidden" name="f_rt_asal" value="<?= $pemilih->rt_pemilih ?>">
                                    <input type="hidden" name="f_tps_asal" value="<?= $pemilih->id_tps ?>">

                                    <input type="hidden" name="id_pemilih" value="<?= $pemilih->id_pemilih ?>">
                                    <div class="mb-3">
                                        <span class="h6 m-0 p-0">Formulir Pindah DPT Baru</span>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">Kecamatan *</label>
                                        <div class="col-md-10">
                                            <select name="f_kec" id="f_kec" class="form-control" required>
                                                <option value="">- PILIH KECAMATAN -</option>
                                                <?php foreach (get_kecamatan()->result() as $key => $kec) { ?>
                                                    <option value="<?= $kec->id_kecamatan ?>"><?= '[' . $kec->id_kecamatan . '] ' . $kec->nama_kecamatan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">Kelurahan *</label>
                                        <div class="col-md-10">
                                            <select name="f_kel" id="f_kel" class="form-control" required>
                                                <option value="">- PILIH KELURAHAN -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">RW *</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="f_rw" type="number" placeholder="ex. 1" id="html5-text-input" required>
                                        </div>
                                        <label for="html5-text-input" class="col-md-2 col-form-label">RT *</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="f_rt" type="number" placeholder="ex. 1" id="html5-text-input" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">No. TPS *</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="f_tps" type="number" placeholder="ex. 4" id="html5-text-input" required>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" name="f_pengajuan" class="btn btn-success float-end"><i class="bx bx-message-add"></i> Buat Pengajuan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="3"><strong>DPT Asal</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td><?= $pemilih->kecamatan_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelurahan</td>
                                            <td>:</td>
                                            <td><?= $pemilih->kelurahan_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>RT/RW</td>
                                            <td>:</td>
                                            <td><?= $pemilih->rt_pemilih . '/' . $pemilih->rw_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. TPS</td>
                                            <td>:</td>
                                            <td><?= $pemilih->id_tps ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-12 mt-3">
                        <div class="row">
                            <div class="col-sm-12 mt-2 mb-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="3"><strong>A. Identitas Pemohon Pindah DPT</strong></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">ID Pengajuan</td>
                                            <td width="5%">:</td>
                                            <td><?= $pindah->id_pindah ?></td>
                                        </tr>
                                        <tr>
                                            <td>ID/NIK Pemohon</td>
                                            <td>:</td>
                                            <td><?= $pemilih->nik_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemohon</td>
                                            <td>:</td>
                                            <td><?= $pemilih->nama_pemilih ?></td>
                                        </tr>
                                        <tr>
                                            <td>TTL Pemohon</td>
                                            <td>:</td>
                                            <td><?= $pemilih->lahir_pemilih . ', ' . tgl_indo($pemilih->tgl_lahir_pemilih) . ' (' . get_umur(date('Y-m-d', strtotime($pemilih->tgl_lahir_pemilih))) . ' Tahun)' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pengajuan</td>
                                            <td>:</td>
                                            <td><?= tgl_indo(date('Y-m-d', strtotime($pindah->created_pindah))) . ' ' . date('H:i', strtotime($pindah->created_pindah)) . ' WIB' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pengajuan</td>
                                            <td>:</td>
                                            <td><?= $pindah->status_pindah == 0 ? '<span class="badge bg-warning">diProses</span>' : ($pindah->status_pindah == 1 ? '<span class="badge bg-success">Diterima</span>' : '<span class="badge bg-danger">Ditolak</span>') ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php if (@$pindah->status_pindah == 0) { ?>
                                <div class="col-sm-12">
                                    <div class="alert alert-warning" role="alert">
                                        <i class="bx bx-bell"></i>
                                        Mohon Tunggu, Pengajuan Pindah DPT sedang <strong>DIPROSES</strong> oleh KPU Kota Yogyakarta! <i>Silahkan Menunggu Konfirmasi dari KPU Kota Yogyakarta</i>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td colspan="3"><strong>B. Wilayah DPT Asal</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>:</td>
                                                <td><?= $pemilih->kecamatan_pemilih ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>:</td>
                                                <td><?= $pemilih->kelurahan_pemilih ?></td>
                                            </tr>
                                            <tr>
                                                <td>RT/RW</td>
                                                <td>:</td>
                                                <td><?= $pemilih->rt_pemilih . '/' . $pemilih->rw_pemilih ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. TPS</td>
                                                <td>:</td>
                                                <td><?= $pemilih->id_tps ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td colspan="3"><strong>C. Wilayah DPT Tujuan</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>:</td>
                                                <td><?= @$pindah->kecamatan_pindah ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>:</td>
                                                <td><?= @$pindah->kelurahan_pindah ?></td>
                                            </tr>
                                            <tr>
                                                <td>RT/RW</td>
                                                <td>:</td>
                                                <td><?= @$pindah->rt_pindah . '/' . @$pindah->rw_pindah ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. TPS</td>
                                                <td>:</td>
                                                <td><?= @$pindah->id_tps ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <a href="<?= site_url('pengajuan/batal/' . $pindah->id_pindah) ?>" class="btn btn-danger float-end" onclick="return confirm('Yakin Membatalkan Pengajuan Pindah DPT ?')"><i class="bx bx-x-circle"></i> Batalkan Pengajuan</a>
                                </div>
                            <?php } else if (@$pindah->status_pindah == 1) { ?>
                                <div class="col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <i class="bx bx-bell"></i>
                                        Selamat, Pengajuan Pindah DPT <strong>DITERIMA</strong> oleh KPU Kota Yogyakarta! <i>Silahkan Periksa kembali data DPT Anda</i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <a href="<?= site_url('pengajuan/ulang/' . $pindah->id_pindah) ?>" class="btn btn-success float-end"><i class="bx bx-check-circle"></i> Selesai</a>
                                </div>
                            <?php } else if (@$pindah->status_pindah == 2) { ?>
                                <div class="col-sm-12">
                                    <div class="alert alert-danger" role="alert"><i class="bx bx-bell"></i>
                                        Mohon Maaf, Pengajuan Pindah DPT <strong>DITOLAK</strong> oleh KPU Kota Yogyakarta! <i>Silahkan Periksa Catatan dan Melakukan Pengajuan Kembali</i>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td colspan="3"><strong>DPT Tujuan</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>:</td>
                                                <td><?= @$pindah->kecamatan_pindah ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>:</td>
                                                <td><?= @$pindah->kelurahan_pindah ?></td>
                                            </tr>
                                            <tr>
                                                <td>RT/RW</td>
                                                <td>:</td>
                                                <td><?= @$pindah->rt_pindah . '/' . @$pindah->rw_pindah ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. TPS</td>
                                                <td>:</td>
                                                <td><?= @$pindah->id_tps ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-7 mt-2">
                                    <div style="border-color: black; border-style: solid;border-width: thin; border-radius:10px;padding:15px; padding-right:10px; padding-left:10px">
                                        <div class="row m-3">
                                            <div class="col-sm-12">
                                                <h5 class="">Catatan Petugas : </h5>
                                                <p>
                                                    <?php if ($pindah->note_pindah == '' || $pindah->note_pindah == null || $pindah->note_pindah == '-') {
                                                        echo "<i>Tidak ada Catatan yang diberikan oleh Petugas KPU Kota Yogyakarta!</i>";
                                                    } else {
                                                        echo $pindah->note_pindah;
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <a href="<?= site_url('pengajuan/ulang/' . $pindah->id_pindah) ?>" class="btn btn-success float-end"><i class="bx bx-map-pin"></i> Pengajuan Ulang</a>
                                </div>
                        </div>
                    <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" integrity="sha512-5SUkiwmm+0AiJEaCiS5nu/ZKPodeuInbQ7CiSrSnUHe11dJpQ8o4J1DU/rw4gxk/O+WBpGYAZbb8e17CDEoESw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#f_kec').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= site_url('user/pengajuan/get_kel'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '<option value="">-PILIH KELURAHAN-</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_kelurahan + '>' + data[i].nama_kelurahan + '</option>';
                    }
                    $('#f_kel').html(html);

                }
            });
            return false;
        });

    });
</script>