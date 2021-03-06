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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Layanan Umum</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Layanan Umum</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Komplain</a>
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
            <?= $this->session->flashdata('message'); ?>
            <!--end::Notice-->

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="fas fa-head-side-cough text-info"></i>
                        </span>
                        <h3 class="card-label"> Tabel Data Komplain</h3>
                    </div>

                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <a disabled style="pointer-events: none; border-bottom-left-radius: 7px; border-top-left-radius: 7px;" href="#" class="btn btn-light-primary btn-md btn-icon pulse pulse-dark btn-square">
                                    <i class="flaticon2-plus text-danger"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                                <a href="#" style="border-bottom-right-radius: 7px; border-top-right-radius: 7px;" class="btn btn-primary btn-md font-weight-boldest btn-square" data-toggle="modal" data-target="#AddComplainModal">Tambah Komplain Baru</a>

                            </div>
                            <!--end::Button-->
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="tabel_data_complain">
                        <thead>
                            <tr>
                                <th class="align-middle" style="text-align: center;">#</th>
                                <th class="align-middle" style="text-align: center;">Judul Komplain</th>
                                <th class="align-middle" style="text-align: center; min-width: 200px;">Deskripsi</th>
                                <th class="align-middle" style="text-align: center; min-width: 200px;">Lokasi Pekerjaan</th>
                                <th class="align-middle" style="text-align: center;">Keadaan</th>
                                <th class="align-middle" style="text-align: center; min-width: 120px;">Tingkat Bahaya</th>
                                <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                <th class="align-middle" style="text-align: center;">Gambar</th>
                                <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                    <th class="align-middle" style="text-align: center;">Status Komplain</th>
                                    <th class="align-middle" style="text-align: center;">Status Kerja</th>
                                    <th class="align-middle" style="text-align: center;">Tindakan</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($complain as $comp) : ?>
                                <tr>
                                    <td class="align-middle" style="text-align: center;"><?= $i; ?></td>

                                    <!-- Lihat data Email & Nama Buat Admin Complain -->
                                    <?php if ($this->session->userdata('role_id') == 3) : ?>
                                        <td class="align-middle"><?= $comp['email']; ?></td>
                                        <td class="align-middle"><?= $comp['nama']; ?></td>
                                    <?php endif; ?>

                                    <td class="align-middle" style="text-align: center;"><?= $comp['judul_complain']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['deskripsi']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['lokasi_pekerjaan']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['keadaan']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['tingkat_bahaya']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $comp['tanggal_ajukan']; ?></td>
                                    <td class="align-middle" style="text-align: center;">
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaldetailfoto<?PHP echo $comp['id']; ?>">
                                            <i class="fas fa-binoculars"></i> Lihat
                                        </a>
                                    </td>

                                    <!-- Status Buat Karyawan -->
                                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                        <?php if ($comp['status_complain'] == 'Pending') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">40%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Menunggu Konfirmasi Dari Officer Umum" class="badge badge-warning"><?= $comp['status_complain']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($comp['status_complain'] == 'Complain Disetujui') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">80%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain Berhasil Disetujui" class="badge badge-primary">Komplain Disetujui</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($comp['status_complain'] == 'Selesai') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Proses Komplain Telah Selesai Dikerjakan" class="badge badge-dark">Selesai</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>

                                        <?php if ($comp['status_kerja'] == 'Pending') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest"><i class="fas fa-sync fa-spin"></i></span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Menunggu Komplain Dikerjakan" class="badge badge-warning">Menunggu Dikerjakan</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($comp['status_kerja'] == 'Izin Kerja Disetujui') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">25%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Menunggu Komplain Dikerjakan" class="badge badge-warning">Menunggu Dikerjakan</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($comp['status_kerja'] == 'Sedang Dikerjakan') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">50%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain Sedang Dikerjakan Oleh Tennat" class="badge badge-primary">Sedang Dikerjakan</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($comp['status_kerja'] == 'Selesai Dikerjakan') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">75%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain Telah Dikerjakan Oleh Tenant" class="badge badge-info">Sedang Dikerjakan</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($comp['status_kerja'] == 'Selesai') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Proses Komplain Telah Selesai Dikerjakan" class="badge badge-dark">Selesai Dikerjakan</span>
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
                                            <?php if ($comp['status_complain'] == "Pending") : ?>
                                                <a data-placement="bottom" href="" title="Edit" data-toggle="modal" data-target="#editcomplain<?= $comp['id']; ?>"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
                                            <?php else : ?>
                                                <a style="opacity: 0.65; cursor: not-allowed;" href="#"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<!-- Modal Gambar-->
