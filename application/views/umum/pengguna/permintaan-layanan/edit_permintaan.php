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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Edit Data Permintaan Layanan</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Data Permintaan</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Edit Data Permintaan</a>
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
                <div class="alert-text">Pada Halaman ini anda dapat melakukan <b>Edit Data Permintaan Layanan</b> yang telah anda ajukan.
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
                        <h3 class="card-label"> Edit Data Permintaan Layanan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <?php foreach ($layananbaru as $lyn_permnt) : ?>
                        <form action="<?= base_url('permintaan_layanan/properti/editpermintaan/' . $no_permintaan); ?>" method="POST" id="kt_edit_permintaan_layanan_form">
                            <div class="modal-body">
                                <h6 style="font-weight: bolder; text-align: center;" class="mb-4">Permintaan Layanan</h6>
                                <div class="form-group">
                                    <label for="id_nomer_layanan" style="color: black; float: left;">Nomor Permintaan</label>
                                    <input type="id_nomer_layanan" class="form-control" name="id_nomer_layanan" value="<?php echo $no_permintaan ?>" readonly>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email" style="color: black; float: left;">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $this->session->userdata('email'); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama" style="color: black; float: left;">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('name'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_permintaan" style="color: black; float: left;">Layanan Permintaan</label>
                                    <select class="form-control" name="edit_permintaan" id="edit_permintaan" required>
                                        <option value="<?= $lyn_permnt['permintaan']; ?>"><?= $lyn_permnt['permintaan']; ?></option>
                                        <option value="">- Pilih Permintaan -</option>
                                        <option value="Permintaan Baru">Permintaan Baru</option>
                                        <option value="Penanganan Gangguan">Penanganan Gangguan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_judul_permintaan" class="form-control-label" style="color: black; float: left;">Judul Permintaan</label>
                                    <input autocomplete="off" id="edit_judul_permintaan" type="text" class="form-control" placeholder="Masukan judul permintaan layanan" value="<?= $lyn_permnt['judul_permintaan']; ?>" name="edit_judul_permintaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_jenis_permintaan_layanan" style="color: black; float: left;">Jenis Permintaan</label>
                                    <select class="form-control" name="edit_jenis_permintaan_layanan" id="edit_jenis_permintaan_layanan" required>
                                        <option value="<?= $lyn_permnt['jenis_permintaan_layanan']; ?>"><?= $lyn_permnt['jenis_permintaan_layanan']; ?></option>
                                        <option value="">- Pilih Jenis Permintaan -</option>
                                        <?php foreach ($jenis_layanan as $jns_lyn) : ?>
                                            <option value="<?= $jns_lyn['jenis_permintaan_layanan'] ?>"><?= $jns_lyn['jenis_permintaan_layanan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kt_autosize_editdeskripsi" style="color: black; float: left;">Deskripsi</label>
                                    <textarea class="form-control" maxlength="300" name="edit_deskripsi" id="kt_autosize_editdeskripsi" rows="3" placeholder="Masukan deskripsi permintaan" required><?= $lyn_permnt['deskripsi']; ?></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="status_permintaan" style="color: black; float: left;">Status Permintaan</label>
                                        <select class="form-control" name="status_permintaan">
                                            <option value="Open">Open</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_ajukan" style="color: black; float: left;">Tanggal Diajukan</label>
                                        <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>" class="form-control date-picker" name="tanggal_ajukan">
                                    </div>
                                </div>
                                <hr>
                                <h6 style="font-weight: bolder; text-align: center;" class="mb-6">Mengetahui</h6>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Atasan</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="nm_atasan" value="<?= $detail_user[0]['nama_atasan']; ?>" placeholder="Nama Atasan" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Atasan</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="em_atasan" value="<?= $detail_user[0]['em_atasan']; ?>" placeholder="Email Atasan" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Nomor Atasan</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="no_atasan" value="<?= $detail_user[0]['no_atasan']; ?>" placeholder="Nomor Atasan" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <a href="<?= base_url('permintaan_layanan/properti'); ?>" class="btn btn-shadow-hover btn-light-dark font-weight-boldest" style="float: right;"><i class="fa fa-home"></i> Kembali</a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <button type="submit" class="btn btn-light-danger btn-shadow-hover font-weight-boldest" id="simpan_edit_permintaan_layanan" style="float: left;"><i class="fa fa-save"></i> Simpan Perubahan</button>
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