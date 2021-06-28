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
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Work Permit</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Izin Kerja</a>
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
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Example-->
                    <!--begin::Card-->
                    <div class="card card-custom" data-card="true" id="kt_card_1">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Data Complain</h3>
                            </div>
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                                    <i class="ki ki-arrow-down icon-nm"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="Reload Card">
                                    <i class="ki ki-reload icon-nm"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="Remove Card">
                                    <i class="ki ki-close icon-nm"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered table-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle" style="text-align: center;">#</th>
                                        <th class="align-middle" style="text-align: center;">Email</th>
                                        <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                        <th class="align-middle" style="text-align: center;">Judul Complain</th>
                                        <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                        <th class="align-middle" style="text-align: center;">Keadaan</th>
                                        <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                        <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                        <th class="align-middle" style="text-align: center;">Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($complain as $comp) : ?>
                                        <tr>
                                            <td class="align-middle"><?= $i; ?></td>

                                            <!-- Lihat data Email & Nama Buat Admin Complain -->
                                            <td class="align-middle"><?= $comp['email']; ?></td>
                                            <td class="align-middle"><?= $comp['nama']; ?></td>
                                            <td class="align-middle"><?= $comp['judul_complain']; ?></td>
                                            <td class="align-middle"><?= $comp['deskripsi']; ?></td>
                                            <td class="align-middle"><?= $comp['keadaan']; ?></td>
                                            <td class="align-middle"><?= $comp['tingkat_bahaya']; ?></td>
                                            <td class="align-middle"><?= $comp['tanggal_ajukan']; ?></td>
                                            <td class="align-middle">
                                                <div class="float-right">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModaldetailfotoComplain<?PHP echo $comp['id']; ?>">
                                                        Detail
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Column-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    <!-- Form Izin Kerja -->
    <div class="col-lg-10 m-auto">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow text-center mb-4">
            <div class="card-header mr-auto ml-auto">
                <x class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="black">
                    <h3 role="tab"><strong>Formulir <?= $title ?></strong> </h3>
                </x>
            </div>
            <div class="card-body">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    <!--begin::Form-->

                    <?php foreach ($complain as $comp) : ?>
                        <form action="<?= base_url('workpermit/addizin/' . $comp['id']); ?>" method="POST" novalidate="novalidate" id="kt_izin_kerja_form">
                        <?php endforeach; ?>
                        <div class="form-group" hidden>
                            <h6>id complain</h6>
                            <?php $i = 1; ?>
                            <?php foreach ($complain as $comp) : ?>
                                <input type="text" class="form-control" name="id_complain" id="id_complain" value="<?= $comp['id']; ?>">
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_kontraktor" style="color: black; float: left;">Nama Kontraktor</label>
                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="nama_kontraktor" id="nama_kontraktor" placeholder="Masukan Nama Kontraktor" value="<?= $this->session->userdata('name'); ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_penanggung_jawab" style="color: black; float: left;">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="nama_penanggung_jawab" id="nama_penanggung_jawab" placeholder="Masukan Nama Penangung Jawab" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="desk_kerja" style="color: black; float: left;">Deskripsi Pekerjaan</label>
                                <textarea class="form-control form-control-solid h-auto py-5 px-6" id="desk_kerja" name="desk_kerja" rows="3" placeholder="Masukan Deskripsi Pekerjaan" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="no_telp" style="color: black; float: left;">No Telepon Kantor</label>
                                <input type="text" class="form-control form-control-solid h-auto py-5 px-6" name="no_telp" id="no_telp" placeholder="Masukan Telepon Kantor" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal" style="color: black; float: left;">Tanggal</label>
                                <input type="date" class="form-control form-control-solid h-auto py-5 px-6" name="tanggal" id="tanggal" placeholder="Masukan Tanggal" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="waktu_mulai" style="color: black; float: left;">waktu Mulai</label>
                                <input type="time" class="form-control form-control-solid h-auto py-5 px-6" name="waktu_mulai" id="waktu_mulai" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="waktu_akhir" style="color: black; float: left;">waktu Akhir</label>
                                <input type="time" class="form-control form-control-solid h-auto py-5 px-6" name="waktu_akhir" id="waktu_akhir" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center float-right">
                            <button type="button" id="kt_izin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Selanjutnya</button>
                        </div>
                        </form>
                        <!--end::Form-->
                </div>

            </div>
        </div>
    </div>
</div>
<!--end::Content-->


<!-- Modal Gambar-->
<?php foreach ($complain as $comp) : ?>
    <!-- Detail Gambar -->
    <div class="modal fade" id="myModaldetailfotoComplain<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
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