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
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Kelola Peminjaman Ruangan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Persetujuan Peminjaman</a>
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
    <?php foreach ($data_peminjaman as $pjm) : ?>
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
                                        <h1 class="display-4 text-white font-weight-boldest mb-2">Peminjaman Ruangan</h1>
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
                                            <span class="opacity-70"><?= $pjm['tanggal_request']; ?></span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">NOMER PEMINJAMAN</span>
                                            <span class="opacity-70"><?= $pjm['no_peminjaman']; ?></span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">STATUS PERMINTAAN</span>
                                            <?php if ($pjm['status_peminjaman'] == 'Open') : ?>
                                                <span class=""><span class="label label-primary label-inline mr-2"><?= $pjm['status_peminjaman']; ?></span></span>
                                            <?php else : ?>
                                                <span class=""><span class="label label-dark label-pill label-inline mr-2"><?= $pjm['status_peminjaman']; ?></span></span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice header-->
                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center bg-white-100 py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-9">

                                    <div class="card card-custom">
                                        <div class="card-header card-header-tabs-line justify-content-center">

                                            <div class="card-toolbar">
                                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_data_peminjam">
                                                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                                            <span class="nav-text">Data Peminjam</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_data_ruangan">
                                                            <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                            <span class="nav-text">Data Ruangan</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="kt_tab_pane_data_peminjam" role="tabpanel" aria-labelledby="kt_tab_pane_data_peminjam">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-10">
                                                        <span class="text-dark-75">Data Peminjam</span>
                                                    </h3>
                                                    <!--begin::Info-->
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Nama Peminjam :</span>
                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['nama']; ?></span>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Alamat Email :</span>
                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['email']; ?></span>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">NIP :</span>
                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['nip']; ?></span>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Divisi :</span>
                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['divisi']; ?></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="text-dark-50 flex-root font-weight-bold">Ext/Hp :</span>
                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['ext/hp']; ?></span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <div class="tab-pane fade" id="kt_tab_pane_data_ruangan" role="tabpanel" aria-labelledby="kt_tab_pane_data_ruangan">
                                                    <h3 class="font-weight-bolder font-size-h2 mb-10">
                                                        <span class="text-dark-75">Data Ruangan</span>
                                                    </h3>
                                                    <div class="col-md-12 col-sm-12 mb-4 p-0">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <span class="text-dark-50 flex-root font-weight-bold">Ruangan :</span>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['ruangan']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <span class="text-dark-50 flex-root font-weight-bold" style="float: right;">Jumlah Orang :</span>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <span class="text-dark flex-root font-weight-bold"><?= $pjm['jumlah_orang']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-4 p-0">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3">
                                                                <span class="text-dark-50 flex-root font-weight-bold">Judul kegiatan</span>
                                                            </div>
                                                            <div class="col-md-9 col-sm-9">
                                                                <span class="text-dark flex-root font-weight-bold"><?= $pjm['nama_kegiatan']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-4 p-0">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3">
                                                                <span class="text-dark-50 flex-root font-weight-bold">Jenis Layout :</span>
                                                            </div>
                                                            <div class="col-md-9 col-sm-9">
                                                                <span class="text-dark flex-root font-weight-bold"><?= $pjm['jenis_layout']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-10 p-0">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3">
                                                                <span class="text-dark-50 flex-root font-weight-bold">Perlengkapan :</span>
                                                            </div>
                                                            <div class="col-md-9 col-sm-9">
                                                                <span class="text-dark flex-root font-weight-bold"><?= $pjm['perlengkapan']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end::Info-->

                                                    <div class="table-responsive">
                                                        <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                                                            <thead>
                                                                <tr class="bg-gray-100 text-left">
                                                                    <th style="min-width: 200px" class="pl-7">
                                                                        <span class="text-dark-75">Tanggal Request</span>
                                                                    </th>
                                                                    <th style="min-width: 120px">Tanggal Mulai</th>
                                                                    <th style="min-width: 130px">Tanggal Selesai</th>
                                                                    <th style="min-width: 110px">Waktu Mulai</th>
                                                                    <th style="min-width: 120px">Waktu Selesai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="font-weight-boldest font-size-lg">
                                                                    <td style="min-width: 200px" class="pl-7"><?= $pjm['tanggal_request']; ?></td>
                                                                    <td style="text-align: center;"><?= $pjm['tanggal_mulai']; ?></td>
                                                                    <td style="text-align: center;"><?= $pjm['tanggal_selesai']; ?></td>
                                                                    <td style="text-align: center;"><?= $pjm['waktu_mulai']; ?></td>
                                                                    <td style="text-align: center;"><?= $pjm['waktu_selesai']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
                                            <form id="form_close_peminjaman">
                                                <div class="font-weight-bolder mb-10" style="font-size: 20px; text-align: center;">MENGETAHUI</div>
                                                <div class="d-flex mb-4">
                                                    <span class="text-dark-50 flex-root font-weight-bold">Nama Lengkap :</span>
                                                    <span class="text-dark flex-root font-weight-bold"><?= $pjm['nama_atasan']; ?></span>
                                                </div>
                                                <div class="d-flex mb-4">
                                                    <span class="text-dark-50 flex-root font-weight-bold">Alamat Email :</span>
                                                    <span class="text-dark flex-root font-weight-bold"><?= $pjm['email_atasan']; ?></span>
                                                </div>
                                                <div class="d-flex mb-lg-25 mb-md-25 mb-sm-10">
                                                    <span class="text-dark-50 flex-root font-weight-bold">Divisi :</span>
                                                    <span class="text-dark flex-root font-weight-bold"><?= $pjm['divisi']; ?></span>
                                                </div>
                                                <div class="form-group" hidden>
                                                    <label for="no_peminjaman" style="color: black; float: left;">No Peminjaman</label>
                                                    <input type="text" class="form-control" name="no_peminjaman" value="<?= $pjm['no_peminjaman']; ?>" required>
                                                </div>
                                                <div class="form-group" hidden>
                                                    <label for="status_peminjaman" style="color: black; float: left;">Status Peminjaman</label>
                                                    <input type="text" class="form-control" name="status_peminjaman" value="Close" required>
                                                </div>
                                                <div class="d-flex d-flex mb-sm-8">
                                                    <a href="<?= base_url('peminjaman_ruangan/peminjaman/proses_kelola_peminjaman_cencel_request/' . $pjm['no_peminjaman']); ?>" id="cencel_request" class="btn btn-danger font-weight-bold mr-15">Tolak Peminjaman</a>
                                                    <button disabled style="cursor: not-allowed;" type="submit" id="tombol_data_setujui_peminjaman" class="btn btn-primary font-weight-bold">
                                                        Setujui Peminjaman
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <!--begin::Form-->
                                            <div id="main">
                                                <div id="header">
                                                    <div class="font-weight-bolder mb-10" style="font-size: 20px; text-align: center;">SERET & LETAKAN TTD KESINI</div>
                                                </div>
                                                <!--Bagian::Form Upload Foto Akhir-->
                                                <form style="text-align: center;" class="dropzone" id="file_upload_ttd_peminjaman_ruangan">
                                                    <div class="dz-message">
                                                        <h3>Letakkan file di sini</h3> Atau <strong>klik</strong> untuk mengunggah
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- LINK UNTUK MEMBUAT TTD -->
                                            <div class="form-group text-center mt-5">
                                                <a href="<?= base_url('auth/ttd'); ?>" target="_blank">Buat Tanda Tangan Digital</a>
                                                <span class="form-text text-muted">Kilik Link diatas untuk membuat Tanda Tangan Digital.</span>
                                            </div>
                                            <button type="button" id="upload_btn_ttd_peminjaman_ruangan" class="btn btn-info">Unggah</button>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice footer-->
                            <!-- begin: Invoice action-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-9">
                                    <div class="d-flex justify-content-center">
                                        <a href="<?= base_url('peminjaman_ruangan/Peminjaman/kelola_peminjaman'); ?>" class="btn btn-warning font-weight-bold">
                                            <i class="fa fa-home"></i>
                                            Kembali ke halaman sebelumnya
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