<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font-weight-bold text-primary">Tables<b> <?= $title ?></b></h2>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <div class="btn-group" data-toggle="buttons">
                                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                        <div class="mr-3">
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#AddComplainModal"><i class="fas fa-plus-circle"> Complain</i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="Complain" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                                        <th class="align-middle" style="text-align: center;">Email</th>
                                        <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                    <?php endif; ?>
                                    <th class="align-middle" style="text-align: center;">Judul Complain</th>
                                    <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                    <th class="align-middle" style="text-align: center;">Keadaan</th>
                                    <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                    <th class="align-middle" style="text-align: center;">Gambar</th>
                                    <th class="align-middle" style="text-align: center;">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complain as $comp) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $i; ?></td>

                                        <!-- Lihat data Email & Nama Buat Admin Complain -->
                                        <?php if ($this->session->userdata('role_id') == 3) : ?>
                                            <td class="align-middle"><?= $comp['email']; ?></td>
                                            <td class="align-middle"><?= $comp['nama']; ?></td>
                                        <?php endif; ?>

                                        <td class="align-middle"><?= $comp['judul_complain']; ?></td>
                                        <td class="align-middle"><?= $comp['deskripsi']; ?></td>
                                        <td class="align-middle"><?= $comp['keadaan']; ?></td>
                                        <td class="align-middle"><?= $comp['tingkat_bahaya']; ?></td>
                                        <td class="align-middle"><?= $comp['tanggal_ajukan']; ?></td>
                                        <td class="align-middle">
                                            <div class="float-right">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#myModaldetailfotoADMIN<?PHP echo $comp['id']; ?>">
                                                    Detail
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <!-- Ubah Status Admin Complain -->
                                            <a href="<?= base_url('laporan/index/') . $comp['id']; ?>" class="btn btn-success">Lihat Laporan</a>
                                        </td>
                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Gambar-->
<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" id="myModaldetailfotoADMIN<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Detail Gambar</h4>
                </div>
                <div class="modal-body">
                    <div class="fg-gallery cols-3">
                        <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" alt="">
                        <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" alt="">
                        <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->
<?php endforeach; ?>