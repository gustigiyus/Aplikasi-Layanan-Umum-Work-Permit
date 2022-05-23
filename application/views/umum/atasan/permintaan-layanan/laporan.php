<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-4 py-lg-7 subheader-transparent" id="kt_subheader">
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Kelola Permintaan Layanan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Data Laporan Permintaan</a>
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
                <span class="text-dark opacity-60 font-weight-bold">Berdasarkan Tangal Diajukan</span>
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
                    <a href="<?= base_url('permintaan_layanan/laporan/atasan'); ?>" class="btn btn-danger font-weight-bold btn-hover-light-dark ml-3 px-sm-5">Reset</a>
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
            <!--begin::Notice-->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <!--end::Notice-->

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="fas fa-head-side-cough text-info"></i>
                        </span>
                        <h3 class="card-label"> Table Data Laporan Permintaan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="tabel_data_laporan_permintaan_layanan_atasan">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">Nomer Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                    <th class="align-middle" style="text-align: center;">Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Judul Permintaan</th>
                                    <th class="align-middle" style="text-align: center; ">Jenis Permintaan</th>
                                    <th class="align-middle" style="text-align: center; min-width: 200px;">Deskripsi Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Persetujuan</th>
                                    <th class="align-middle" style="text-align: center;">Status</th>
                                    <th class="align-middle" style="text-align: center;">Lihat Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($layananbaru as $lb) : ?>
                                    <tr>
                                        <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $lb['no_permintaan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $lb['nama']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $lb['permintaan']; ?></td>
                                        <td class="align-middle" style="text-align: center;">
                                            <?php if ($lb['judul_permintaan'] == null) : ?>
                                                <i class="flaticon2-line text-danger"></i>
                                            <?php else : ?>
                                                <?= $lb['judul_permintaan']; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">
                                            <?php if ($lb['jenis_permintaan_layanan'] == null) : ?>
                                                <i class="flaticon2-line text-danger"></i>
                                            <?php else : ?>
                                                <?= $lb['jenis_permintaan_layanan']; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle" style="text-align: center; min-width: 200px;"><?= $lb['deskripsi']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $lb['tanggal_ajukan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $lb['tanggal_persetujuan']; ?></td>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Permintaan Layanan telah ditutup" class="badge badge-dark"><?= $lb['status_permintaan']; ?></span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">
                                            <a data-toggle="tooltip" data-theme="dark" data-placement="left" title="Lihat Detail Permintaan" href="<?= base_url('permintaan_layanan/laporan/detail_laporan/') . $lb['no_permintaan'] . '/' . $lb['email']; ?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-md">
                                                <span class="svg-icon svg-icon-info svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Binocular.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z" fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
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
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->