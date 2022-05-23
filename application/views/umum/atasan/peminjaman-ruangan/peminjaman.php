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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Kelola Peminjaman Ruangan</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Kelola Peminjaman Ruangan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Data Peminjaman Ruangan</a>
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
                <div class="alert-text">Pada Halaman ini anda dapat melakukan <b>Persetujuan dari peminjaman ruangan yang telah dilakukan oleh Karyawan, Tenant ataupun user lainnya.</b>
                </div>
            </div>
            <!--end::Notice-->

            <div class="flash-datapeminjaman" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="far fa-building text-primary"></i>
                        </span>
                        <h3 class="card-label"> Tabel Data Peminjaman Ruangan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom" id="tablecomplain">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">No Peminjaman</th>
                                    <th class="align-middle" style="text-align: center;">Kegiatan</th>
                                    <th class="align-middle" style="text-align: center;">Ruangan</th>
                                    <th class="align-middle" style="text-align: center;">Jenis Layout</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Mulai</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Selesai</th>
                                    <th class="align-middle" style="text-align: center;">Status</th>
                                    <th class="align-middle" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data_peminjaman as $pjm) : ?>
                                    <tr>
                                        <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['no_peminjaman']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['nama_kegiatan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['ruangan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['jenis_layout']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['tanggal_mulai']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['tanggal_selesai']; ?></td>

                                        <!-- Status Buat Karyawan -->
                                        <?php if ($pjm['status_peminjaman'] == 'Open') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">50%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Peminjaman Ruangan telah dibuka" class="badge badge-primary"><?= $pjm['status_peminjaman']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($pjm['status_peminjaman'] == 'Close') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Peminjaman Ruangan telah ditutup" class="badge badge-dark"><?= $pjm['status_peminjaman']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($pjm['status_peminjaman'] == 'Cencel Request') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-danger mr-2 font-size-sm font-weight-boldest"><i style="color: red;" class="fa fa-exclamation-triangle"></i></span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Peminjaman Ruangan telah ditolak" class="badge badge-warning"><?= $pjm['status_peminjaman']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>

                                        <td class="align-middle" style="text-align: center;">
                                            <!-- action buat Karyawan -->
                                            <?php if ($pjm['status_peminjaman'] == "Open") : ?>
                                                <a href="<?= base_url('peminjaman_ruangan/Peminjaman/edit_persetujuan/' . $pjm['no_peminjaman']); ?>" title="Edit"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
                                            <?php elseif ($pjm['status_peminjaman'] == "Cencel Request") : ?>
                                                <a href="<?= base_url('peminjaman_ruangan/Peminjaman/proses_hapus_peminjaman/' . $pjm['no_peminjaman']); ?>" title="Hapus"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                                            <?php else : ?>
                                                <a style="opacity: 0.65; cursor: not-allowed;" href="#"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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