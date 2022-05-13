<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="card-title">Account Akses Sistem</h4>
                </div>
                <div class="col-sm-12">
                    <a href="<?= site_url('admin/account/tambah') ?>" class="btn btn-success float-end"><i class="bx bx-plus-circle"></i> Tambah </a>
                </div>
                <div class="col-sm-12 mt-1">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%" id="datatable">
                            <thead>
                                <tr>
                                    <th width="5%"> No </th>
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row->result() as $key => $user) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $user->nama_user ?></td>
                                        <td><?= $user->email_user ?></td>
                                        <td><?= $user->username_user ?></td>
                                        <td><?= $user->level_user == 1 ? '<span class="badge bg-danger">Admin</span>' : '<span class="badge bg-success">Pemilih</span>' ?></td>
                                        <td><?= $user->status_user == 1 ? '<span style="color:green"><i class="bx bx-radio-circle-marked bx-sm bx-burst"></i>Aktif<span>' : '<span style="color:red"><i class="bx bx-radio-circle-marked bx-sm bx-burst"></i>Non-Aktif</span>' ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/account/update/' . $user->id_user) ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                            <a href="<?= site_url('admin/account/delete/' . $user->id_user) ?>" onclick="return confirm('Yakin Menghapus Data Pengguna ?')" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>