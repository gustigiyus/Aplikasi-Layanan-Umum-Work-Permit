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
                    <h2 class="text-white font-weight-bold my-2 mr-5"><?= $title ?></h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="<?= base_url('beranda'); ?>" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Work Permit</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100"><?= $title ?></a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="<?= base_url('workpermit'); ?>" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Kembali</a>
                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>


            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label">Manage Workpermit</h3>
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">
                                    <span class="nav-icon">
                                        <i class="flaticon2-chat-1"></i>
                                    </span>
                                    <span class="nav-text">Data Complain</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab2">
                                    <span class="nav-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="nav-text">Data Izin Kerja</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab3">
                                    <span class="nav-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="nav-text">Data Pekerja</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab4">
                                    <span class="nav-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="nav-text">Details Lainnya</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                            <table class="table table-hover table-bordered table-responsive" width="100%">
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
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#gambarmodal<?= $comp['id']; ?>">
                                                        Detail
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2">
                            <table class="table table-hover table-bordered table-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle" style="text-align: center;">ID Complain</th>
                                        <th class="align-middle" style="text-align: center;">Nama Kontraktor</th>
                                        <th class="align-middle" style="text-align: center;">Nama Penanggung Jawab</th>
                                        <th class="align-middle" style="text-align: center;">No Telepon Kantor</th>
                                        <th class="align-middle" style="text-align: center;">Deskripsi Pekerjaan</th>
                                        <th class="align-middle" style="text-align: center;">Tanggal Dikerjakan</th>
                                        <th class="align-middle" style="text-align: center;">Waktu Mulai</th>
                                        <th class="align-middle" style="text-align: center;">Waktu Akhir</th>
                                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($izin as $izn) : ?>
                                        <tr>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['id_complain']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['nama_kontraktor']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['nama_penanggung_jawab']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['no_telp_kantor']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['deskripsi_pekerjaan']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['tanggal_dikerjakan']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['waktu_mulai']; ?></td>
                                            <td class="align-middle" style="text-align: center;"><?= $izn['waktu_akhir']; ?></td>
                                            <td class="align-middle" style="text-align: center;">
                                                <a class="btn btn-light-danger font-weight-bold mr-2" data-toggle="modal" data-target="#myModaleditizin<?PHP echo $izn['id_complain']; ?>">
                                                    <span class="svg-icon svg-icon-info svg-icon-lg">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">
                            <div class="card-body">
                                <?php foreach ($izin as $i) : ?>
                                    <div class="float-right">
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaltambahkerja<?PHP echo $i['id']; ?>">
                                            <i class="fa fa-plus-circle"></i> Tambah
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="card-body">
                                <?php foreach ($izin as $i) : ?>
                                    <table class="table table-hover table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle" style="text-align: center; vertical-align: middle;">NO.</th>
                                                <th class="align-middle" style="text-align: center; vertical-align: middle;">Nama Pekerja</th>
                                                <th class="align-middle" style="text-align: center; vertical-align: middle;">Jenis Pekerjaan</th>
                                                <th class="align-middle" style="text-align: center; vertical-align: middle;">Lokasi Pekerjaan</th>
                                                <th style="text-align:center; vertical-align:middle;">Tindakan</th>
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
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editpekerja<?PHP echo $pkj['id']; ?>">
                                                        <i class="fas fa-edit"></i> Edit Data
                                                    </button>
                                                    <a href="#" class="btn btn-danger btn-sm" onClick="confirm_modal('<?= base_url('workpermit/delpekerja/') . $pkj['id'] . "/" . $comp['id']; ?>');">
                                                        <i class="fa fa-trash"></i> Hapus Data
                                                    </a>
                                                </td>
                                            </tbody>
                                            <?php $a++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4">
                            <?php foreach ($izin as $i) : ?>

                                <!-- Jenis Potensi-->
                                <div class="bg-white rounded p-10">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <span class="card-icon">
                                                    <i class="fas fa-radiation text-warning"></i>
                                                </span>
                                                <h3 class="card-label">Data Jenis Potensi
                                                </h3>
                                            </div>
                                            <div class="card-toolbar">
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addjenispotensi<?PHP echo $i['id']; ?>">
                                                    <i class="fa fa-plus-circle"></i> Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <th style="text-align:center; vertical-align:middle;">NO.</th>
                                                    <th style="text-align:center; vertical-align:middle;">Nama Jenis Potensi</th>
                                                    <th style="text-align:center; vertical-align:middle;">Tindakan</th>
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
                                                        <td style="text-align:center; vertical-align:middle;">
                                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editpotensi<?PHP echo $slt['id']; ?>">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <a href="#" class="btn btn-danger btn-sm" onClick="confirm_modal('<?= base_url('workpermit/delpotensi/') . $slt['id'] . "/" . $comp['id']; ?>');">
                                                                <i class="fa fa-trash"></i> Hapus
                                                            </a>
                                                        </td>
                                                    </tbody>
                                                    <?php $a++; ?>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>

                                <!--Tindak Pencegahan-->
                                <div class="bg-white rounded p-10">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <span class="card-icon">
                                                    <i class="fas fa-shield-alt text-primary"></i>
                                                </span>
                                                <h3 class="card-label">Data Tindak Pencegahan
                                                </h3>
                                            </div>
                                            <div class="card-toolbar">
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addtindakpencegahaan<?PHP echo $i['id']; ?>">
                                                    <i class="fa fa-plus-circle"></i> Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <th style="text-align:center; vertical-align:middle;">NO.</th>
                                                    <th style="text-align:center; vertical-align:middle;">Nama Tindak Pencegahan</th>
                                                    <th style="text-align:center; vertical-align:middle;">Tindakan</th>
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
                                                <?php foreach ($data['select'] as $tpslt) : ?>

                                                    <tbody>
                                                        <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                                        <td style="text-align:center; vertical-align:middle;"><?= $tpslt['nama_tindak_pencegahan']; ?></td>
                                                        <td style="text-align:center; vertical-align:middle;">
                                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edittindakpencegahan<?PHP echo $tpslt['id']; ?>">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <a href="#" class="btn btn-danger btn-sm" onClick="confirm_modal('<?= base_url('workpermit/deltindakpencegahan/') . $tpslt['id'] . "/" . $comp['id']; ?>');">
                                                                <i class="fa fa-trash"></i> Hapus
                                                            </a>
                                                        </td>
                                                    </tbody>
                                                    <?php $a++; ?>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>

                                <!-- APD -->
                                <div class="bg-white rounded p-10">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <span class="card-icon">
                                                    <i class="fas fa-vest-patches text-danger"></i>
                                                </span>
                                                <h3 class="card-label">Data APD
                                                </h3>
                                            </div>
                                            <div class="card-toolbar">
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addapd">
                                                    <i class="fa fa-plus-circle"></i> Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <th style="text-align:center; vertical-align:middle;">NO.</th>
                                                    <th style="text-align:center; vertical-align:middle;">Nama APD</th>
                                                    <th style="text-align:center; vertical-align:middle;">Gambar APD</th>
                                                    <th style="text-align:center; vertical-align:middle;">Tindakan</th>
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
                                                <?php foreach ($data['select'] as $sltapd) : ?>
                                                    <tbody>
                                                        <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                                        <td style="text-align:center; vertical-align:middle;"><?= $sltapd['nama_APD']; ?></td>
                                                        <td style="text-align:center; vertical-align:middle;">
                                                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-image="<?= base_url()  ?>assets/img/workpermit/<?= $sltapd['gambar_apd']; ?>" data-target="#image-gallery">
                                                                <img class="img-thumbnail" src="<?= base_url()  ?>assets/img/workpermit/<?= $sltapd['gambar_apd']; ?>" width="100" height="100">
                                                            </a>
                                                        </td>
                                                        <td style="text-align:center; vertical-align:middle;">
                                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editapd<?PHP echo $sltapd['id']; ?>">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <a href="<?= base_url('workpermit/delapd/') . $sltapd['id'] . "/" . $comp['id'] . "/" . $sltapd['gambar_apd']; ?>" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i> Hapus
                                                            </a>
                                                        </td>
                                                    </tbody>
                                                    <?php $a++; ?>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>

                            <?php endforeach; ?>
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


