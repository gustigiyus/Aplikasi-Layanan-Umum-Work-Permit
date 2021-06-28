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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Work Permit</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Work Permit</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Kegiatan Kerja</a>
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
                <div class="alert-text">Pada Halaman ini hanya menampilkan <b> Data izin kerja yang telah disetujui oleh Admin </b> dan dihalaman ini juga, anda dapat mengisi Foto kegiatan sebelum dan sesudah kerja.
                </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <!--end::Notice-->

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="fas fa-hard-hat text-warning"></i>
                        </span>
                        <h3 class="card-label">Daftar Pekerjaan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered table-hover table-checkable table-responsive" id="table_row" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle" style="text-align: center;">Email</th>
                                                <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                                <th class="align-middle" style="text-align: center;">Judul Complain</th>
                                                <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                                <th class="align-middle" style="text-align: center;">Keadaan</th>
                                                <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                                <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                                <th class="align-middle" style="text-align: center;">Status Kerja</th>
                                                <th class="align-middle" style="text-align: center;">Detail Izin Kerja</th>
                                                <th class="align-middle" style="text-align: center;">Detail Pekerja</th>
                                                <th class="align-middle" style="text-align: center;">Detail Lainnya</th>
                                                <th class="align-middle" style="text-align: center;">Detail Gambar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($complain as $comp) : ?>
                                                <tr>
                                                    <!-- Lihat data Email & Nama Buat Admin Complain -->
                                                    <td class="align-middle"><?= $comp['email']; ?></td>
                                                    <td class="align-middle"><?= $comp['nama']; ?></td>
                                                    <td class="align-middle"><?= $comp['judul_complain']; ?></td>
                                                    <td class="align-middle"><?= $comp['deskripsi']; ?></td>
                                                    <td class="align-middle"><?= $comp['keadaan']; ?></td>
                                                    <td class="align-middle"><?= $comp['tingkat_bahaya']; ?></td>
                                                    <td class="align-middle"><?= $comp['tanggal_ajukan']; ?></td>
                                                    <td>

                                                        <?php if ($comp['status_complain'] == "Izin Kerja Disetujui") : ?>
                                                            <a href="<?= base_url("pekerjaan/mulai/" . $comp['id_complain']) ?>" class="btn btn-warning">Mulai Pekerjaan</a>
                                                        <?php elseif ($comp['status_complain'] == "Sedang Dikerjakan") : ?>
                                                            <a href="<?= base_url("pekerjaan/akhir/" . $comp['id_complain']) ?>" class="btn btn-success">Akhiri Pekerjaan</a>
                                                        <?php else : ?>
                                                            <a href="" class="btn btn-success disabled" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="float-right">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#izin<?= $comp['id_complain']; ?>">
                                                                Detail
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="float-right">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#pekerjaan<?= $comp['id_complain']; ?>">
                                                                Detail
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="float-right">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#detaiil<?= $comp['id_complain']; ?>">
                                                                Detail
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#gambarmodalcomp<?PHP echo $comp['id']; ?>">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
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

<!-- Modal Gambar-->
<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" id="gambarmodalcomp<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
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

<!-- Modal Izin -->
<?php foreach ($complain as $izn) : ?>
    <div class="modal fade" id="izin<?= $izn['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Detail Izin Kerja</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive" style="color: black;">
                                <table class="table table-hover table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle" style="text-align: center;">ID Complain</th>
                                            <th class="align-middle" style="text-align: center;">Nama Kontraktor</th>
                                            <th class="align-middle" style="text-align: center;">Nama Penanggung Jawab</th>
                                            <th class="align-middle" style="text-align: center;">No Telepon Kantor</th>
                                            <th class="align-middle" style="text-align: center;">Deskripsi Pekerjaan</th>
                                            <th class="align-middle" style="text-align: center;">Waktu Mulai</th>
                                            <th class="align-middle" style="text-align: center;">Waktu Akhir</th>
                                            <th class="align-middle" style="text-align: center;">Tanggal Dikerjakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <!-- Lihat data Email & Nama Buat Admin Complain -->
                                            <td class="align-middle" style="text-align: center;"><?= $izn['id_complain']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['nama_kontraktor']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['nama_penanggung_jawab']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['no_telp_kantor']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['deskripsi_pekerjaan']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['waktu_mulai']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['waktu_akhir']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['tanggal_dikerjakan']; ?></td>
                                        </tr>

                                    </tbody>
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

<!-- Modal Pekerjaan -->
<?php foreach ($izin as $i) : ?>
    <div class="modal fade" id="pekerjaan<?= $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Detail Pekerja</h4>
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
    <div class="modal fade" id="detaiil<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="detaiilLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detaiilLabel">Detail Lainnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--  End Modal -->