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
			<!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
			<?= $this->session->flashdata('message'); ?>
			<!--end::Notice-->

			<!--begin::Card-->
			<!-- <div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<span class="card-icon">
							<i class="far fa-handshake text-primary"></i>
						</span>
						<h3 class="card-label"><?= $title ?></h3>
					</div>

					<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
						<div class="card-toolbar">
							<!--begin::Button-->
							<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#AddPinjamanRuangan">
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
					<table class="table table-separate table-head-custom" id="tablepinjaman">
						<thead>
							<tr>
								<th class="align-middle" style="text-align: center;">No</th>
								<?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
									<th class="align-middle" style="text-align: center;">Email</th>
									<th class="align-middle" style="text-align: center;">Nama Lengkap</th>
								<?php endif; ?>
								<th class="align-middle" style="text-align: center;">Kegiatan</th>
								<th class="align-middle" style="text-align: center;">Ruangan</th>
								<th class="align-middle" style="text-align: center;">Layout Ruangan</th>
                                <th class="align-middle" style="text-align: center;">Tanggal Peminjaman</th>
								<th class="align-middle" style="text-align: center;">Waktu Mulai</th>
								<th class="align-middle" style="text-align: center;">Waktu Selesai</th>
								<!-- <th class="align-middle" style="text-align: center;">Waktu Selesai</th> -->
								<!-- <th class="align-middle" style="text-align: center;">Kapasitas Ruangan</th> -->
								<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
									<th class="align-middle" style="text-align: center;">Status</th>
								<?php endif; ?>
								<!-- <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
									<th class="align-middle" style="text-align: center;">Tindakan</th>
								<?php endif; ?> -->
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($pinjaman as $borr) : ?>
								<tr>
									<td class="align-middle" style="text-align: center;"><?= $i; ?></td>

									<!-- Lihat data Email & Nama Buat Admin pinjaman -->
									<?php if ($this->session->userdata('role_id') == 3) : ?>
										<td class="align-middle"><?= $borr['email']; ?></td>
										<td class="align-middle"><?= $borr['nama']; ?></td>
									<?php endif; ?>

									<td class="align-middle" style="text-align: center;"><?= $borr['kegiatan_pinjaman']; ?></td>
									<td class="align-middle" style="text-align: center;"><?= $borr['ruang_pinjaman']; ?></td>
									<td class="align-middle" style="text-align: center;"><?= $borr['layout_pinjaman']; ?></td>
                                    <td class="align-middle" style="text-align: center;"><?= $borr['tanggal_pinjaman']; ?></td>
									<td class="align-middle" style="text-align: center;"><?= $borr['waktu_mulai']; ?></td>
									<td class="align-middle" style="text-align: center;"><?= $borr['waktu_selesai']; ?></td>
									<!-- <td class="align-middle" style="text-align: center;">
										<button class="btn btn-info" data-toggle="modal" data-target="#myModaldetailfoto<?PHP echo $borr['id']; ?>">
											Detail
										</button>
									</td> -->


									<!-- Status Buat Karyawan -->
									<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
										<?php if ($borr['status_pinjaman'] == 'Pending') : ?>
											<td class="align-middle">
												<span class="badge badge-warning"><?= $borr['status_pinjaman']; ?></span>
											</td>
										<?php elseif ($borr['status_pinjaman'] == 'pinjaman Disetujui') : ?>
											<td class="align-middle">
												<span class="badge badge-primary"><?= $borr['status_pinjaman']; ?></span>
											</td>
										<?php else : ?>
											<td class="align-middle">
												<span class="badge badge-success"><?= $borr['status_pinjaman']; ?></span>
											</td>
										<?php endif; ?>
									<?php endif; ?>

									<td class="align-middle" style="text-align: center;">
										<!-- action buat Karyawan -->
										<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4) : ?>
											<?php if ($borr['status_pinjaman'] == "Pending") : ?>
												<a href="" title="Edit" data-toggle="modal" data-target="#editpinjaman<?= $borr['id']; ?>"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
											<?php else : ?>
												<a style="opacity: 0.65; cursor: not-allowed;" href="#"><i style="color: orange;" class="fas fa-pencil-alt"></i></a>
											<?php endif; ?>

											<!-- Ubah Status Admin Tenant -->
										<?php elseif ($this->session->userdata('role_id') == 4) : ?>
											<?php if ($borr['status_pinjaman'] == "pinjaman Disetujui") : ?>
												<a href="" class="btn btn-warning" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $borr['id']; ?>"><?= $borr['status_pinjaman']; ?></a>
												<!-- <?php elseif ($borr['status_pinjaman'] == "Izin Kerja Disetujui") : ?>
												<a href="" class="btn btn-warning" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $borr['id']; ?>"><?= $borr['status_pinjaman']; ?></a>
											<?php elseif ($borr['status_pinjaman'] == "Sedang Dikerjakan") : ?>
												<a href="" class="btn btn-success" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $borr['id']; ?>"><?= $borr['status_pinjaman']; ?></a> -->
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
			<!-- </div> -->
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
					<div class="form-row">
						<div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">No</label>
							<input autoborrlete="off" type="text" class="form-control" name="id">
							<!-- <label for="email" style="color: black; float: left;">Email</label>
							<input type="email" class="form-control" name="email" value="<?= $this->session->userdata('email'); ?>" readonly> -->
						</div>
						<div class="form-group col-md-6">
                            <label for="email" style="color: black; float: left;">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $this->session->userdata('email'); ?>" readonly>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="form-control-label" style="color: black; float: left;">Kegiatan Acara</label>
							<input autoborrlete="off" type="text" class="form-control" name="kegiatan_pinjaman">
						</div>
						<div class="form-group col-md-6">
                            <label for="nama" style="color: black; float: left;">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('name'); ?>" readonly>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
                            <label for="ruang_pinjaman" style="color: black; float: left;">Ruang Pinjaman</label>
							<select class="form-control" name="ruang_pinjaman">
								<option value="">Pilih...</option>
								<option value="Ruang Auditorium GKP lantai dasar">Ruang Auditorium GKP lantai dasar</option>
								<option value="Ruang Conference">Ruang Conference</option>
							</select>
						</div>
						<div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">NIP</label>
							<input autoborrlete="off" type="text" class="form-control" name="nip" readonly>
						</div>
						<div class="form-group col-md-6">
                            <label for="layout_pinjaman" style="color: black; float: left;">Layout</label>
							<select class="form-control" name="ruang_pinjaman">
								<option value="">Pilih...</option>
								<option value="Class Room">Class Room</option>
								<option value="U-Shape">U-Shape</option>
								<option value="Conference Style">Conference Style</option>
							</select>
						</div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">HP</label>
							<input autoborrlete="off" type="text" class="form-control" name="no_hp" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_mulai" style="color: black; float: left;">Waktu Mulai</label>
							<input type="date" class="form-control date-picker" name="waktu_mulai">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Divisi</label>
							<input autoborrlete="off" type="text" class="form-control" name="divisi" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_mulai" style="color: black; float: left;">Waktu Selesai</label>
							<input type="date" class="form-control date-picker" name="waktu_selesai">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Status</label>
							<input autoborrlete="off" type="text" class="form-control" name="status" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Jumlah Orang</label>
							<input autoborrlete="off" type="text" class="form-control" name="jml_orang">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Tanggal Request</label>
                            <input value="<?= set_value('tgl_request', date('l, d-m-Y')); ?>" name="tgl_request" id="tgl_request" type="text" class="form-control date" readonly>
                            <?= form_error('tgl_request', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <!-- <div class="col-lg-3 col-xl-2">
                            <h5 class="font-weight-bold mt-10 mb-6">Perlengkapan</h5>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">AC</label>
                            </div>
                        </div> -->

                        <!-- <div class="col-lg-3 col-xl-2">
                                <h4 class="font-weight-bold mt-10 mb-6">Persetujuan</h5>
                        </div> -->
                    </div>

                    <div class='from-row'>
                        <div class="col-lg-3 col-xl-2">
                            <h5 class="font-weight-bold mt-10 mb-6">Perlengkapan</h5>
                        </div>

                        <div class="form-group">
                            <div class="form-check col-lg-3 col-xl-4">
                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">AC</label>
                            </div>

                            <div class="form-check col-lg-4 col-xl-4">
                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">Kursi Susun</label>
                            </div>

                            <div class="form-check col-lg-4 col-xl-4">
                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">Meja Rapat</label>
                            </div>

                            <div class="form-check col-lg-4 col-xl-4">
                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">Screen</label>
                            </div>

                            <div class="form-check col-lg-4 col-xl-4">
                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">Sound System</label>
                            </div>

                            <div class="form-check col-lg-4 col-xl-4">
                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">Kabel Power</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-2">
                                <h4 class="font-weight-bold mt-10 mb-6">Persetujuan</h5>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Tanggal Persetujuan</label>
                            <input value="<?= set_value('tgl_request', date('l, d-m-Y')); ?>" name="tgl_request" id="tgl_request" type="text" class="form-control date" readonly>
                            <?= form_error('tgl_request', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-row">   
                        <div class="form-group col-md-6">
                            <label class="form-control-label" style="color: black; float: left;">Atasan</label>
							<input autoborrlete="off" type="text" class="form-control" name="atasan" readonly>
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

<!-- Modal Edit Data pinjaman(untuk user) -->
<!-- <?php foreach ($pinjaman as $borr) : ?>
	<div class="modal fade" id="editpinjaman<?= $borr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="AddPinjamanRuangandataLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 style="font-weight: bolder;" class="modal-title" id="AddPinjamanRuangandataLabel">Edit pinjaman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" action="<?= base_url('permintaan/editpinjaman/') . $borr['id'] ?>" method="POST">
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-md-6">
                                <label class="form-control-label" style="color: black; float: left;">No</label>
							    <input autoborrlete="off" type="text" class="form-control" name="id">
								<!-- <label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" value="<?= $this->session->userdata('email'); ?>" readonly> -->
							</div>
							<div class="form-group col-md-6">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control" name="nama" id="nama" value="<?= $this->session->userdata('name'); ?>" readonly>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="kegiatan_pinjaman">Judul pinjaman</label>
								<input type="text" class="form-control" name="kegiatan_pinjaman" id="kegiatan_pinjaman" value="<?= $borr['kegiatan_pinjaman']; ?>" required>
							</div>
							<div class="form-group col-md-6">
								<label for="ruang_pinjaman">ruang_pinjaman</label>
								<?php if ($borr['ruang_pinjaman'] == "Ruang Auditorium GKP lantai dasar") : ?>
									<select class="form-control" name="ruang_pinjaman" id="ruang_pinjaman">
										<option value="<?= $borr['ruang_pinjaman']; ?>" selected><?= $borr['ruang_pinjaman']; ?></option>
										<option value="Ruang Conference">Ruang Conference</option>
										<option value="Rusak Berat">Rusak Berat</option>
									</select>
								<?php elseif ($borr['ruang_pinjaman'] == "Ruang Conference") : ?>
									<select class="form-control" name="ruang_pinjaman" id="ruang_pinjaman">
										<option value="<?= $borr['ruang_pinjaman']; ?>" selected><?= $borr['ruang_pinjaman']; ?></option>
										<option value="Ruang Auditorium GKP lantai dasar">Ruang Auditorium GKP lantai dasar</option>
										<option value="Rusak Berat">Rusak Berat</option>
									</select>
								<?php elseif ($borr['ruang_pinjaman'] == "Rusak Berat") : ?>
									<select class="form-control" name="ruang_pinjaman" id="ruang_pinjaman">
										<option value="<?= $borr['ruang_pinjaman']; ?> " selected><?= $borr['ruang_pinjaman']; ?></option>
										<option value="Ruang Auditorium GKP lantai dasar">Ruang Auditorium GKP lantai dasar</option>
										<option value="Ruang Conference">Ruang Conference</option>
									</select>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label for="layout_pinjaman">layout_pinjaman</label>
							<textarea class="form-control" id="layout_pinjaman" name="layout_pinjaman" rows="3" required><?= $borr['layout_pinjaman']; ?></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tanggal_pinjaman">Tanggal Diajukan</label>
								<input type="date" class="form-control date-picker" name="tanggal_pinjaman" id="tanggal_pinjaman" value="<?= $borr['tanggal_pinjaman']; ?>" required>
							</div>
							<div class="form-group col-md-6">
								<label for="waktu_mulai">Tingkat Bahaya</label>
								<?php if ($borr['waktu_mulai'] == "Pekerjaan Bersiko Tinggi") : ?>
									<select class="form-control" name="waktu_mulai" id="waktu_mulai">
										<option value="<?= $borr['waktu_mulai']; ?> " selected><?= $borr['waktu_mulai']; ?></option>
										<option value="Pekerjaan Bersiko Rendah">Pekerjaan Bersiko Rendah</option>
									</select>
								<?php elseif ($borr['waktu_mulai'] == "Pekerjaan Bersiko Rendah") : ?>
									<select class="form-control" name="waktu_mulai" id="waktu_mulai">
										<option value="<?= $borr['waktu_mulai']; ?> " selected><?= $borr['waktu_mulai']; ?></option>
										<option value="Pekerjaan Bersiko Tinggi">Pekerjaan Bersiko Tinggi</option>
									</select>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
<?php endforeach; ?>
