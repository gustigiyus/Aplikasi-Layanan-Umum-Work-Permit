<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Laporan Peminjaman Ruangan</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Laporan Peminjaman Ruangan</a>
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
                <span class="text-dark opacity-60 font-weight-bold">Berdasarkan Tangal Request</span>
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
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon-folder-1 text-primary"></i>
                        </span>
                        <h3 class="card-label"> Tabel Laporan Peminjaman Ruangan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom" id="tabel_data_laporan_peminjaman_atasan">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">No Peminjaman</th>
                                    <th class="align-middle" style="text-align: center;">Alamat Email</th>
                                    <th class="align-middle" style="text-align: center;">Kegiatan</th>
                                    <th class="align-middle" style="text-align: center;">Ruangan</th>
                                    <th class="align-middle" style="text-align: center;">Jenis Layout</th>
                                    <th class="align-middle" style="text-align: center;">Jumlah Orang</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Mulai</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Selesai</th>
                                    <th class="align-middle" style="text-align: center;">Status</th>
                                    <th class="align-middle" style="text-align: center;">Lihat Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data_peminjaman as $pjm) : ?>
                                    <tr>
                                        <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['no_peminjaman']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['email']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['nama_kegiatan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['ruangan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['jenis_layout']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['jumlah_orang']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['tanggal_mulai']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['tanggal_selesai']; ?></td>


                                        <?php if ($pjm['status_peminjaman'] == 'Close') : ?>
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
                                        <?php endif; ?>

                                        <td class="align-middle" style="text-align: center;">
                                            <a href="<?= base_url('peminjaman_ruangan/laporan/detail_laporan_atasan/') . $pjm['no_peminjaman']; ?>" target="_blank" class="btn btn-info btn-sm font-weight-bolder">
                                                Lihat Detail
                                            </a>
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

<!-- BEGIN:MODAL ADD & EDIT DATA -->
<!-- Modal Add Data pinjaman(untuk user) -->
<?php foreach ($data_peminjaman as $pjm) : ?>
    <div class="modal fade" id="detailpinjaman-<?= $pjm['no_peminjaman']; ?>" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="AddPinjamanRuangandataLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 style="font-weight: bolder;" class="modal-title" id="AddPinjamanRuangandataLabel">Tambah Peminjaman Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="<?= base_url('peminjaman_ruangan/Peminjaman/addpeminjaman'); ?>" method="POST" id="kt_add_peminjaman_ruangan_form">
                    <div class="scroll scroll-pull" data-scroll="true" data-height="450">
                        <div class="modal-body">
                            <div>
                                <h5 class="font-weight-bold mb-6">DATA USER</h5>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama_peminjaman" style="color: black; float: left;">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_peminjaman" value="<?= $detail_user[0]['nama']; ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_peminjaman" style="color: black; float: left;">Email</label>
                                    <input type="email" class="form-control" name="email_peminjaman" value="<?= $detail_user[0]['email']; ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nip" class="form-control-label" style="color: black; float: left;">NIP</label>
                                    <input autoborrlete="off" type="text" class="form-control" name="nip" value="<?= $detail_user[0]['nip']; ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label id="ext/hp" class="form-control-label" style="color: black; float: left;">EXT/HP</label>
                                    <input autoborrlete="off" type="text" class="form-control" name="ext/hp" value="<?= $detail_user[0]['nomer_telepon']; ?>" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label id="divisi" class="form-control-label" style="color: black; float: left;">Divisi</label>
                                    <input autoborrlete="off" type="text" class="form-control" name="divisi" value="<?= $detail_user[0]['divisi']; ?>" readonly>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            <div>
                                <h5 class="font-weight-bold mb-6">DATA PEMINJAMAN</h5>
                            </div>

                            <?php
                            // mengambil data barang dengan kode paling besar

                            $koneksi = mysqli_connect('localhost', 'root', '', 'layanan');
                            $query = mysqli_query($koneksi, "SELECT max(no_peminjaman) as nopinjam FROM tb_peminjaman_ruangan");
                            $kd_layanan = mysqli_fetch_array($query);
                            $nopeminjaman = $kd_layanan['nopinjam'];

                            $urutan = (int) substr($nopeminjaman, 4, 4);
                            $urutan++;

                            $angkadepan = "0000";
                            $nopeminjaman = $angkadepan . sprintf("%04s", $urutan);
                            ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_peminjaman_ruangan" style="color: black; float: left;">Nomor Permintaan</label>
                                    <input type="id_peminjaman_ruangan" class="form-control" name="id_peminjaman_ruangan" value="<?php echo $nopeminjaman ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label id="kegiatan_pinjam" class="form-control-label" style="color: black; float: left;">Judul Kegiatan Acara</label>
                                    <input autocomplete="off" type="text" class="form-control" name="kegiatan_pinjam" placeholder="Masukan judul kegiatan acara">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ruang_pinjaman" style="color: black; float: left;">Ruangan</label>
                                    <select class="form-control" name="ruang_pinjaman">
                                        <option value="">- Pilih Jenis Layout -</option>
                                        <option value="GKP Auditorium lantai dasar">GKP Auditorium lantai dasar</option>
                                        <option value="Ruang Meeting Lantai 8">Ruang Meeting Lantai 8</option>
                                        <option value="Ruang Serbaguna Lantai 10">Ruang Serbaguna Lantai 10</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jenis_layout" style="color: black; float: left;">Layout</label>
                                    <select class="form-control" name="jenis_layout">
                                        <option value="">- Pilih Jenis Layout -</option>
                                        <?php foreach ($layout_ruangan as $lyt_rng) : ?>
                                            <option value="<?= $lyt_rng['layout_ruangan'] ?>"><?= $lyt_rng['layout_ruangan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="waktu_mulai" style="color: black; float: left;">Waktu Mulai</label>
                                    <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="waktu_selesai" style="color: black; float: left;">Waktu Selesai</label>
                                    <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tanggal_mulai" style="color: black; float: left;">Tanggal Mulai</label>
                                    <input type="date" class="form-control date-picker" name="tanggal_mulai">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_selesai" style="color: black; float: left;">Tanggal Selesai</label>
                                    <input type="date" class="form-control date-picker" name="tanggal_selesai">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" style="color: black; float: left;">Tanggal Request</label>
                                    <input value="<?= set_value('tgl_request', date('d-m-Y')); ?>" name="tgl_request" id="tgl_request" type="text" class="form-control date" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status_peminjaman" style="color: black; float: left;">Status Permintaan</label>
                                    <select class="form-control" name="status_peminjaman">
                                        <option value="Open">Open</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">Jumlah Orang</label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="kt_addnouislider_1_input" placeholder="Jumlah orang" name="jml_orang" required />
                                        </div>
                                        <div class="col-8">
                                            <div id="kt_addnouislider_1" class="nouislider nouislider-handle-primary nouislider-connect-warning"></div>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted mt-6">Geser slide untuk menambhakan jumlah orang atau ketik langusng pada input yang tesedia</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">Checkboxes *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="form-check checkbox-list checkbox-inline">
                                        <?php foreach ($perlengkapan_ruangan as $plkp_rng) : ?>
                                            <label class="checkbox checkbox-outline checkbox-info">
                                                <input type="checkbox" name="perlengkapan[]" value="<?= $plkp_rng['perlengkapan_ruangan'] ?>" />
                                                <span></span>
                                                <?= $plkp_rng['perlengkapan_ruangan'] ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                    <span class="form-text text-muted">Pilih minimal 2 jenis perlengkapan ruangan yang akan digunakan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success" id="simpan_add_peminjaman_ruangan">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>