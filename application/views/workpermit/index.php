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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Izin Kerja</a>
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
                <div class="alert-text">Pada Halaman ini anda dapat mengajukan Form izin kerja yang akan ditujukan kepada bagian <b>Officer Umum</b>.
                </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <!--end::Notice-->

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="far fa-handshake text-primary"></i>
                        </span>
                        <h3 class="card-label"> Tabel Komplain</h3>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table id="tabel-izin-kerja" class="table table-hover table-head-custom">
                        <thead>
                            <tr>
                                <th class="align-middle" style="text-align: center;">#</th>
                                <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                <th class="align-middle" style="text-align: center;">Judul Komplain</th>
                                <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                <th class="align-middle" style="text-align: center;">Keadaan</th>
                                <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                <th class="align-middle" style="text-align: center;">Gambar</th>
                                <th class="align-middle" style="text-align: center;">Status Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($complain as $comp) : ?>
                                <tr>
                                    <td class="align-middle"><?= $i; ?></td>
                                    <td class="align-middle"><?= $comp['nama']; ?></td>
                                    <td class="align-middle"><?= $comp['judul_complain']; ?></td>
                                    <td class="align-middle"><?= $comp['deskripsi']; ?></td>
                                    <td class="align-middle"><?= $comp['keadaan']; ?></td>
                                    <td class="align-middle"><?= $comp['tingkat_bahaya']; ?></td>
                                    <td class="align-middle"><?= $comp['tanggal_ajukan']; ?></td>
                                    <td class="align-middle">
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#gambarmodal<?PHP echo $comp['id']; ?>">
                                            Lihat
                                        </button>
                                    </td>
                                    <td>
                                        <!-- Ubah Status Admin Tenant -->
                                        <?php if ($this->session->userdata('role_id') == 4) : ?>

                                            <?php if ($comp['status_complain'] == "Pending") : ?>
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest"><i class="fas fa-sync fa-spin"></i></span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Menunggu data complain disetujui" class="badge badge-warning">Pending</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            <?php elseif ($comp['status_complain'] == "Complain Disetujui") : ?>
                                                <a href="<?PHP echo base_url('workpermit/IzinKerja/') . $comp['id']; ?>" class="btn btn-warning btn-sm">Ajukan Izin Kerja</a>
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
            <!--end::Card-->

            <BR>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="far fa-handshake text-primary"></i>
                        </span>
                        <h3 class="card-label"> <?= $title ?></h3>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table id="tabel-izin-kerja" class="table table-hover table-head-custom">
                        <thead>
                            <tr>
                                <th class="align-middle" style="text-align: center;">#</th>
                                <th class="align-middle" style="text-align: center;">Nama Kontraktor</th>
                                <th class="align-middle" style="text-align: center;">Nama Penangung Jawab</th>
                                <th class="align-middle" style="text-align: center;">No Telp Kantor</th>
                                <th class="align-middle" style="text-align: center;">Deskripsi Pekerjaan</th>
                                <th class="align-middle" style="text-align: center;">Waktu Mulai</th>
                                <th class="align-middle" style="text-align: center;">Waktu Akhir</th>
                                <th class="align-middle" style="text-align: center;">Status Kerja</th>
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
                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['waktu_mulai']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $izn_krj['waktu_akhir']; ?></td>
                                    <?php if ($izn_krj['status_izin_kerja'] == 'Meminta Izin Kerja') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">50%</span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Meminta Izin Kerja" class="badge badge-warning"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php elseif ($izn_krj['status_izin_kerja'] == 'Izin Kerja Disetujui') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Disetujui" class="badge badge-primary"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php elseif ($izn_krj['status_izin_kerja'] == 'Sedang Dikerjakan') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Disetujui" class="badge badge-primary">Izin Kerja Disetujui</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php elseif ($izn_krj['status_izin_kerja'] == 'Selesai Dikerjakan') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Disetujui" class="badge badge-primary">Izin Kerja Disetujui</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php elseif ($izn_krj['status_izin_kerja'] == 'Selesai') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Disetujui" class="badge badge-primary">Izin Kerja Disetujui</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php elseif ($izn_krj['status_izin_kerja'] == 'Izin Kerja Ditolak') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-dark mr-2 font-size-sm font-weight-boldest"><strong>Ditolak</strong></span>
                                                    <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Ditolak" class="badge badge-danger"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php endif; ?>


                                    <?php if ($izn_krj['status_izin_kerja'] == 'Meminta Izin Kerja') : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <a class="btn btn-sm btn-icon btn-bg-dark btn-icon-white btn-hover-primary" href="<?PHP echo base_url('workpermit/manage/') . $comp['id']; ?>" target="_blank">
                                                <i class="flaticon2-gear"></i>
                                            </a>
                                        </td>
                                    <?php else : ?>
                                        <td class="align-middle" style="text-align: center;">
                                            <button disabled style="opacity: 0.65; cursor: not-allowed;" class="btn btn-sm btn-icon btn-bg-danger btn-icon-white btn-hover-primary" target="_blank">
                                                <i class="flaticon2-gear"></i>
                                            </button>
                                        </td>
                                    <?php endif ?>
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

<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" data-backdrop="static" id="gambarmodal<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
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