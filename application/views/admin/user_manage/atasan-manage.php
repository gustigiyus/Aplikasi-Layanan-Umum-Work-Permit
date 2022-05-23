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

                    <a href="" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#newatasanModal">
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
        <div class="table-responsive mt-3 mb-3 col-auto">
            <table id="complain" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle" style="text-align: center;">No.</th>
                        <th class="align-middle" style="text-align: center;">Nama Atasan</th>
                        <th class="align-middle" style="text-align: center;">Email Atasan</th>
                        <th class="align-middle" style="text-align: center;">Divisi</th>
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
                            <td class="align-middle" style="text-align: center;"><?= $r['email']; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $r['divisi']; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $r['kode_atasan']; ?></td>
                            <td class="align-middle" style="text-align: center;">
                                <a class="btn btn-warning btn-sm btn-icon mb-1" data-toggle="modal" data-target="#edituser<?PHP echo $r['id_atasan']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapususer<?PHP echo $r['id_atasan']; ?>">
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
                        <label style="color: black; float: left;">Nama Atasan</label>
                        <input autocomplete="off" type="text" class="form-control" name="nama_atasan" id="nama_atasan" placeholder="Masukan Nama Atasan" required>
                    </div>
                    <div class="form-group">
                        <label style="color: black; float: left;">Email Atasan</label>
                        <input type="text" class="form-control" name="em_atasan" id="em_atasan" placeholder="Masukan Email Atasan" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="divisi" style="color: black; float: left;">Divisi</label>
                        <select class="form-control" name="divisi" required>
                            <option value="">Pilih Divisi</option>
                            <option value="MSDM">MSDM</option>
                            <option value="Jaringan">Jaringan</option>
                            <option value="Sekretaris">Sekretaris</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color: black; float: left;">Nomor Atasan</label>
                        <input type="text" class="form-control" name="no_atasan" id="no_atasan" placeholder="Masukan Nomor Atasan" required autocomplete="off">
                    </div>
                    <div class="form-group" hidden>
                        <label>Password</label>
                        <input type="text" class="form-control" name="password_atasan" id="password_atasan" value="1234" required autocomplete="off">
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
    <div class="modal fade" id="edituser<?PHP echo $r['id_atasan']; ?>" tabindex="-1" role="dialog" aria-labelledby="newatasanModalLabel">
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
                            <input type="text" class="form-control" name="nama_atasan" id="nama" placeholder="Masukan Nama Atasan" value="<?= $r['nama_atasan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email Atasan</label>
                            <input type="text" class="form-control" name="em_atasan" id="em" placeholder="Masukan Email Atasan" value="<?= $r['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="divisi" style="color: black; float: left;">Divisi</label>
                            <select class="form-control" name="divisi" required>
                                <?php if ($r['divisi'] == null) : ?>
                                    <option value="">- Pilih Divisi -</option>
                                    <option value="MSDM">MSDM</option>
                                    <option value="Jaringan">Jaringan</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                <?php elseif ($r['divisi'] == "MSDM") : ?>
                                    <option value="MSDM">MSDM</option>
                                    <option value="">- Pilih Divisi -</option>
                                    <option value="Jaringan">Jaringan</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                <?php elseif ($r['divisi'] == "Jaringan") : ?>
                                    <option value="Jaringan">Jaringan</option>
                                    <option value="">- Pilih Divisi -</option>
                                    <option value="MSDM">MSDM</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                <?php elseif ($r['divisi'] == "Sekretaris") : ?>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="">- Pilih Divisi -</option>
                                    <option value="MSDM">MSDM</option>
                                    <option value="Jaringan">Jaringan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nomor Atasan</label>
                            <input type="text" class="form-control" name="no_atasan" id="no" placeholder="Masukan Nomor Atasan" value="<?= $r['kode_atasan']; ?>">
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
    <div class="modal fade" id="hapususer<?PHP echo $r['id_atasan']; ?>" tabindex="-1" role="dialog" aria-labelledby="newatasanModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newatasanModalLabel">Hapus Atasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/delete_atasan/') . $r['id_atasan']; ?>" method="post">
                    <div class="modal-body">
                        <h6 class="text" style="font-weight: bolder;">Anda Yakin Untuk Hapus atasan <strong class="text text-danger"><?php echo $r['nama_atasan']; ?></strong> ?</h6>
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