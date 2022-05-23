<!-- Begin Page Content -->
<div class="container-fluid">
    <div class=" card shadow-sm" style="border-bottom: #315c9a; color: #315c9a;">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h1 class="h3 text-gray-800"><?= $title ?></h1>
                </div>
                <div class="col-auto">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newRoleModal">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Karyawan
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive col-auto mt-3 mb-3">
            <table id="complain" class="table table-striped table-hover table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle" style="text-align: center;">No.</th>
                        <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                        <th class="align-middle" style="text-align: center;">Alamat Email</th>
                        <th class="align-middle" style="text-align: center;">User Role</th>
                        <th class="align-middle" style="text-align: center;">Status Akun</th>
                        <th class="align-middle" style="text-align: center;">Dibuat Pada</th>
                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role_name as $urs) : ?>
                        <tr>
                            <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $urs['name']; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $urs['email']; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $urs['role']; ?></td>
                            <td class="align-middle" style="text-align: center;">
                                <?php if ($urs['is_active'] == 1) : ?>
                                    Aktif
                                <?php else : ?>
                                    Tidak Aktif
                                <?php endif; ?>
                            </td>
                            <td class="align-middle" style="text-align: center;"><?= date('d F Y', $urs['date_created']); ?>
                            </td>
                            <td class="align-middle" style="text-align: center;">
                                <a class="btn btn-warning btn-sm btn-icon mb-1" data-toggle="modal" data-target="#edituser<?PHP echo $urs['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapususer<?PHP echo $urs['id']; ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Karyawan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/adduser'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input autocomplete="off" type="text" class="form-control" name="name" id="name" placeholder="Masukan nama karyawan" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukan email karyawan" required autocomplete="off">
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="password1" value="1234" id="password1" placeholder="Masukan kata sandi" required autocomplete="off">
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="password2" value="1234" id="password2" placeholder="Masukan kata sandi konfirmasi" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($role_name as $usr) : ?>
    <div class="modal fade" id="edituser<?PHP echo $usr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Ubah Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edituser'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="nama" placeholder="Masukan nama" value="<?= $usr['name']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email2" placeholder="Masukan email" value="<?= $usr['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password1" id="password11" placeholder="Masukan Kata sandi" required>
                        </div>
                        <div class="form-group">
                            <label for="roles">Role : </label>
                            <select class="form-control" name="role" id="roles">
                                <?php if ($usr['role_id'] == null) : ?>
                                    <option value="">- Pilih -</option>
                                    <option value="2">Karyawan</option>
                                    <option value="4">Tenant</option>
                                <?php elseif ($usr['role_id'] == 2) : ?>
                                    <option value="2">Karyawan</option>
                                    <option value="">- Pilih -</option>
                                    <option value="4">Tenant</option>
                                <?php elseif ($usr['role_id'] == 3) : ?>
                                    <option value="3">Admin Complain/Permit</option>
                                <?php elseif ($usr['role_id'] == 4) : ?>
                                    <option value="4">Tenant</option>
                                    <option value="">- Pilih -</option>
                                    <option value="2">Karyawan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapususer<?PHP echo $usr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Hapus Data Karaywan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/delete_user/') . $usr['id']; ?>" method="post">
                    <div class="modal-body">
                        <h6 class="text" style="font-weight: bolder;">Anda Yakin Untuk Hapus Akun <strong class="text text-danger"><?php echo $usr['email']; ?></strong> ?</h6>
                        <div class="form-group" hidden>
                            <input type="text" name="email" value="<?= $usr['email']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>