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

                    <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newJnsPrmnLynModal">

                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Jenis Permintaan Layanan
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
                        <th class="align-middle" style="text-align: center;">Jenis Permintaan Layanan</th>
                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jns_prmn_lyn as $jns_lyn) : ?>
                        <tr>
                            <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $jns_lyn['jenis_permintaan_layanan']; ?></td>
                            <td class="align-middle" style="text-align: center;">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#newUbhJnsPrmnLynModal<?= $jns_lyn['id_jenis_layanan']; ?>">Ubah</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#newHpsJnsPrmnLynModal<?= $jns_lyn['id_jenis_layanan']; ?>">Hapus</a>
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

<!-- Begin:Modal -->
<!-- TAMBAH JENIS PERMINTAAN LAYANAN BARU -->
<div class="modal fade" id="newJnsPrmnLynModal" tabindex="-1" role="dialog" aria-labelledby="newJnsPrmnLynModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newJnsPrmnLynModalLabel">Tambah Jenis Permintaan Layanan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administator/adm_layanan_umum/add_jns_prm_lyn'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="jns_prm_lyn" id="jns_prm_lyn" autocomplete="off" placeholder="Nama Jenis Permintaan Layanan">
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

<?php foreach ($jns_prmn_lyn as $jns_lyn) : ?>
    <!-- UBAH JENIS PERMINTAAN LAYANAN -->
    <div class="modal fade" id="newUbhJnsPrmnLynModal<?= $jns_lyn['id_jenis_layanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="newUbhJnsPrmnLynModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbhJnsPrmnLynModalLabel">Ubah Jenis Permintaan Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('administator/adm_layanan_umum/ubh_jns_prm_lyn/' . $jns_lyn['id_jenis_layanan']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="jns_prm_lyn" id="jns_prm_lyn" value="<?= $jns_lyn['jenis_permintaan_layanan']; ?>" autocomplete="off" placeholder="Nama Jenis Permintaan Layanan">
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
    <!-- HAPUS JENIS PERMINTAAN LAYANAN -->
    <div class="modal fade" id="newHpsJnsPrmnLynModal<?= $jns_lyn['id_jenis_layanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="newHpsJnsPrmnLynModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newHpsJnsPrmnLynModalLabel">Hapus Jenis Permintaan Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('administator/adm_layanan_umum/hps_jns_prm_lyn/' . $jns_lyn['id_jenis_layanan']); ?>" method="post">
                    <div class="modal-body">
                        <h6 class="text" style="font-weight: bolder;">Anda yakin ingin menghapus jenis permintaan layanan <strong class="text text-danger"><?php echo $jns_lyn['jenis_permintaan_layanan']; ?></strong> ?</h6>
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
<!-- End Modal -->