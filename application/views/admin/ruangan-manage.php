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

                    <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal"
                        data-target="#newRuanganModal">

                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Ruangan
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
                        <td class="align-middle" style="text-align: center;"><?= $r['kapasitas_ruangan']; ?>
                        </td>
                        <td class="align-middle" style="text-align: center;"><?= $r['perlengkapan']; ?></td>
                        <td class="align-middle" style="text-align: center;">
                            <a class="btn btn-warning btn-sm btn-icon mb-1" data-toggle="modal"
                                data-target="#edituser<?PHP echo $r['id_master_ruangan']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal"
                                data-target="#hapususer<?PHP echo $r['id_master_ruangan']; ?>">
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
<div class="modal fade" id="newRuanganModal" tabindex="-1" role="dialog" aria-labelledby="newRuanganModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRuanganModalLabel">Tambah Ruangan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addruangan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipe Ruangan</label>
                        <input autocomplete="off" type="text" class="form-control" name="tipe_ruangan" id="tipe_ruangan"
                            placeholder="Masukan Tipe Ruangan" required>
                    </div>
                    <div class="form-group">
                        <label>Kapasitas Ruangan</label>
                        <input type="text" class="form-control" name="kapasitas_ruangan" id="kapasitas_ruangan"
                            placeholder="Masukan Kapasitas Ruangan" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Perlengkapan Ruangan</label><br>
                        <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px" value="AC">AC</input>
                        <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px"
                            value="Kursi Susun">Kursi
                        Susun</input>
                        <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px"
                            value="Meja Rapat">Meja
                        Rapat</input><br>
                        <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px"
                            value="Screen">Screen</input>
                        <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px"
                            value="Sound System">Sound
                        System</input>
                        <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px"
                            value="Kabel Power">Kabel
                        Power</input>
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
<?php foreach ($ruangan as $r) : ?>
<div class="modal fade" id="edituser<?PHP echo $r['id_master_ruangan']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newRuanganModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRuanganModalLabel">Ubah Detail Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/editruangan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipe Ruangan</label>
                        <input type="text" class="form-control" name="tipe_ruangan" id="tipe"
                            placeholder="Masukan Tipe Ruangan" value="<?= $r['tipe_ruangan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kapasitas Ruangan</label>
                        <input type="text" class="form-control" name="kapasitas_ruangan" id="kapasitas"
                            placeholder="Masukan Kapasitas Ruangan" value="<?= $r['kapasitas_ruangan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Perlengkapan Ruangan</label>
                        <input type="text" class="form-control" name="perlengkapan" id="perlengkapan"
                            placeholder="Masukan Kapasitas Ruangan (ex: AC, Kursi Susun, Kabel Power)"
                            value="<?= $r['perlengkapan']; ?>">
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
<div class="modal fade" id="hapususer<?PHP echo $r['id_master_ruangan']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newRuanganModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRuanganModalLabel">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/delete_ruangan/') . $r['id_master_ruangan']; ?>" method="post">
                <div class="modal-body">
                    <h5 class="text text-danger">Anda Yakin Untuk Hapus Ruangan
                        <?php echo $r['tipe_ruangan']; ?> ?</h5>
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