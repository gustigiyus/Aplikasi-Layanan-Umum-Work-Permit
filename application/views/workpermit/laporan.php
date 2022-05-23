<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Laporan Izin Kerja</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Workpermit</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Laporan Izin Kerja</a>
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
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <div class="alert-text">Pada Halaman ini anda dapat print semua lembar izin kerja yang telah dibuat dan disetujui oleh <b>Admin </b>.
                </div>
            </div>
            <!--end::Notice-->

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon-folder-1 text-primary"></i>
                        </span>
                        <h3 class="card-label"> Laporan Izin Kerja</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-body table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-head-custom" id="tabel-data-laporan_izin_kerja">
                                        <thead>
                                            <tr>
                                                <th class="align-middle" style="text-align: center;">#</th>
                                                <th class="align-middle" style="text-align: center;">Kontraktor</th>
                                                <th class="align-middle" style="text-align: center;">Penangung Jawab</th>
                                                <th class="align-middle" style="text-align: center;">No Telp Kantor</th>
                                                <th class="align-middle" style="text-align: center;">Deskripsi Pekerjaan</th>
                                                <th class="align-middle" style="text-align: center;">Tanggal Mulai</th>
                                                <th class="align-middle" style="text-align: center;">Tanggal Selesai</th>
                                                <th class="align-middle" style="text-align: center;">Status Kerja</th>
                                                <th class="align-middle" style="text-align: center;">Data Komplain</th>
                                                <th class="align-middle" style="text-align: center;">Data Pekerja</th>
                                                <th class="align-middle" style="text-align: center;">Data Perlengkapan</th>
                                                <th class="align-middle" style="text-align: center;">Data Mulai & Akhir Kerja</th>
                                                <th class="align-middle" style="text-align: center;">Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($izin_kerja as $izn_krj) : ?>
                                                <tr>
                                                    <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['nama_kontraktor']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['nama_penanggung_jawab']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['no_telp_kantor']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['deskripsi_pekerjaan']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['tanggal_dikerjakan']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['tanggal_akhir']; ?></td>

                                                    <?php if ($izn_krj['status_izin_kerja'] == 'Selesai') : ?>
                                                        <td class="align-middle" style="text-align: center;">
                                                            <div class="d-flex flex-column w-100 mr-2">
                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Complain telah selesai dikerjakan" class="badge badge-success"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                                </div>
                                                                <div class="progress progress-xs w-100">
                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td class="align-middle" style="text-align: center;">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailComplain<?= $izn_krj['id_complain']; ?>">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td class="align-middle" style="text-align: center;">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailPekerjaan<?= $izn_krj['id_complain']; ?>">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td class="align-middle" style="text-align: center;">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailLainnya<?= $izn_krj['id_complain']; ?>">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td class="align-middle" style="text-align: center;">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailMulaiAkhirKerja<?= $izn_krj['id_complain']; ?>">
                                                            Detail
                                                        </button>
                                                    </td>

                                                    <td class="align-middle" style="text-align: center;">
                                                        <!-- Ubah Status Admin Complain -->
                                                        <a href="<?= base_url('laporan/pdf/') . $izn_krj['id_complain']; ?>" class="btn btn-lg btn-icon btn-light-primary">
                                                            <i class="flaticon2-printer"></i>
                                                        </a>
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
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<!-- Modal view detail Complain-->
<?php foreach ($complain as $comp) : ?>
    <div class="modal fade" id="DetailComplain<?= $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewLabelcomplain">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="myModalViewLabelcomplain">Data Komplain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="<?= $comp['email']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Lengkap</label>
                            <input type="nama" class="form-control" id="nama" value="<?= $comp['nama']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="judul">Judul Komplain</label>
                            <input type="text" class="form-control" id="judul" value="<?= $comp['judul_complain']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="deksripsi">Deskripsi</label>
                            <textarea class="form-control" rows="3" readonly><?= $comp['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="deksripsi">Lokasi Pekerjaan</label>
                            <textarea class="form-control" rows="3" readonly><?= $comp['lokasi_pekerjaan']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="keadaan">Tingkat Bahaya</label>
                            <input type="text" class="form-control" id="keadaan" value="<?= $comp['tingkat_bahaya']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bahaya">Tingkat Bahaya</label>
                            <input type="text" class="form-control" id="bahaya" value="<?= $comp['keadaan']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="validationTooltipUsername">Tanggal Diajukan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="validationTooltipUsername" value="<?= $comp['tanggal_ajukan']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <label class="control-label font-weight-bold" style="display: block; height:50px; line-height:50px; text-align:center; font-size:20px;"> Gambar Komplain</label>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-6 m-auto">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" class="img-thumbnail" width="300px">
                        </div>
                        <div class="form-group col-md-4 col-sm-6 m-auto">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" class="img-thumbnail" width="300px">
                        </div>
                        <div class="form-group col-md-4 col-sm-6 m-auto">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" class="img-thumbnail" width="300px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--  End Modal -->


<!-- Modal view detail Pekerjaan Dan Lainnya-->
<?php foreach ($izin_kerja as $i) : ?>

    <!-- Modal view detail Pekerjaan -->
    <div class="modal fade" id="DetailPekerjaan<?= $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Data Pekerja</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive" style="color: black;">
                                <table class="table table-hover table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">NO.</th>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">Nama Pekerja</th>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">Jenis Pekerjaan</th>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">Lokasi Pekerjaan</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $data['pekerja'] = $this->db->get_where('tb_tenaga_kerja', ['id_izin_kerja' => $i['id']])->result_array();
                                    $a = 1;
                                    ?>
                                    <?php foreach ($data['pekerja'] as $pkj) : ?>
                                        <tbody>
                                            <td class="align-middle" style="text-align: center; vertical-align: middle;"><?= $a; ?></td>
                                            <td class="align-middle" style="text-align: center; vertical-align: middle;"><?= $pkj['nama_pekerja']; ?></td>
                                            <td class="align-middle" style="text-align: center; vertical-align: middle;"><?= $pkj['jenis_pekerjaan']; ?></td>
                                            <td class="align-middle" style="text-align: center; vertical-align: middle;"><?= $pkj['lokasi_pekerjaan']; ?></td>
                                        </tbody>
                                        <?php $a++; ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal view detail lainnya(potensi,tindak,apd)-->
    <div class="modal fade" id="DetailLainnya<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="detaiilLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="detaiilLabel">Data Lainnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Jenis Potensi-->
                    <h5 class="title" id="detaiilLabel">Detail Jenis Potensi</h5>
                    <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <th style="text-align:center; vertical-align:middle;">NO.</th>
                            <th style="text-align:center; vertical-align:middle;">Nama Jenis Potensi</th>
                        </thead>
                        <?php
                        $id = $i['id'];
                        $query = "SELECT *
                        FROM `tb_master_jenis_potensi` JOIN `tb_jenis_potensi`
                        ON `tb_master_jenis_potensi`.`id_master_JP` = `tb_jenis_potensi`.`id_JP`
                        WHERE `id_izin_kerja` = $id";
                        $data['select'] = $this->db->query($query)->result_array();
                        $a = 1;
                        ?>
                        <?php foreach ($data['select'] as $slt) : ?>
                            <tbody>
                                <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?= $slt['nama_Jenis_Potensi']; ?></td>
                            </tbody>
                            <?php $a++; ?>
                        <?php endforeach; ?>
                    </table>

                    <!--Tindak Pencegahan-->
                    <h5 class="title" id="myModalViewDetailLabel">Detail Tindak Pencegahan</h5>
                    <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <th style="text-align:center; vertical-align:middle;">NO.</th>
                            <th style="text-align:center; vertical-align:middle;">Nama Tindak Pencegahan</th>
                        </thead>
                        <?php
                        $id = $i['id'];
                        $query = "SELECT *
                          FROM `tb_master_tindak_pencegahan` JOIN `tb_tindak_pencegahan`
                          ON `tb_master_tindak_pencegahan`.`id_master_TP` = `tb_tindak_pencegahan`.`id_tindak_pencegahan`
                          WHERE `id_izin_kerja` = $id";
                        $data['select'] = $this->db->query($query)->result_array();
                        $a = 1;
                        ?>
                        <?php foreach ($data['select'] as $slt) : ?>
                            <tbody>
                                <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?= $slt['nama_tindak_pencegahan']; ?></td>
                            </tbody>
                            <?php $a++; ?>
                        <?php endforeach; ?>
                    </table>

                    <!--APD-->
                    <h5 class="title" id="myModalViewDetailLabel">Detail APD</h5>
                    <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <th style="text-align:center; vertical-align:middle;">NO.</th>
                            <th style="text-align:center; vertical-align:middle;">Nama APD</th>
                            <th style="text-align:center; vertical-align:middle;">Gambar APD</th>
                        </thead>
                        <?php
                        $id = $i['id'];
                        $query = "SELECT *
                          FROM `tb_master_apd` JOIN `tb_apd`
                          ON `tb_master_apd`.`id_master_APD` = `tb_apd`.`id_APD`
                          WHERE `id_izin_kerja` = $id";
                        $data['select'] = $this->db->query($query)->result_array();
                        ?>
                        <?php $a = 1; ?>
                        <?php foreach ($data['select'] as $slt) : ?>
                            <tbody>
                                <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?= $slt['nama_APD']; ?></td>
                                <td style="text-align:center; vertical-align:middle;">
                                    <img src="<?= base_url()  ?>assets/img/workpermit/<?= $slt['gambar_apd']; ?>" class="img-thumbnail" width="200" height="150">
                                </td>
                            </tbody>
                            <?php $a++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal view detail Pekerjaan -->
    <div class="modal fade" id="DetailMulaiAkhirKerja<?= $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Data Mulai & Akhir Kerja</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive" style="color: black;">
                                <table class="table table-hover table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">No.</th>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">Gambar Sebelum Kerja</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $data['mulai_kerja'] = $this->db->get_where('tb_mulai_kerja', ['id_izin_kerja' => $i['id']])->result_array();
                                    $a = 1;
                                    ?>
                                    <?php foreach ($data['mulai_kerja'] as $m_krj) : ?>
                                        <tbody>
                                            <td class="align-middle" style="text-align: center; vertical-align: middle;"><?= $a; ?></td>
                                            <td class="align-middle" style="text-align: center;">
                                                <img src="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $m_krj['gambar']; ?>" class="img-thumbnail" width="300px">
                                            </td>
                                        </tbody>
                                        <?php $a++; ?>
                                    <?php endforeach; ?>
                                </table>

                                <table class="table table-hover table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">No.</th>
                                            <th class="align-middle" style="text-align: center; vertical-align: middle;">Gambar Sesudah Kerja</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $data['akhir_kerja'] = $this->db->get_where('tb_akhir_kerja', ['id_izin_kerja' => $i['id']])->result_array();
                                    $a = 1;
                                    ?>
                                    <?php foreach ($data['akhir_kerja'] as $a_krj) : ?>
                                        <tbody>
                                            <td class="align-middle" style="text-align: center; vertical-align: middle;"><?= $a; ?></td>
                                            <td class="align-middle" style="text-align: center;">
                                                <img src="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $a_krj['gambar']; ?>" class="img-thumbnail" width="300px">
                                            </td>
                                        </tbody>
                                        <?php $a++; ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!--  End Modal -->