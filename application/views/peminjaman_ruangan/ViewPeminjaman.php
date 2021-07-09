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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100"><?= $title ?></a>
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
                <div class="alert-text">Pada Halaman ini anda dapat Melakukan Peminjaman Ruangan yang tersedia di <b>PT INTI</b>.
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
                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
						<div class="card-toolbar">
							<!--begin::Button-->
							<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addpinjaman">
								<span class="svg-icon svg-icon-md">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<circle fill="#000000" cx="9" cy="15" r="6" />
											<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Booking Ruangan</a>
							<!--end::Button-->
						</div>
					<?php endif; ?>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="tablecomplain">
                        <thead>
                            <tr>
                                <th class="align-middle" style="text-align: center;">No.</th>
                                <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                                    <th class="align-middle" style="text-align: center;">Email</th>
                                    <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                <?php endif; ?>
                                <th class="align-middle" style="text-align: center;">Kegiatan</th>
                                <th class="align-middle" style="text-align: center;">Ruangan</th>
                                <th class="align-middle" style="text-align: center;">Tanggal Mulai</th>
                                <th class="align-middle" style="text-align: center;">Tanggal Selesai</th>
                                <th class="align-middle" style="text-align: center;">Waktu Mulai</th>
                                <th class="align-middle" style="text-align: center;">Waktu Selesai</th>
                                <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
                                    <th class="align-middle" style="text-align: center;">Status</th>
                                <?php endif; ?>
                                <th class="align-middle" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pinjaman as $brrw) : ?>
                                <tr>
                                    <td class="align-middle" style="text-align: center;"><?= $i; ?></td>

                                    <!-- Lihat data Email & Nama Buat Admin Complain -->
                                    <?php if ($this->session->userdata('role_id') == 3) : ?>
                                        <td class="align-middle" style="text-align: center;"><?= $brrw['email']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $brrw['nama']; ?></td>
                                    <?php endif; ?>

                                    <td class="align-middle" style="text-align: center;"><?= $brrw['kegiatan_pinjaman']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $brrw['ruang_pinjaman']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $brrw['tanggal_mulai']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $brrw['tanggal_selesai']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $brrw['waktu_mulai']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $brrw['waktu_selesai']; ?></td>

                                    <!-- Status Buat Karyawan -->
                                    <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
										<?php if ($brrw['status_pinjaman'] == 'Pending') : ?>
											<td class="align-middle">
												<span class="badge badge-warning"><?= $brrw['status_pinjaman']; ?></span>
											</td>
										<?php elseif ($brrw['status_pinjaman'] == 'pinjaman Disetujui') : ?>
											<td class="align-middle">
												<span class="badge badge-primary"><?= $brrw['status_pinjaman']; ?></span>
											</td>
										<?php else : ?>
											<td class="align-middle">
												<span class="badge badge-success"><?= $brrw['status_pinjaman']; ?></span>
											</td>
										<?php endif; ?>
									<?php endif; ?>

									<td class="align-middle" style="text-align: center;">
										<!-- action buat Karyawan -->
										<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
											<?php if ($brrw['status_pinjaman'] == "Pending") : ?>
												<a href="" title="Edit" data-toggle="modal" data-target="#editpinjaman<?= $brrw['id']; ?>"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
											<?php else : ?>
												<a style="opacity: 0.65; cursor: not-allowed;" href="#"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
											<?php endif; ?>

											<!-- Ubah Status Admin Tenant -->
										<?php elseif ($this->session->userdata('role_id') == 4) : ?>
											<?php if ($brrw['status_pinjaman'] == "pinjaman Disetujui") : ?>
												<a href="" class="btn btn-warning" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $brrw['id']; ?>"><?= $brrw['status_pinjaman']; ?></a>
												<!-- <?php elseif ($brrw['status_pinjaman'] == "Izin Kerja Disetujui") : ?>
												<a href="" class="btn btn-warning" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $brrw['id']; ?>"><?= $brrw['status_pinjaman']; ?></a>
											<?php elseif ($brrw['status_pinjaman'] == "Sedang Dikerjakan") : ?>
												<a href="" class="btn btn-success" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $brrw['id']; ?>"><?= $brrw['status_pinjaman']; ?></a> -->
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

