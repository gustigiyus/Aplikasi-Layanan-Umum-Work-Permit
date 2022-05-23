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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Laporan Permintaan Layanan</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Permintaan Layanan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Laporan Permintaan</a>
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
    <?php foreach ($data_permintaan as $dt_prmt_lyn) : ?>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!-- begin::Card-->

                    <div class="card card-custom overflow-hidden">
                        <div class="card-body p-0">
                            <!-- begin: Invoice-->
                            <!-- begin: Invoice header-->
                            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-20 py-sm-10 px-md-0" style="background-image: url(<?= base_url('assets_pengguna/'); ?>media/bg/bg-6.jpg);">
                                <div class="col-md-9">
                                    <div class="d-flex justify-content-between flex-column flex-md-row">
                                        <h1 class="display-4 text-white font-weight-boldest mb-2">Permintaan Layanan</h1>
                                        <div class="d-flex flex-column align-items-md-end align-items-md-end px-0">
                                            <span class="text-white d-flex flex-column align-items-md-end opacity-85">
                                                <span class="text-white font-weight-boldest font-size-lg">HARI DAN TANGGAL</span>
                                                <span class="font-weight-boldest font-size-lg" style="color: #cc0000;"><?php echo $tgl = date('l, d-m-Y'); ?> </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="border-bottom w-100 opacity-20 pb-3 mb-10"></div>
                                    <div class="d-flex justify-content-between text-white pt-6">
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">TANGGAL DIAJUKAN</span>
                                            <span class="opacity-70"><?= $dt_prmt_lyn['tanggal_ajukan']; ?></span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">NOMER PERMINTAAN</span>
                                            <span class="opacity-70"><?= $dt_prmt_lyn['no_permintaan']; ?></span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">STATUS PERMINTAAN</span>
                                            <?php if ($dt_prmt_lyn['status_permintaan'] == 'Open') : ?>
                                                <span class=""><span class="label label-primary label-inline mr-2"><?= $dt_prmt_lyn['status_permintaan']; ?></span></span>
                                            <?php else : ?>
                                                <span class=""><span class="label label-dark label-pill label-inline mr-2"><?= $dt_prmt_lyn['status_permintaan']; ?></span></span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice header-->
                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center bg-white-100 py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">

                                    <div class="card card-custom">
                                        <div class="card-header card-header-tabs-line justify-content-center">

                                            <div class="card-toolbar">
                                                <ul class="nav nav-tabs nav-bold nav-tabs-line justify-content-center">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_data_pengaju">
                                                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                                            <span class="nav-text">Data Pengaju</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_data_permintaan">
                                                            <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                            <span class="nav-text">Data Permintaan</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_data_pekerjaan">
                                                            <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                            <span class="nav-text">Data Distribusi Pekerja</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_data_pemeriksaan">
                                                            <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                            <span class="nav-text">Data Pemeriksaan</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_data_penyerahaan">
                                                            <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                            <span class="nav-text">Data Penyerahaan</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="kt_tab_pane_data_pengaju" role="tabpanel" aria-labelledby="kt_tab_pane_data_pengaju">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-9">
                                                        <a href="#" class="text-dark-75">Data Penginput</a>
                                                    </h3>
                                                    <?php foreach ($detail_user as $dt_usr) : ?>
                                                        <!--begin::Info-->
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Nama Lengkap :</span>
                                                            <span class="text-dark flex-root font-weight-boldest"><?= $dt_usr['nama']; ?></span>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Alamat Email :</span>
                                                            <span class="text-dark flex-root font-weight-boldest"><?= $dt_usr['email']; ?></span>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">NIP :</span>
                                                            <span class="text-dark flex-root font-weight-boldest"><?= $dt_usr['nip']; ?></span>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Divisi :</span>
                                                            <span class="text-dark flex-root font-weight-boldest"><?= $dt_usr['divisi']; ?></span>
                                                        </div>
                                                        <div class="d-flex">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Ext/Hp :</span>
                                                            <span class="text-dark flex-root font-weight-boldest"><?= $dt_usr['nomer_telepon']; ?></span>
                                                        </div>
                                                        <!--end::Info-->
                                                    <?php endforeach; ?>
                                                </div>

                                                <div class="tab-pane fade" id="kt_tab_pane_data_permintaan" role="tabpanel" aria-labelledby="kt_tab_pane_data_permintaan">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-9">
                                                        <a href="#" class="text-dark-75">Data Permintaan</a>
                                                    </h3>
                                                    <!--begin::Info-->
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Permintaan :</span>
                                                        <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['permintaan']; ?></span>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Judul Permintaan :</span>
                                                        <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['judul_permintaan']; ?></span>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Jenis Permintaan :</span>
                                                        <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['jenis_permintaan_layanan']; ?></span>
                                                    </div>
                                                    <div class="d-flex border-bottom border-black pb-8 mb-6">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Tanggal Permintaan :</span>
                                                        <span class="text-primary flex-root font-weight-boldest"><?= $dt_prmt_lyn['tanggal_ajukan']; ?></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Deskripsi Permintaan :</span>
                                                        <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['deskripsi']; ?></span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>

                                                <div class="tab-pane fade" id="kt_tab_pane_data_pekerjaan" role="tabpanel" aria-labelledby="kt_tab_pane_data_pekerjaan">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-9">
                                                        <a href="#" class="text-dark-75">Data Distribusi Pekerja</a>
                                                    </h3>
                                                    <div class="table-responsive">
                                                        <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                                                            <thead>
                                                                <tr class="bg-gray-100 text-left">
                                                                    <th class="text-dark-75" style="text-align: center;">#</th>
                                                                    <th style="min-width: 200px;" class="pl-4">
                                                                        <span class="text-dark-75">Nama Pekerja</span>
                                                                    </th>
                                                                    <th style="text-align: center;">Jenis Pekerjaan</th>
                                                                    <th style="text-align: center;">Lokasi Pekerjaan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no = 1; ?>
                                                                <?php foreach ($data_distribusi_pekerja as $dt_dst_pkj) : ?>
                                                                    <tr class="font-weight-bold font-size-lg">
                                                                        <td class="font-weight-boldest" style="text-align: center;"><?= $no ?></td>
                                                                        <td style="min-width: 200px;" class="pl-4"><?= $dt_dst_pkj['nama_pekerja']; ?></td>
                                                                        <td style="text-align: center;"><?= $dt_dst_pkj['jenis_pekerjaan']; ?></td>

                                                                        <td style="text-align: center;"><?= $dt_dst_pkj['lokasi_pekerjaan']; ?></td>
                                                                    </tr>
                                                                    <?php $no++;  ?>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="kt_tab_pane_data_pemeriksaan" role="tabpanel" aria-labelledby="kt_tab_pane_data_pemeriksaan">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-1">
                                                        <a href="#" class="text-dark-75">Data Pemeriksaan</a>
                                                    </h3>
                                                    <?php foreach ($data_pemeriksaan_penyerahaan as $dt_pmrsk) : ?>
                                                        <!--begin::Info-->
                                                        <div class="col-lg-12 border-bottom border-black py-8 mb-6">
                                                            <div class="row">
                                                                <div class="col-lg-8 mb-sm-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-lg-3 mb-sm-3">
                                                                            <span class="text-dark-50 font-weight-bold mb-2">Usulan Solusi Pemeriksaan :</span>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <span class="text-dark font-weight-boldest" style="text-align: justify;"><?= $dt_pmrsk['usulan_solusi']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-lg-3 mb-sm-3">
                                                                            <span class="text-dark-50 font-weight-bold mb-2 mr-sm-4">Tanda Tangan :</span>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <img src="<?= base_url('assets/img/permintaan_layanan/ttd_pemeriksaan/') . $dt_pmrsk['ttd_pemeriksaan']; ?>" class="img-thumbnail">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 border-bottom border-black py-8 mb-6">
                                                            <div class="row">
                                                                <div class="col-lg-8 mb-sm-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-lg-3 mb-sm-3">
                                                                            <span class="text-dark-50 font-weight-bold mb-2">Hasil Pemeriksaan</span>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <span class="text-dark font-weight-boldest" style="text-align: justify;"><?= $dt_pmrsk['hasil_pemeriksaan']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-lg-3 mb-sm-3">
                                                                            <span class="text-dark-50 font-weight-bold mb-2 mr-sm-4">Tanggal Pemeriksaan :</span>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <span class="text-primary font-weight-boldest mb-2 mr-sm-4">
                                                                                <?= $dt_pmrsk['tgl_pemeriksaan']; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    <?php endforeach; ?>
                                                </div>

                                                <div class="tab-pane fade" id="kt_tab_pane_data_penyerahaan" role="tabpanel" aria-labelledby="kt_tab_pane_data_penyerahaan">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-1">
                                                        <a href="#" class="text-dark-75">Data Penyerahaan</a>
                                                    </h3>
                                                    <!--begin::Info-->
                                                    <div class="col-lg-12 border-bottom border-black py-8 mb-6">
                                                        <div class="row">
                                                            <div class="col-lg-8 mb-sm-4">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-lg-3 mb-sm-3">
                                                                        <span class="text-dark-50 font-weight-bold mb-2">Catatan Pemeliharaan :</span>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <span class="text-dark font-weight-boldest" style="text-align: justify;"><?= $dt_pmrsk['catatan_pemeliharaan']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-lg-3 mb-sm-3">
                                                                        <span class="text-dark-50 font-weight-bold mb-2 mr-sm-4">Tanda Tangan :</span>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <img src="<?= base_url('assets/img/permintaan_layanan/ttd_penyerahaan/') . $dt_pmrsk['ttd_penerima_layanan']; ?>" class="img-thumbnail">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 border-bottom border-black py-8 mb-6">
                                                        <div class="row">
                                                            <div class="col-lg-8 mb-sm-4">
                                                                <div class="row">
                                                                    <div class="col-lg-3 mb-lg-3 mb-sm-3">
                                                                        <span class="text-dark-50 font-weight-bold mb-2">Total Biaya :</span>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <span class="text-danger font-weight-boldest" style="text-align: justify;">
                                                                            Rp. <?= $dt_pmrsk['total_biaya']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-7 mb-sm-3">
                                                                        <span class="text-dark-50 font-weight-bold mb-2 mr-sm-4">Tanggal Kembali :</span>
                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <span class="text-primary font-weight-boldest" style="text-align: justify;">
                                                                            <?= $dt_pmrsk['tgl_kembali']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice body-->
                            <!-- begin: Invoice footer-->
                            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-9">
                                    <div class="d-flex flex-column flex-md-row font-size-lg">
                                        <div class="d-flex flex-column flex-root">
                                            <div class="font-weight-bolder mb-10" style="font-size: 20px; text-align: center;">MENGETAHUI</div>
                                            <div class="d-flex mb-4">
                                                <span class="text-dark-50 flex-root font-weight-bold">Nama Atasan :</span>
                                                <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['nama_atasan']; ?></span>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <span class="text-dark-50 flex-root font-weight-bold">Email Atasan :</span>
                                                <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['email_atasan']; ?></span>
                                            </div>
                                            <div class="d-flex mb-lg-15 mb-md-15 mb-sm-10">
                                                <span class="text-dark-50 flex-root font-weight-bold">Nomor Atasan :</span>
                                                <span class="text-dark flex-root font-weight-boldest"><?= $dt_prmt_lyn['nomor_atasan']; ?></span>
                                            </div>
                                            <div class="d-flex mb-sm-8">
                                                <span class="text-dark-50 flex-root font-weight-bold">Status :</span>
                                                <?php if ($dt_prmt_lyn['status_permintaan'] == 'Open') : ?>
                                                    <span class="text-dark-50 flex-root font-weight-bold"><span class="label label-primary label-inline"><?= $dt_prmt_lyn['status_permintaan']; ?></span></span>
                                                <?php elseif ($dt_prmt_lyn['status_permintaan'] == 'Menunggu TTD') : ?>
                                                    <span class="text-dark-50 flex-root font-weight-bold"><span class="label label-danger label-pill label-inline"><?= $dt_prmt_lyn['status_permintaan']; ?></span></span>
                                                <?php elseif ($dt_prmt_lyn['status_permintaan'] == 'Sedang Diproses') : ?>
                                                    <span class="text-dark-50 flex-root font-weight-bold"><span class="label label-success label-pill label-inline"><?= $dt_prmt_lyn['status_permintaan']; ?></span></span>
                                                <?php else : ?>
                                                    <span class="text-dark-50 flex-root font-weight-bold"><span class="label label-dark label-pill label-inline"><?= $dt_prmt_lyn['status_permintaan']; ?></span></span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row">
                                            <!--begin::Foto TTD-->
                                            <div style="text-align: center;" class="form-group col-md-12">
                                                <div class="font-weight-bolder mb-10" style="font-size: 20px; text-align: center;">Tanda Tangan</div>
                                                <div class="col-md-12">
                                                    <div style="width: 250px; height: 250x; margin-left: auto; margin-right: auto;">
                                                        <img src="<?= base_url('assets/img/permintaan_layanan/ttd_penyerahaan/') . $dt_pmrsk['ttd_penerima_layanan']; ?>" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice footer-->
                            <!-- begin: Invoice action-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-9">
                                    <div class="d-flex justify-content-between">
                                        <a href="<?= base_url('permintaan_layanan/laporan/karyawan'); ?>" class="btn btn-warning font-weight-bold">
                                            <i class="fas fa-arrow-alt-circle-left"></i>
                                            Kembali
                                        </a>
                                        <a href="<?= base_url('permintaan_layanan/dokumen/pdf/' . $dt_prmt_lyn['no_permintaan'] . '/' . $dt_prmt_lyn['email']); ?>" class="btn btn-primary font-weight-bold">
                                            <i class="flaticon2-printer"></i>
                                            Cetak Dokumen
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice action-->
                            <!-- end: Invoice-->
                        </div>
                    </div>
                    <!-- end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
    <?php endforeach; ?>

</div>
<!--end::Content-->