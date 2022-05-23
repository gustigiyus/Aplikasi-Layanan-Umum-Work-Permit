<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Laporan Komplain</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Layanan Umum</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Laporan Komplain</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Search Bar-->
    <div class="d-flex align-items-md-center align-items-sm-center flex-column">
        <div class="d-flex mb-5 p-6 flex-column rounded" style="background-color: #F0F8FF; background-size: auto 100%; background-repeat: no-repeat; background-position: right bottom; background-image: url(<?= base_url('assets_pengguna/') ?>media/svg/patterns/taieri.svg)">
            <div class="d-flex align-items-sm-center flex-sm-row mb-2 flex-column">
                <h2 class="d-flex text-dark font-weight-boldest mr-5 mb-0">PENCARIAN</h2>
                <span class="text-dark opacity-60 font-weight-bold">Berdasarkan Tangal Pengajuan</span>
            </div>
            <div class="d-flex bg-white rounded p-4 flex-column">
                <!--begin::Form-->
                <form action="" method="post" class="form d-flex flex-column flex-sm-row">
                    <!--begin::Input-->
                    <div class="py-sm-0 px-sm-3">
                        <input type="date" class="form-control" name="cari_tanggal_permintaanawal" value="<?= @$_POST['cari_tanggal_permintaanawal'] ?>" required>
                    </div>
                    <!--end::Input-->
                    <!--begin::Input-->
                    <div class="py-sm-0 px-sm-3">
                        <input type="date" class="form-control" name="cari_tanggal_permintaanakhir" value="<?= @$_POST['cari_tanggal_permintaanakhir'] ?>" required>
                    </div>
                    <!--end::Input-->
                    <button type="submit" class="btn btn-dark font-weight-bold btn-hover-light-dark ml-2 px-sm-5">Cari</button>
                    <a href="<?= base_url('permintaan/laporan'); ?>" class="btn btn-danger font-weight-bold btn-hover-light-dark ml-3 px-sm-5">Reset</a>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Search Bar-->


    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon-folder-1 text-primary"></i>
                        </span>
                        <h3 class="card-label"> Tabel Laporan Komplain</h3>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="tabel_data_laporan_complain_karyawan">
                        <thead>
                            <tr>
                                <th class="align-middle" style="text-align: center;">#</th>
                                <th class="align-middle" style="text-align: center;">Judul Komplain</th>
                                <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                <th class="align-middle" style="text-align: center;">Keadaan</th>
                                <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                <th class="align-middle" style="text-align: center;">Gambar</th>
                                <th class="align-middle" style="text-align: center;">Status</th>
                                <th class="align-middle" style="text-align: center;">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($complain as $comp) : ?>
                                <tr>
                                    <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['judul_complain']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['deskripsi']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['keadaan']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['tingkat_bahaya']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['tanggal_ajukan']; ?></td>
                                    <td class="align-middle" style="text-align: center;">
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaldetailfoto<?PHP echo $comp['id']; ?>">
                                            <i class="fas fa-binoculars"></i> Lihat
                                        </a>
                                    </td>

                                    <!-- Status Buat Karyawan -->
                                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                        <?php if ($comp['status_complain'] == 'Selesai') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain telah Selesai" class="badge badge-dark"><?= $comp['status_complain']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <td class="align-middle" style="text-align: center;">
                                        <!-- Ubah Status Admin Complain -->
                                        <a href="<?= base_url('laporan/index/') . $comp['id']; ?>" class="btn btn-success btn-sm"> Laporan</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<!-- Modal Gambar-->
<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" id="myModaldetailfoto<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
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