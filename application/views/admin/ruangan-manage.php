<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="col-lg-12">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Ruangan</a>
        <table id="complain" class="table table-striped table-hover table-bordered table-responsive" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="align-middle" style="text-align: center;">No.</th>
                    <th class="align-middle" style="text-align: center;">Tipe Ruangan</th>
                    <th class="align-middle" style="text-align: center;">Kapasitas</th>
                    <th class="align-middle" style="text-align: center;">Perlengkapan</th>
                    <th class="align-middle" style="text-align: center;">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($ruangan as $r) : ?>
                    <tr>
                        <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $r['tipe_ruangan']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $r['kapasitas_ruangan']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $r['perlengkapan']; ?></td>
                        <td class="align-middle" style="text-align: center;">
                            <a class="btn btn-warning btn-sm btn-icon mb-1" data-toggle="modal" data-target="#edituser<?PHP echo $r['id']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapususer<?PHP echo $r['id']; ?>">
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah User Baru</h5>
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
                    <div class="form-group">
                        <input type="text" class="form-control" name="password1" id="password1" placeholder="Masukan kata sandi" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password2" id="password2" placeholder="Masukan kata sandi konfirmasi" required autocomplete="off">
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
                    <h5 class="modal-title" id="newRoleModalLabel">Ubah User</h5>
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
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?php echo $r['id']; ?>"><?php echo $r['role']; ?></option>
                                <?php endforeach; ?>
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
                    <h5 class="modal-title" id="newRoleModalLabel">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/delete_user/') . $usr['id']; ?>" method="post">
                    <div class="modal-body">
                        <h5 class="text text-danger">Anda Yakin Untuk Hapus Akun <?php echo $usr['email']; ?> ?</h5>
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