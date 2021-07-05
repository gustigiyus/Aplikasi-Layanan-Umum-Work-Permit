<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow-sm" style="border-bottom: #315c9a; color: #315c9a;">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h1 class="h3 text-gray-800"><?= $title ?></h1>
                </div>
                <div class="col-auto">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal"
                        data-target="#newatasanModal">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah atasan
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-3 col-auto">
            <table id="complain" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle" style="text-align: center;">No.</th>
                        <th class="align-middle" style="text-align: center;">Nama Atasan</th>
                        <th class="align-middle" style="text-align: center;">Email Atasan</th>
                        <th class="align-middle" style="text-align: center;">Nomor Atasan</th>
                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($atasan as $r) : ?>
                    <tr>
                        <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $r['nama_atasan']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $r['em_atasan']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $r['no_atasan']; ?></td>
                        <td class="align-middle" style="text-align: center;">
                            <a class="btn btn-warning btn-sm btn-icon mb-1" data-toggle="modal"
                                data-target="#edituser<?PHP echo $r['id_atasan']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal"
                                data-target="#hapususer<?PHP echo $r['id_atasan']; ?>">
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
<div class="modal fade" id="newatasanModal" tabindex="-1" role="dialog" aria-labelledby="newatasanModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newatasanModalLabel">Tambah atasan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addatasan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Atasan</label>
                        <input autocomplete="off" type="text" class="form-control" name="nama_atasan" id="nama_atasan"
                            placeholder="Masukan Nama Atasan" required>
                    </div>
                    <div class="form-group">
                        <label>Email Atasan</label>
                        <input type="text" class="form-control" name="em_atasan" id="em_atasan"
                            placeholder="Masukan Email Atasan" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nomor Atasan</label>
                        <input type="text" class="form-control" name="no_atasan" id="em_atasan"
                            placeholder="Masukan Nomor Atasan" required autocomplete="off">
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
<?php foreach ($atasan as $r) : ?>
<div class="modal fade" id="edituser<?PHP echo $r['id_atasan']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newatasanModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newatasanModalLabel">Ubah Detail atasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/editatasan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Atasan</label>
                        <input type="text" class="form-control" name="nama_atasan" id="nama"
                            placeholder="Masukan Nama Atasan" value="<?= $r['nama_atasan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email Atasan</label>
                        <input type="text" class="form-control" name="em_atasan" id="em"
                            placeholder="Masukan Email Atasan" value="<?= $r['em_atasan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Atasan</label>
                        <input type="text" class="form-control" name="no_atasan" id="no"
                            placeholder="Masukan Nomor Atasan" value="<?= $r['no_atasan']; ?>">
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
<div class="modal fade" id="hapususer<?PHP echo $r['id_atasan']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newatasanModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newatasanModalLabel">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/delete_atasan/') . $r['id_atasan']; ?>" method="post">
                <div class="modal-body">
                    <h5 class="text text-danger">Anda Yakin Untuk Hapus atasan <?php echo $r['nama_atasan']; ?> ?</h5>
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