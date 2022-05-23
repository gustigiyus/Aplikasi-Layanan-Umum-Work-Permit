<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-gray-800">Laporan Izin Kerja</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Kelola Izin Kerja</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Izin Kerja</li>
        </ol>
    </nav>

    <!--begin::Search Bar-->
    <div class="col-sm-12 col-md-10 col-lg-10 p-0 mb-3 mx-auto">
        <div class="card text-center">
            <div class="card-header">
                <h2 class="text-dark font-weight-bold mb-0" style="text-decoration: underline;">PENCARIAN</h2>
                <span class="text-dark font-weight-bold">Berdasarkan Tangal Diajukan</span>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-lg-4">
                            <input type="date" class="form-control" name="cari_tanggal_permintaanawal" value="<?= @$_POST['cari_tanggal_permintaanawal'] ?>" required>
                        </div>
                        <div class="col-lg-4">
                            <input type="date" class="form-control" name="cari_tanggal_permintaanakhir" value="<?= @$_POST['cari_tanggal_permintaanakhir'] ?>" required>
                        </div>
                        <div class="col-lg-4 mt-lg-0 mt-sm-3">
                            <button type="submit" class="btn btn-dark font-weight-bold btn-hover-light-dark ml-2 px-sm-4">Cari</button>
                            <a href="<?= base_url('permintaan'); ?>" class="btn btn-danger font-weight-bold btn-hover-light-dark ml-3 px-sm-4">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Search Bar-->

    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font-weight-bold text-primary">Tabel<b> Izin Kerja</b></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="kelola-laporan-izin-kerja-officer" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">Email</th>
                                    <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
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
                                        <td class="align-middle"><?= $comp['email']; ?></td>
                                        <td class="align-middle"><?= $comp['nama']; ?></td>
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
                                            <a href="<?= base_url('kelola_izin_kerja/laporan/detail_laporan/') . $comp['id']; ?>" class="btn btn-success">Lihat Laporan</a>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" alt="" class="img-thumbnail" width="300px">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" alt="" class="img-thumbnail" width="300px">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" alt="" class="img-thumbnail" width="300px">
                        </div>
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