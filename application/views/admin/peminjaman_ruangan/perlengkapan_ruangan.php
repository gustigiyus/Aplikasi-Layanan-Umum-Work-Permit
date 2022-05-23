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

                    <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newAddLnkpRngModal">

                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Perlengkapan Ruangan
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
                        <th class="align-middle" style="text-align: center;">Perlengkapan Ruangan</th>
                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($plngkp_rng as $lngkp_rng) : ?>
                        <tr>
                            <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                            <td class="align-middle" style="text-align: center;"><?= $lngkp_rng['perlengkapan_ruangan']; ?></td>
                            <td class="align-middle" style="text-align: center;">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#newUbhLngkpRngModal<?= $lngkp_rng['id_perlengkapan_ruangan']; ?>">Ubah</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#newHpsLngkpRngModal<?= $lngkp_rng['id_perlengkapan_ruangan']; ?>">Hapus</a>
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
<!-- TAMBAH PERLENGKAPAN RUANGAN BARU -->
<div class="modal fade" id="newAddLnkpRngModal" tabindex="-1" role="dialog" aria-labelledby="newAddLnkpRngModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAddLnkpRngModalLabel">Tambah Perlengkapan Ruangan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administator/adm_peminjaman_ruangan/add_prlngkp_rng'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="prlngkp_rng" id="prlngkp_rng" autocomplete="off" placeholder="Nama Perlengkapan Ruangan">
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

<?php foreach ($plngkp_rng as $lngkp_rng) : ?>
    <!-- UBAH PERLENGKAPAN RUANGAN -->
    <div class="modal fade" id="newUbhLngkpRngModal<?= $lngkp_rng['id_perlengkapan_ruangan']; ?>" tabindex="-1" role="dialog" aria-labelledby="newUbhLngkpRngModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbhLngkpRngModalLabel">Ubah Perlengkapan Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('administator/adm_peminjaman_ruangan/ubh_prlngkp_rng/' . $lngkp_rng['id_perlengkapan_ruangan']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="prlngkp_rng" id="prlngkp_rng" value="<?= $lngkp_rng['perlengkapan_ruangan']; ?>" autocomplete="off" placeholder="Nama Perlengkapan Ruangan">
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
    <!-- HAPUS PERLENGKAPAN RUANGAN -->
    <div class="modal fade" id="newHpsLngkpRngModal<?= $lngkp_rng['id_perlengkapan_ruangan']; ?>" tabindex="-1" role="dialog" aria-labelledby="newHpsLngkpRngModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newHpsLngkpRngModalLabel">Hapus Perlengkapan Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('administator/adm_peminjaman_ruangan/hps_prlngkp_rng/' . $lngkp_rng['id_perlengkapan_ruangan']); ?>" method="post">
                    <div class="modal-body">
                        <h6 class="text" style="font-weight: bolder;">Anda yakin ingin menghapus perlengkapan ruangan <strong class="text text-danger"><?php echo $lngkp_rng['perlengkapan_ruangan']; ?></strong> ?</h6>
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