<!-- Modal Add Data pinjaman(untuk user) -->
<div class="modal fade" id="addpinjaman" tabindex="-1" role="dialog" aria-labelledby="AddPinjamanRuangandataLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 style="font-weight: bolder;" class="modal-title" id="AddPinjamanRuangandataLabel">Tambah Peminjaman Ruangan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<!-- <span aria-hidden="true">&times;</span> -->
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<form action="<?= base_url('peminjaman_ruangan/Peminjaman/addpinjaman'); ?>" method="POST" novalidate="novalidate" id="kt_add_pinjaman_form" enctype="multipart/form-data">
				<div class="modal-body">
                    <div>
                        <h5 class="font-weight-bold mb-6">Isi Data Diri</h5>
                    </div>
					<div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama" style="color: black; float: left;">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" value="<?= $detail_user[0]['nama']; ?>" readonly>
						</div>
						<div class="form-group col-md-6">
                            <label for="email" style="color: black; float: left;">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $detail_user[0]['email']; ?>" readonly>
						</div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">NIP</label>
							<input autoborrlete="off" type="text" class="form-control" name="nip" value="<?= $detail_user[0]['nip']; ?>" readonly>
						</div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">HP</label>
							<input autoborrlete="off" type="text" class="form-control" name="hp" value="<?= $detail_user[0]['nomer_telepon']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Divisi</label>
							<input autoborrlete="off" type="text" class="form-control" name="divisi" value="<?= $detail_user[0]['divisi']; ?>" readonly>
                        </div>
					</div>

                    <div>
                        <h5 class="font-weight-bold mb-6">Peminjaman</h5>
                    </div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="form-control-label" style="color: black; float: left;">Kegiatan Acara</label>
							<input autoborrlete="off" type="text" class="form-control" name="kegiatan_pinjaman">
						</div>
				
						<div class="form-group col-md-6">
                            <label for="ruang_pinjaman" style="color: black; float: left;">Tipe Ruangan</label>
							<select class="form-control" name="ruang_pinjaman">
                                <option>Pilih Tipe Ruangan</option>
                                <?php 
                                    foreach($ruangan as $r)
                                    { 
                                        echo '<option value="'.$r->tipe_ruangan.'">'.$r->tipe_ruangan.' (Max Capacity: '.$r->kapasitas_ruangan.') </option>';
                                    }
                                ?>
                            </select>
						</div>
                        
                        <div class="form-group col-md-6">
                            <label for="tanggal_mulai" style="color: black; float: left;">Tanggal Mulai</label>
							<input type="date" class="form-control date-picker" name="tanggal_mulai">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_mulai" style="color: black; float: left;">Waktu Mulai Agenda</label>
                            <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu_Mulai" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_akhir" style="color: black; float: left;">Waktu Akhir Agenda</label>
                            <input type="time" class="form-control" name="waktu_akhir" id="waktu_akhir" placeholder="Waktu_Akhir" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Jumlah Orang</label>
							<input autoborrlete="off" type="text" class="form-control" name="jml_orang">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Tanggal Request</label>
                            <input value="<?= set_value('tgl_request', date('d-m-Y')); ?>" name="tgl_request" id="tgl_request" type="text" class="form-control date" readonly>
                            <?= form_error('tgl_request', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    
                    <div class='from-row'>
                        <div class="col-lg-3 col-xl-2">
                            <h5 class="font-weight-bold mt-10 mb-6">Perlengkapan</h5>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px" value="AC">AC</input>
                            <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px" value="Kursi Susun">Kursi Susun</input>
                            <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px" value="Meja Rapat">Meja Rapat</input><br>
                            <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px" value="Screen">Screen</input>
                            <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px" value="Sound System">Sound System</input>
                            <input type="checkbox" name="perlengkapan[]" style="margin-right: 10px; margin-left: 20px" value="Kabel Power">Kabel Power</input>
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