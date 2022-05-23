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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Kelola Permintaan Layanan</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Ubah Data Permintaan</a>
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
    <?php foreach ($data_permintaan as $lb) : ?>
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
                            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url(<?= base_url('assets_pengguna/'); ?>media/bg/bg-6.jpg);">
                                <div class="col-md-9">
                                    <div class="d-flex justify-content-between flex-column flex-md-row">
                                        <h1 class="display-4 text-white font-weight-boldest mb-2">Permintaan Layanan</h1>
                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <span class="text-white d-flex flex-column align-items-md-end opacity-85">
                                                <span class="text-white font-weight-boldest font-size-lg">HARI DAN TANGGAL</span>
                                                <span class="font-weight-boldest font-size-lg" style="color: #cc0000;"><?php echo $tgl = date('l, d-m-Y'); ?> </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="border-bottom w-100 opacity-20 pb-6 mb-10"></div>
                                    <div class="form-group row">
                                        <label class="text-dark col-3 col-form-label font-weight-bolder mb-2">ALAMAT EMAIL</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?= $lb['email']; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-3 col-form-label font-weight-bolder mb-2">NAMA LENGKAP</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?= $lb['nama']; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-3 col-form-label font-weight-bolder mb-2">PERMINTAAN</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?= $lb['permintaan']; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-3 col-form-label font-weight-bolder mb-2">JUDUL PERMINTAAN</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?= $lb['judul_permintaan']; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-3 col-form-label font-weight-bolder mb-2">JENIS PERMINTAAN</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?= $lb['jenis_permintaan_layanan']; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-3 col-form-label font-weight-bolder mb-2">DESKRIPSI PERMINTAAN</label>
                                        <div class="col-9">
                                            <textarea class="form-control" type="text" rows="5" disabled><?= $lb['deskripsi']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="border-bottom w-100 opacity-20"></div>
                                    <div class="d-flex justify-content-between text-white pt-6">
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">TANGGAL DIAJUKAN</span>
                                            <span class="opacity-70"><?= $lb['tanggal_ajukan']; ?></span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">NOMER PERMINTAAN</span>
                                            <span class="opacity-70"><?= $lb['no_permintaan']; ?></span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">STATUS PERMINTAAN</span>
                                            <?php if ($lb['status_permintaan'] == 'Open') : ?>
                                                <span class=""><span class="label label-primary label-inline mr-2"><?= $lb['status_permintaan']; ?></span></span>
                                            <?php elseif ($lb['status_permintaan'] == 'Menunggu TTD') : ?>
                                                <span class=""><span class="label label-danger label-inline mr-2"><?= $lb['status_permintaan']; ?></span></span>
                                            <?php elseif ($lb['status_permintaan'] == 'Sedang Diproses') : ?>
                                                <span class=""><span class="label label-succss label-inline mr-2"><?= $lb['status_permintaan']; ?></span></span>
                                            <?php else : ?>
                                                <span class=""><span class="label label-dark label-pill label-inline mr-2"><?= $lb['status_permintaan']; ?></span></span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice header-->
                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center bg-gray-100 py-8 px-8 px-md-0">

                                <!--begin::Notice-->
                                <div id="flashdatascroll">
                                    <div class="flash-datahistori" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                                </div>
                                <!--end::Notice-->

                                <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-toolbar">
                                            <ul class="nav nav-light-danger nav-bold nav-pills justify-content-center">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_5_1<?PHP echo $lb['no_permintaan']; ?>">
                                                        <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                                        <span class="nav-text">Mengetahui</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5_2<?PHP echo $lb['no_permintaan']; ?>">
                                                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="nav-text">Admin</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5_3<?PHP echo $lb['no_permintaan']; ?>">
                                                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="nav-text">Distribusi Pekerjaan</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5_4<?PHP echo $lb['no_permintaan']; ?>">
                                                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="nav-text">Pemeriksaan & Penyerahaan Kembali</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="kt_tab_pane_5_1<?PHP echo $lb['no_permintaan']; ?>" role="tabpanel" aria-labelledby="kt_tab_pane_5_1">
                                                <h6 style="font-weight: bolder; text-align: center;" class="modal-title mb-6">Mengetahui</h6>
                                                <form action="<?= base_url('permintaan_layanan/properti/ubahpersetujuan'); ?>" method="POST" novalidate="novalidate" id="kt_add_layananbaru_form">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Nama Atasan</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-lg form-control-solid" type="text" name="nm_atasan" value="<?= $lb['nama_atasan']; ?>" placeholder="Nama Atasan" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Atasan</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-lg form-control-solid" type="text" name="em_atasan" value="<?= $lb['email_atasan']; ?>" placeholder="Email Atasan" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Nomor Atasan</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-lg form-control-solid" type="text" name="no_atasan" value="<?= $lb['nomor_atasan']; ?>" placeholder="Nomor Atasan" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Tgl Persetujuan</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>" class="form-control" name="tanggal_persetujuan" disabled>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="kt_tab_pane_5_2<?PHP echo $lb['no_permintaan']; ?>" role="tabpanel" aria-labelledby="kt_tab_pane_5_2">
                                                <div class="form-row">
                                                    <?php foreach ($data_helpdesk as $hlpdsk) : ?>
                                                        <div class="col-md-6">
                                                            <h6 style="font-weight: bolder; text-align: center;" class="modal-title mb-6">Penerimaan Helpdesk</h6>
                                                            <form action="<?= base_url('permintaan_layanan/properti/kelola_penerimaan_helpdesk'); ?>" method="POST">
                                                                <div class="form-group row" hidden>
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">no permintaan</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="input" value="<?= $lb['no_permintaan']; ?>" class="form-control" name="no_lyn_adm_helpdesk" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tgl Terima Helpdesk</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="date" value="<?= $hlpdsk['tgl_terima_helpdesk']; ?>" class="form-control" name="tgl_terima_helpdesk" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Jenis Layanan</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <select class="form-control" name="jenis_layanan" required>
                                                                            <?php if ($hlpdsk['jenis_layanan'] == null) : ?>
                                                                                <option value="">- Pilih Jenis Layanan -</option>

                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                            <?php elseif ($hlpdsk['jenis_layanan'] == "RFS (Request For Service)") : ?>
                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>

                                                                                <option value="">- Pilih Jenis Layanan -</option>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                            <?php elseif ($hlpdsk['jenis_layanan'] == "RFC (Request For Change)") : ?>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>

                                                                                <option value="">- Pilih Jenis Layanan -</option>
                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                            <?php elseif ($hlpdsk['jenis_layanan'] == "RFD (Request For Devlopment) Material Tersedia") : ?>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>

                                                                                <option value="">- Pilih Jenis Layanan -</option>
                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                            <?php elseif ($hlpdsk['jenis_layanan'] == "RFD (Request For Devlopment) Material Belum Tersedia") : ?>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>

                                                                                <option value="">- Pilih Jenis Layanan -</option>
                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                            <?php elseif ($hlpdsk['jenis_layanan'] == "RFM (Request For Maintance) Material Tersedia") : ?>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>

                                                                                <option value="">- Pilih Jenis Layanan -</option>
                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                            <?php else : ?>
                                                                                <option value="RFM (Request For Maintance) Material Belum Tersedia">RFM (Request For Maintance) Material Belum Tersedia</option>

                                                                                <option value="">- Pilih Jenis Layanan -</option>
                                                                                <option value="RFS (Request For Service)">RFS (Request For Service)</option>
                                                                                <option value="RFC (Request For Change)">RFC (Request For Change)</option>
                                                                                <option value="RFD (Request For Devlopment) Material Tersedia">RFD (Request For Devlopment) Material Tersedia</option>
                                                                                <option value="RFD (Request For Devlopment) Material Belum Tersedia">RFD (Request For Devlopment) Material Belum Tersedia</option>
                                                                                <option value="RFM (Request For Maintance) Material Tersedia">RFM (Request For Maintance) Material Tersedia</option>

                                                                            <?php endif; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Diterima Oleh</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="text" value="<?= $hlpdsk['diterima_oleh']; ?>" class="form-control" name="diterima_oleh" placeholder="Masukan nama penerima" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="text" value="<?= $hlpdsk['nama_penerima']; ?>" class="form-control" name="nama_penerima" placeholder="Masukan nama pengirim" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">EXT / HP</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="text" value="<?= $hlpdsk['ext_hp']; ?>" class="form-control" name="ext_hp" placeholder="Masukan EXT / HP" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="email" value="<?= $hlpdsk['email_penerima']; ?>" class="form-control" name="email_penerima" placeholder="Masukan alamat email" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group float-right">
                                                                    <button type="submit" class="btn btn-success">Acc Penerimaan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    <?php endforeach; ?>

                                                    <?php foreach ($data_eskalasi as $eskls) : ?>
                                                        <div class="col-md-6">
                                                            <h6 style="font-weight: bolder; text-align: center;" class="modal-title mb-6">Eskalasi</h6>
                                                            <form action="<?= base_url('permintaan_layanan/properti/kelola_eskalasi'); ?>" method="POST">
                                                                <div class="form-group row" hidden>
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">no permintaan</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="input" value="<?= $lb['no_permintaan']; ?>" class="form-control" name="no_lyn_adm_eskalasi" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tgl Assign Eskalasi</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="date" value="<?= $eskls['tgl_assignment_eskalasi']; ?>" class="form-control" name="tgl_assigment_eskalasi" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Eskalasi Ke</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="text" value="<?= $eskls['eskalasi_ke']; ?>" class="form-control" name="eskalasi_ke" placeholder="Masukan nama penerima eskalasi" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input type="email" value="<?= $eskls['email_eskalasi']; ?>" class="form-control" name="email_eskalasi" placeholder="Masukan alamat email" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label">Alasan Eskalasi</label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <textarea class="form-control" rows="3" name="alasan_eskalasi" placeholder="Masukan alasan eskalasi" required><?= $eskls['alasan_eskalasi']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group float-right">
                                                                    <button type="submit" class="btn btn-dark">Acc eskalasi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_5_3<?PHP echo $lb['no_permintaan']; ?>" role="tabpanel" aria-labelledby="kt_tab_pane_5_3">
                                                <h6 style="font-weight: bolder; text-align: center;" class="modal-title mb-6">Distribusi Pekerja</h6>
                                                <div class="table-responsive">
                                                    <!--begin: Datatable-->
                                                    <table class="table table-separate table-head-custom">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle" style="text-align: center;">#</th>
                                                                <th class="align-middle" style="text-align: center;">Nama Pekerja</th>
                                                                <th class="align-middle" style="text-align: center;">Jenis Pekerjaan</th>
                                                                <th class="align-middle" style="text-align: center;">Lokasi Pekerjaan</th>
                                                                <th class="align-middle" style="text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($data_distribusi_pekerja as $dst_pkrj) : ?>
                                                                <tr>
                                                                    <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                                                    <td class="align-middle" style="text-align: center;"><?= $dst_pkrj['nama_pekerja']; ?></td>
                                                                    <td class="align-middle" style="text-align: center;"><?= $dst_pkrj['jenis_pekerjaan']; ?></td>
                                                                    <td class="align-middle" style="text-align: center;"><?= $dst_pkrj['lokasi_pekerjaan']; ?></td>
                                                                    <td class="align-middle" style="text-align: center;">
                                                                        <a href="<?= base_url('permintaan_layanan/properti/proses_delete_dstpekerja/') . $dst_pkrj['id'] . '/' . $dst_pkrj['no_permintaan_dstrb']; ?>" class="btn btn-danger btn-sm btn-icon hapus-distribusiPekejra">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                                <?php $i++; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <!--end: Datatable-->
                                                </div>

                                                <div class="pembatas my-8" style="border: 2px solid LightGray; border-radius: 30px;"></div>

                                                <span id="success_result"></span>
                                                <form method="POST" id="repeater_form">
                                                    <div id="repeater">
                                                        <div class="repeater-heading mr-5" align="right">
                                                            <button type="button" class="btn btn-primary repeater-add-btn"><i class="fas fa-hard-hat"></i> Tambah Pekerja</button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="items" data-group="programming_languages">
                                                            <div class="item-content">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-3" hidden>
                                                                            <label>No Permintaan:</label>
                                                                            <input type="text" class="form-control" value="<?= $no_permintaan ?>" data-skip-name="true" data-name="no_permintaan[]" required />
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <label>Nama Pekerja:</label>
                                                                            <input type="text" class="form-control" placeholder="Nama Pekerja" data-skip-name="true" data-name="nama_pekerja[]" autocomplete="off" required />
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <label>Jenis Pekerjaan:</label>
                                                                            <input type="text" class="form-control" placeholder="Jenis Pekerjaan" data-skip-name="true" data-name="jenis_pekerjaan[]" autocomplete="off" required />
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <label>Lokasi Pekerjaan:</label>
                                                                            <input type="text" class="form-control" placeholder="Lokasi Pekerjaan" data-skip-name="true" data-name="lokasi_pekerjaan[]" autocomplete="off" required />
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top:24px;" align="center">
                                                                            <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="form-group mb-2" align="center">
                                                        <button type="submit" name="insert" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Pekerja </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_5_4<?PHP echo $lb['no_permintaan']; ?>" role="tabpanel" aria-labelledby="kt_tab_pane_5_4">
                                                <?php foreach ($data_pemeriksaan_penyerahaan as $prskpnyr) : ?>
                                                    <form action="<?= base_url('permintaan_layanan/properti/kelola_pemeriksaan_penyerahaan'); ?>" method="POST">
                                                        <h6 style="font-weight: bolder; text-align: center;" class="modal-title mb-6">Pemeriksaan</h6>
                                                        <div class="form-group" hidden>
                                                            <label for="no_permintaan" style="color: black; float: left;">Nomor Permintaan</label>
                                                            <input type="text" class="form-control" name="no_permintaan" value="<?= $lb['no_permintaan']; ?>">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="deskripsi" style="color: black; float: left;">Hasil Pemeriksaan</label>
                                                                <textarea class="form-control" name="hasil_pemeriksaan" rows="3" placeholder="Masukan Hasil Pemeriksaan" required><?= $prskpnyr['hasil_pemeriksaan']; ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="deskripsi" style="color: black; float: left;">Usulan Solusi</label>
                                                                <textarea class="form-control" name="usulan_solusi" rows="3" placeholder="Masukan Usulan Solusi" required><?= $prskpnyr['usulan_solusi']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <?php if ($prskpnyr['ttd_pemeriksaan'] == "") : ?>
                                                                <div style="text-align: center;" class="form-group col-md-6">
                                                                    <label style="color: black;">Tanda Tangan</label>
                                                                    <!--Bagian::Form Upload TTD-->
                                                                    <div class="dropzone mb-3" id="file_upload_ttd_pemeriksaan">
                                                                        <div class="dz-message">
                                                                            <h5>Letakkan Signature di sini</h5> Atau <strong>klik</strong> untuk mengunggah
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" id="upload_ttd_pemeriksaan" class="btn btn-info"><i class="fas fa-cloud-upload-alt"></i> Unggah TTD</button>
                                                                </div>
                                                            <?php else : ?>
                                                                <div style="text-align: center;" class="form-group col-md-6 col-sm-6">
                                                                    <label style="color: black;">Tanda Tangan</label>
                                                                    <div class="col-md-12">
                                                                        <div style="width: 250px; height: 250x; margin-left: auto; margin-right: auto;">
                                                                            <img src="<?= base_url('assets/img/permintaan_layanan/ttd_pemeriksaan/') . $prskpnyr['ttd_pemeriksaan']; ?>" class="img-thumbnail">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <div class="form-group col-md-6 col-sm-12">
                                                                <div class="form-group text-center">
                                                                    <label for="tanggal_pemeriksaaan" style="color: black; float: left;">Tanggal Pemeriksaan</label>
                                                                    <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>" class="form-control date-picker" name="tanggal_pemeriksaaan" required>
                                                                </div>
                                                                <!-- LINK UNTUK MEMBUAT TTD -->
                                                                <div class="form-group text-center mt-10">
                                                                    <a href="<?= base_url('auth/ttd'); ?>" target="_blank">Buat Tanda Tangan Digital</a>
                                                                    <span class="form-text text-muted">Kilik Link diatas untuk membuat Tanda Tangan Digital.</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <h6 style="font-weight: bolder; text-align: center;" class="modal-title mb-3 mt-6">Penyerahaan Kembali</h6>
                                                        <div class="form-group row">
                                                            <div class="form-group col-md-12">
                                                                <label style="color: black; float: left;">Catatan Pemeliharaan</label>
                                                                <textarea class="form-control" name="catatan_pemeliharaan" rows="3" placeholder="Masukan Catatan Pemeliharaan" required><?= $prskpnyr['catatan_pemeliharaan']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" style="margin-top: -35px;">
                                                            <div class="form-group col-md-6">
                                                                <label style="color: black; float: left;">Tanggal Kembali</label>
                                                                <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>" class="form-control date-picker" name="tanggal_kembali" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label style="color: black; float: left;">Total Biaya</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                                    <input type="number" value="<?= $prskpnyr['total_biaya']; ?>" class="form-control" name="total_biaya" placeholder="Masukan Total Biaya">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Data Parammeter STATUS yang dikirm ke database -->
                                                        <div class="form-group" hidden>
                                                            <label for="nama_pengaju" style="color: black; float: left;">Tgl Persetujuan</label>
                                                            <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>" class="form-control" name="tanggal_persetujuan">
                                                        </div>
                                                        <div class="form-group" hidden>
                                                            <label for="nama_pengaju" style="color: black; float: left;">Nama Lengkap</label>
                                                            <input type="text" class="form-control" name="nama_pengaju" value="<?= $lb['nama']; ?>">
                                                        </div>
                                                        <?php if ($prskpnyr['ttd_pemeriksaan'] != "") : ?>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12" align="center">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Penyerahaan dan Pemeriksaan</button>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12" align="center">
                                                                    <a href="<?= base_url('permintaan_layanan/properti/proses_kelola_permintaan_cencel_request/' . $lb['no_permintaan'] . '/' . $lb['permintaan']) ?>" id="cencel_request_permintaan" class="btn btn-danger font-weight-bold mr-15">Tolak Permintaan</a>
                                                                    <button style="cursor: not-allowed; opacity: 0.5;" disabled type="submit" id="tombol_data_pemeriksaan" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Penyerahaan dan Pemeriksaan</button>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </form>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice body-->
                            <!-- begin: Invoice action-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-9">
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