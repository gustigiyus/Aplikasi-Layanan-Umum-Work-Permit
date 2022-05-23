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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Permintaan Layanan</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Data Permintaan</a>
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
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="flash-DataPermintaanLayananKaryawan" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <!--end::Notice-->

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="fas fa-head-side-cough text-info"></i>
                        </span>
                        <h3 class="card-label"> Tabel Permintaan Layanan</h3>
                    </div>

                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <a disabled style="pointer-events: none; border-bottom-left-radius: 7px; border-top-left-radius: 7px;" href="#" class="btn btn-light-primary btn-md btn-icon pulse pulse-dark btn-square">
                                    <i class="flaticon2-plus text-danger"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                                <a href="#" style="border-bottom-right-radius: 7px; border-top-right-radius: 7px;" class="btn btn-primary btn-md font-weight-boldest btn-square" data-toggle="modal" data-target="#AddlayananbaruModal">Tambah Permintaan</a>

                            </div>
                            <!--end::Button-->
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="tablecomplain">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">Nomer Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Judul Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Jenis Permintaan</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                    <th class="align-middle" style="text-align: center;">Status</th>
                                    <th class="align-middle" style="text-align: center;">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($layananbaru as $lb) : ?>
                                    <tr>
                                        <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $lb['no_permintaan']; ?></td>
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
                                        <td class="align-middle" style="text-align: center;"><span class="text-primary font-size-md font-weight-boldest"><?= $lb['tanggal_ajukan']; ?></span></td>

                                        <!-- Status Buat Karyawan -->
                                        <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                            <?php if ($lb['status_permintaan'] == 'Open') : ?>
                                                <td class="align-middle" style="text-align: center;">
                                                    <div class="d-flex flex-column w-100 mr-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="text-dark mr-2 font-size-sm font-weight-boldest">40%</span>
                                                            <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Permintaan Layanan telah dibuka" class="badge badge-primary">Baru</span>
                                                        </div>
                                                        <div class="progress progress-xs w-100">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php elseif ($lb['status_permintaan'] == 'Menunggu TTD') : ?>
                                                <td class="align-middle" style="text-align: center;">
                                                    <div class="d-flex flex-column w-100 mr-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="text-dark mr-2 font-size-sm font-weight-boldest">60%</span>
                                                            <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Menunggu konfirmasi Tanda Tangan Anda" class="badge badge-info"><?= $lb['status_permintaan']; ?></span>
                                                        </div>
                                                        <div class="progress progress-xs w-100">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php elseif ($lb['status_permintaan'] == 'Sedang Diproses') : ?>
                                                <td class="align-middle" style="text-align: center;">
                                                    <div class="d-flex flex-column w-100 mr-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="text-dark mr-2 font-size-sm font-weight-boldest">80%</span>
                                                            <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Menunggu proses penutupan dari permintaan layanan yang telah diajukan" class="badge badge-success"><?= $lb['status_permintaan']; ?></span>
                                                        </div>
                                                        <div class="progress progress-xs w-100">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php elseif ($lb['status_permintaan'] == 'Cencel Request') : ?>
                                                <td class="align-middle" style="text-align: center;">
                                                    <div class="d-flex flex-column w-100 mr-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="text-danger mr-2 font-size-sm font-weight-boldest"><i style="color: red;" class="fa fa-exclamation-triangle"></i></span>
                                                            <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Permintaan Layanan telah ditolak" class="badge badge-warning">Permintaan Ditolak</span>
                                                        </div>
                                                        <div class="progress progress-xs w-100">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php else : ?>
                                                <td class="align-middle" style="text-align: center;">
                                                    <div class="d-flex flex-column w-100 mr-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                            <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Permintaan Layanan telah ditutup" class="badge badge-dark">Selesai</span>
                                                        </div>
                                                        <div class="progress progress-xs w-100">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <td class="align-middle" style="text-align: center;">
                                            <!-- action buat Karyawan -->
                                            <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>

                                                <?php if ($lb['status_permintaan'] == "Open") : ?>
                                                    <a data-toggle="tooltip" data-theme="dark" title="Edit Data Permintaan" data-placement="left" href="<?= base_url('permintaan_layanan/Properti/editpermintaan/' . $lb['no_permintaan']); ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3 mb-md-3">
                                                        <span class="svg-icon svg-icon-md svg-icon-warning">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                    <a data-toggle="tooltip" data-theme="dark" title="Lihat Detail Permintaan" data-placement="left" href="<?= base_url('permintaan_layanan/properti/detail_permintaan/') . $lb['no_permintaan']; ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                                                <?php elseif ($lb['status_permintaan'] == 'Menunggu TTD') : ?>
                                                    <a data-toggle="tooltip" data-theme="dark" title="Tanda Tangan Disini" data-placement="left" href="<?= base_url('permintaan_layanan/properti/detail_permintaan/') . $lb['no_permintaan']; ?>" class="btn btn-icon btn-light btn-hover-danger btn-sm mb-md-3">
                                                        <i class="fas fa-signature text-dark"></i>
                                                    </a>
                                                <?php elseif ($lb['status_permintaan'] == 'Sedang Diproses') : ?>
                                                    <a data-toggle="tooltip" data-theme="dark" title="Lihat Detail Permintaan" data-placement="left" href="<?= base_url('permintaan_layanan/properti/detail_permintaan/') . $lb['no_permintaan']; ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm mb-md-3">
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
                                                <?php elseif ($lb['status_permintaan'] == 'Cencel Request') : ?>
                                                    <a data-toggle="tooltip" data-theme="dark" title="Lihat Detail Permintaan" data-placement="left" href="<?= base_url('permintaan_layanan/properti/detail_permintaan/') . $lb['no_permintaan']; ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                                                <?php else : ?>
                                                    <a data-toggle="tooltip" data-theme="dark" title="Lihat Detail Permintaan" data-placement="left" href="<?= base_url('permintaan_layanan/properti/detail_permintaan/') . $lb['no_permintaan']; ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                                                <?php endif; ?>

                                            <?php endif; ?>
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

