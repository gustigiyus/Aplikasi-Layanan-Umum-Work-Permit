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
                <div class="alert-text">Pada Halaman ini anda dapat melakukan <b>Edit Data Peminjaman Ruangan</b> yang telah anda ajukan.
                </div>
            </div>
            <!--end::Notice-->

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

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
                    <?php foreach ($data_peminjaman as $pjm) : ?>
                        <form action="<?= base_url('peminjaman_ruangan/Peminjaman/editpeminjaman/' . $pjm['no_peminjaman']); ?>" method="POST" id="kt_edit_peminjaman_ruangan_form">

                            <div class="modal-body">
                                <div>
                                    <h5 class="font-weight-bold mb-6" style="text-align: center;">DATA USER</h5>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_nama_peminjaman" style="color: black; float: left;">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="edit_nama_peminjaman" value="<?= $detail_user[0]['nama']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="edit_email_peminjaman" style="color: black; float: left;">Email</label>
                                        <input type="email" class="form-control" name="edit_email_peminjaman" value="<?= $detail_user[0]['email']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="edit_nip" class="form-control-label" style="color: black; float: left;">NIP</label>
                                        <input autoborrlete="off" type="text" class="form-control" name="edit_nip" value="<?= $detail_user[0]['nip']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="edit_ext/hp" class="form-control-label" style="color: black; float: left;">EXT/HP</label>
                                        <input autoborrlete="off" type="text" class="form-control" name="edit_ext/hp" value="<?= $detail_user[0]['nomer_telepon']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="edit_divisi" class="form-control-label" style="color: black; float: left;">Divisi</label>
                                        <input autoborrlete="off" type="text" class="form-control" name="edit_divisi" value="<?= $detail_user[0]['divisi']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div>
                                    <h5 class="font-weight-bold mb-6" style="text-align: center;">DATA PEMINJAMAN</h5>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_id_peminjaman_ruangan" style="color: black; float: left;">Nomor Permintaan</label>
                                        <input type="number" class="form-control" name="edit_id_peminjaman_ruangan" value="<?= $pjm['no_peminjaman'] ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="edit_kegiatan_pinjam" class="form-control-label" style="color: black; float: left;">Judul Kegiatan Acara</label>
                                        <input autocomplete="off" type="text" class="form-control" name="edit_kegiatan_pinjam" value="<?= $pjm['nama_kegiatan'] ?>" placeholder="Masukan judul kegiatan acara" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_ruang_pinjaman" style="color: black; float: left;">Ruangan</label>
                                        <select class="form-control" name="edit_ruang_pinjaman" required>
                                            <option value="<?= $pjm['ruangan'] ?>"><?= $pjm['ruangan'] ?></option>
                                            <option value="">- Pilih Jenis Layout -</option>
                                            <option value="GKP Auditorium lantai dasar">GKP Auditorium lantai dasar</option>
                                            <option value="Ruang Meeting Lantai 8">Ruang Meeting Lantai 8</option>
                                            <option value="Ruang Serbaguna Lantai 10">Ruang Serbaguna Lantai 10</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="edit_jenis_layout" style="color: black; float: left;">Layout</label>
                                        <select class="form-control" name="edit_jenis_layout" required>
                                            <option value="<?= $pjm['jenis_layout'] ?>"><?= $pjm['jenis_layout'] ?></option>
                                            <option value="">- Pilih Jenis Layout -</option>
                                            <?php foreach ($layout_ruangan as $lyt_rng) : ?>
                                                <option value="<?= $lyt_rng['layout_ruangan'] ?>"><?= $lyt_rng['layout_ruangan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_waktu_mulai" style="color: black; float: left;">Waktu Mulai</label>
                                        <input type="time" class="form-control" name="edit_waktu_mulai" value="<?= $pjm['waktu_mulai'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="edit_waktu_selesai" style="color: black; float: left;">Waktu Selesai</label>
                                        <input type="time" class="form-control" name="edit_waktu_selesai" value="<?= $pjm['waktu_selesai'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_tanggal_mulai" style="color: black; float: left;">Tanggal Mulai</label>
                                        <input type="date" class="form-control" name="edit_tanggal_mulai" value="<?= $pjm['tanggal_mulai'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="edit_tanggal_selesai" style="color: black; float: left;">Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="edit_tanggal_selesai" value="<?= $pjm['tanggal_selesai'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="edit_tgl_request" class="form-control-label" style="color: black; float: left;">Tanggal Permintaan</label>
                                        <input value="<?= set_value('tgl_request', date('d-m-Y')); ?>" name="edit_tgl_request" type="text" class="form-control date" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="edit_status_peminjaman" style="color: black; float: left;">Status Permintaan</label>
                                        <select class="form-control" name="edit_status_peminjaman">
                                            <option value="Open">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="edit_jml_orang" class="col-form-label col-lg-3 col-md-3 col-sm-12" style="color: black;">Jumlah Orang</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input id="kt_touchspin_1" type="text" class="form-control" value="<?= $pjm['jumlah_orang'] ?>" name="edit_jml_orang" required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="edit_perlengkapan[]" style="color: black;">Perlengkapan Ruangan</label>
                                    <div class="col-9 col-form-label">
                                        <div class="checkbox-inline">
                                            <?php foreach ($perlengkapan_ruangan as $plkp_rng) : ?>
                                                <label class="checkbox checkbox-danger">
                                                    <input type="checkbox" name="edit_perlengkapan[]" value="<?= $plkp_rng['perlengkapan_ruangan'] ?>" />
                                                    <span></span>
                                                    <?= $plkp_rng['perlengkapan_ruangan'] ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <a href="<?= base_url('peminjaman_ruangan/Peminjaman/'); ?>" class="btn btn-shadow-hover btn-light-dark font-weight-boldest" style="float: right;"><i class="fa fa-home"></i> Kembali</a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <button type="submit" class="btn btn-light-danger btn-shadow-hover font-weight-boldest" id="simpan_edit_peminjaman_ruangan" style="float: left;"><i class="fa fa-save"></i> Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->