<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" id="myModaldetailfoto<?PHP echo $comp['id']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight: bolder;" class="modal-title justify-content-center" id="myModaldetailfotoTitle">Detail Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
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

<!-- Modal Add Data Complain(untuk user) -->
<div class="modal fade" id="AddComplainModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AddComplainModaldataLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 style="font-weight: bolder;" class="modal-title" id="AddComplainModaldataTitle">Tambah Komplain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="<?= base_url('permintaan/addComplain'); ?>" method="POST" novalidate="novalidate" id="kt_add_complain_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" style="color: black; float: left;">Email</label>
                            <input type="email" class="form-control form-control-solid" name="email" value="<?= $this->session->userdata('email'); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama" style="color: black; float: left;">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-solid" name="nama" value="<?= $this->session->userdata('name'); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Judul Komplain</label>
                            <input autocomplete="off" type="text" placeholder="Masukan judul complain" class="form-control" name="judul_complain">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keadaan" style="color: black; float: left;">keadaan</label>
                            <select class="form-control" name="keadaan">
                                <option value="">- Pilih -</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Sedang">Rusak Sedang</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" style="color: black; float: left;">Deskripsi</label>
                        <textarea class="form-control" placeholder="Masukan deskripsi dari complain yang akan dibuat" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_pekerjaan" style="color: black; float: left;">Lokasi Pekerjaan</label>
                        <textarea class="form-control" placeholder="Masukan Lokasi pekerjaan dari complain yang akan dibuat" name="lokasi_pekerjaan" rows="3"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_ajukan" style="color: black; float: left;">Tanggal Diajukan</label>
                            <input type="date" class="form-control date-picker" name="tanggal_ajukan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tingkat_bahaya" style="color: black; float: left;">Tingkat Bahaya</label>
                            <select class="form-control" name="tingkat_bahaya">
                                <option value="">- Pilih -</option>
                                <option value="Pekerjaan Bersiko Tinggi">Pekerjaan Bersiko Tinggi</option>
                                <option value="Pekerjaan Bersiko Rendah">Pekerjaan Bersiko Rendah</option>
                            </select>
                        </div>
                    </div>

                    <!--UPLOAD GAMBAR -->
                    <label class="control-label" style="display: block; height:50px; line-height:50px; text-align:center; font-size:20px;">UPLOAD GAMBAR</label>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group" style="padding:20px; background: #fff; border: 2px dashed #555;">
                                <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-1"><i class="glyphicon glyphicon-cloud-upload"></i> Gambar 1</label>
                                <div class="input-group">
                                    <input style="display: none;" type="file" name="gambar" id="file-ip-1" class="form-control" accept="image/*" onchange="showPreview(event);">
                                    <div class="preview">
                                        <img style="width:100%; display:none;" id="file-ip-1-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group" style="padding:20px; background: #fff; border: 2px dashed #555;">
                                <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-2"><i class="glyphicon glyphicon-cloud-upload"></i> Gambar 2</label>
                                <div class="input-group">
                                    <input style="display: none;" type="file" name="gambar2" id="file-ip-2" class="form-control" accept="image/*" onchange="showPreview2(event);">
                                    <div class="preview">
                                        <img style="width:100%; display:none;" id="file-ip-2-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group" style="padding:20px; background: #fff; border: 2px dashed #555;">
                                <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-3"><i class="glyphicon glyphicon-cloud-upload"></i> Gambar 3</label>
                                <div class="input-group">
                                    <input style="display: none;" type="file" name="gambar3" id="file-ip-3" class="form-control" accept="image/*" onchange="showPreview3(event);">
                                    <div class="preview">
                                        <img style="width:100%; display:none;" id="file-ip-3-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                    <button type="submit" id="kt_izin_submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data Complain(untuk user) -->