<!-- Modal Add Data layananbaru(untuk user) -->
<div class="modal fade" id="AddlayananbaruModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AddlayananbaruModaldataLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 style="font-weight: bolder;" class="modal-title" id="AddlayananbaruModaldataLabel">Tambah
                    Permintaan Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="<?= base_url('permintaan_layanan/properti/addpermintaanbaru'); ?>" method="POST" id="kt_add_permintaan_layanan_form">
                <div class="scroll scroll-pull" data-scroll="true" data-height="450">
                    <div class="modal-body">

                        <?php
                        // mengambil data barang dengan kode paling besar

                        $koneksi = mysqli_connect('localhost', 'root', '', 'layanan');
                        $query = mysqli_query($koneksi, "SELECT max(no_permintaan) as noperimntaan FROM tb_permintaan_layanan");
                        $kd_layanan = mysqli_fetch_array($query);
                        $nopermintaan = $kd_layanan['noperimntaan'];

                        $urutan = (int) substr($nopermintaan, 4, 4);
                        $urutan++;

                        $angkadepan = "0000";
                        $nopermintaan = $angkadepan . sprintf("%04s", $urutan);

                        ?>
                        <h6 style="font-weight: bolder;" class="modal-title mb-4">PERMINTAAN LAYANAN</h6>
                        <div class="form-group">
                            <label for="id_nomer_layanan" class="font-weight-bold" style="float: left;">Nomor Permintaan</label>
                            <input type="text" class="form-control form-control-solid" id="id_nomer_layanan" name="id_nomer_layanan" value="<?php echo $nopermintaan ?>" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="font-weight-bold" style="float: left;">Email</label>
                                <input type="email" class="form-control form-control-solid" id="email" name="email" value="<?= $this->session->userdata('email'); ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama" class="font-weight-bold" style="float: left;">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-solid" id="nama" name="nama" value="<?= $this->session->userdata('name'); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="permintaan" class="form-control-label font-weight-bold" style="float: left;">Layanan Permintaan</label>
                            <select class="form-control" name="permintaan" id="permintaan" required>
                                <option value="">- Pilih Permintaan -</option>
                                <option value="Permintaan Baru">Permintaan Baru</option>
                                <option value="Penanganan Gangguan">Penanganan Gangguan</option>
                            </select>
                        </div>
                        <div class="form-group sembunyiJudul">
                            <label for="judul_permintaan" class="form-control-label font-weight-bold" style="float: left;">Judul Permintaan</label>
                            <input autocomplete="off" id="judul_permintaan" type="text" class="form-control" placeholder="Masukan judul permintaan layanan" name="judul_permintaan" required>
                        </div>
                        <div class="form-group sembunyiJenisPermintaan">
                            <label for="jenis_permintaan_layanan" class="form-control-label font-weight-bold" style="float: left;">Jenis Permintaan</label>
                            <select class="form-control" name="jenis_permintaan_layanan" id="jenis_permintaan_layanan" required>
                                <option value="">- Pilih Jenis Permintaan -</option>
                                <?php foreach ($jenis_layanan as $jns_lyn) : ?>
                                    <option value="<?= $jns_lyn['jenis_permintaan_layanan'] ?>"><?= $jns_lyn['jenis_permintaan_layanan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kt_autosize_deskripsi" class="form-control-label font-weight-bold" style="float: left;">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="kt_autosize_deskripsi" rows="3" placeholder="Masukan deskripsi permintaan layanan" required></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="status_permintaan" class="form-control-label font-weight-bold" style="float: left;">Status Permintaan</label>
                                <select class="form-control" id="status_permintaan" name="status_permintaan">
                                    <option value="Open">Open</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggal_ajukan" class="form-control-label font-weight-bold" style="float: left;">Tanggal Diajukan</label>
                                <input type="date" id="tanggal_ajukan" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>" class="form-control date-picker" name="tanggal_ajukan">
                            </div>
                        </div>
                        <hr class="mb-6">
                        <h6 style="font-weight: bolder;" class="modal-title mb-6">MENGETAHUI</h6>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold">Nama Atasan</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="nm_atasan" value="<?= $detail_user[0]['nama_atasan']; ?>" placeholder="Nama Atasan" readonly />
                                <span class="form-text text-warning">Untuk melengkapi <strong class="text-danger">Nama Atasan</strong>, anda dapat mengisi di bagian Profil.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold">Email Atasan</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="em_atasan" value="<?= $detail_user[0]['em_atasan']; ?>" placeholder="Email Atasan" readonly />
                                <span class="form-text text-warning">Untuk melengkapi <strong class="text-danger">Email Atasan</strong>, anda dapat mengisi di bagian Profil.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold">Nomor Atasan</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="no_atasan" value="<?= $detail_user[0]['no_atasan']; ?>" placeholder="Nomor Atasan" readonly />
                                <span class="form-text text-warning">Untuk melengkapi <strong class="text-danger">Nomer Atasan</strong>, anda dapat mengisi di bagian Profil.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="simpan_add_permintaan_layanan">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>