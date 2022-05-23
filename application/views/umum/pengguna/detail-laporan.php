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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Layanan Umum</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Laporan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Detail Laporan</a>
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
                <div class="card-header">
                    <div class="card-title">

                        <span class="card-icon">
                            <i class="flaticon2-file text-danger"></i>
                        </span>
                        <h3 class="card-label">Laporan</h3>
                    </div>
                    <div class="card-toolbar">
                        <?php foreach ($complain as $comp) : ?>
                        <?php endforeach; ?>
                        <a href="<?= base_url('laporan/pdf/') . $comp['id']; ?>" class="btn btn-lg btn-icon btn-light-primary">
                            <i class="flaticon2-printer"></i>
                        </a>
                    </div>
                </div>
                <div class="card-header">
                    <div class="card-toolbar">
                        <ul class="nav nav-bold nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_7_1">Komplain</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_2">Izin Kerja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_3">Pekerja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_4">Potensi Bahaya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_5">Tindak Pencegahan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_6">APD</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_7">Foto Pekejraan</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_7_1" role="tabpanel" aria-labelledby="kt_tab_pane_7_1">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-stretch card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label" style="text-align: center;">Pengaju Komplain
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <?php foreach ($complain as $comp) : ?>
                                                <span class="row">
                                                    <label>Alamat Email : <?= $comp['email']; ?></label>
                                                </span>
                                                <span class="row">
                                                    <label>Nama Lengkap : <?= $comp['nama']; ?></label>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <div class="col-lg-6">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label" style="text-align: center;">Detail Komplain
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php foreach ($complain as $comp) : ?>
                                                <span class="row">
                                                    <label>Judul Komplain : <?= $comp['judul_complain']; ?></label>
                                                </span>
                                                <span class="row">
                                                    <label>Keadaan : <?= $comp['keadaan']; ?></label>
                                                </span>
                                                <span class="row">
                                                    <label>Tingkat Bahaya Pekerjaan : <?= $comp['tingkat_bahaya']; ?></label>
                                                </span>
                                                <span class="row">
                                                    <label>Tanggal Komplain Diajukan : <?= $comp['tanggal_ajukan']; ?></label>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Row-->
                            <br>
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-stretch card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label" style="text-align: center;">Deskripsi Komplain
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <?php foreach ($complain as $comp) : ?>

                                                <label><?= $comp['deskripsi']; ?></label>

                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Row-->
                            <br>
                            <!--begin::Row-->
                            <div class="col-lg-12">
                                <!--begin::Card-->
                                <div class="card card-custom card-border card-stretch">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label" style="text-align: center;">Foto Komplain
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($complain as $comp) : ?>
                                            <div class="fg-gallery cols-4">
                                                <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" alt="">
                                                <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" alt="">
                                                <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_7_2" role="tabpanel" aria-labelledby="kt_tab_pane_7_2">
                            <div class="col-lg-12">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--Pengontrak-->
                                    <div class="col-lg-6">
                                        <div class="card card-custom card-stretch card-border">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h3 class="card-label" style="text-align: center;">Pengontrak
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <?php foreach ($izin as $iz) : ?>
                                                    <span class="row">
                                                        <label>Nama Kontraktor : <?= $iz['nama_kontraktor']; ?></label>
                                                    </span>
                                                    <span class="row">
                                                        <label>Nama Penggung Jawab : <?= $iz['nama_penanggung_jawab']; ?></label>
                                                    </span>
                                                    <span class="row">
                                                        <label>Nomor Telepon Kantor : <?= $iz['no_telp_kantor']; ?></label>
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!--Pengontrak-->
                                        <div class="card card-custom card-border">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h3 class="card-label" style="text-align: center;">Detail Permintaan Izin Kerja
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <?php foreach ($izin as $iz) : ?>
                                                    <span class="row">
                                                        <label>Waktu Mulai : <?= $iz['waktu_mulai']; ?></label>
                                                    </span>
                                                    <span class="row">
                                                        <label>Waktu Selesai : <?= $iz['waktu_akhir']; ?></label>
                                                    </span>
                                                    <span class="row">
                                                        <label>Tanggal Pengajuan Izin Kerja : <?= $iz['tanggal_dikerjakan']; ?></label>
                                                    </span>
                                                    <span class="row">
                                                        <label>Tanggal Penyeselesaian Pekerjaan : <?= $iz['tanggal_akhir']; ?></label>
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <br>
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--Pengontrak-->
                                        <div class="card card-custom card-border">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h3 class="card-label" style="text-align: center;">Deskripsi Pekerjaan
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <?php foreach ($izin as $iz) : ?>
                                                    <?= $iz['deskripsi_pekerjaan']; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_7_3" role="tabpanel" aria-labelledby="kt_tab_pane_7_3">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--Pengontrak-->
                                    <div class="card card-custom card-border">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label" style="text-align: center;">Daftar Pekerja
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="Complain" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle" style="text-align: center;">#</th>
                                                            <th class="align-middle" style="text-align: center;">Nama Pekerja</th>
                                                            <th class="align-middle" style="text-align: center;">Jenis Pekerjaan</th>
                                                            <th class="align-middle" style="text-align: center;">Lokasi Pekerjaan</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($pekerja as $pe) : ?>
                                                            <tr>
                                                                <td class="align-middle"><?= $i; ?></td>
                                                                <td class="align-middle"><?= $pe['nama_pekerja']; ?></td>
                                                                <td class="align-middle"><?= $pe['jenis_pekerjaan']; ?></td>
                                                                <td class="align-middle"><?= $pe['lokasi_pekerjaan']; ?></td>
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
                            <!--end::Row-->
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_7_4" role="tabpanel" aria-labelledby="kt_tab_pane_7_4">
                            <!--Tabel Jeniis Potensi bahaya-->
                            <div class="card card-custom card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label" style="text-align: center;">Daftar Jenis Potensi Bahaya
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="pointer-events: none;">
                                            <?php foreach ($JP as $jp) : ?>
                                                <?php $isi[] = $jp['id_JP']; ?>
                                            <?php endforeach; ?>
                                            <?php foreach ($master_JP as $mjp) : ?>
                                                <?php $mas[] = $mjp['nama_Jenis_Potensi']; ?>
                                            <?php endforeach; ?>
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("1", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[0]; ?><br />
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("2", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[1]; ?> <br />
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("3", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[2]; ?> <br />
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("4", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[3]; ?> <br />
                                        </div>
                                        <div class="col-lg-6" style="pointer-events: none;">
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("5", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[4]; ?> <br />
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("6", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[5]; ?> <br />
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("7", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[6]; ?> <br />
                                            <input type="checkbox" id="q1[]" name="q1[]" value="Email Settings" <?php if (in_array("8", $isi)) {
                                                                                                                    echo " checked=\"checked\"";
                                                                                                                } ?> /> <?= $mas[7]; ?> <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_7_5" role="tabpanel" aria-labelledby="kt_tab_pane_7_5">
                            <!--Tabel Jeniis Potensi bahaya-->
                            <div class="card card-custom card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label" style="text-align: center;">Daftar Tindak Pencegahan
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="pointer-events: none;">
                                            <?php foreach ($TP as $tp) : ?>
                                                <?php $isitp[] = $tp['id_tindak_pencegahan']; ?>
                                            <?php endforeach; ?>
                                            <?php foreach ($master_TP as $mtp) : ?>
                                                <?php $mastp[] = $mtp['nama_tindak_pencegahan']; ?>
                                            <?php endforeach; ?>
                                            <input type="checkbox" <?php if (in_array("1", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[0]; ?><br />
                                            <input type="checkbox" <?php if (in_array("2", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[1]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("3", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[2]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("4", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[3]; ?> <br />
                                        </div>
                                        <div class="col-lg-6" style="pointer-events: none;">
                                            <input type="checkbox" <?php if (in_array("5", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[4]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("6", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[5]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("7", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[6]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("8", $isitp)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $mastp[7]; ?> <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_7_6" role="tabpanel" aria-labelledby="kt_tab_pane_7_6">
                            <div class="card card-custom card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label" style="text-align: center;">Daftar Alat Perlindungan Diri
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="pointer-events: none;">
                                            <?php foreach ($APD as $apd) : ?>
                                                <?php $isiapd[] = $apd['id_APD']; ?>
                                                <?php $gamapd[] = $apd['gambar_apd']; ?>
                                            <?php endforeach; ?>
                                            <?php foreach ($master_APD as $mapd) : ?>
                                                <?php $masapd[] = $mapd['nama_APD']; ?>
                                            <?php endforeach; ?>
                                            <input type="checkbox" <?php if (in_array("1", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[0]; ?><br />
                                            <input type="checkbox" <?php if (in_array("2", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[1]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("3", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[2]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("4", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[3]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("5", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[4]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("6", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[5]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("7", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[6]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("8", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[7]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("9", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[8]; ?> <br />
                                        </div>
                                        <div class="col-lg-6" style="pointer-events: none;">

                                            <input type="checkbox" <?php if (in_array("10", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[9]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("11", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[10]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("12", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[11]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("13", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[12]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("14", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[13]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("15", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[14]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("16", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[15]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("17", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[16]; ?> <br />
                                            <input type="checkbox" <?php if (in_array("18", $isiapd)) {
                                                                        echo " checked=\"checked\"";
                                                                    } ?> /> <?= $masapd[17]; ?> <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card card-custom card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label" style="text-align: center;">Foto Alat Perlindungan Diri
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="demo-gallery">
                                        <ul id="lightgallery3" class="list-unstyled row">
                                            <?php foreach ($APD as $gam) : ?>
                                                <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-responsive="<?= base_url()  ?>assets/img/workpermit/<?= $gam['gambar_apd']; ?>" data-src="<?= base_url()  ?>assets/img/workpermit/<?= $gam['gambar_apd']; ?>">
                                                    <a href="">
                                                        <img class="img-responsive" src="<?= base_url()  ?>assets/img/workpermit/<?= $gam['gambar_apd']; ?>">
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_7_7" role="tabpanel" aria-labelledby="kt_tab_pane_7_7">
                            <!--foto sebelum kerja-->
                            <div class="card card-custom card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label" style="text-align: center;">Foto Sebelum Kerja
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="demo-gallery">
                                        <ul id="lightgallery" class="list-unstyled row">
                                            <?php foreach ($mulai as $fm) : ?>
                                                <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-responsive="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $fm['gambar']; ?>" data-src="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $fm['gambar']; ?>">
                                                    <a href="">
                                                        <img class="img-responsive" src="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $fm['gambar']; ?>">
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--Tabel foto setelah kerja-->
                            <div class="card card-custom card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label" style="text-align: center;">Foto Setelah Kerja
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="demo-gallery">
                                        <ul id="lightgallery2" class="list-unstyled row">
                                            <?php foreach ($akhir as $fa) : ?>
                                                <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-responsive="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $fa['gambar']; ?>" data-src="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $fa['gambar']; ?>">
                                                    <a href="">
                                                        <img class="img-responsive" src="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $fa['gambar']; ?>">
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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