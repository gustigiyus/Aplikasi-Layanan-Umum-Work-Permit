<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="float-left">
                                    <h3 class="card-label"><?= $title ?></h3>
                                </span>
                                <span class="float-right">
                                    <?php foreach ($complain as $comp) : ?>
                                    <?php endforeach; ?>
                                    <a href="<?= base_url('laporan/pdf/') . $comp['id']; ?>" class="btn btn-icon btn-danger">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <!--complain-->
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">
                                    <span class="nav-icon">
                                        <i class="fa fa-envelope-open"></i>
                                    </span>
                                    <span class="nav-text">Komplain</span>
                                </a>
                            </li>
                            <!--izin kerja-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">
                                    <span class="nav-icon">
                                        <i class="fa fa-file"></i>
                                    </span>
                                    <span class="nav-text">Izin Kerja</span>
                                </a>
                            </li>
                            <!--pekerja-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_3">
                                    <span class="nav-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-text">Pekerja</span>
                                </a>
                            </li>
                            <!--Potensi Bahaya-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_3">
                                    <span class="nav-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-text">Potensi Bahaya</span>
                                </a>
                            </li>
                            <!--Tindak Pencegahan-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5_3">
                                    <span class="nav-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-text">Tindak Pencegahan</span>
                                </a>
                            </li>
                            <!--Tindak Pencegahan-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_6_3">
                                    <span class="nav-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-text">APD</span>
                                </a>
                            </li>
                            <!--Tindak Pencegahan-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7_3">
                                    <span class="nav-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-text">Foto Pekerjaan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!--isi complaion-->
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-stretch">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h4 class="card-label" style="text-align: center;">Pengaju Komplain
                                                </h4>
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
                                    <div class="card card-custom">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h4 class="card-label" style="text-align: center;">Detail Komplain
                                                </h4>
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
                                    <div class="card card-custom card-stretch">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h4 class="card-label" style="text-align: center;">Deskripsi Komplain
                                                </h4>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <!--begin::Card-->
                                    <div class="card card-custom">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h4 class="card-label" style="text-align: center;">Foto Komplain
                                                </h4>
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
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--isi izin kerja-->
                        <div class="tab-pane fade" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                            <div class="col-lg-12">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--Pengontrak-->
                                    <div class="col-lg-6">
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h4 class="card-label" style="text-align: center;">Pengontrak
                                                    </h4>
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
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h4 class="card-label" style="text-align: center;">Detail Permintaan Izin Kerja
                                                    </h4>
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
                                        <!--deskripsi-->
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h4 class="card-label" style="text-align: center;">Deskripsi Pekerjaan
                                                    </h4>
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
                                <br>
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-lg-6 m-auto">
                                        <!--TTD-->
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h4 class="card-label" style="text-align: center;">Bukti Tanda Tangan
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <?php foreach ($izin as $iz) : ?>
                                                    <div class="col-lg-12 thumb">
                                                        <a target="blank" class="thumbnail" href="<?= base_url()  ?>assets/img/ttd/<?= $iz['ttd']; ?>" data-image="<?= base_url()  ?>assets/img/ttd/<?= $iz['ttd']; ?>">
                                                            <img class="img-thumbnail" src="<?= base_url()  ?>assets/img/ttd/<?= $iz['ttd']; ?>" alt="Another alt text">
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                        </div>
                        <!--isi Pekerja-->
                        <div class="tab-pane fade" id="kt_tab_pane_3_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--Pengontrak-->
                                    <div class="card card-custom">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h4 class="card-label" style="text-align: center;">Daftar Pekerja
                                                </h4>
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
                                                                <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
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
                        <!--isi Potensi Bahaya-->
                        <div class="tab-pane fade" id="kt_tab_pane_4_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                            <!--Tabel Jeniis Potensi bahaya-->
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label" style="text-align: center;">Daftar Jenis Potensi Bahaya
                                        </h4>
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
                        <!--isi Tindak Pencegahan-->
                        <div class="tab-pane fade" id="kt_tab_pane_5_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                            <!--Tabel Jeniis Potensi bahaya-->
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label" style="text-align: center;">Daftar Tindak Pencegahan
                                        </h4>
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
                        <!--isi Alat Perlindungan Diri-->
                        <div class="tab-pane fade" id="kt_tab_pane_6_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label" style="text-align: center;">Daftar Alat Perlindungan Diri
                                        </h4>
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
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label" style="text-align: center;">Foto Alat Perlindungan Diri
                                        </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="fg-gallery cols-4">
                                        <?php foreach ($APD as $gam) : ?>
                                            <img src="<?= base_url()  ?>assets/img/workpermit/<?= $gam['gambar_apd']; ?>" alt="">
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--isi Foto Pekerjaan-->
                        <div class="tab-pane fade" id="kt_tab_pane_7_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">

                            <!--foto sebelum kerja-->
                            <div class="card custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label" style="text-align: center;">Foto Sebelum Kerja
                                        </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="fg-gallery cols-4">
                                        <?php foreach ($mulai as $fm) : ?>
                                            <img src="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $fm['gambar']; ?>" alt="">
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--Tabel foto setelah kerja-->
                            <div class="card custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label" style="text-align: center;">Foto Setelah Kerja
                                        </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="fg-gallery cols-4">
                                        <?php foreach ($akhir as $fa) : ?>
                                            <img src="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $fa['gambar']; ?>" alt="">
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->






        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Detail Gambar -->
<div class="modal fade" id="myModaldetailfoto<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <h4 class="title title-up">Gambar</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-image="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" data-target="#image-gallery">
                                    <img class="img-thumbnail" src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" alt="Another alt text">
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-image="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" data-target="#image-gallery">
                                    <img class="img-thumbnail" src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" alt="Another alt text">
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-image="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" data-target="#image-gallery">
                                    <img class="img-thumbnail" src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" alt="Another alt text">
                                </a>
                            </div>


                            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabeldetailfotolabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="image-gallery-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                            </button>

                                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>