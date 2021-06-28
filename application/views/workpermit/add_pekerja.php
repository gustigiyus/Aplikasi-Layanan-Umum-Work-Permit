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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Tambah Pekerja</a>
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

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h4 class="card-label">Detail Data</h4>
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">
                                    <span class="nav-icon">
                                        <i class="flaticon2-chat-1"></i>
                                    </span>
                                    <span class="nav-text">Data Izin Kerja</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">
                                    <span class="nav-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="nav-text">Data Complain</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-bordered table-responsive" width="100%">
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
                                            <?php foreach ($izin as $izn) : ?>
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
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle" style="text-align: center;">Email</th>
                                                <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                                <th class="align-middle" style="text-align: center;">Judul Complain</th>
                                                <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                                <th class="align-middle" style="text-align: center;">Keadaan</th>
                                                <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                                <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                                <th class="align-middle" style="text-align: center;">Gambar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($complain as $comp) : ?>
                                                <tr>

                                                    <!-- Lihat data Email & Nama Buat Admin Complain -->
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['email']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['nama']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['judul_complain']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['deskripsi']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['keadaan']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['tingkat_bahaya']; ?></td>
                                                    <td class="align-middle" style="text-align: center;"><?= $comp['tanggal_ajukan']; ?></td>
                                                    <td class="align-middle" style="text-align: center;">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#myModaldetailfoto<?PHP echo $comp['id']; ?>">
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

    <!--begin::Container-->
    <div class="card-body">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Formulir Data Pekerja</h3>
                    </div>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-sm float-left tomboltambahbanyak">
                        <i class="fa fa-plus-circle"></i> Tambah data
                    </button>
                    <p class="viewdata">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


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
                    <div class="fg-gallery col-12">
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