<?php foreach ($complain as $comp) : ?>
    <div class="modal fade" id="editcomplain<?= $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditComplainModaldataLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight: bolder;" class="modal-title" id="EditComplainModaldataLabel">Edit Komplain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form enctype="multipart/form-data" action="<?= base_url('permintaan/editComplain/') . $comp['id'] ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $this->session->userdata('email'); ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $this->session->userdata('name'); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judul_complain">Judul Komplain</label>
                                <input type="text" class="form-control" name="judul_complain" id="judul_complain" value="<?= $comp['judul_complain']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keadaan">keadaan</label>
                                <?php if ($comp['keadaan'] == "Rusak Ringan") : ?>
                                    <select class="form-control" name="keadaan" id="keadaan">
                                        <option value="<?= $comp['keadaan']; ?>" selected><?= $comp['keadaan']; ?></option>
                                        <option value="Rusak Sedang">Rusak Sedang</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                <?php elseif ($comp['keadaan'] == "Rusak Sedang") : ?>
                                    <select class="form-control" name="keadaan" id="keadaan">
                                        <option value="<?= $comp['keadaan']; ?>" selected><?= $comp['keadaan']; ?></option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                <?php elseif ($comp['keadaan'] == "Rusak Berat") : ?>
                                    <select class="form-control" name="keadaan" id="keadaan">
                                        <option value="<?= $comp['keadaan']; ?> " selected><?= $comp['keadaan']; ?></option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Sedang">Rusak Sedang</option>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $comp['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ed_lokasi_perkejaan">Lokasi Pekerjaan</label>
                            <textarea class="form-control" id="ed_lokasi_perkejaan" name="ed_lokasi_pekerjaan" rows="3" required><?= $comp['lokasi_pekerjaan']; ?></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal_ajukan">Tanggal Diajukan</label>
                                <input type="date" class="form-control date-picker" name="tanggal_ajukan" id="tanggal_ajukan" value="<?= $comp['tanggal_ajukan']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tingkat_bahaya">Tingkat Bahaya</label>
                                <?php if ($comp['tingkat_bahaya'] == "Pekerjaan Bersiko Tinggi") : ?>
                                    <select class="form-control" name="tingkat_bahaya" id="tingkat_bahaya">
                                        <option value="<?= $comp['tingkat_bahaya']; ?> " selected><?= $comp['tingkat_bahaya']; ?></option>
                                        <option value="Pekerjaan Bersiko Rendah">Pekerjaan Bersiko Rendah</option>
                                    </select>
                                <?php elseif ($comp['tingkat_bahaya'] == "Pekerjaan Bersiko Rendah") : ?>
                                    <select class="form-control" name="tingkat_bahaya" id="tingkat_bahaya">
                                        <option value="<?= $comp['tingkat_bahaya']; ?> " selected><?= $comp['tingkat_bahaya']; ?></option>
                                        <option value="Pekerjaan Bersiko Tinggi">Pekerjaan Bersiko Tinggi</option>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!--UPLOAD GAMBAR -->
                        <label class="control-label" style="display: block; height:50px; line-height:50px; text-align:center; font-size:20px;">UPLOAD GAMBAR</label>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="col-lg-12 m-auto">Upload Gambar 1</div>
                                <div class="col-lg-12">
                                    <?php
                                    if ($comp['gambar'] == '') { ?>
                                        <label>Belum Ada Gambar</label><br>
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/img/complain/') . $comp['gambar']; ?>" class="img-thumbnail">
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="new_image0">
                                        <label class="custom-file-label">Pilih Gambar<label>
                                    </div>
                                    <input hidden type="text" value="<?= $comp['gambar']; ?>" name="old_image1">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-lg-12 m-auto">Upload Gambar 2</div>
                                <div class="col-lg-12">
                                    <?php
                                    if ($comp['gambar2'] == '') { ?>
                                        <label>Belum Ada Gambar</label><br>
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/img/complain/') . $comp['gambar2']; ?>" class="img-thumbnail">
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="new_image1">
                                        <label class="custom-file-label">Pilih Gambar<label>
                                    </div>
                                    <input hidden type="text" value="<?= $comp['gambar2']; ?>" name="old_image2">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-lg-12 m-auto">Upload Gambar 3</div>
                                <div class="col-lg-12">
                                    <?php
                                    if ($comp['gambar3'] == '') { ?>
                                        <label>Belum Ada Gambar</label><br>
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/img/complain/') . $comp['gambar3']; ?>" class="img-thumbnail">
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="new_image2">
                                        <label class="custom-file-label">Pilih Gambar<label>
                                    </div>
                                    <input hidden type="text" value="<?= $comp['gambar3']; ?>" name="old_image3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>