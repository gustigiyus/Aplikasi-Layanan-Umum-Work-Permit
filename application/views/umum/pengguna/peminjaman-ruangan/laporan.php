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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Permintaan Layanan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Peminjaman Ruangan</a>
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
                <div class="alert-text">Pada Halaman ini anda dapat melihat detail laporan dari <b>Peminjaman Ruangan</b> yang sebelumnya telah anda buat.
                </div>
            </div>
            <!--end::Notice-->

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon-folder-1 text-primary"></i>
                        </span>
                        <h3 class="card-label"> <?= $title ?></h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom" id="tabel_data_laporan_peminjaman_karyawan">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">No Peminjaman</th>
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
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['nama_kegiatan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['ruangan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['jenis_layout']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['jumlah_orang']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['tanggal_mulai']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $pjm['tanggal_selesai']; ?></td>

                                        <!-- Status Buat Karyawan -->
                                        <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Status Peminjaman Ruangan telah ditutup" class="badge badge-dark">Selesai</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>

                                        <td class="align-middle" style="text-align: center;">
                                            <a data-toggle="tooltip" data-theme="dark" data-placement="left" title="Lihat Detail Peminjaman" href="<?= base_url('peminjaman_ruangan/laporan/detail_laporan/') . $pjm['no_peminjaman']; ?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                                    <label class="form-control-label" style="color: black; float: left;">Tanggal Permintaan</label>
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