<!-- MODAL EDIT APD -->
<?php foreach ($izin as $izn) : ?>
    <?php foreach ($apd as $apds) : ?>
        <div class="modal fade" id="editapd<?= $apds['id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Edit Foto APD</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <!--begin::Form-->
                                <form method="POST" action="<?= base_url('workpermit/editapd/') . $apds['id']; ?>" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Pilih :</label>
                                            <div class="form-group col-md">

                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>" hidden>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_apd" id="id_apd" value="<?= $apds['id']; ?>" hidden>
                                            </div>
                                            <div class="form-group col-md">

                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_izin_kerja" id="id_izin_kerja" value="<?= $apds['id_izin_kerja']; ?>" hidden>
                                            </div>
                                            <div class="col-9 col-form-label">
                                                <input type="text" name="id_apd" value="<?= $apds['id_APD'] ?>" hidden>
                                                <img src="<?= base_url('assets/img/workpermit/') . $apds['gambar_apd']; ?>" class="img-thumbnail">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="gambar" required>
                                                    <label class="custom-file-label" for="image">Pilih Gambar<label>
                                                </div>
                                                <input type="text" value="<?= $apds['gambar_apd']; ?>" name="old_image1" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<!-- MODAL ADD APD -->
<?php foreach ($izin as $izn) : ?>
    <div class="modal fade" id="addapd" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Tambah APD</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!--begin::Form-->
                            <form method="POST" action="<?= base_url('workpermit/addapd'); ?>" enctype="multipart/form-data" novalidate="novalidate" id="add_apd_form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Pilih :</label>
                                        <div class="form-group col-md" hidden>
                                            <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                            <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md" hidden>
                                            <label for="id_izin_kerja" style="color: black; float: left;">ID Izin Kerja</label>
                                            <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_izin_kerja" id="id_izin_kerja" value="<?= $izn['id']; ?>" readonly>
                                        </div>
                                        <div class="col-9 col-form-label">
                                            <div class="form-group">
                                                <label for="idapd">Silahkan Pilih APD :</label>
                                                <select class="form-control" name="idapd" id="idapd">
                                                    <?php foreach ($getallAPD as $apd) : ?>
                                                        <option value="<?= $apd['id_master_APD'] ?>"><?= $apd['nama_APD'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <label for="">Silahkan Pilih Gambar APD :</label>
                                            <img src="" class="img-thumbnail">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="gambar2">
                                                <label class="custom-file-label" for="image">Pilih Gambar<label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="add_apd_button" class="btn btn-primary mr-2">Simpan</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL ADD TINDAK PENCEGAHAN -->
<?php foreach ($izin as $izn) : ?>
    <div class="modal fade" id="addtindakpencegahaan<?= $izn['id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Tambah Tindak Pencegahan</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!--begin::Form-->
                            <form method="POST" action="<?= base_url('Workpermit/addtindakpencegahaan/') . $izn['id']; ?>" novalidate="novalidate" id="add_tindak_form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Pilih :</label>
                                        <div class="form-group col-md" hidden>
                                            <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                            <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>">
                                        </div>
                                        <div class="col-10 col-form-label">
                                            <div class="radio-inline">
                                                <?php foreach ($getalltp as $gettp) : ?>
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="tindak_pencegahan[]" value="<?= $gettp['id_master_TP']; ?>" />
                                                        <span></span><?= $gettp['nama_tindak_pencegahan']; ?></label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="add_tindak_button" class="btn btn-primary mr-2">Simpan</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL EDIT TINDAK PENCEGAHAN -->
<?php foreach ($izin as $izn) : ?>
    <?php foreach ($tp as $tpcegah) : ?>
        <div class="modal fade" id="edittindakpencegahan<?= $tpcegah['id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Edit Tindak Pencegahan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <!--begin::Form-->
                                <form method="POST" action="<?= base_url('Workpermit/edittindakpencegahaan/') . $tpcegah['id']; ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Pilih :</label>
                                            <div class="form-group col-md" hidden>
                                                <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>">
                                            </div>
                                            <div class="form-group col-md" hidden>
                                                <label for="id_izin_kerja" style="color: black; float: left;">ID Izin Kerja</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_izin_kerja" id="id_izin_kerja" value="<?= $tpcegah['id_izin_kerja']; ?>">
                                            </div>
                                            <div class="col-10 col-form-label">
                                                <div class="radio-inline">
                                                    <?php foreach ($getalltp as $gettp) : ?>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="tindak_pencegahan[]" value="<?= $gettp['id_master_TP']; ?>" required />
                                                            <span></span><?= $gettp['nama_tindak_pencegahan']; ?></label>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<!-- MODAL ADD POTENSI -->
<?php foreach ($izin as $izn) : ?>
    <div class="modal fade" id="addjenispotensi<?= $izn['id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Tambah Jenis Potensi</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!--begin::Form-->
                            <form method="POST" action="<?= base_url('Workpermit/addpotensi/') . $izn['id']; ?>" novalidate="novalidate" id="add_potensi_form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Pilih :</label>
                                        <div class="form-group col-md" hidden>
                                            <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                            <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>">
                                        </div>
                                        <div class="col-8 col-form-label">
                                            <div class="radio-inline">
                                                <?php foreach ($getalljp as $getjp) : ?>
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="jenis_potensi[]" value="<?= $getjp['id_master_JP']; ?>" />
                                                        <span></span><?= $getjp['nama_Jenis_Potensi']; ?></label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="add_potensi_button" class="btn btn-primary mr-2">Simpan</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL EDIT POTENSI -->
<?php foreach ($izin as $izn) : ?>
    <?php foreach ($jp as $jpotensi) : ?>
        <div class="modal fade" id="editpotensi<?= $jpotensi['id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Edit Jenis Potensi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <!--begin::Form-->
                                <form method="POST" action="<?= base_url('Workpermit/editpotensi/') . $jpotensi['id']; ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Pilih :</label>
                                            <div class="form-group col-md" hidden>
                                                <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>">
                                            </div>
                                            <div class="form-group col-md" hidden>
                                                <label for="id_izin_kerja" style="color: black; float: left;">ID Izin Kerja</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_izin_kerja" id="id_izin_kerja" value="<?= $jpotensi['id_izin_kerja']; ?>">
                                            </div>
                                            <div class="col-8 col-form-label">
                                                <div class="radio-inline">
                                                    <?php foreach ($getalljp as $getjp) : ?>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="jenis_potensi[]" value="<?= $getjp['id_master_JP']; ?>" required>
                                                            <span></span><?= $getjp['nama_Jenis_Potensi']; ?></label>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<!-- MODAL ADD PEKERJA -->
<?php foreach ($izin as $izn) : ?>
    <div class="modal fade" id="myModaltambahkerja<?PHP echo $izn['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Tambah Daftar Pekerja</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!--begin::Form-->
                        <?php
                        $data['pekerja'] = $this->db->get_where('tb_tenaga_kerja', ['id_izin_kerja' => $izn['id']])->result_array();
                        ?>
                        <form method="POST" action="<?= base_url('Workpermit/addpekerjasingle/') . $izn['id']; ?>" novalidate="novalidate" id="add_pekerja_form_single">
                            <div class="card-body">
                                <div class="form-group col-md" hidden>
                                    <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                    <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>">
                                </div>
                                <div class="form-group col-12-md" hidden>
                                    <label for="id_izin_kerja" style="color: black; float: left;">ID Izin Kerja</label>
                                    <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_izin_kerja" id="id_izin_kerja" value="<?= $izn['id'] ?>">
                                </div>
                                <div class="form-group col-12-md">
                                    <label for="nama_pekerja" style="color: black; float: left;">Nama Pekerja</label>
                                    <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="nama_pekerja" id="nama_pekerja" autocomplete="off" placeholder="Masukan Nama Pekerja">
                                </div>
                                <div class="form-group col-12-md">
                                    <label for="jenis_pekerjaan" style="color: black; float: left;">Jenis Pekerjaan</label>
                                    <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="jenis_pekerjaan" id="jenis_pekerjaan" autocomplete="off" placeholder="Masukan Jenis Pekerjaan">
                                </div>
                                <div class="form-group col-12-md">
                                    <label for="lokasi_pekerjaan" style="color: black; float: left;">Lokasi Pekerjaan</label>
                                    <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Masukan Lokasi Pekerjaan" autocomplete="off">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="add_pekerja_button_single" class="btn btn-primary float-left">Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL EDIT PEKERJA -->
<?php foreach ($izin as $izn) : ?>
    <?php foreach ($pekerja as $pkid) : ?>
        <div class="modal fade" id="editpekerja<?= $pkid['id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content text-center">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Edit Data Pekerja</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <!--begin::Form-->
                            <form method="POST" action="<?= base_url('Workpermit/editpekerja/') . $izn['id']; ?>">
                                <div class="card-body">
                                    <div class="form-group col-md" hidden>
                                        <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                        <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md" hidden>
                                        <label for="id_complain" style="color: black; float: left;">ID Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_kerja" id="id_kerja" value="<?= $pkid['id']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md" hidden>
                                        <label for="id_izin_kerja" style="color: black; float: left;">ID Izin Kerja</label>
                                        <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_izin_kerja" id="id_izin_kerja" value="<?= $pkid['id_izin_kerja']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="nama_pekerja" style="color: black; float: left;">Nama Pekerja</label>
                                        <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="nama_pekerja" autocomplete="off" placeholder="Masukan Nama Pekerja" value="<?= $pkid['nama_pekerja']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="jenis_pekerjaan" style="color: black; float: left;">Jenis Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="jenis_pekerjaan" autocomplete="off" placeholder="Masukan Jenis Pekerjaan" value="<?= $pkid['jenis_pekerjaan']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="lokasi_pekerjaan" style="color: black; float: left;">Lokasi Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="lokasi_pekerjaan" placeholder="Masukan Lokasi Pekerjaan" autocomplete="off" value="<?= $pkid['lokasi_pekerjaan']; ?>" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-left">Simpan</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<!-- MODAL EDIT IZIN PEKERJA -->
<?php foreach ($izin as $izn) : ?>
    <div class="modal fade" id="myModaleditizin<?PHP echo $izn['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Edit Izin Kerja</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!--begin::Form-->
                            <form method="POST" action="<?= base_url('Workpermit/editizin/') . $id ?>" novalidate="novalidate" id="edit_izin_form">
                                <div class="card-body">
                                    <?php foreach ($izin as $izn) : ?>
                                        <div class="form-group col-md-12" hidden>
                                            <label for="id_complain" style="color: black; float: left;">ID Complain</label>
                                            <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="id_complain" id="id_complain" value="<?= $izn['id_complain']; ?>" readonly>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_kontraktor" style="color: black; float: left;">Nama Kontraktor</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="nama_kontraktor" id="nama_kontraktor" placeholder="Masukan Nama Kontraktor" value="<?= $izn['nama_kontraktor']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nama_penanggung_jawab" style="color: black; float: left;">Nama Penanggung Jawab</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="nama_penanggung_jawab" id="nama_penanggung_jawab" placeholder="Masukan Nama Penangung Jawab" autocomplete="off" value="<?= $izn['nama_penanggung_jawab']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-7">
                                                <label for="desk_kerja" style="color: black; float: left;">Deskripsi Pekerjaan</label>
                                                <textarea class="form-control form-control-solid h-auto py-5 px-6" id="desk_kerja" name="desk_kerja" rows="3" placeholder="Masukan Deskripsi Pekerjaan" autocomplete="off"><?= $izn['deskripsi_pekerjaan']; ?></textarea>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="no_telp" style="color: black; float: left;">No Telepon Kantor</label>
                                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="no_telp" id="no_telp" value="<?= $izn['no_telp_kantor']; ?>" placeholder="Masukan Telepon Kantor" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="tanggal" style="color: black; float: left;">Tanggal</label>
                                                <input type="date" class="form-control form-control-solid h-auto py-5 px-6" name="tanggal" id="tanggal" value="<?= $izn['tanggal_dikerjakan']; ?>" placeholder="Masukan Tanggal" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="waktu_mulai" style="color: black; float: left;">waktu Mulai</label>
                                                <input type="time" class="form-control form-control-solid h-auto py-5 px-6" name="waktu_mulai" id="waktu_mulai" value="<?= $izn['waktu_mulai']; ?>" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="waktu_akhir" style="color: black; float: left;">waktu Akhir</label>
                                                <input type="time" class="form-control form-control-solid h-auto py-5 px-6" name="waktu_akhir" id="waktu_akhir" value="<?= $izn['waktu_akhir']; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="edit_izin_button" class="btn btn-primary mr-2">Simpan</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Delete Data pekerja-->
<div class="modal fade" id="modal_delete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="delete_pekerja" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete_pekerja">Anda yakin akan menghapus data ini.. ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
                <a href="#" class="btn btn-danger font-weight-bold" id="delete_pekerja">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Data Potensi-->
<div class="modal fade" id="modal_delete_potensi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="delete_potensi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete_potensi">Anda yakin akan menghapus data ini.. ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
                <a href="#" class="btn btn-danger font-weight-bold" id="delete_potensi">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Data Tindak-->
<div class="modal fade" id="modal_delete_tindak" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="delete_tindak" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete_tindak">Anda yakin akan menghapus data ini.. ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
                <a href="#" class="btn btn-danger font-weight-bold" id="delete_tindak">Hapus</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal Gambar -->
<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" id="gambarmodal<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 class="title title-up">Detail Gambar</h4>
                </div>
                <div class="modal-body">
                    <div class="fg-gallery cols-4">
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